<?php
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SportsHub</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>
<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="logo">
                <img src="https://cdn-icons-png.flaticon.com/512/2936/2936886.png" alt="SportsHub Logo" class="logo-img">
                <h1>SportsHub</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="news/">News</a></li>
                <li><a href="events/">Events</a></li>
                <li><a href="about.php" class="active">About</a></li>
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
        <section class="about-hero" data-aos="fade-up">
            <div class="hero-content">
                <h1 class="animate-text">About SportsHub</h1>
                <p class="animate-text">Your premier destination for sports news and events</p>
            </div>
            <div class="hero-image" data-aos="fade-left" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1471295253337-3ceaaad65897?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80" alt="Sports Stadium" class="hero-img">
            </div>
        </section>

        <section class="about-story" data-aos="fade-up">
            <div class="container">
                <h2>Our Story</h2>
                <p>Founded in 2024, SportsHub has grown from a small sports news platform to a comprehensive sports community. We're dedicated to bringing you the latest sports news, events, and updates from around the world.</p>
                <img src="https://images.unsplash.com/photo-1459865264687-595d652de67e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Our Journey" class="story-img" data-aos="fade-up" data-aos-delay="200">
            </div>
        </section>

        <section class="team-section">
            <div class="container">
                <h2 data-aos="fade-up">Meet Our Team</h2>
                <div class="team-grid">
                    <div class="team-member" data-aos="fade-up" data-aos-delay="100">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=987&q=80" alt="John Doe">
                        <h3>Harsh joshi</h3>
                        <p class="position">Founder & CEO</p>
                        <p class="bio">Passionate about sports and technology, John leads our team with vision and dedication.</p>
                    </div>
                    <div class="team-member" data-aos="fade-up" data-aos-delay="200">
                        <img src="images/has.jpg" alt="Hasnain Mansuri">
                        <h3>Hasnain Mansuri</h3>
                        <p class="position">Editor-in-Chief</p>
                        <p class="bio">With 10 years of sports journalism experience, Jane ensures quality content.</p>
                    </div>
                    <div class="team-member" data-aos="fade-up" data-aos-delay="300">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Mike Johnson">
                        <h3>Mahesh Barot</h3>
                        <p class="position">Events Manager</p>
                        <p class="bio">Expert in organizing and managing sports events of all scales.</p>
                    </div>
                   
                </div>
            </div>
        </section>

        <section class="mission-vision" data-aos="fade-up">
            <div class="container">
                <div class="mission" data-aos="fade-right" data-aos-delay="100">
                    <h2>Our Mission</h2>
                    <p>To provide comprehensive sports coverage and create a vibrant community for sports enthusiasts worldwide.</p>
                    <img src="https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Our Mission" class="mission-img">
                </div>
                <div class="vision" data-aos="fade-left" data-aos-delay="200">
                    <h2>Our Vision</h2>
                    <p>To become the leading platform for sports news, events, and community engagement.</p>
                    <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Our Vision" class="vision-img">
                </div>
            </div>
        </section>

        <section class="achievements" data-aos="fade-up">
            <div class="container">
                <h2>Our Achievements</h2>
                <div class="achievements-grid">
                    <div class="achievement-card" data-aos="zoom-in" data-aos-delay="100">
                        <span class="number" data-count="10000">0</span>
                        <p>Active Users</p>
                    </div>
                    <div class="achievement-card" data-aos="zoom-in" data-aos-delay="200">
                        <span class="number" data-count="500">0</span>
                        <p>Events Hosted</p>
                    </div>
                    <div class="achievement-card" data-aos="zoom-in" data-aos-delay="300">
                        <span class="number" data-count="100">0</span>
                        <p>Sports Categories</p>
                    </div>
                    <div class="achievement-card" data-aos="zoom-in" data-aos-delay="400">
                        <span class="number">24/7</span>
                        <p>News Coverage</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials" data-aos="fade-up">
            <div class="container">
                <h2>What Our Users Say</h2>
                <div class="testimonials-grid">
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-img">
                            <img src="https://images.unsplash.com/photo-1603415526960-f7e0328c63b1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="David Miller">
                        </div>
                        <p class="quote">"SportsHub has revolutionized how I follow sports news and events!"</p>
                        <p class="author">- David Miller</p>
                    </div>
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-img">
                            <img src="https://images.unsplash.com/photo-1619895862022-09114b41f16f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Emily Brown">
                        </div>
                        <p class="quote">"The best platform for sports enthusiasts. Highly recommended!"</p>
                        <p class="author">- Emily Brown</p>
                    </div>
                    <div class="testimonial-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-img">
                            <img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Robert Wilson">
                        </div>
                        <p class="quote">"Great community and excellent coverage of all sports events."</p>
                        <p class="author">- Robert Wilson</p>
                    </div>
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
                    <li><a href="news/">News</a></li>
                    <li><a href="events/">Events</a></li>
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
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        // Animate numbers in achievement cards
        const achievementNumbers = document.querySelectorAll('.achievement-card .number[data-count]');
        
        function animateNumber(element) {
            const target = parseInt(element.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target.toLocaleString() + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString() + '+';
                }
            }, 16);
        }

        // Intersection Observer for achievement numbers
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumber(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        achievementNumbers.forEach(number => observer.observe(number));
    </script>
</body>
</html> 