<?php
include("../db_connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['company']);
    $country = trim($_POST['country']);
    $title = trim($_POST['title']);
    $details = trim($_POST['details']);

    if ($name && $email && $phone && $company && $country && $title && $details) {
        $stmt = $conn->prepare("INSERT INTO contact_messages 
            (name, email, phone, company, country, title, details) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $email, $phone, $company, $country, $title, $details);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Your message has been sent successfully!');</script>";
        } else {
            echo "<script>alert('❌ Database Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('⚠️ Please fill in all required fields.');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | AI-Solutions</title>
    <meta name="description" content="Get in touch with AI-Solutions. Request a demo, ask questions, or learn how we can transform your digital employee experience.">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <div class="logo-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h2>AI-Solutions</h2>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="../index.php" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li class="nav-item"><a href="solutions.php" class="nav-link"><i class="fas fa-cogs"></i><span>Solutions</span></a></li>
                <li class="nav-item"><a href="case-studies.php" class="nav-link"><i class="fas fa-chart-line"></i><span>Case Studies</span></a></li>
                <li class="nav-item"><a href="testimonials.php" class="nav-link"><i class="fas fa-star"></i><span>Testimonials</span></a></li>
                <li class="nav-item"><a href="articles.php" class="nav-link"><i class="fas fa-newspaper"></i><span>Articles</span></a></li>
                <li class="nav-item"><a href="events.php" class="nav-link"><i class="fas fa-calendar-alt"></i><span>Events</span></a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link active"><i class="fas fa-envelope"></i><span>Contact</span></a></li>
            </ul>
            <div class="nav-toggle">
                <div class="hamburger">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Ready to transform your digital employee experience? Let's start the conversation.</p>
            <nav class="breadcrumb">
                <a href="../index.php">Home</a> / <span>Contact</span>
            </nav>
        </div>
    </section>

    <!-- Send Us a Message Section -->
    <section id="contact-form" class="form-section alt">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h2>Send Us a Message</h2>
                    <p>Fill out the form below and we’ll get back to you shortly.</p>
                </div>
<form id="contact-form" method="POST" action="">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company Name *</label>
                            <input type="text" id="company" name="company" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="country">Country *</label>
                            <input type="text" id="country" name="country" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Job Title *</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Job Details *</label>
                        <textarea id="details" name="details" rows="6" placeholder="Tell us about your role or what you’re looking for..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="contact-info">
        <div class="container">
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h3>Our Office</h3>
                    <p>AI-Solutions Ltd.<br>Innovation Hub<br>Sunderland, SR1 3SD<br>United Kingdom</p>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-phone"></i></div>
                    <h3>Phone</h3>
                    <p>Sales: +44 (0) 191 123 4567<br>Main: +44 (0) 191 123 4569</p>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <h3>Email</h3>
                    <p>info@ai-solutions.com<br>sales@ai-solutions.com</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="contact-faq">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>How long does implementation take?</h4>
                    <p>Most implementations are completed within 3–5 weeks depending on project scope.</p>
                </div>
                <div class="faq-item">
                    <h4>Do you offer a free trial?</h4>
                    <p>Yes, we offer a 30-day free trial for new customers.</p>
                </div>
                <div class="faq-item">
                    <h4>What kind of support do you provide?</h4>
                    <p>We provide 24/7 technical support and customer success management.</p>
                </div>
                <div class="faq-item">
                    <h4>Can your solutions integrate with our systems?</h4>
                    <p>Yes, our solutions integrate seamlessly with most enterprise platforms.</p>
                </div>
            </div>
        </div>
    </section>

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
