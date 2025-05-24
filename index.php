<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports News & Events</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        .news-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .section-description {
            text-align: center;
            color: #666;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 3rem;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .news-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-5px);
        }

        .news-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary-color);
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .news-content {
            padding: 20px;
        }

        .news-content h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            color: #333;
        }

        .news-excerpt {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.8rem;
            color: #888;
        }

        .author {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .author img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            object-fit: cover;
        }

        .read-more {
            display: inline-block;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="logo">
                <img src="https://cdn-icons-png.flaticon.com/512/2936/2936886.png" alt="SportsHub Logo" class="logo-img">
                <h1>SportsHub</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="auth-buttons">
                <button id="theme-toggle" class="theme-toggle" aria-label="Toggle dark mode">
                    <i class="fas fa-moon"></i>
                </button>
                <a href="user/login.php" class="btn btn-outline">Login</a>
                <a href="user/register.php" class="btn btn-primary">Register</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content" data-aos="fade-right" data-aos-duration="1000">
                <h2>Stay Updated with Latest Sports News</h2>
                <p>Discover upcoming events and join the sports community</p>
                <a href="events.php" class="btn btn-primary animate-btn">Explore Events</a>
            </div>
            <div class="hero-image" data-aos="fade-left" data-aos-duration="1000">
                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Sports Action" class="hero-img">
            </div>
        </section>

        <!-- Live Scores Section -->
        <?php include 'includes/live-scores.php'; displayLiveScores(); ?>

        <section class="news-section">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Latest Sports News</h2>
                <p class="section-description" data-aos="fade-up" data-aos-delay="100">Stay updated with the latest sports news and updates from around the world.</p>
                
            <div class="news-grid">
                    <article class="news-card" data-aos="fade-up">
                        <div class="news-image">
                            <img src="assets/images/news/champions-league.jpg" alt="Champions League Final">
                            <span class="news-category">Football</span>
                        </div>
                        <div class="news-content">
                            <h3>Champions League Final: Real Madrid vs Manchester City</h3>
                            <p class="news-excerpt">The stage is set for an epic showdown between two European giants in the Champions League final. Real Madrid's experience against Manchester City's attacking prowess promises a thrilling match.</p>
                            <div class="news-meta">
                                <div class="author">
                                    <img src="assets/images/authors/john-doe.jpg" alt="John Doe">
                                    <span>John Doe</span>
                                </div>
                                <time>May 15, 2024</time>
                            </div>
                            <a href="news.php?id=1" class="read-more">Read More</a>
                        </div>
                    </article>

                    <article class="news-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="news-image">
                            <img src="assets/images/news/nba-playoffs.jpg" alt="NBA Playoffs">
                            <span class="news-category">Basketball</span>
                        </div>
                        <div class="news-content">
                            <h3>NBA Playoffs: Latest Updates and Predictions</h3>
                            <p class="news-excerpt">As the NBA playoffs heat up, teams are giving their all to secure a spot in the finals. Expert analysis and predictions for the upcoming crucial matches.</p>
                            <div class="news-meta">
                                <div class="author">
                                    <img src="assets/images/authors/jane-smith.jpg" alt="Jane Smith">
                                    <span>Jane Smith</span>
                                </div>
                                <time>May 14, 2024</time>
                            </div>
                            <a href="news.php?id=2" class="read-more">Read More</a>
                        </div>
                    </article>

                    <article class="news-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="news-image">
                            <img src="assets/images/news/tennis-grand-slam.jpg" alt="Tennis Grand Slam">
                            <span class="news-category">Tennis</span>
                        </div>
                        <div class="news-content">
                            <h3>Tennis Grand Slam: French Open Preview</h3>
                            <p class="news-excerpt">The French Open is just around the corner, and tennis fans are eagerly awaiting. Top players prepare for the clay court challenge at Roland Garros.</p>
                            <div class="news-meta">
                                <div class="author">
                                    <img src="assets/images/authors/mike-wilson.jpg" alt="Mike Wilson">
                                    <span>Mike Wilson</span>
                                </div>
                                <time>May 13, 2024</time>
                </div>
                            <a href="news.php?id=3" class="read-more">Read More</a>
                </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="upcoming-events">
            <h2 class="section-header" data-aos="fade-up">Upcoming Events</h2>
            <div class="events-grid">
                <div class="event-card" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1530549387789-4c1017266635?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Marathon Event" class="event-img">
                    <h3>City Marathon 2024</h3>
                    <p>Join us for the annual city marathon event.</p>
                </div>
                <div class="event-card" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1576610616656-d3aa5d1f4534?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Swimming Competition" class="event-img">
                    <h3>National Swimming Championship</h3>
                    <p>Watch the best swimmers compete for glory.</p>
                </div>
                <div class="event-card" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Cricket Match" class="event-img">
                    <h3>International Cricket Series</h3>
                    <p>Don't miss the exciting cricket series this summer.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Your premier destination for sports news and events.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="news.php">News</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 SportsHub. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/live-scores.js"></script>
    <script src="assets/js/news.js"></script>
</body>
</html> 