<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - SportsHub</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/events.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        /* Override the background image in the CSS */
        .events-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
        }
        
        /* Registration button styles */
        .register-btn {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 600;
            margin-top: 15px;
            transition: background-color 0.3s;
        }
        
        .register-btn:hover {
            background-color: var(--secondary-color);
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
                <li><a href="events.php" class="active">Events</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="user/login.php" class="btn btn-outline">Login</a>
                <a href="user/register.php" class="btn btn-primary">Register</a>
            </div>
        </nav>
    </header>

    <main class="events-page">
        <section class="events-hero" data-aos="fade-up">
            <div class="container">
                <h1 data-aos="fade-up" data-aos-delay="200">Upcoming Events</h1>
                <p data-aos="fade-up" data-aos-delay="400">Join us for exciting sports events and competitions</p>
            </div>
        </section>

        <section class="events-list">
            <div class="container">
                <div class="events-grid">
                    <div class="event-card" data-aos="fade-up" data-aos-delay="100">
                        <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="City Marathon" class="event-img">
                        <div class="event-content">
                            <span class="event-category">Running</span>
                            <h3>City Marathon 2024</h3>
                            <div class="event-details">
                                <div class="event-date"><i class="fas fa-calendar"></i> March 15, 2024</div>
                                <div class="event-time"><i class="fas fa-clock"></i> 7:00 AM - 2:00 PM</div>
                                <div class="event-location"><i class="fas fa-map-marker-alt"></i> Central Park</div>
                                <div class="event-price"><i class="fas fa-ticket-alt"></i> $50 - $100</div>
                            </div>
                            <p>Join us for the annual city marathon event. Experience the thrill of running through the city's most iconic landmarks. The course includes scenic routes and challenging terrains.</p>
                            <div class="event-features">
                                <span><i class="fas fa-medal"></i> Professional Timing</span>
                                <span><i class="fas fa-tshirt"></i> Event T-shirt</span>
                                <span><i class="fas fa-medkit"></i> Medical Support</span>
                            </div>
                            
                            <!-- Registration Link for Marathon -->
                            <a href="event_registration.php?event_id=marathon-2024&event_name=City%20Marathon%202024" class="register-btn">Register Now</a>
                        </div>
                    </div>

                    <div class="event-card" data-aos="fade-up" data-aos-delay="200">
                        <img src="https://images.unsplash.com/photo-1576610616656-d3aa5d1f4534?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Swimming Championship" class="event-img">
                        <div class="event-content">
                            <span class="event-category">Swimming</span>
                            <h3>National Swimming Championship</h3>
                            <div class="event-details">
                                <div class="event-date"><i class="fas fa-calendar"></i> April 5, 2024</div>
                                <div class="event-time"><i class="fas fa-clock"></i> 9:00 AM - 6:00 PM</div>
                                <div class="event-location"><i class="fas fa-map-marker-alt"></i> Olympic Pool</div>
                                <div class="event-price"><i class="fas fa-ticket-alt"></i> $30 - $75</div>
                            </div>
                            <p>Watch the best swimmers compete for glory in this prestigious national championship. Features multiple categories and age groups.</p>
                            <div class="event-features">
                                <span><i class="fas fa-swimming-pool"></i> Olympic Standard Pool</span>
                                <span><i class="fas fa-trophy"></i> Prize Money</span>
                                <span><i class="fas fa-camera"></i> Live Coverage</span>
                            </div>
                            
                            <!-- Registration Link for Swimming -->
                            <a href="event_registration.php?event_id=swimming-2024&event_name=National%20Swimming%20Championship" class="register-btn">Register Now</a>
                        </div>
                    </div>

                    <div class="event-card" data-aos="fade-up" data-aos-delay="300">
                        <img src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Cricket Series" class="event-img">
                        <div class="event-content">
                            <span class="event-category">Cricket</span>
                            <h3>International Cricket Series</h3>
                            <div class="event-details">
                                <div class="event-date"><i class="fas fa-calendar"></i> May 10, 2024</div>
                                <div class="event-time"><i class="fas fa-clock"></i> 2:00 PM - 10:00 PM</div>
                                <div class="event-location"><i class="fas fa-map-marker-alt"></i> Cricket Stadium</div>
                                <div class="event-price"><i class="fas fa-ticket-alt"></i> $40 - $150</div>
                            </div>
                            <p>Don't miss the exciting cricket series this summer. Experience world-class cricket action with international teams competing.</p>
                            <div class="event-features">
                                <span><i class="fas fa-cricket-bat-ball"></i> T20 Format</span>
                                <span><i class="fas fa-star"></i> International Teams</span>
                                <span><i class="fas fa-beer"></i> Food & Beverages</span>
                            </div>
                            
                            <!-- Registration Link for Cricket -->
                            <a href="event_registration.php?event_id=cricket-2024&event_name=International%20Cricket%20Series" class="register-btn">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="event-categories" data-aos="fade-up">
            <div class="container">
                <h2>Event Categories</h2>
                <div class="categories-grid">
                    <div class="category-card" data-aos="zoom-in" data-aos-delay="100">
                        <i class="fas fa-running"></i>
                        <h3>Running</h3>
                        <p>Marathons, 5K, 10K races</p>
                    </div>
                    <div class="category-card" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fas fa-swimming-pool"></i>
                        <h3>Swimming</h3>
                        <p>Championships, training</p>
                    </div>
                    <div class="category-card" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-cricket-bat-ball"></i>
                        <h3>Cricket</h3>
                        <p>Tournaments, matches</p>
                    </div>
                    <div class="category-card" data-aos="zoom-in" data-aos-delay="400">
                        <i class="fas fa-basketball-ball"></i>
                        <h3>Basketball</h3>
                        <p>Leagues, competitions</p>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="assets/js/events.js"></script>
</body>
</html> 