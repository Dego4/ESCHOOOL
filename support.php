<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abyssinya - Support & Help Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #1a1a2e;
            --primary-dark: #1a1a2e;
            --secondary: #f1f5f9;
            --accent: #f97316;
            --text: #334155;
            --text-light: #64748b;
            --white: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius: 8px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 1rem 0;
            box-shadow: var(--shadow);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 2rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        nav a {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        nav a:hover {
            opacity: 0.8;
        }

        /* Hero Section */
        .hero {
            background: #1a1a2e;
            background-size: cover;
            background-position: center;
            color: var(--white);
            padding: 4rem 0;
            text-align: center;
            margin-bottom: 3rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        .search-box {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 15px 20px;
            border-radius: 50px;
            border: none;
            font-size: 1rem;
            box-shadow: var(--shadow);
        }

        .search-box button {
            position: absolute;
            right: 5px;
            top: 5px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-box button:hover {
            background: var(--primary-dark);
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 2rem;
            margin-bottom: 4rem;
        }

        /* Sidebar */
        .sidebar {
            background: var(--white);
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            height: fit-content;
        }

        .sidebar h3 {
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--secondary);
            color: var(--primary);
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            margin-bottom: 0.8rem;
        }

        .sidebar a {
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.3s;
        }

        .sidebar a:hover {
            color: var(--primary);
        }

        /* Content Sections */
        .content-section {
            background: var(--white);
            border-radius: var(--radius);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }

        .section-header i {
            font-size: 1.5rem;
        }

        /* FAQ Styles */
        .faq-categories {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .faq-category {
            background: var(--secondary);
            border-radius: var(--radius);
            padding: 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .faq-category:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .faq-category h4 {
            margin-bottom: 1rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .faq-category ul {
            list-style: none;
        }

        .faq-category li {
            margin-bottom: 0.8rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .faq-category li:before {
            content: "•";
            color: var(--primary);
            position: absolute;
            left: 0;
        }

        /* Contact Options */
        .contact-options {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .contact-option {
            text-align: center;
            padding: 1.5rem;
            border-radius: var(--radius);
            background: var(--secondary);
            transition: transform 0.3s;
        }

        .contact-option:hover {
            transform: translateY(-5px);
        }

        .contact-option i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .contact-option h4 {
            margin-bottom: 0.5rem;
        }

        .contact-option p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .contact-option a {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 8px 15px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
        }

        .contact-option a:hover {
            background: var(--primary-dark);
        }

        /* Support Form */
        .support-form {
            background: var(--secondary);
            padding: 2rem;
            border-radius: var(--radius);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius);
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
        }

        /* Order Tracking */
        .tracking-form {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .tracking-form input {
            flex: 1;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius);
            font-size: 1rem;
        }

        .track-button {
            background: var(--accent);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: var(--radius);
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .track-button:hover {
            background: #ea580c;
        }

        .tracking-result {
            background: var(--secondary);
            padding: 1.5rem;
            border-radius: var(--radius);
            display: none;
        }

        .tracking-result.active {
            display: block;
        }

        .tracking-steps {
            display: flex;
            justify-content: space-between;
            margin-top: 1.5rem;
            position: relative;
        }

        .tracking-steps:before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 3px;
            background: #cbd5e1;
            z-index: 1;
        }

        .tracking-step {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            background: var(--white);
            border: 3px solid #cbd5e1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
        }

        .tracking-step.active .step-icon {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step-label {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .tracking-step.active .step-label {
            color: var(--primary);
            font-weight: 500;
        }

        /* Footer */
        footer {
            background: #1e293b;
            color: var(--white);
            padding: 3rem 0 1.5rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-column h4 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 0.8rem;
        }

        .footer-column a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: var(--white);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .main-content {
                grid-template-columns: 1fr;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            nav ul {
                gap: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .tracking-form {
                flex-direction: column;
            }

            .tracking-steps {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .tracking-step {
                flex: 1 0 45%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-laptop"></i>
                    <span>Abyssiniya Market</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Products</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="" class="active">Support</a></li>
                        <li><a href="contacts.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>How Can We Help You?</h1>
            <p>Find answers to common questions, track your order, or contact our support team for personalized assistance.</p>
            <div class="search-box">
                <input type="text" placeholder="Search for help topics...">
                <button><i class="fas fa-search"></i> Search</button>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="main-content">
            <!-- Sidebar -->
            <aside class="sidebar">
                <h3>Help Categories</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i> Ordering & Payments</a></li>
                    <li><a href="#"><i class="fas fa-shipping-fast"></i> Shipping & Delivery</a></li>
                    <li><a href="#"><i class="fas fa-undo-alt"></i> Returns & Refunds</a></li>
                    <li><a href="#"><i class="fas fa-file-contract"></i> Product Warranty</a></li>
                    <li><a href="#"><i class="fas fa-user-shield"></i> Account & Security</a></li>
                    <li><a href="#"><i class="fas fa-tools"></i> Technical Support</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Service Centers</a></li>
                    <li><a href="#"><i class="fas fa-file-alt"></i> Policies</a></li>
                </ul>
            </aside>

            <!-- Main Content Area -->
            <main>
                <!-- Support Overview -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-life-ring"></i>
                        <h2>Support & Help Overview</h2>
                    </div>
                    <p>Need help with your order or product? Our support team is here to assist you with shipping, returns, warranties, and troubleshooting. We're committed to providing you with the best customer experience possible.</p>
                    <p>Choose from the options below to find the help you need quickly and easily.</p>
                </section>

                <!-- FAQ Section -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-question-circle"></i>
                        <h2>Help Center / FAQ</h2>
                    </div>
                    <p>Find answers to the most commonly asked questions about our products and services.</p>
                    
                    <div class="faq-categories">
                        <div class="faq-category">
                            <h4><i class="fas fa-shopping-cart"></i> Ordering & Payments</h4>
                            <ul>
                                <li>How to place an order</li>
                                <li>Payment methods accepted</li>
                                <li>How to apply discount codes</li>
                                <li>Order confirmation & invoices</li>
                            </ul>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-shipping-fast"></i> Shipping & Delivery</h4>
                            <ul>
                                <li>Delivery timeframes</li>
                                <li>Tracking your order</li>
                                <li>Shipping charges and locations</li>
                                <li>International shipping</li>
                            </ul>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-undo-alt"></i> Returns & Refunds</h4>
                            <ul>
                                <li>Return policy (within 30 days)</li>
                                <li>Refund timelines and method</li>
                                <li>Exchange process</li>
                                <li>Return shipping instructions</li>
                            </ul>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-file-contract"></i> Product Warranty</h4>
                            <ul>
                                <li>Warranty coverage details</li>
                                <li>How to claim a warranty</li>
                                <li>Authorized service centers</li>
                                <li>Extended warranty options</li>
                            </ul>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-user-shield"></i> Account & Security</h4>
                            <ul>
                                <li>How to create or update an account</li>
                                <li>Password reset</li>
                                <li>Data privacy and security</li>
                                <li>Two-factor authentication</li>
                            </ul>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-tools"></i> Technical Support</h4>
                            <ul>
                                <li>Troubleshooting guides</li>
                                <li>Common product issues</li>
                                <li>How to contact technical support</li>
                                <li>Software/firmware updates</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- Contact Support -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-headset"></i>
                        <h2>Contact Support</h2>
                    </div>
                    <p>Our support team is available to help you with any questions or issues you may have.</p>
                    
                    <div class="contact-options">
                        <div class="contact-option">
                            <i class="fas fa-comments"></i>
                            <h4>Live Chat</h4>
                            <p>Instant help from our support team</p>
                            <a href="#">Start Chat</a>
                        </div>
                        <div class="contact-option">
                            <i class="fas fa-envelope"></i>
                            <h4>Email Support</h4>
                            <p>Send us an email and we'll respond within 24 hours</p>
                            <a href="mailto:support@techzone.com">support@abyssiniya_market.com</a>
                        </div>
                        <div class="contact-option">
                            <i class="fas fa-phone-alt"></i>
                            <h4>Phone Support</h4>
                            <p>Speak directly with our support agents</p>
                            <a href="tel:1-800-TECHZONE">1-800-Abyssiniya</a>
                        </div>
                        <div class="contact-option">
                            <i class="fas fa-clock"></i>
                            <h4>Operating Hours</h4>
                            <p>Monday - Friday: 8AM - 8PM EST<br>Saturday: 9AM - 5PM EST</p>
                            <a href="#">View Details</a>
                        </div>
                    </div>
                </section>

                <!-- Product Support -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-tools"></i>
                        <h2>Product Support & Troubleshooting</h2>
                    </div>
                    <p>Find guides, manuals, and troubleshooting resources for your TechZone products.</p>
                    
                    <div class="faq-categories">
                        <div class="faq-category">
                            <h4><i class="fas fa-book"></i> Product Manuals</h4>
                            <p>Download user guides and manuals for all our products.</p>
                            <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">Browse Manuals</a>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-video"></i> Video Tutorials</h4>
                            <p>Watch step-by-step setup and usage tutorials.</p>
                            <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">Watch Videos</a>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-download"></i> Software Downloads</h4>
                            <p>Get the latest drivers, firmware, and software updates.</p>
                            <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">Download Center</a>
                        </div>
                    </div>
                    
                    <div style="margin-top: 2rem; background: var(--secondary); padding: 1.5rem; border-radius: var(--radius);">
                        <h4 style="margin-bottom: 1rem;">Having trouble connecting your smart TV to Wi-Fi?</h4>
                        <p>Check out our step-by-step setup guide to get your device connected quickly and easily.</p>
                        <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">View Setup Guide</a>
                    </div>
                </section>

                <!-- Order Tracking -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-box"></i>
                        <h2>Order Tracking</h2>
                    </div>
                    <p>Track your order status and get real-time updates on your delivery.</p>
                    
                    <div class="tracking-form">
                        <input type="text" placeholder="Order ID (e.g., TZ-123456)">
                        <input type="text" placeholder="Email Address">
                        <button class="track-button" onclick="showTracking()">Track Order</button>
                    </div>
                    
                    <div class="tracking-result" id="trackingResult">
                        <h4>Order #TZ-789123 - Shipped</h4>
                        <p><strong>Estimated Delivery:</strong> October 28, 2023</p>
                        <p><strong>Shipping Carrier:</strong> Express Shipping Co.</p>
                        <p><strong>Tracking Number:</strong> EX123456789</p>
                        
                        <div class="tracking-steps">
                            <div class="tracking-step active">
                                <div class="step-icon">1</div>
                                <div class="step-label">Order Placed</div>
                            </div>
                            <div class="tracking-step active">
                                <div class="step-icon">2</div>
                                <div class="step-label">Processing</div>
                            </div>
                            <div class="tracking-step active">
                                <div class="step-icon">3</div>
                                <div class="step-label">Shipped</div>
                            </div>
                            <div class="tracking-step">
                                <div class="step-icon">4</div>
                                <div class="step-label">Out for Delivery</div>
                            </div>
                            <div class="tracking-step">
                                <div class="step-icon">5</div>
                                <div class="step-label">Delivered</div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Returns & Warranty -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-undo-alt"></i>
                        <h2>Returns, Refunds & Warranty</h2>
                    </div>
                    
                    <div class="faq-categories">
                        <div class="faq-category">
                            <h4><i class="fas fa-undo"></i> Return Policy</h4>
                            <p>We offer a 30-day return policy for most items. Some restrictions apply.</p>
                            <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">View Return Policy</a>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-money-bill-wave"></i> Refund Process</h4>
                            <p>Refunds are processed within 5-7 business days after we receive your return.</p>
                            <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">Learn More</a>
                        </div>
                        <div class="faq-category">
                            <h4><i class="fas fa-file-contract"></i> Warranty Claims</h4>
                            <p>Most products come with a 1-year manufacturer warranty.</p>
                            <a href="#" class="submit-btn" style="display: inline-block; margin-top: 10px;">File a Claim</a>
                        </div>
                    </div>
                </section>

                <!-- Support Ticket Form -->
                <section class="content-section">
                    <div class="section-header">
                        <i class="fas fa-ticket-alt"></i>
                        <h2>Submit a Support Ticket</h2>
                    </div>
                    <p>Didn't find what you were looking for? Submit a support request and our team will get back to you soon.</p>
                    
                    <div class="support-form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" placeholder="Enter your full name">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" placeholder="Enter your email">
                        </div>
                        
                        <div class="form-group">
                            <label for="order">Order ID (Optional)</label>
                            <input type="text" id="order" placeholder="Enter your order ID if applicable">
                        </div>
                        
                        <div class="form-group">
                            <label for="issue">Issue Type</label>
                            <select id="issue">
                                <option value="">Select an issue type</option>
                                <option value="order">Order Issue</option>
                                <option value="shipping">Shipping Problem</option>
                                <option value="return">Return/Refund</option>
                                <option value="warranty">Warranty Claim</option>
                                <option value="technical">Technical Support</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Description</label>
                            <textarea id="message" placeholder="Please describe your issue in detail"></textarea>
                        </div>
                        
                        <button class="submit-btn">Submit Ticket</button>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>Customer Service</h4>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Shipping Information</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">Product Registration</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>About TechZone</h4>
                    <ul>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Corporate Responsibility</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Policies</h4>
                    <ul>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">Warranty Terms</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Connect With Us</h4>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i> YouTube</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 TechZone Electronics. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple JavaScript for the order tracking demo
        function showTracking() {
            document.getElementById('trackingResult').classList.add('active');
        }
        
        // FAQ accordion functionality (simplified for this demo)
        document.querySelectorAll('.faq-category h4').forEach(header => {
            header.addEventListener('click', () => {
                const category = header.parentElement;
                category.classList.toggle('active');
            });
        });
    </script>
</body>
</html>