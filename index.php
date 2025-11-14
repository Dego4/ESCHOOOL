<?php
// --- PHP Database Connection Example ---
$host = "localhost";
$user = "root";
$pass = "";
$db = "abs_electronics";
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example search functionality
$searchResults = [];
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row['name'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abyssinia Electronics Market</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">
            <img src="bc.png" alt="" >
        </div>

        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <ul class="nav-links">
            <li><a href="#" class="active"><i class="fa-solid fa-house"></i> Home</a></li>

            <li class="dropdown">
                <a href="#"><i class="fa-solid fa-box"></i> Products <i class="fa-solid fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa-solid fa-laptop"></i> Laptops</a></li>
                    <li><a href="#"><i class="fa-solid fa-tablet-screen-button"></i> Tablets</a></li>
                    <li><a href="#"><i class="fa-solid fa-mobile-screen"></i> Mobile</a></li>
                    <li><a href="#"><i class="fa-solid fa-percent"></i> Deals</a></li>
                    <li><a href="#"><i class="fa-solid fa-tags"></i> Offers</a></li>
                    <li><a href="#"><i class="fa-solid fa-star"></i> New Arrivals</a></li>
                    <li><a href="#"><i class="fa-solid fa-copyright"></i> Brands</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa-solid fa-circle-info"></i> About</a></li>
            <li><a href="#"><i class="fa-solid fa-blog"></i> Blogs</a></li>
            <li><a href="#"><i class="fa-solid fa-headset"></i> Support</a></li>
            <li><a href="#"><i class="fa-solid fa-envelope"></i> Contact</a></li>

            <li>
                <form action="index.php" method="GET" class="search-bar">
                    <input type="text" name="search" placeholder="Search..." required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </li>

            <li><a href="login.php" class="btn-login"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
            <li><a href="register.php" class="btn-register"><i class="fa-solid fa-user-plus"></i> Register</a></li>
        </ul>
    </nav>

    <!-- Search Results Section - Fixed Placement -->
    <div class="search-results-section">
        <?php if (!empty($searchResults)): ?>
            <div class="search-results-container">
                <h3>Search Results for "<?php echo htmlspecialchars($_GET['search']); ?>":</h3>
                <ul class="search-results-list">
                    <?php foreach ($searchResults as $product): ?>
                        <li><?php echo htmlspecialchars($product); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif (isset($_GET['search'])): ?>
            <div class="search-results-container">
                <p class="no-results">No products found for "<?php echo htmlspecialchars($_GET['search']); ?>".</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Horizontal Scroll Section -->
    <div class="horizontal-scroll-container-wrapper">
        <!-- <h1>Premium Design Resources</h1>
        <p class="subtitle">Explore our collection of high-quality design assets perfect for your next project. Scroll horizontally to discover all 8 categories.</p>
         -->
        <div class="horizontal-scroll-container">
            <div class="scroll-wrapper" id="scrollWrapper">
                <!-- Section 1 -->
                <div class="section section-1">
                    <div class="section-badge">Popular</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/iphone/Apple-iPhone-16-Pro.jpg" alt="Transparent Background">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-mobile"></i>iPhone-16-Pro</h2>
                        <ul class="features-list">
                            <li>300+ transparent images</li>
                            <li>Multiple categories</li>
                            <li>High resolution</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 2 -->
                <div class="section section-2">
                    <div class="section-badge">New</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/samsung/galaxy-s23-ultra-highlights-kv.webp" alt="PSD Files">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-mobile"></i>Galaxy-s23</h2>
                        <ul class="features-list">
                            <li>150+ PSD files</li>
                            <li>Fully editable</li>
                            <li>Well organized</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-info-eye"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 3 -->
                <div class="section section-3">
                    <div class="section-badge">New arrival</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/Laptops/HP/HP Pavilion Plus.jpg" alt="High Quality Images">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-laptop"></i>HP Pavilion</h2>
                        <ul class="features-list">
                            <li>1000+ images</li>
                            <li>4K resolution</li>
                            <li>Multiple formats</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-shopping-eye"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 4 -->
                <div class="section section-4">
                    <div class="section-badge">20% off</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/iphone/iphone-12-pro-max-pacific-blue.jpg" alt="Icons">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-mobile"></i>iphone-12-pro</h2>
                        <ul class="features-list">
                            <li>5000+ icons</li>
                            <li>SVG & PNG formats</li>
                            <li>Multiple styles</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 5 -->
                <div class="section section-5">
                    <div class="section-badge">Comming Soon</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/Laptops/Dell/Dell.jpg" alt="Fonts">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-laptop"></i>Dell Laptop</h2>
                        <ul class="features-list">
                            <li>200+ fonts</li>
                            <li>Commercial license</li>
                            <li>Multiple weights</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 6 -->
                <div class="section section-6">
                    <div class="section-badge">40% Off</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/samsung/Samsung A06.jpg" alt="Templates">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-mobile"></i>Galaxy-a06</h2>
                        <ul class="features-list">
                            <li>100+ templates</li>
                            <li>Multiple categories</li>
                            <li>Easy to customize</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-info-eye"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 7 -->
                <div class="section section-7">
                    <div class="section-badge">Gaming</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/Laptops/HP/HP Victus 15 Gaming.jpg" alt="Textures">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-laptop"></i>HP Gaming</h2>
                        <ul class="features-list">
                            <li>300+ textures</li>
                            <li>Seamless patterns</li>
                            <li>High resolution</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Section 8 -->
                <div class="section section-8">
                    <div class="section-badge">New</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/samsung/samsung-galaxy-a54-5g-three-colors-banner.png" alt="Mockups">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-laptop"></i>Galaxy-a54</h2>
                        <ul class="features-list">
                            <li>150+ mockups</li>
                            <li>PSD & AI formats</li>
                            <li>Easy to use</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-shopping-eye"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Section 9 - Example of how to add new sections -->
                <div class="section section-9">
                    <div class="section-badge">Latest</div>
                    <div class="section-bg-pattern"></div>
                    <div class="section-image">
                        <img src="photos/samsung/samsung-galaxy-a54-5g-three-colors-banner.png" alt="New Product">
                    </div>
                    <div class="section-content">
                        <h2 class="section-title"><i class="fas fa-mobile"></i>iPhone 15</h2>
                        <ul class="features-list">
                            <li>Latest model</li>
                            <li>Advanced features</li>
                            <li>Best in class</li>
                        </ul>
                        <div class="button-group">
                            <a href="#" class="btn btn-secondary">
                                <i class="fas fa-eye"></i> Preview
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="scroll-controls">
            <button class="scroll-btn" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="scroll-indicators" id="scrollIndicators">
                <!-- Indicators will be generated dynamically by JavaScript -->
            </div>
            
            <button class="scroll-btn" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features-section-wrapper">
        <div class="section-headers">
            <h2 class="section-titles">Why Choose Us</h2>
            <p class="section-subtitles">We are committed to delivering exceptional value through our unique combination of expertise, innovation, and customer-centric approach.</p>
        </div>
        
        <div class="features-grid">
            <!-- Feature 1: Flexibility -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3 class="feature-title">Flexibility</h3>
                <p class="feature-description">
                    Our solutions adapt to your unique needs and evolving requirements. We offer customizable options that grow with your business, ensuring you always have the right tools for success.
                </p>
            </div>
            
            <!-- Feature 2: Deliverable -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <h3 class="feature-title">Deliverable</h3>
                <p class="feature-description">
                    We pride ourselves on consistently meeting deadlines and exceeding expectations. Our proven track record of on-time delivery ensures your projects stay on schedule.
                </p>
            </div>
            
            <!-- Feature 3: Security -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Security</h3>
                <p class="feature-description">
                    Your data's safety is our top priority. We implement industry-leading security measures and protocols to protect your sensitive information from potential threats.
                </p>
            </div>
            
            <!-- Feature 4: Reliably -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="feature-title">Reliably</h3>
                <p class="feature-description">
                    Count on us for consistent performance and minimal downtime. Our robust infrastructure and redundant systems ensure your operations run smoothly 24/7.
                </p>
            </div>
            
            <!-- Feature 5: Trust -->
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="feature-title">Trust</h3>
                <p class="feature-description">
                    We build lasting relationships based on transparency and integrity. Our clients trust us to deliver honest advice and solutions that truly benefit their business.
                </p>
            </div>
            
            <!-- Feature 6: 24/7 Support -->
            <div class="feature-card">
                <div class="feature-badge">Most Popular</div>
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">24/7 Support</h3>
                <p class="feature-description">
                    Our dedicated support team is available around the clock to assist you. No matter when issues arise, we're here to provide prompt and effective solutions.
                </p>
            </div>
        </div>
        
        <div class="stats-section">
            <h3 class="stats-title">Our Impact in Numbers</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">15K+</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Support Availability</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
            </div>
        </div>
    </div>







      <section class="company-story">
        <div class="story-header">
            <h2 class="story-title">Our Story</h2>
            <p class="story-subtitle">Crafting digital excellence through innovation, passion, and a commitment to transformative solutions</p>
        </div>
        
        <div class="story-content">
            <div class="story-text">
                <h3 class="story-headline">Pioneering Digital Transformation Since 2012</h3>
                <p class="story-paragraph">
                    We began as a small team with a big vision: to revolutionize how businesses interact with technology. Today, we're a collective of passionate innovators dedicated to creating digital experiences that inspire and transform.
                </p>
                <p class="story-paragraph">
                    Our approach combines cutting-edge technology with human-centered design, ensuring every solution we deliver not only meets technical requirements but also creates meaningful connections with users.
                </p>
                <p class="story-paragraph">
                    With each project, we push boundaries, challenge conventions, and strive for excellence that goes beyond expectations. Our journey is defined by the success of our partners and the impact we create together.
                </p>
            </div>
            
            <div class="story-image">
                <div>
                   <img src="ab.png" alt="">
                </div>
            </div>
        </div>
        
        <div class="pillars-grid">
            <div class="pillar-card">
                <div class="pillar-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="pillar-title">Innovation First</h3>
                <p class="pillar-description">
                    We constantly explore emerging technologies and creative approaches to deliver forward-thinking solutions that set new standards in the industry.
                </p>
            </div>
            
            
            <div class="pillar-card">
                <div class="pillar-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="pillar-title">Collaborative Spirit</h3>
                <p class="pillar-description">
                    We believe in the power of partnership, working closely with our clients to understand their vision and co-create solutions that drive shared success.
                </p>
            </div>
            
            <div class="pillar-card">
                <div class="pillar-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h3 class="pillar-title">Excellence Always</h3>
                <p class="pillar-description">
                    We hold ourselves to the highest standards, pursuing perfection in every detail and delivering quality that consistently exceeds expectations.
                </p>
            </div>
        </div>
        
        <div class="achievements-section">
            <h3 class="achievements-title">Our Journey in Numbers</h3>
            <div class="achievements-grid">
                <div class="achievement-item">
                    <div class="achievement-number">10+</div>
                    <div class="achievement-label">Years of Excellence</div>
                </div>
                <div class="achievement-item">
                    <div class="achievement-number">650+</div>
                    <div class="achievement-label">Projects Delivered</div>
                </div>
                <div class="achievement-item">
                    <div class="achievement-number">99%</div>
                    <div class="achievement-label">Client Satisfaction</div>
                </div>
                <div class="achievement-item">
                    <div class="achievement-number">75+</div>
                    <div class="achievement-label">Team Members</div>
                </div>
            </div>
        </div>
    </section>









      <section class="products-showcase">
        <div class="showcase-header">
            <h2 class="showcase-title">
                Products</h2>
            <p class="showcase-subtitle">Discover our curated selection of high-performance devices designed to enhance your digital lifestyle</p>
        </div>
        
        <div class="category-tabs">
            <button class="category-tab active">
                <i class="fas fa-mobile-alt"></i> Phones
            </button>
            <button class="category-tab">
                <i class="fas fa-tablet-alt"></i> Tablets
            </button>
            <button class="category-tab">
                <i class="fas fa-laptop"></i> Laptops
            </button>
        </div>
        
        <div class="products-grid">
            <!-- Phone 1 -->
            <div class="product-card">
                <div class="product-badge">Best Seller</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Smartphone Pro" class="product-img">
                </div>
                <div class="product-content">
                    <div class="product-category">Smartphone</div>
                    <h3 class="product-name">Galaxy Pro X</h3>
                    
                    <ul class="product-features">
                        <li>6.7" Super AMOLED Display</li>
                        <li>Triple Camera System</li>
                        <li>128GB Storage</li>
                        <li>5G Connectivity</li>
                    </ul>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-value">4.7</span>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">12,499 <span class="product-currency">ETB</span></div>
                        <button class="buy-button">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Phone 2 -->
            <div class="product-card">
                <div class="product-badge">New</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="iPhone Ultra" class="product-img">
                </div>
                <div class="product-content">
                    <div class="product-category">Smartphone</div>
                    <h3 class="product-name">iPhone Ultra</h3>
                    
                    <ul class="product-features">
                        <li>6.1" Super Retina XDR</li>
                        <li>A15 Bionic Chip</li>
                        <li>256GB Storage</li>
                        <li>Ceramic Shield</li>
                    </ul>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-value">5.0</span>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">18,999 <span class="product-currency">ETB</span></div>
                        <button class="buy-button">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Tablet 1 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Tab Pro" class="product-img">
                </div>
                <div class="product-content">
                    <div class="product-category">Tablet</div>
                    <h3 class="product-name">Tab Pro Max</h3>
                    
                    <ul class="product-features">
                        <li>11" Liquid Retina Display</li>
                        <li>Apple M1 Chip</li>
                        <li>512GB Storage</li>
                        <li>Support for Apple Pencil</li>
                    </ul>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="rating-value">4.2</span>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">24,599 <span class="product-currency">ETB</span></div>
                        <button class="buy-button">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Tablet 2 -->
            <div class="product-card">
                <div class="product-badge">Sale</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Galaxy Tab" class="product-img">
                </div>
                <div class="product-content">
                    <div class="product-category">Tablet</div>
                    <h3 class="product-name">Galaxy Tab S8</h3>
                    
                    <ul class="product-features">
                        <li>12.4" Super AMOLED</li>
                        <li>Snapdragon 8 Gen 1</li>
                        <li>256GB Storage</li>
                        <li>S Pen Included</li>
                    </ul>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-value">4.6</span>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">19,799 <span class="product-currency">ETB</span></div>
                        <button class="buy-button">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Laptop 1 -->
            <div class="product-card">
                <div class="product-badge">Premium</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="MacBook Pro" class="product-img">
                </div>
                <div class="product-content">
                    <div class="product-category">Laptop</div>
                    <h3 class="product-name">MacBook Pro 16"</h3>
                    
                    <ul class="product-features">
                        <li>16" Liquid Retina XDR</li>
                        <li>M2 Pro Chip</li>
                        <li>1TB SSD Storage</li>
                        <li>32GB Unified Memory</li>
                    </ul>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-value">5.0</span>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">89,999 <span class="product-currency">ETB</span></div>
                        <button class="buy-button">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Laptop 2 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="ZenBook Pro" class="product-img">
                </div>
                <div class="product-content">
                    <div class="product-category">Laptop</div>
                    <h3 class="product-name">ZenBook Pro 15</h3>
                    
                    <ul class="product-features">
                        <li>15.6" OLED Display</li>
                        <li>Intel i9 Processor</li>
                        <li>1TB NVMe SSD</li>
                        <li>NVIDIA RTX 3060</li>
                    </ul>
                    
                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span class="rating-value">4.3</span>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">54,999 <span class="product-currency">ETB</span></div>
                        <button class="buy-button">
                            <i class="fas fa-shopping-cart"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>









    <section class="brands-section">
        <div class="brands-header">
            <h2 class="brands-title">Trusted Brands</h2>
            <p class="brands-subtitle">We partner with the world's leading technology brands to bring you the best products</p>
        </div>
        
        <div class="brands-container">
            <div class="brands-gradient-left"></div>
            <div class="brands-track">
                <!-- Samsung -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#1428A0" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="14">SAMSUNG</text>
                    </svg>
                    <div class="brand-name">Samsung</div>
                </div>
                
                <!-- iPhone -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30,5 L70,5 C75,5 80,10 80,15 L80,25 C80,30 75,35 70,35 L30,35 C25,35 20,30 20,25 L20,15 C20,10 25,5 30,5 Z" fill="#000" />
                        <path d="M45,10 L55,10 L55,30 L45,30 Z" fill="#fff" />
                    </svg>
                    <div class="brand-name">iPhone</div>
                </div>
                
                <!-- HP -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L40,10 L40,30 L20,30 Z" fill="#0096D6" />
                        <path d="M45,10 L65,10 L65,30 L45,30 Z" fill="#0096D6" />
                        <text x="82" y="25" text-anchor="middle" fill="#0096D6" font-family="Arial, sans-serif" font-weight="bold" font-size="20">hp</text>
                    </svg>
                    <div class="brand-name">HP</div>
                </div>
                
                <!-- Dell -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#007DB8" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="16">DELL</text>
                    </svg>
                    <div class="brand-name">Dell</div>
                </div>
                
                <!-- Huawei -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25,10 L75,10 L75,30 L25,30 Z" fill="#CF0A2C" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="14">HUAWEI</text>
                    </svg>
                    <div class="brand-name">Huawei</div>
                </div>
                
                <!-- Tecno -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#00A0E9" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="16">TECNO</text>
                    </svg>
                    <div class="brand-name">Tecno</div>
                </div>
                
                <!-- Toshiba -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#FF0000" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="14">TOSHIBA</text>
                    </svg>
                    <div class="brand-name">Toshiba</div>
                </div>
                
                <!-- Asus -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25,5 L75,5 L75,35 L25,35 Z" fill="#000" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="18">ASUS</text>
                    </svg>
                    <div class="brand-name">Asus</div>
                </div>
                
                <!-- Duplicate set for seamless loop -->
                <!-- Samsung -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#1428A0" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="14">SAMSUNG</text>
                    </svg>
                    <div class="brand-name">Samsung</div>
                </div>
                
                <!-- iPhone -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30,5 L70,5 C75,5 80,10 80,15 L80,25 C80,30 75,35 70,35 L30,35 C25,35 20,30 20,25 L20,15 C20,10 25,5 30,5 Z" fill="#000" />
                        <path d="M45,10 L55,10 L55,30 L45,30 Z" fill="#fff" />
                    </svg>
                    <div class="brand-name">iPhone</div>
                </div>
                
                <!-- HP -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L40,10 L40,30 L20,30 Z" fill="#0096D6" />
                        <path d="M45,10 L65,10 L65,30 L45,30 Z" fill="#0096D6" />
                        <text x="82" y="25" text-anchor="middle" fill="#0096D6" font-family="Arial, sans-serif" font-weight="bold" font-size="20">hp</text>
                    </svg>
                    <div class="brand-name">HP</div>
                </div>
                
                <!-- Dell -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#007DB8" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="16">DELL</text>
                    </svg>
                    <div class="brand-name">Dell</div>
                </div>
                
                <!-- Huawei -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25,10 L75,10 L75,30 L25,30 Z" fill="#CF0A2C" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="14">HUAWEI</text>
                    </svg>
                    <div class="brand-name">Huawei</div>
                </div>
                
                <!-- Tecno -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#00A0E9" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="16">TECNO</text>
                    </svg>
                    <div class="brand-name">Tecno</div>
                </div>
                
                <!-- Toshiba -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20,10 L80,10 L80,30 L20,30 Z" fill="#FF0000" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="14">TOSHIBA</text>
                    </svg>
                    <div class="brand-name">Toshiba</div>
                </div>
                
                <!-- Asus -->
                <div class="brand-item">
                    <svg class="brand-logo" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25,5 L75,5 L75,35 L25,35 Z" fill="#000" />
                        <text x="50" y="25" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-weight="bold" font-size="18">ASUS</text>
                    </svg>
                    <div class="brand-name">Asus</div>
                </div>
            </div>
            <div class="brands-gradient-right"></div>
        </div>
        
        <div class="brands-stats">
            <div class="stat-item">
                <div class="stat-numbers">8+</div>
                <div class="stat-labels">Premium Brands</div>
            </div>
            <div class="stat-item">
                <div class="stat-numbers">500+</div>
                <div class="stat-labels">Products Available</div>
            </div>
            <div class="stat-item">
                <div class="stat-numbers">2-Year</div>
                <div class="stat-labels">Warranty</div>
            </div>
        </div>
    </section>








     <section class="testimonials-section">
        <div class="testimonials-header">
            <h2 class="testimonials-title">Customer Reviews</h2>
            <p class="testimonials-subtitle">See what our customers are saying about their experience with our products and service</p>
        </div>
        
        <div class="reviews-container">
            <!-- Review 2 -->
            <div class="review-card">
                <div class="review-header">
                    <div class="customer-avatar">
                        <img src="x.webp" alt="Michael Tekle">
                    </div>
                    <div class="customer-info">
                        <h3 class="customer-name">Michael Tekle</h3>
                        <div class="customer-location">
                            <i class="fas fa-map-marker-alt"></i> Addis Ababa
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="review-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p class="review-text">
                        "The MacBook Pro I bought for my graphic design work has been a game-changer. The display is incredibly sharp and colors are accurate. It handles all my design software without any lag. Highly recommended for creative professionals!"
                    </p>
                    <div class="review-product">
                        <div class="product-icon" style="background: #000;">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div>
                            <div class="product-name">MacBook Pro 16"</div>
                            <div class="review-date">Purchased: 1 month ago</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Review 3 -->
            <div class="review-card">
                <div class="review-header">
                    <div class="customer-avatar">
                        <img src="E.jfif" alt="Hana Mohammed">
                    </div>
                    <div class="customer-info">
                        <h3 class="customer-name">Hana Mekbib</h3>
                        <div class="customer-location">
                            <i class="fas fa-map-marker-alt"></i> Addis Ababa
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="review-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p class="review-text">
                        "I've been using the Tab Pro Max for my online classes and it's perfect! The screen is large enough for reading textbooks and the Apple Pencil integration makes note-taking so easy. The battery easily lasts through my longest study sessions."
                    </p>
                    <div class="review-product">
                        <div class="product-icon" style="background: #007DB8;">
                            <i class="fas fa-tablet-alt"></i>
                        </div>
                        <div>
                            <div class="product-name">Tab Pro Max</div>
                            <div class="review-date">Purchased: 3 weeks ago</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Review 4 -->
            <div class="review-card">
                <div class="review-header">
                    <div class="customer-avatar">
                        <img src="G.jfif" alt="Daniel Assefa">
                    </div>
                    <div class="customer-info">
                        <h3 class="customer-name">Daniel Assefa</h3>
                        <div class="customer-location">
                            <i class="fas fa-map-marker-alt"></i> Addis Ababa
                        </div>
                        <div class="review-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="review-content">
                    <div class="quote-icon">
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <p class="review-text">
                        "The ZenBook Pro I purchased for my programming work has been excellent. The keyboard is comfortable for long coding sessions and the performance is solid. My only minor complaint is the fan noise under heavy load, but it's manageable."
                    </p>
                    <div class="review-product">
                        <div class="product-icon" style="background: #000;">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <div>
                            <div class="product-name">ZenBook Pro 15</div>
                            <div class="review-date">Purchased: 2 months ago</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="stats-overview">
            <div class="stat-item">
                <div class="stat-value">4.8/5</div>
                <div class="stat-label">Average Rating</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">2,500+</div>
                <div class="stat-label">Happy Customers</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">98%</div>
                <div class="stat-label">Recommend Us</div>
            </div>
        </div>
    </section>










     <section class="contact-section">
        <div class="contact-header">
            <h2 class="contact-title">Get In Touch</h2>
            <p class="contact-subtitle">Have questions or feedback? We'd love to hear from you</p>
        </div>
        
        <div class="contact-grid">
            <!-- Form Section - Full Width -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-envelope"></i> Send Us a Message
                </h3>
                <form id="feedbackForm">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="customerName" class="form-label">Full Name</label>
                            <input type="text" id="customerName" class="form-input" placeholder="Your name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="customerEmail" class="form-label">Email Address</label>
                            <input type="email" id="customerEmail" class="form-input" placeholder="your.email@example.com" required>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="customerMessage" class="form-label">Your Message</label>
                            <textarea id="customerMessage" class="form-textarea" placeholder="How can we help you?" required></textarea>
                        </div>
                    </div>
                    
                    <button type="submit" class="submit-button">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
            
            <!-- Business Hours Section -->
            <div class="business-hours-section">
                <h3 class="section-title">
                    <i class="fas fa-clock"></i> Business Hours
                </h3>
                <ul class="hours-list">
                    <li class="hours-item">
                        <span class="day">Monday - Friday</span>
                        <span class="time">8:00 AM - 8:00 PM</span>
                    </li>
                    <li class="hours-item">
                        <span class="day">Saturday</span>
                        <span class="time">9:00 AM - 6:00 PM</span>
                    </li>
                    <li class="hours-item">
                        <span class="day">Sunday</span>
                        <span class="time">10:00 AM - 4:00 PM</span>
                    </li>
                    <li class="hours-item">
                        <span class="day">Holidays</span>
                        <span class="time">11:00 AM - 3:00 PM</span>
                    </li>
                </ul>
                
                <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid var(--light-gray);">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                        <i class="fas fa-headset" style="color: var(--violet); font-size: 1.2rem;"></i>
                        <strong style="color: var(--deep-blue);">24/7 Support Available</strong>
                    </div>
                    <p style="font-size: 0.9rem; color: var(--dark-gray);">
                        Our customer support team is available around the clock to assist you.
                    </p>
                </div>
            </div>
            
            <!-- Map Section -->
            <div class="map-section">
                <h3 class="section-title">
                    <i class="fas fa-map-marker-alt"></i> Our Location
                </h3>
                <div class="map-container">
                    <div>
                        <img src="map.png" alt="">
                    </div>
                </div>
                
                <div style="margin-top: 15px;">
                    <div class="contact-item">
                        <i class="fas fa-building"></i>
                        <div class="contact-text">
                            <strong>Abyssinia Electronics</strong>
                            Bole Road, Addis Ababa<br>
                            Ethiopia
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Details Section -->
            <div class="contact-details-section">
                <h3 class="section-title">
                    <i class="fas fa-phone-alt"></i> Contact Details
                </h3>
                <div class="contact-items">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div class="contact-text">
                            <strong>Phone</strong>
                            +251 11 123 4567
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <div class="contact-text">
                            <strong>Mobile</strong>
                            +251 91 234 5678
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div class="contact-text">
                            <strong>Email</strong>
                            info@abyssiniatech.com
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-globe"></i>
                        <div class="contact-text">
                            <strong>Website</strong>
                            www.abyssiniatech.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






      <footer class="footer-section">
        <div class="footer-content">
            <div class="footer-main">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <div class="logo-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="logo-text">Abyssinia Electronics</div>
                    </div>
                    <p class="brand-description">
                        Your trusted partner for premium electronics and cutting-edge technology solutions. 
                        We deliver quality products with exceptional customer service to enhance your digital lifestyle.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Products</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Services</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Smartphones</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Laptops</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Tablets</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Accessories</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Gaming</a></li>
                    </ul>
                </div>
                
                <div class="footer-contact">
                    <h3>Contact Info</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="contact-text">
                                Bole Road, Addis Ababa<br>
                                Ethiopia
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div class="contact-text">
                                +251 11 123 4567<br>
                                +251 91 234 5678
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="contact-text">
                                info@abyssiniatech.com<br>
                                support@abyssiniatech.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="copyright">
                    &copy; 2024 Abyssinia Electronics. All rights reserved.
                </div>
                
                <div class="footer-nav">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Return Policy</a>
                    <a href="#">Shipping Info</a>
                </div>
                
                <div class="payment-methods">
                    <span class="payment-text">We Accept:</span>
                    <div class="payment-icon">
                        <i class="fab fa-cc-visa"></i>
                    </div>
                    <div class="payment-icon">
                        <i class="fab fa-cc-mastercard"></i>
                    </div>
                    <div class="payment-icon">
                        <i class="fab fa-cc-paypal"></i>
                    </div>
                    <div class="payment-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/index.js"></script>
</body>
</html>