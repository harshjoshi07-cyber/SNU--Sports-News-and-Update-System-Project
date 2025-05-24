<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get event details from URL parameters
$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';
$event_name = isset($_GET['event_name']) ? $_GET['event_name'] : '';

// Process form submission
$registration_success = false;
$error_message = '';
$registration_id = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    
    // Get additional fields based on event type
    $additional_data = [];
    
    if ($event_id == 'marathon-2024') {
        $additional_data['category'] = $_POST['category'];
        $additional_data['t_shirt_size'] = $_POST['t_shirt_size'];
    } elseif ($event_id == 'swimming-2024') {
        $additional_data['category'] = $_POST['category'];
        $additional_data['ticket_type'] = $_POST['ticket_type'];
    } elseif ($event_id == 'cricket-2024') {
        $additional_data['match'] = $_POST['match'];
        $additional_data['ticket_type'] = $_POST['ticket_type'];
    }
    
    // Convert additional data to JSON
    $additional_data_json = json_encode($additional_data);
    
    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO event_registrations (name, email, phone, event_id, event_name, additional_data, registration_date) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssss", $name, $email, $phone, $event_id, $event_name, $additional_data_json);
    
    if ($stmt->execute()) {
        $registration_success = true;
        $registration_id = $stmt->insert_id;
    } else {
        $error_message = "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

// Handle ticket download
if (isset($_GET['download_ticket']) && isset($_GET['registration_id'])) {
    require_once 'includes/TicketGenerator.php';
    
    // Get registration details
    $stmt = $conn->prepare("SELECT * FROM event_registrations WHERE id = ?");
    $stmt->bind_param("i", $_GET['registration_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $registration = $result->fetch_assoc();
    
    if ($registration) {
        // Get event details
        $event = [
            'id' => $registration['event_id'],
            'name' => $registration['event_name'],
            'date' => 'March 15, 2024', // You should get this from your events table
            'time' => '7:00 AM - 2:00 PM',
            'location' => 'Central Park'
        ];
        
        // Generate and download ticket
        $ticketGenerator = new TicketGenerator($event, $registration);
        $ticketGenerator->downloadTicket('event_ticket.html');
        exit;
    }
}

// Get event details based on event_id
$event_details = [];
if ($event_id) {
    if ($event_id == 'marathon-2024') {
        $event_details = [
            'name' => 'City Marathon 2024',
            'date' => 'March 15, 2024',
            'time' => '7:00 AM - 2:00 PM',
            'location' => 'Central Park',
            'price' => '$50 - $100',
            'description' => 'Join us for the annual city marathon event. Experience the thrill of running through the city\'s most iconic landmarks. The course includes scenic routes and challenging terrains.',
            'image' => 'https://images.unsplash.com/photo-1530549387789-4c1017266635?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
            'category' => 'Running'
        ];
    } elseif ($event_id == 'swimming-2024') {
        $event_details = [
            'name' => 'National Swimming Championship',
            'date' => 'April 5, 2024',
            'time' => '9:00 AM - 6:00 PM',
            'location' => 'Olympic Pool',
            'price' => '$30 - $75',
            'description' => 'Watch the best swimmers compete for glory in this prestigious national championship. Features multiple categories and age groups.',
            'image' => 'https://images.unsplash.com/photo-1576610616656-d3aa5d1f4534?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
            'category' => 'Swimming'
        ];
    } elseif ($event_id == 'cricket-2024') {
        $event_details = [
            'name' => 'International Cricket Series',
            'date' => 'May 10, 2024',
            'time' => '2:00 PM - 10:00 PM',
            'location' => 'Cricket Stadium',
            'price' => '$40 - $150',
            'description' => 'Don\'t miss the exciting cricket series this summer. Experience world-class cricket action with international teams competing.',
            'image' => 'https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
            'category' => 'Cricket'
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration - SportsHub</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/events.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .registration-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }
        
        .registration-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .event-image {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }
        
        .event-info {
            flex: 1;
        }
        
        .event-info h1 {
            margin-top: 0;
            color: var(--primary-color);
        }
        
        .event-details {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }
        
        .event-detail {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .event-detail i {
            color: var(--primary-color);
        }
        
        .registration-form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .form-title {
            margin-top: 0;
            margin-bottom: 20px;
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 10px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            flex: 1;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        .form-group input:focus, .form-group select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(44, 62, 80, 0.2);
        }
        
        .submit-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }
        
        .submit-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .home-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        
        .home-btn:hover {
            background-color: var(--secondary-color);
        }
        
        .required-field {
            color: red;
        }
        
        @media (max-width: 768px) {
            .registration-header {
                flex-direction: column;
            }
            
            .event-image {
                width: 100%;
                height: 200px;
                margin-right: 0;
                margin-bottom: 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="logo" data-aos="fade-right" data-aos-duration="1000">
                <img src="https://res.cloudinary.com/dxxyqxkt1/image/upload/v17094321/sportshub-logo.png" alt="SportsHub Logo" class="logo-img">
                <h1>SportsHub</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="user/login.php" class="btn btn-outline">Login</a>
                <a href="user/register.php" class="btn btn-primary">Register</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="registration-container">
            <?php if ($registration_success): ?>
                <div class="success-message" data-aos="fade-up">
                    <h2><i class="fas fa-check-circle"></i> Registration Successful!</h2>
                    <p>Thank you for registering for <?php echo htmlspecialchars($event_name); ?>. Your registration has been confirmed.</p>
                    <p>Please download your ticket and keep it safe. You will need to present it at the event entrance.</p>
                    <div>
                        <a href="event_registration.php?download_ticket=1&registration_id=<?php echo $registration_id; ?>" class="download-ticket">
                            <i class="fas fa-download"></i> Download Ticket
                        </a>
                        <a href="index.php" class="home-btn">
                            <i class="fas fa-home"></i> Go to Home
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <?php if ($error_message): ?>
                    <div class="error-message" data-aos="fade-up">
                        <h2><i class="fas fa-exclamation-circle"></i> Registration Error</h2>
                        <p><?php echo htmlspecialchars($error_message); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($event_details)): ?>
                    <div class="registration-header" data-aos="fade-up">
                        <img src="<?php echo htmlspecialchars($event_details['image']); ?>" alt="<?php echo htmlspecialchars($event_details['name']); ?>" class="event-image">
                        <div class="event-info">
                            <h1><?php echo htmlspecialchars($event_details['name']); ?></h1>
                            <p><?php echo htmlspecialchars($event_details['description']); ?></p>
                            <div class="event-details">
                                <div class="event-detail">
                                    <i class="fas fa-calendar"></i>
                                    <span><?php echo htmlspecialchars($event_details['date']); ?></span>
                                </div>
                                <div class="event-detail">
                                    <i class="fas fa-clock"></i>
                                    <span><?php echo htmlspecialchars($event_details['time']); ?></span>
                                </div>
                                <div class="event-detail">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo htmlspecialchars($event_details['location']); ?></span>
                                </div>
                                <div class="event-detail">
                                    <i class="fas fa-ticket-alt"></i>
                                    <span><?php echo htmlspecialchars($event_details['price']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="registration-form-container" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="form-title">Registration Form</h2>
                        <form action="event_registration.php" method="POST">
                            <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($event_id); ?>">
                            <input type="hidden" name="event_name" value="<?php echo htmlspecialchars($event_details['name']); ?>">
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="name">Full Name <span class="required-field">*</span></label>
                                    <input type="text" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email <span class="required-field">*</span></label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="phone">Phone Number <span class="required-field">*</span></label>
                                    <input type="tel" id="phone" name="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address">
                                </div>
                            </div>
                            
                            <?php if ($event_id == 'marathon-2024'): ?>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="category">Category <span class="required-field">*</span></label>
                                        <select id="category" name="category" required>
                                            <option value="">Select Category</option>
                                            <option value="full">Full Marathon</option>
                                            <option value="half">Half Marathon</option>
                                            <option value="10k">10K Run</option>
                                            <option value="5k">5K Run</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="t_shirt_size">T-Shirt Size <span class="required-field">*</span></label>
                                        <select id="t_shirt_size" name="t_shirt_size" required>
                                            <option value="">Select Size</option>
                                            <option value="S">Small</option>
                                            <option value="M">Medium</option>
                                            <option value="L">Large</option>
                                            <option value="XL">X-Large</option>
                                            <option value="XXL">XX-Large</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="emergency_contact">Emergency Contact</label>
                                        <input type="text" id="emergency_contact" name="emergency_contact">
                                    </div>
                                    <div class="form-group">
                                        <label for="medical_conditions">Medical Conditions</label>
                                        <input type="text" id="medical_conditions" name="medical_conditions">
                                    </div>
                                </div>
                            <?php elseif ($event_id == 'swimming-2024'): ?>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="category">Category <span class="required-field">*</span></label>
                                        <select id="category" name="category" required>
                                            <option value="">Select Category</option>
                                            <option value="spectator">Spectator</option>
                                            <option value="participant">Participant</option>
                                            <option value="vip">VIP Access</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ticket_type">Ticket Type <span class="required-field">*</span></label>
                                        <select id="ticket_type" name="ticket_type" required>
                                            <option value="">Select Ticket Type</option>
                                            <option value="single-day">Single Day Pass</option>
                                            <option value="all-days">All Days Pass</option>
                                            <option value="finals">Finals Only</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="swimming_style">Swimming Style (if participant)</label>
                                        <select id="swimming_style" name="swimming_style">
                                            <option value="">Select Style</option>
                                            <option value="freestyle">Freestyle</option>
                                            <option value="backstroke">Backstroke</option>
                                            <option value="breaststroke">Breaststroke</option>
                                            <option value="butterfly">Butterfly</option>
                                            <option value="medley">Medley</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="age_group">Age Group (if participant)</label>
                                        <select id="age_group" name="age_group">
                                            <option value="">Select Age Group</option>
                                            <option value="u18">Under 18</option>
                                            <option value="18-25">18-25</option>
                                            <option value="26-35">26-35</option>
                                            <option value="36-45">36-45</option>
                                            <option value="46+">46+</option>
                                        </select>
                                    </div>
                                </div>
                            <?php elseif ($event_id == 'cricket-2024'): ?>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="match">Match <span class="required-field">*</span></label>
                                        <select id="match" name="match" required>
                                            <option value="">Select Match</option>
                                            <option value="india-vs-australia">India vs Australia</option>
                                            <option value="england-vs-south-africa">England vs South Africa</option>
                                            <option value="pakistan-vs-new-zealand">Pakistan vs New Zealand</option>
                                            <option value="all-matches">All Matches Package</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ticket_type">Ticket Type <span class="required-field">*</span></label>
                                        <select id="ticket_type" name="ticket_type" required>
                                            <option value="">Select Ticket Type</option>
                                            <option value="general">General Admission</option>
                                            <option value="premium">Premium Seating</option>
                                            <option value="vip">VIP Box</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="number_of_tickets">Number of Tickets</label>
                                        <input type="number" id="number_of_tickets" name="number_of_tickets" min="1" max="10" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="special_requests">Special Requests</label>
                                        <input type="text" id="special_requests" name="special_requests" placeholder="Any special requirements?">
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="comments">Additional Comments</label>
                                    <textarea id="comments" name="comments" rows="3" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
                                </div>
                            </div>
                            
                            <button type="submit" class="submit-btn">Submit Registration</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="error-message" data-aos="fade-up">
                        <h2><i class="fas fa-exclamation-circle"></i> Event Not Found</h2>
                        <p>The requested event could not be found. Please return to the events page and try again.</p>
                        <a href="events.php" class="home-btn">Return to Events</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-section" data-aos="fade-up" data-aos-delay="100">
                <h3>About Us</h3>
                <p>Your premier destination for sports news and events.</p>
            </div>
            <div class="footer-section" data-aos="fade-up" data-aos-delay="200">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="news.php">News</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section" data-aos="fade-up" data-aos-delay="300">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 SportsHub. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
</body>
</html> 