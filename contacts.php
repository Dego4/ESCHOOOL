<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Abyssiniya Electronics</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
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
            position: sticky;
            top: 0;
            z-index: 100;
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
            transition: var(--transition);
            position: relative;
        }

        nav a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--white);
            transition: var(--transition);
        }

        nav a:hover:after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            background: #1a1a2e;
            background-size: cover;
            background-position: center;
            color: var(--white);
            padding: 5rem 0;
            text-align: center;
            margin-bottom: 3rem;
            border-radius: 0 0 var(--radius) var(--radius);
        }

        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            font-weight: 300;
        }

        /* Contact Methods Section */
        .contact-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .contact-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 2.5rem;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            border-top: 4px solid var(--primary);
        }

        .contact-card:hover {
            transform: translateY(-8px);
        }

        .contact-card i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .contact-card h3 {
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .contact-card p {
            color: var(--text-light);
            margin-bottom: 1.5rem;
        }

        .contact-card a {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .contact-card a:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Contact Form Section */
        .contact-form-section {
            background: var(--white);
            border-radius: var(--radius);
            padding: 3rem;
            box-shadow: var(--shadow);
            margin-bottom: 4rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        .section-header i {
            font-size: 1.8rem;
        }

        .section-header h2 {
            font-weight: 600;
        }

        .contact-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.8rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #cbd5e1;
            border-radius: var(--radius);
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px;
            background: var(--secondary);
            border: 1px dashed #cbd5e1;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .file-upload-label:hover {
            background: #e2e8f0;
        }

        .submit-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
            grid-column: 1 / -1;
            justify-self: start;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Self-Service Section */
        .self-service {
            background: var(--white);
            border-radius: var(--radius);
            padding: 3rem;
            box-shadow: var(--shadow);
            margin-bottom: 4rem;
        }

        .service-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .service-button {
            background: var(--secondary);
            border: none;
            border-radius: var(--radius);
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            color: var(--text);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .service-button:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-5px);
        }

        .service-button i {
            font-size: 2rem;
        }

        /* Map Section */
        .map-section {
            background: var(--white);
            border-radius: var(--radius);
            padding: 3rem;
            box-shadow: var(--shadow);
            margin-bottom: 4rem;
        }

        .map-container {
            height: 400px;
            border-radius: var(--radius);
            overflow: hidden;
            margin-top: 2rem;
            background: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .map-placeholder {
            text-align: center;
            color: var(--text-light);
        }

        .map-placeholder i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }
        .map-placeholder img{
            Width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Response Time */
        .response-time {
            text-align: center;
            background: var(--secondary);
            padding: 1.5rem;
            border-radius: var(--radius);
            margin-bottom: 4rem;
        }

        /* Footer */
        footer {
            background: #1e293b;
            color: var(--white);
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-column h4 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 1rem;
        }

        .footer-column a {
            color: #cbd5e1;
            text-decoration: none;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-column a:hover {
            color: var(--white);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #334155;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #334155;
            color: #94a3b8;
        }

        /* Chat Widget */
        .chat-widget {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .chat-button {
            background: var(--accent);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px 25px;
            font-weight: 500;
            cursor: pointer;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .chat-button:hover {
            background: #ea580c;
            transform: translateY(-3px);
        }

        .chat-box {
            position: absolute;
            bottom: 70px;
            right: 0;
            width: 350px;
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            display: none;
            overflow: hidden;
        }

        .chat-box.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .chat-header {
            background: var(--primary);
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header h3 {
            font-weight: 500;
        }

        .close-chat {
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .chat-body {
            padding: 1rem;
            height: 300px;
            overflow-y: auto;
        }

        .chat-message {
            margin-bottom: 1rem;
            padding: 10px 15px;
            border-radius: 20px;
            max-width: 80%;
        }

        .bot-message {
            background: var(--secondary);
            border-bottom-left-radius: 5px;
            align-self: flex-start;
        }

        .user-message {
            background: var(--primary);
            color: white;
            border-bottom-right-radius: 5px;
            align-self: flex-end;
            margin-left: auto;
        }

        .chat-input {
            display: flex;
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .chat-input input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 50px;
            margin-right: 10px;
        }

        .send-button {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1.5rem;
            }

            nav ul {
                gap: 1.5rem;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .contact-form {
                grid-template-columns: 1fr;
            }

            .service-buttons {
                grid-template-columns: 1fr 1fr;
            }

            .chat-box {
                width: 300px;
            }
        }

        @media (max-width: 480px) {
            .service-buttons {
                grid-template-columns: 1fr;
            }

            .chat-box {
                width: 280px;
                right: -20px;
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
                    <span>Abyssiniya</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login.php">Products</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="support.php">Support</a></li>
                        <li><a href="#" class="active">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>We're Here to Help!</h1>
            <p>Have a question about a product, your order, or need technical support? Reach out to our friendly team.</p>
        </div>
    </section>

    <div class="container">
        <!-- Contact Methods Section -->
        <section class="contact-methods">
            <div class="contact-card">
                <i class="fas fa-phone-alt"></i>
                <h3>Call Us</h3>
                <p>Speak directly with our support agents</p>
                <a href="tel:+251123456789">+251 123 456 789</a>
                <p style="margin-top: 1rem; font-size: 0.9rem;">Mon-Fri, 9 AM - 6 PM EAT</p>
            </div>
            <div class="contact-card">
                <i class="fas fa-envelope"></i>
                <h3>Email Us</h3>
                <p>Send us an email and we'll respond within 24 hours</p>
                <a href="mailto:support@abyssiniya.com">support@abyssiniya.com</a>
                <p style="margin-top: 1rem; font-size: 0.9rem;">For sales: sales@abyssiniya.com</p>
            </div>
            <div class="contact-card">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Visit Us</h3>
                <p>Our headquarters in Addis Ababa</p>
                <a href="#map">View on Map</a>
                <p style="margin-top: 1rem; font-size: 0.9rem;">Abyssiniya Inc., 123 Tech Lane, Addis Ababa, Ethiopia</p>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="contact-form-section">
            <div class="section-header">
                <i class="fas fa-envelope-open-text"></i>
                <h2>Send Us a Message</h2>
            </div>
            <form class="contact-form" id="contactForm" method="POST">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label for="order">Order Number (Optional)</label>
                    <input type="text" id="order" name="order" placeholder="Enter your order number if applicable">
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select id="subject" name="subject" required>
                        <option value="">Select a subject</option>
                        <option value="general">General Inquiry</option>
                        <option value="pre-sales">Pre-Sales Question</option>
                        <option value="order">Order Status & Support</option>
                        <option value="returns">Returns & Refunds</option>
                        <option value="technical">Technical Support / Product Help</option>
                        <option value="warranty">Warranty Claim</option>
                        <option value="wholesale">Wholesale/Business Inquiry</option>
                        <option value="complaint">Complaint</option>
                    </select>
                </div>
                
                <div class="form-group full-width">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Please describe your issue in detail" required></textarea>
                </div>
                
                <div class="form-group full-width">
                    <label for="attachment">File Attachment (Optional)</label>
                    <div class="file-upload">
                        <input type="file" id="attachment" name="attachment">
                        <label for="attachment" class="file-upload-label">
                            <i class="fas fa-paperclip"></i>
                            <span>Click to attach files (screenshots, invoices, etc.)</span>
                        </label>
                    </div>
                </div>
                
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </section>

        <!-- Self-Service Section -->
        <section class="self-service">
            <div class="section-header">
                <i class="fas fa-rocket"></i>
                <h2>Find Instant Answers</h2>
            </div>
            <p>Get quick solutions to common questions with our self-service options.</p>
            
            <div class="service-buttons">
                <a href="#" class="service-button">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Track Your Order</span>
                </a>
                <a href="#" class="service-button">
                    <i class="fas fa-undo-alt"></i>
                    <span>View Return Policy</span>
                </a>
                <a href="#" class="service-button">
                    <i class="fas fa-question-circle"></i>
                    <span>Visit FAQ</span>
                </a>
                <a href="#" class="service-button">
                    <i class="fas fa-tools"></i>
                    <span>Troubleshooting Guides</span>
                </a>
                <a href="#" class="service-button">
                    <i class="fas fa-file-alt"></i>
                    <span>Size Guides & Tech Specs</span>
                </a>
                <a href="#" class="service-button">
                    <i class="fas fa-truck"></i>
                    <span>Shipping & Delivery Info</span>
                </a>
            </div>
        </section>

        <!-- Map Section -->
        <section class="map-section" id="map">
            <div class="section-header">
                <i class="fas fa-map-marked-alt"></i>
                <h2>Our Location</h2>
            </div>
            <p>Visit our headquarters in Addis Ababa, Ethiopia</p>
            
            <div class="map-container">
                <div class="map-placeholder">
                    <img src="maps.png" alt="">
                </div>
            </div>
        </section>

        <!-- Response Time -->
        <div class="response-time">
            <p><i class="fas fa-clock"></i> We strive to respond to all inquiries within 24 hours. For urgent issues, please call us during business hours.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>Customer Service</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-phone-alt"></i> Contact Us</a></li>
                        <li><a href="#"><i class="fas fa-shipping-fast"></i> Shipping Information</a></li>
                        <li><a href="#"><i class="fas fa-undo-alt"></i> Returns & Exchanges</a></li>
                        <li><a href="#"><i class="fas fa-file-alt"></i> Product Registration</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>About Abyssiniya</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-history"></i> Our Story</a></li>
                        <li><a href="#"><i class="fas fa-briefcase"></i> Careers</a></li>
                        <li><a href="#"><i class="fas fa-newspaper"></i> Press</a></li>
                        <li><a href="#"><i class="fas fa-chart-line"></i> Investor Relations</a></li>
                        <li><a href="#"><i class="fas fa-hand-holding-heart"></i> Corporate Responsibility</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Policies</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-file-contract"></i> Terms & Conditions</a></li>
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
                        <li><a href="#"><i class="fas fa-truck"></i> Shipping Policy</a></li>
                        <li><a href="#"><i class="fas fa-undo"></i> Return Policy</a></li>
                        <li><a href="#"><i class="fas fa-certificate"></i> Warranty Terms</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Connect With Us</h4>
                    <p>Follow us on social media for the latest updates and promotions.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Abyssiniya Electronics. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Chat Widget -->
    <div class="chat-widget">
        <button class="chat-button" id="chatToggle">
            <i class="fas fa-comments"></i>
            Live Chat
        </button>
        <div class="chat-box" id="chatBox">
            <div class="chat-header">
                <h3>Abyssiniya Support</h3>
                <button class="close-chat" id="closeChat"><i class="fas fa-times"></i></button>
            </div>
            <div class="chat-body" id="chatBody">
                <div class="chat-message bot-message">
                    Hello! How can we help you today?
                </div>
            </div>
            <div class="chat-input">
                <input type="text" id="chatInput" placeholder="Type your message...">
                <button class="send-button" id="sendMessage"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <script>
        // Chat functionality
        document.getElementById('chatToggle').addEventListener('click', function() {
            document.getElementById('chatBox').classList.toggle('active');
        });

        document.getElementById('closeChat').addEventListener('click', function() {
            document.getElementById('chatBox').classList.remove('active');
        });

        document.getElementById('sendMessage').addEventListener('click', function() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            
            if (message) {
                // Add user message
                const userMessage = document.createElement('div');
                userMessage.classList.add('chat-message', 'user-message');
                userMessage.textContent = message;
                document.getElementById('chatBody').appendChild(userMessage);
                
                // Clear input
                input.value = '';
                
                // Simulate bot response
                setTimeout(function() {
                    const botMessage = document.createElement('div');
                    botMessage.classList.add('chat-message', 'bot-message');
                    botMessage.textContent = "Thanks for your message. Our support team will respond shortly.";
                    document.getElementById('chatBody').appendChild(botMessage);
                    
                    // Scroll to bottom
                    document.getElementById('chatBody').scrollTop = document.getElementById('chatBody').scrollHeight;
                }, 1000);
                
                // Scroll to bottom
                document.getElementById('chatBody').scrollTop = document.getElementById('chatBody').scrollHeight;
            }
        });

        // Form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real implementation, you would send this data to a PHP script
            // For demo purposes, we'll just show an alert
            alert('Thank you for your message! We will get back to you within 24 hours.');
            this.reset();
        });

        // File upload label update
        document.getElementById('attachment').addEventListener('change', function() {
            const label = document.querySelector('.file-upload-label span');
            if (this.files.length > 0) {
                label.textContent = this.files[0].name;
            } else {
                label.textContent = 'Click to attach files (screenshots, invoices, etc.)';
            }
        });
    </script>
</body>
</html>