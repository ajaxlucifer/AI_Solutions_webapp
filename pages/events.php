<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Gallery | AI-Solutions</title>
    <meta name="description" content="Explore our past events, photo galleries, and upcoming events. Join us in shaping the future of AI and digital employee experience.">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2><a href="../index.php">AI-Solutions</a></h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="solutions.php" class="nav-link">Solutions</a>
                </li>
                <li class="nav-item">
                    <a href="case-studies.php" class="nav-link">Case Studies</a>
                </li>
                <li class="nav-item">
                    <a href="testimonials.php" class="nav-link">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a href="articles.php" class="nav-link">Articles</a>
                </li>
                <li class="nav-item">
                    <a href="events.php" class="nav-link active">Events</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Events & Gallery</h1>
            <p>Join us at industry events and explore our photo galleries from past conferences and workshops</p>
            <nav class="breadcrumb">
                <a href="../index.php">Home</a> / <span>Events</span>
            </nav>
        </div>
    </section>

    <!-- Event Navigation Tabs -->
    <section class="event-tabs">
        <div class="container">
            <div class="tab-navigation">
                <button class="tab-btn active" data-tab="upcoming">Upcoming Events</button>
                <button class="tab-btn" data-tab="past">Past Events</button>
                <button class="tab-btn" data-tab="gallery">Photo Gallery</button>
                <button class="tab-btn" data-tab="webinars">Webinars</button>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section id="upcoming" class="tab-content active">
        <div class="container">
            <div class="section-header">
                <h2>Upcoming Events</h2>
                <p>Join us at these exciting upcoming events and conferences</p>
            </div>
            
            <div class="events-grid">
                <!-- Event 1 -->
                <div class="event-card featured">
                    <div class="event-image">
                        <div class="image-placeholder">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span class="event-badge">Featured</span>
                    </div>
                    <div class="event-content">
                        <div class="event-date">
                            <span class="month">APR</span>
                            <span class="day">15</span>
                            <span class="year">2025</span>
                        </div>
                        <div class="event-details">
                            <h3>AI Innovation Summit 2025</h3>
                            <div class="event-meta">
                                <span class="location"><i class="fas fa-map-marker-alt"></i> London, UK</span>
                                <span class="time"><i class="fas fa-clock"></i> 9:00 AM - 6:00 PM</span>
                                <span class="type"><i class="fas fa-tag"></i> Conference</span>
                            </div>
                            <p>
                                Join industry leaders for a comprehensive exploration of AI innovations in the workplace. 
                                Our CEO will present on "The Future of AI-Powered Employee Experience" with live demonstrations 
                                of our latest solutions.
                            </p>
                            <div class="event-highlights">
                                <ul>
                                    <li>Keynote presentation by AI-Solutions CEO</li>
                                    <li>Live product demonstrations</li>
                                    <li>Networking with 500+ industry professionals</li>
                                    <li>Panel discussion on AI ethics</li>
                                </ul>
                            </div>
                            <div class="event-actions">
                                <a href="#" class="btn btn-primary">Register Now</a>
                                <a href="#" class="btn btn-outline">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="event-card">
                    <div class="event-image">
                        <div class="image-placeholder">
                            <i class="fas fa-laptop"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <div class="event-date">
                            <span class="month">MAY</span>
                            <span class="day">3</span>
                            <span class="year">2025</span>
                        </div>
                        <div class="event-details">
                            <h3>Digital Workplace Transformation Workshop</h3>
                            <div class="event-meta">
                                <span class="location"><i class="fas fa-map-marker-alt"></i> Manchester, UK</span>
                                <span class="time"><i class="fas fa-clock"></i> 10:00 AM - 4:00 PM</span>
                                <span class="type"><i class="fas fa-tag"></i> Workshop</span>
                            </div>
                            <p>
                                Hands-on workshop for IT leaders and digital transformation professionals. Learn practical 
                                strategies for implementing AI-powered solutions in your organization.
                            </p>
                            <div class="event-actions">
                                <a href="#" class="btn btn-primary">Register</a>
                                <a href="#" class="btn btn-outline">Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="event-card">
                    <div class="event-image">
                        <div class="image-placeholder">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <div class="event-date">
                            <span class="month">MAY</span>
                            <span class="day">20</span>
                            <span class="year">2025</span>
                        </div>
                        <div class="event-details">
                            <h3>Customer Success Roundtable</h3>
                            <div class="event-meta">
                                <span class="location"><i class="fas fa-map-marker-alt"></i> Edinburgh, UK</span>
                                <span class="time"><i class="fas fa-clock"></i> 2:00 PM - 5:00 PM</span>
                                <span class="type"><i class="fas fa-tag"></i> Roundtable</span>
                            </div>
                            <p>
                                Exclusive roundtable discussion with our existing customers sharing their success stories 
                                and best practices for AI implementation.
                            </p>
                            <div class="event-actions">
                                <a href="#" class="btn btn-primary">Apply</a>
                                <a href="#" class="btn btn-outline">Info</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 4 -->
                <div class="event-card">
                    <div class="event-image">
                        <div class="image-placeholder">
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <div class="event-date">
                            <span class="month">JUN</span>
                            <span class="day">8</span>
                            <span class="year">2025</span>
                        </div>
                        <div class="event-details">
                            <h3>Global Digital Experience Conference</h3>
                            <div class="event-meta">
                                <span class="location"><i class="fas fa-map-marker-alt"></i> Virtual Event</span>
                                <span class="time"><i class="fas fa-clock"></i> 11:00 AM - 3:00 PM GMT</span>
                                <span class="type"><i class="fas fa-tag"></i> Virtual Conference</span>
                            </div>
                            <p>
                                Join thousands of professionals worldwide for our virtual conference featuring the latest 
                                trends in digital employee experience and AI innovation.
                            </p>
                            <div class="event-actions">
                                <a href="#" class="btn btn-primary">Register Free</a>
                                <a href="#" class="btn btn-outline">Agenda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Past Events -->
    <section id="past" class="tab-content">
        <div class="container">
            <div class="section-header">
                <h2>Past Events</h2>
                <p>Highlights from our recent events and conferences</p>
            </div>
            
            <div class="past-events-timeline">
                <div class="timeline-item">
                    <div class="timeline-date">
                        <span>March 2025</span>
                    </div>
                    <div class="timeline-content">
                        <h3>TechWeek London 2025</h3>
                        <p>Showcased our latest AI virtual assistant technology to over 2,000 attendees. 
                           Received the "Innovation Excellence Award" for our proactive monitoring solution.</p>
                        <div class="timeline-stats">
                            <span><i class="fas fa-users"></i> 2,000+ Attendees</span>
                            <span><i class="fas fa-award"></i> Innovation Award Winner</span>
                            <span><i class="fas fa-handshake"></i> 150+ New Partnerships</span>
                        </div>
                        <a href="#" class="timeline-link">View Highlights</a>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-date">
                        <span>February 2025</span>
                    </div>
                    <div class="timeline-content">
                        <h3>AI in Healthcare Summit</h3>
                        <p>Presented our healthcare-specific solutions with a focus on maintaining system 
                           reliability in critical care environments. Panel discussion on AI ethics in healthcare.</p>
                        <div class="timeline-stats">
                            <span><i class="fas fa-users"></i> 800+ Healthcare Leaders</span>
                            <span><i class="fas fa-comments"></i> 5 Panel Discussions</span>
                            <span><i class="fas fa-lightbulb"></i> 20+ Solution Demos</span>
                        </div>
                        <a href="#" class="timeline-link">View Highlights</a>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-date">
                        <span>January 2025</span>
                    </div>
                    <div class="timeline-content">
                        <h3>Digital Transformation Summit</h3>
                        <p>Keynote on "Measuring ROI in Digital Employee Experience" with real customer 
                           case studies showing measurable business impact.</p>
                        <div class="timeline-stats">
                            <span><i class="fas fa-users"></i> 1,500+ IT Leaders</span>
                            <span><i class="fas fa-presentation"></i> Keynote Speaker</span>
                            <span><i class="fas fa-chart-line"></i> 10 Case Studies Presented</span>
                        </div>
                        <a href="#" class="timeline-link">View Highlights</a>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-date">
                        <span>December 2024</span>
                    </div>
                    <div class="timeline-content">
                        <h3>AI Solutions Customer Conference</h3>
                        <p>Our annual customer conference featuring product roadmap presentations, 
                           customer success stories, and networking opportunities.</p>
                        <div class="timeline-stats">
                            <span><i class="fas fa-users"></i> 500+ Customers</span>
                            <span><i class="fas fa-star"></i> 4.9/5 Rating</span>
                            <span><i class="fas fa-gift"></i> Product Previews</span>
                        </div>
                        <a href="#" class="timeline-link">View Highlights</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery -->
    <section id="gallery" class="tab-content">
        <div class="container">
            <div class="section-header">
                <h2>Photo Gallery</h2>
                <p>Moments captured from our events, conferences, and team activities</p>
            </div>

            <div class="gallery-filter">
                <button class="filter-btn active" data-filter="all">All Photos</button>
                <button class="filter-btn" data-filter="conferences">Conferences</button>
                <button class="filter-btn" data-filter="workshops">Workshops</button>
                <button class="filter-btn" data-filter="team">Team Events</button>
                <button class="filter-btn" data-filter="awards">Awards</button>
            </div>

            <div class="photo-gallery">
                <!-- Conference Photos -->
                <div class="gallery-item" data-category="conferences">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=12" alt="Keynote Presentation">
                        <div class="gallery-overlay">
                            <h4>Keynote Presentation</h4>
                            <p>CEO presenting at TechWeek London 2025</p>
                            <button class="view-btn" onclick="openLightbox('img1')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="conferences">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=13" alt="Product Demonstration">
                        <div class="gallery-overlay">
                            <h4>Product Demonstration</h4>
                            <p>Live demo of AI virtual assistant</p>
                            <button class="view-btn" onclick="openLightbox('img2')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="workshops">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=14" alt="Hands-on Workshop">
                        <div class="gallery-overlay">
                            <h4>Hands-on Workshop</h4>
                            <p>Digital transformation workshop in Manchester</p>
                            <button class="view-btn" onclick="openLightbox('img3')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="team">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=15" alt="Team Building">
                        <div class="gallery-overlay">
                            <h4>Team Building</h4>
                            <p>Annual team retreat 2024</p>
                            <button class="view-btn" onclick="openLightbox('img4')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="awards">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=16" alt="Innovation Award">
                        <div class="gallery-overlay">
                            <h4>Innovation Award</h4>
                            <p>Receiving the Innovation Excellence Award</p>
                            <button class="view-btn" onclick="openLightbox('img5')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="conferences">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=17" alt="Partnership Signing">
                        <div class="gallery-overlay">
                            <h4>Partnership Signing</h4>
                            <p>New strategic partnership announcement</p>
                            <button class="view-btn" onclick="openLightbox('img6')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="workshops">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=18" alt="Training Session">
                        <div class="gallery-overlay">
                            <h4>Training Session</h4>
                            <p>Customer training workshop</p>
                            <button class="view-btn" onclick="openLightbox('img7')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="team">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=19" alt="Company Milestone">
                        <div class="gallery-overlay">
                            <h4>Company Milestone</h4>
                            <p>Celebrating 5 years of innovation</p>
                            <button class="view-btn" onclick="openLightbox('img8')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="conferences">
                    <div class="gallery-image">
                        <img src="https://picsum.photos/400/300?random=20" alt="Panel Discussion">
                        <div class="gallery-overlay">
                            <h4>Panel Discussion</h4>
                            <p>AI ethics panel at Healthcare Summit</p>
                            <button class="view-btn" onclick="openLightbox('img9')">
                                <i class="fas fa-expand"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Webinars -->
    <section id="webinars" class="tab-content">
        <div class="container">
            <div class="section-header">
                <h2>Webinars & Virtual Events</h2>
                <p>Join our regular webinar series and virtual events</p>
            </div>

            <div class="webinars-grid">
                <div class="webinar-card featured">
                    <div class="webinar-header">
                        <span class="webinar-badge">Live Next Week</span>
                        <div class="webinar-date">April 22, 2025</div>
                    </div>
                    <div class="webinar-content">
                        <h3>AI-Powered Employee Experience: Best Practices for 2025</h3>
                        <div class="webinar-meta">
                            <span class="duration"><i class="fas fa-clock"></i> 60 minutes</span>
                            <span class="attendees"><i class="fas fa-users"></i> 500+ registered</span>
                            <span class="level"><i class="fas fa-signal"></i> Intermediate</span>
                        </div>
                        <p>Join our experts as they share the latest best practices for implementing AI-powered 
                           employee experience solutions. Learn from real customer examples and get your questions answered.</p>
                        <div class="webinar-speakers">
                            <div class="speaker">
                                <i class="fas fa-user-circle"></i>
                                <span>Dr. Sarah Mitchell - Chief AI Researcher</span>
                            </div>
                            <div class="speaker">
                                <i class="fas fa-user-circle"></i>
                                <span>James Wilson - Solutions Architect</span>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary">Register Now</a>
                    </div>
                </div>

                <div class="webinar-card">
                    <div class="webinar-header">
                        <span class="webinar-badge">On Demand</span>
                        <div class="webinar-date">March 18, 2025</div>
                    </div>
                    <div class="webinar-content">
                        <h3>Measuring ROI in Digital Transformation</h3>
                        <div class="webinar-meta">
                            <span class="duration"><i class="fas fa-clock"></i> 45 minutes</span>
                            <span class="views"><i class="fas fa-eye"></i> 2,100+ views</span>
                            <span class="level"><i class="fas fa-signal"></i> Beginner</span>
                        </div>
                        <p>Learn how to calculate and demonstrate the return on investment of your digital 
                           employee experience initiatives with practical frameworks and tools.</p>
                        <a href="#" class="btn btn-outline">Watch Now</a>
                    </div>
                </div>

                <div class="webinar-card">
                    <div class="webinar-header">
                        <span class="webinar-badge">On Demand</span>
                        <div class="webinar-date">February 25, 2025</div>
                    </div>
                    <div class="webinar-content">
                        <h3>Proactive IT Monitoring: Preventing Issues Before They Happen</h3>
                        <div class="webinar-meta">
                            <span class="duration"><i class="fas fa-clock"></i> 50 minutes</span>
                            <span class="views"><i class="fas fa-eye"></i> 1,800+ views</span>
                            <span class="level"><i class="fas fa-signal"></i> Advanced</span>
                        </div>
                        <p>Deep dive into advanced monitoring techniques and AI-powered predictive analytics 
                           for maintaining system reliability and preventing downtime.</p>
                        <a href="#" class="btn btn-outline">Watch Now</a>
                    </div>
                </div>

                <div class="webinar-card">
                    <div class="webinar-header">
                        <span class="webinar-badge">Series</span>
                        <div class="webinar-date">Monthly</div>
                    </div>
                    <div class="webinar-content">
                        <h3>AI Solutions Customer Success Series</h3>
                        <div class="webinar-meta">
                            <span class="duration"><i class="fas fa-clock"></i> 30 minutes</span>
                            <span class="frequency"><i class="fas fa-calendar"></i> Monthly</span>
                            <span class="level"><i class="fas fa-signal"></i> All Levels</span>
                        </div>
                        <p>Monthly series featuring customer success stories, implementation tips, and Q&A 
                           sessions with our product experts and successful customers.</p>
                        <a href="#" class="btn btn-outline">Subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Registration CTA -->
    <section class="event-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Don't Miss Our Next Event</h2>
                <p>Stay updated with our latest events, webinars, and workshops</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-primary">Subscribe to Updates</a>
                    <a href="contact.php" class="btn btn-outline">Request Private Demo</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <div class="lightbox-content">
            <div class="lightbox-image">
                <div class="image-placeholder">
                    <i class="fas fa-image"></i>
                </div>
            </div>
            <div class="lightbox-info">
                <h3 id="lightbox-title">Image Title</h3>
                <p id="lightbox-description">Image description</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>AI-Solutions</h3>
                    <p>Innovating the future of digital employee experience through cutting-edge AI technology.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="solutions.php">Solutions</a></li>
                        <li><a href="case-studies.php">Case Studies</a></li>
                        <li><a href="testimonials.php">Testimonials</a></li>
                        <li><a href="articles.php">Articles</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> Sunderland, United Kingdom</p>
                        <p><i class="fas fa-phone"></i> +44 (0) 191 123 4567</p>
                        <p><i class="fas fa-envelope"></i> info@ai-solutions.com</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 AI-Solutions. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="../js/main.js"></script>
</body>
</html>