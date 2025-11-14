<?php
session_start();
// Redirect to login if not authenticated
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
include_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();

// Get products from database with proper joins and ratings
$query = "SELECT p.*, c.name as category_name, b.name as brand_name, 
                 COALESCE(AVG(pr.rating), 4.5) as rating,
                 COUNT(pr.id) as review_count
          FROM products p 
          LEFT JOIN categories c ON p.category_id = c.id 
          LEFT JOIN brands b ON p.brand_id = b.id
          LEFT JOIN product_reviews pr ON p.id = pr.product_id
          WHERE p.is_active = 1
          GROUP BY p.id
          ORDER BY p.id DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$products_from_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get unique categories and brands for filters
$categories_query = "SELECT DISTINCT c.id, c.name FROM categories c 
                    JOIN products p ON c.id = p.category_id 
                    WHERE p.is_active = 1";
$brands_query = "SELECT DISTINCT b.id, b.name FROM brands b 
                JOIN products p ON b.id = p.brand_id 
                WHERE p.is_active = 1";

$categories_stmt = $db->prepare($categories_query);
$categories_stmt->execute();
$categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);

$brands_stmt = $db->prepare($brands_query);
$brands_stmt->execute();
$brands = $brands_stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Abyssinia Electronics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }

        :root {
            --deep-blue: #1a1f36;
            --bright-blue: #3a86ff;
            --violet: #8338ec;
            --coral: #ff6b6b;
            --mint: #06d6a0;
            --cream: #f8f9fa;
            --light-gray: #e9ecef;
            --medium-gray: #adb5bd;
            --dark-gray: #495057;
            --shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            color: var(--deep-blue);
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            background: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--deep-blue);
        }

        .logo-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            background: var(--bright-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: var(--cream);
            border-radius: 25px;
            padding: 8px 15px;
            flex: 1;
            max-width: 500px;
            margin: 0 20px;
        }

        .search-bar input {
            border: none;
            background: transparent;
            padding: 8px;
            width: 100%;
            outline: none;
            font-size: 0.95rem;
        }

        .search-bar button {
            background: transparent;
            border: none;
            color: var(--bright-blue);
            cursor: pointer;
        }

        .user-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--deep-blue);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--bright-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .action-btn {
            background: transparent;
            border: none;
            color: var(--deep-blue);
            font-size: 1.2rem;
            cursor: pointer;
            position: relative;
            transition: var(--transition);
        }

        .action-btn:hover {
            color: var(--bright-blue);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--coral);
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid var(--coral);
            color: var(--coral);
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background: var(--coral);
            color: white;
        }

        /* Main Content */
        .main-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 2.2rem;
            color: var(--deep-blue);
        }

        .breadcrumb {
            display: flex;
            gap: 10px;
            color: var(--medium-gray);
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--medium-gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--bright-blue);
        }

        .breadcrumb span {
            color: var(--bright-blue);
        }

        /* Product Grid */
        .product-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
        }

        /* Filters Sidebar */
        .filters-sidebar {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: var(--shadow);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .filter-section {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--light-gray);
        }

        .filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .filter-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: var(--deep-blue);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .filter-option input {
            width: 18px;
            height: 18px;
        }

        .filter-option label {
            font-size: 0.95rem;
            color: var(--dark-gray);
            cursor: pointer;
        }

        .price-range {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .price-inputs {
            display: flex;
            gap: 10px;
        }

        .price-inputs input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .price-slider {
            width: 100%;
            height: 5px;
            background: var(--light-gray);
            border-radius: 5px;
            margin-top: 10px;
            position: relative;
        }

        .price-slider-fill {
            position: absolute;
            height: 100%;
            background: var(--bright-blue);
            border-radius: 5px;
            width: 70%;
        }

        /* Products Grid */
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .products-count {
            font-size: 1rem;
            color: var(--dark-gray);
        }

        .view-controls {
            display: flex;
            gap: 10px;
        }

        .view-btn {
            background: white;
            border: 1px solid var(--light-gray);
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .view-btn.active {
            background: var(--bright-blue);
            color: white;
            border-color: var(--bright-blue);
        }

        .sort-select {
            padding: 8px 12px;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            background: white;
            font-size: 0.9rem;
            color: var(--dark-gray);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
        }

        /* List View */
        .products-grid.list-view {
            grid-template-columns: 1fr;
        }

        .products-grid.list-view .product-card {
            display: flex;
            flex-direction: row;
            height: 200px;
        }

        .products-grid.list-view .product-image {
            width: 200px;
            height: 100%;
        }

        .products-grid.list-view .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .products-grid.list-view .product-actions {
            flex-direction: row;
            top: auto;
            bottom: 20px;
            right: 20px;
        }

        .product-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--coral);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 2;
        }

        .product-image {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transition: var(--transition);
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-actions {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            opacity: 0;
            transition: var(--transition);
        }

        .product-card:hover .product-actions {
            opacity: 1;
        }

        .action-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-gray);
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .action-icon:hover {
            background: var(--bright-blue);
            color: white;
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            font-size: 0.8rem;
            color: var(--medium-gray);
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .product-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--deep-blue);
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .product-description {
            font-size: 0.9rem;
            color: var(--medium-gray);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .stars {
            display: flex;
            gap: 2px;
        }

        .stars i {
            color: #ffc107;
            font-size: 0.9rem;
        }

        .rating-count {
            font-size: 0.85rem;
            color: var(--medium-gray);
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--deep-blue);
        }

        .original-price {
            font-size: 1rem;
            color: var(--medium-gray);
            text-decoration: line-through;
        }

        .discount {
            font-size: 0.8rem;
            color: var(--coral);
            font-weight: 600;
        }

        .add-to-cart {
            width: 100%;
            background: var(--bright-blue);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-to-cart:hover {
            background: var(--violet);
            transform: translateY(-2px);
        }

        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 380px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
            z-index: 2001;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-header {
            padding: 20px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-title {
            font-size: 1.3rem;
            color: var(--deep-blue);
        }

        .cart-body {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .cart-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid var(--light-gray);
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            background: var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-item-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--deep-blue);
        }

        .cart-item-price {
            color: var(--bright-blue);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-btn {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: var(--light-gray);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .quantity-btn:hover {
            background: var(--bright-blue);
            color: white;
        }

        .cart-item-remove {
            color: var(--coral);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .cart-item-remove:hover {
            color: #e63946;
        }

        .cart-footer {
            padding: 20px;
            border-top: 1px solid var(--light-gray);
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--deep-blue);
        }

        .checkout-btn {
            width: 100%;
            background: var(--mint);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .checkout-btn:hover {
            background: #05b388;
            transform: translateY(-2px);
        }

        .empty-cart {
            text-align: center;
            padding: 40px 20px;
            color: var(--medium-gray);
        }

        .empty-cart i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: var(--light-gray);
        }

        /* Overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1999;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            background: var(--mint);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            z-index: 2002;
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateX(150%);
            transition: transform 0.3s ease;
        }

        .notification.active {
            transform: translateX(0);
        }

        .notification.error {
            background: var(--coral);
        }

        /* Loading spinner */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .product-container {
                grid-template-columns: 1fr;
            }
            
            .filters-sidebar {
                position: static;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-wrap: wrap;
            }
            
            .search-bar {
                order: 3;
                margin: 15px 0 0;
                max-width: 100%;
                width: 100%;
            }
            
            .products-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
        }

        @media (max-width: 480px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .view-controls {
                width: 100%;
                justify-content: space-between;
            }
            
            .products-grid.list-view .product-card {
                flex-direction: column;
                height: auto;
            }
            
            .products-grid.list-view .product-image {
                width: 100%;
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <a href="products.php" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="logo-text">Abyssinia Electronics</div>
            </a>
            
            <div class="search-bar">
                <input type="text" placeholder="Search products..." id="searchInput">
                <button onclick="searchProducts()"><i class="fas fa-search"></i></button>
            </div>
            
            <div class="user-actions">
                <div class="user-info">
                    <div class="user-avatar">
                        <?php echo strtoupper(substr($_SESSION['first_name'], 0, 1)); ?>
                    </div>
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</span>
                </div>
                <button class="action-btn">
                    <i class="fas fa-heart"></i>
                </button>
                <button class="action-btn" id="cartBtn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count" id="cartCount">0</span>
                </button>
                <button class="logout-btn" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        <div class="page-header">
            <h1 class="page-title">Our Products</h1>
            <div class="breadcrumb">
                <a href="products.php">Home</a> / 
                <span>Products</span>
            </div>
        </div>
        
        <div class="product-container">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <div class="filter-section">
                    <h3 class="filter-title">Categories</h3>
                    <div class="filter-options" id="categoryFilters">
                        <?php foreach($categories as $category): ?>
                        <div class="filter-option">
                            <input type="checkbox" id="cat_<?php echo $category['id']; ?>" value="<?php echo htmlspecialchars($category['name']); ?>" onchange="updateCategoryFilter('<?php echo htmlspecialchars($category['name']); ?>', this.checked)">
                            <label for="cat_<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="filter-section">
                    <h3 class="filter-title">Brands</h3>
                    <div class="filter-options" id="brandFilters">
                        <?php foreach($brands as $brand): ?>
                        <div class="filter-option">
                            <input type="checkbox" id="brand_<?php echo $brand['id']; ?>" value="<?php echo htmlspecialchars($brand['name']); ?>" onchange="updateBrandFilter('<?php echo htmlspecialchars($brand['name']); ?>', this.checked)">
                            <label for="brand_<?php echo $brand['id']; ?>"><?php echo htmlspecialchars($brand['name']); ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="filter-section">
                    <h3 class="filter-title">Price Range</h3>
                    <div class="price-range">
                        <div class="price-inputs">
                            <input type="number" placeholder="Min" id="minPrice" value="0">
                            <input type="number" placeholder="Max" id="maxPrice" value="50000">
                        </div>
                        <div class="price-slider">
                            <div class="price-slider-fill"></div>
                        </div>
                    </div>
                </div>
                
                <div class="filter-section">
                    <h3 class="filter-title">Rating</h3>
                    <div class="filter-options">
                        <div class="filter-option">
                            <input type="checkbox" id="rating5" value="4.5">
                            <label for="rating5">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="rating4" value="4.0">
                            <label for="rating4">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                & Up
                            </label>
                        </div>
                        <div class="filter-option">
                            <input type="checkbox" id="rating3" value="3.0">
                            <label for="rating3">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                & Up
                            </label>
                        </div>
                    </div>
                </div>
                
                <button class="add-to-cart" onclick="applyFilters()" style="margin-top: 20px;">
                    Apply Filters
                </button>
            </aside>
            
            <!-- Products Grid -->
            <section class="products-section">
                <div class="products-header">
                    <div class="products-count" id="productsCount">Showing <?php echo count($products_from_db); ?> products</div>
                    <div class="view-controls">
                        <select class="sort-select" id="sortSelect" onchange="sortProducts()">
                            <option value="featured">Sort by: Featured</option>
                            <option value="price_low">Price: Low to High</option>
                            <option value="price_high">Price: High to Low</option>
                            <option value="rating">Rating: High to Low</option>
                            <option value="newest">Newest First</option>
                        </select>
                        <button class="view-btn active" id="gridView">
                            <i class="fas fa-th"></i>
                        </button>
                        <button class="view-btn" id="listView">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
                
                <div class="products-grid" id="productsGrid">
                    <?php foreach($products_from_db as $product): ?>
                    <div class="product-card">
                        <?php if($product['badge']): ?>
                            <div class="product-badge"><?php echo htmlspecialchars($product['badge']); ?></div>
                        <?php endif; ?>
                        <div class="product-image" style="background: linear-gradient(135deg, <?php echo getRandomColor(); ?>, <?php echo getRandomColor(); ?>);">
                            <?php if(!empty($product['image_url'])): ?>
                                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <?php else: ?>
                                <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Product Image">
                            <?php endif; ?>
                        </div>
                        <div class="product-actions">
                            <div class="action-icon" onclick="addToWishlist(<?php echo $product['id']; ?>)">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="action-icon" onclick="quickView(<?php echo $product['id']; ?>)">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-category"><?php echo htmlspecialchars($product['category_name']); ?></div>
                            <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <?php if(!empty($product['description'])): ?>
                                <div class="product-description"><?php echo htmlspecialchars($product['description']); ?></div>
                            <?php endif; ?>
                            <div class="product-rating">
                                <div class="stars">
                                    <?php echo getStarRating($product['rating']); ?>
                                </div>
                                <span class="rating-count">(<?php echo $product['review_count']; ?>)</span>
                            </div>
                            <div class="product-price">
                                <span class="current-price">ETB <?php echo number_format($product['price'], 0); ?></span>
                                <?php if($product['original_price'] && $product['original_price'] > $product['price']): ?>
                                    <span class="original-price">ETB <?php echo number_format($product['original_price'], 0); ?></span>
                                    <span class="discount"><?php echo round((1 - $product['price'] / $product['original_price']) * 100); ?>% OFF</span>
                                <?php endif; ?>
                            </div>
                            <button class="add-to-cart" onclick="addToCart(<?php echo $product['id']; ?>, this)">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3 class="cart-title">Your Cart</h3>
            <div class="close-modal" onclick="closeCart()">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="cart-body" id="cartBody">
            <!-- Cart items will be loaded here -->
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span id="cartTotal">ETB 0</span>
            </div>
            <button class="checkout-btn" onclick="checkout()">
                <i class="fas fa-credit-card"></i> Proceed to Checkout
            </button>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <span id="notificationText">Product added to cart!</span>
    </div>

    <script>
        // Global variables
        let products = <?php echo json_encode($products_from_db); ?>;
        let currentFilters = {
            categories: [],
            brands: [],
            minPrice: 0,
            maxPrice: 50000
        };

        // Check user session
        function checkSession() {
            fetch('api/auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'check_session'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    window.location.href = 'login.php';
                }
            })
            .catch(error => {
                console.error('Error checking session:', error);
            });
        }

        // Logout function
        function logout() {
            fetch('api/auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'logout'
                })
            })
            .then(response => response.json())
            .then(data => {
                window.location.href = 'login.php';
            })
            .catch(error => {
                console.error('Error logging out:', error);
                window.location.href = 'login.php';
            });
        }

        // DOM Content Loaded
        document.addEventListener('DOMContentLoaded', function() {
            checkSession();
            updateCartCount();
            
            // View Toggle Functionality
            const gridViewBtn = document.getElementById('gridView');
            const listViewBtn = document.getElementById('listView');
            const productsGrid = document.getElementById('productsGrid');
            
            gridViewBtn.addEventListener('click', function() {
                productsGrid.classList.remove('list-view');
                gridViewBtn.classList.add('active');
                listViewBtn.classList.remove('active');
            });
            
            listViewBtn.addEventListener('click', function() {
                productsGrid.classList.add('list-view');
                listViewBtn.classList.add('active');
                gridViewBtn.classList.remove('active');
            });
            
            // Cart button
            document.getElementById('cartBtn').addEventListener('click', function() {
                document.getElementById('cartSidebar').classList.add('active');
                document.getElementById('overlay').classList.add('active');
                updateCartDisplay();
            });
            
            // Overlay click
            document.getElementById('overlay').addEventListener('click', function() {
                closeModals();
            });

            // Search on Enter key
            document.getElementById('searchInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchProducts();
                }
            });
        });

        // Update filters
        function updateCategoryFilter(category, isChecked) {
            if (isChecked) {
                currentFilters.categories.push(category);
            } else {
                currentFilters.categories = currentFilters.categories.filter(c => c !== category);
            }
        }

        function updateBrandFilter(brand, isChecked) {
            if (isChecked) {
                currentFilters.brands.push(brand);
            } else {
                currentFilters.brands = currentFilters.brands.filter(b => b !== brand);
            }
        }

        function applyFilters() {
            currentFilters.minPrice = parseInt(document.getElementById('minPrice').value) || 0;
            currentFilters.maxPrice = parseInt(document.getElementById('maxPrice').value) || 50000;
            
            // Filter products based on current filters
            let filteredProducts = products.filter(product => {
                // Price filter
                if (product.price < currentFilters.minPrice || product.price > currentFilters.maxPrice) {
                    return false;
                }
                
                // Category filter
                if (currentFilters.categories.length > 0 && !currentFilters.categories.includes(product.category_name)) {
                    return false;
                }
                
                // Brand filter
                if (currentFilters.brands.length > 0 && !currentFilters.brands.includes(product.brand_name)) {
                    return false;
                }
                
                return true;
            });
            
            displayFilteredProducts(filteredProducts);
        }

        // Display filtered products
        function displayFilteredProducts(filteredProducts) {
            const productsGrid = document.getElementById('productsGrid');
            
            if (filteredProducts.length === 0) {
                productsGrid.innerHTML = '<p style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--medium-gray);">No products found matching your criteria.</p>';
                document.getElementById('productsCount').textContent = `Showing 0 products`;
                return;
            }
            
            productsGrid.innerHTML = filteredProducts.map(product => `
                <div class="product-card">
                    ${product.badge ? `<div class="product-badge">${product.badge}</div>` : ''}
                    <div class="product-image" style="background: linear-gradient(135deg, ${getRandomColor()}, ${getRandomColor()});">
                        ${product.image_url ? 
                            `<img src="${product.image_url}" alt="${product.name}">` : 
                            `<img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Product Image">`
                        }
                    </div>
                    <div class="product-actions">
                        <div class="action-icon" onclick="addToWishlist(${product.id})">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="action-icon" onclick="quickView(${product.id})">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">${product.category_name}</div>
                        <h3 class="product-name">${product.name}</h3>
                        ${product.description ? `<div class="product-description">${product.description}</div>` : ''}
                        <div class="product-rating">
                            <div class="stars">
                                ${getStarRating(product.rating)}
                            </div>
                            <span class="rating-count">(${product.review_count})</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">ETB ${parseFloat(product.price).toLocaleString()}</span>
                            ${product.original_price && product.original_price > product.price ? 
                                `<span class="original-price">ETB ${parseFloat(product.original_price).toLocaleString()}</span>
                                 <span class="discount">${Math.round((1 - product.price / product.original_price) * 100)}% OFF</span>` : ''}
                        </div>
                        <button class="add-to-cart" onclick="addToCart(${product.id}, this)">
                            <i class="fas fa-shopping-cart"></i> Add to Cart
                        </button>
                    </div>
                </div>
            `).join('');
            
            document.getElementById('productsCount').textContent = `Showing ${filteredProducts.length} products`;
        }

        // Generate random gradient colors
        function getRandomColor() {
            const colors = [
                '#3a86ff', '#4361ee', '#8338ec', '#7209b7', '#06d6a0', 
                '#04a777', '#ff6b6b', '#ef476f', '#ff9e00', '#ff9100',
                '#00b4d8', '#0096c7'
            ];
            return colors[Math.floor(Math.random() * colors.length)];
        }

        // Generate star rating HTML
        function getStarRating(rating) {
            let stars = '';
            const fullStars = Math.floor(rating);
            const hasHalfStar = rating % 1 >= 0.5;
            
            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star"></i>';
            }
            
            if (hasHalfStar) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            }
            
            const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star"></i>';
            }
            
            return stars;
        }

        // Sort products
        function sortProducts() {
            const sortBy = document.getElementById('sortSelect').value;
            let sortedProducts = [...products];
            
            switch(sortBy) {
                case 'price_low':
                    sortedProducts.sort((a, b) => a.price - b.price);
                    break;
                case 'price_high':
                    sortedProducts.sort((a, b) => b.price - a.price);
                    break;
                case 'rating':
                    sortedProducts.sort((a, b) => b.rating - a.rating);
                    break;
                case 'newest':
                    sortedProducts.sort((a, b) => b.id - a.id);
                    break;
                default:
                    // Featured - original order
                    sortedProducts = [...products];
            }
            
            displayFilteredProducts(sortedProducts);
        }

        // Add to Cart functionality
        function addToCart(productId, button) {
            // Show loading state
            const originalText = button.innerHTML;
            button.innerHTML = '<div class="loading"></div> Adding...';
            button.disabled = true;

            // Get the product details
            const product = products.find(p => p.id === productId);
            if (!product) {
                showNotification('Product not found!', true);
                button.innerHTML = originalText;
                button.disabled = false;
                return;
            }

            fetch('api/cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1,
                    product_name: product.name,
                    product_price: product.price,
                    product_image: product.image_url
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update cart count from response
                    document.getElementById('cartCount').textContent = data.cart_count || data.total_items || 0;
                    showNotification(data.message || 'Product added to cart!', false);
                    
                    // Show success animation
                    button.innerHTML = '<i class="fas fa-check"></i> Added!';
                    button.style.background = '#06d6a0';
                    
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.style.background = '';
                        button.disabled = false;
                    }, 2000);
                } else {
                    showNotification(data.message || 'Failed to add product to cart', true);
                    button.innerHTML = originalText;
                    button.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error adding to cart:', error);
                showNotification('Error adding product to cart. Please try again.', true);
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Fallback to localStorage for demo purposes
                addToCartLocalStorage(productId, product, button);
            });
        }

        // Fallback to localStorage if API fails
        function addToCartLocalStorage(productId, product, button) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingItem = cart.find(item => item.product_id === productId);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    product_id: productId,
                    name: product.name,
                    price: product.price,
                    image_url: product.image_url,
                    quantity: 1
                });
            }
            
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCountLocalStorage();
            showNotification('Product added to cart (offline mode)!', false);
            
            // Show success animation
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> Added!';
            button.style.background = '#06d6a0';
            
            setTimeout(() => {
                button.innerHTML = originalText;
                button.style.background = '';
                button.disabled = false;
            }, 2000);
        }

        // Update cart count
        function updateCartCount() {
            fetch('api/cart.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const totalItems = data.cart_count || data.total_items || 
                                         (data.cart ? data.cart.reduce((total, item) => total + item.quantity, 0) : 0);
                        document.getElementById('cartCount').textContent = totalItems;
                    }
                })
                .catch(error => {
                    console.error('Error fetching cart:', error);
                    // Fallback to localStorage
                    updateCartCountLocalStorage();
                });
        }

        // Update cart count from localStorage
        function updateCartCountLocalStorage() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cartCount').textContent = totalItems;
        }

        // Update cart display
        function updateCartDisplay() {
            fetch('api/cart.php')
                .then(response => response.json())
                .then(data => {
                    const cartBody = document.getElementById('cartBody');
                    const cartTotal = document.getElementById('cartTotal');
                    
                    let cartItems = [];
                    let total = 0;
                    
                    if (data.success && data.cart && data.cart.length > 0) {
                        cartItems = data.cart;
                    } else {
                        // Fallback to localStorage
                        cartItems = JSON.parse(localStorage.getItem('cart')) || [];
                    }
                    
                    if (cartItems.length === 0) {
                        cartBody.innerHTML = `
                            <div class="empty-cart">
                                <i class="fas fa-shopping-cart"></i>
                                <h3>Your cart is empty</h3>
                                <p>Add some products to your cart</p>
                            </div>
                        `;
                        cartTotal.textContent = 'ETB 0';
                        return;
                    }
                    
                    cartBody.innerHTML = cartItems.map(item => {
                        const itemTotal = item.price * item.quantity;
                        total += itemTotal;
                        
                        return `
                            <div class="cart-item">
                                <div class="cart-item-image">
                                    <img src="${item.image_url || 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'}" alt="${item.name}">
                                </div>
                                <div class="cart-item-details">
                                    <div class="cart-item-name">${item.name}</div>
                                    <div class="cart-item-price">ETB ${parseFloat(item.price).toLocaleString()}</div>
                                    <div class="cart-item-quantity">
                                        <button class="quantity-btn" onclick="updateQuantity(${item.product_id || item.id}, -1)">-</button>
                                        <span>${item.quantity}</span>
                                        <button class="quantity-btn" onclick="updateQuantity(${item.product_id || item.id}, 1)">+</button>
                                    </div>
                                </div>
                                <button class="cart-item-remove" onclick="removeFromCart(${item.product_id || item.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        `;
                    }).join('');
                    
                    cartTotal.textContent = `ETB ${total.toLocaleString()}`;
                })
                .catch(error => {
                    console.error('Error fetching cart:', error);
                    // Fallback to localStorage
                    updateCartDisplayLocalStorage();
                });
        }

        // Update cart display from localStorage
        function updateCartDisplayLocalStorage() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartBody = document.getElementById('cartBody');
            const cartTotal = document.getElementById('cartTotal');
            
            if (cart.length === 0) {
                cartBody.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>Your cart is empty</h3>
                        <p>Add some products to your cart</p>
                    </div>
                `;
                cartTotal.textContent = 'ETB 0';
                return;
            }
            
            let total = 0;
            cartBody.innerHTML = cart.map(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                
                return `
                    <div class="cart-item">
                        <div class="cart-item-image">
                            <img src="${item.image_url || 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'}" alt="${item.name}">
                        </div>
                        <div class="cart-item-details">
                            <div class="cart-item-name">${item.name}</div>
                            <div class="cart-item-price">ETB ${parseFloat(item.price).toLocaleString()}</div>
                            <div class="cart-item-quantity">
                                <button class="quantity-btn" onclick="updateQuantityLocal(${item.product_id || item.id}, -1)">-</button>
                                <span>${item.quantity}</span>
                                <button class="quantity-btn" onclick="updateQuantityLocal(${item.product_id || item.id}, 1)">+</button>
                            </div>
                        </div>
                        <button class="cart-item-remove" onclick="removeFromCartLocal(${item.product_id || item.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
            }).join('');
            
            cartTotal.textContent = `ETB ${total.toLocaleString()}`;
        }

        function updateQuantity(productId, change) {
            fetch('api/cart.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity_change: change
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartCount();
                    updateCartDisplay();
                } else {
                    showNotification(data.message, true);
                    // Fallback to localStorage
                    updateQuantityLocal(productId, change);
                }
            })
            .catch(error => {
                console.error('Error updating quantity:', error);
                showNotification('Error updating quantity', true);
                // Fallback to localStorage
                updateQuantityLocal(productId, change);
            });
        }

        // Local storage fallback for quantity update
        function updateQuantityLocal(productId, change) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const item = cart.find(item => (item.product_id || item.id) === productId);
            
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    cart = cart.filter(item => (item.product_id || item.id) !== productId);
                }
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartCountLocalStorage();
                updateCartDisplayLocalStorage();
            }
        }

        function removeFromCart(productId) {
            fetch('api/cart.php', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartCount();
                    updateCartDisplay();
                    showNotification('Product removed from cart', false);
                } else {
                    showNotification(data.message, true);
                    // Fallback to localStorage
                    removeFromCartLocal(productId);
                }
            })
            .catch(error => {
                console.error('Error removing from cart:', error);
                showNotification('Error removing product from cart', true);
                // Fallback to localStorage
                removeFromCartLocal(productId);
            });
        }

        // Local storage fallback for remove from cart
        function removeFromCartLocal(productId) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(item => (item.product_id || item.id) !== productId);
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCountLocalStorage();
            updateCartDisplayLocalStorage();
            showNotification('Product removed from cart', false);
        }

        function checkout() {
            showNotification('Checkout feature coming soon!', false);
        }

        function addToWishlist(productId) {
            showNotification('Added to wishlist!', false);
        }

        function quickView(productId) {
            showNotification('Quick view feature coming soon!', false);
        }

        function searchProducts() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            if (searchTerm.trim() === '') {
                displayFilteredProducts(products);
                return;
            }
            
            const filteredProducts = products.filter(product => 
                product.name.toLowerCase().includes(searchTerm) ||
                (product.description && product.description.toLowerCase().includes(searchTerm)) ||
                product.category_name.toLowerCase().includes(searchTerm) ||
                product.brand_name.toLowerCase().includes(searchTerm)
            );
            
            displayFilteredProducts(filteredProducts);
        }

        function closeCart() {
            document.getElementById('cartSidebar').classList.remove('active');
            document.getElementById('overlay').classList.remove('active');
        }

        function closeModals() {
            closeCart();
        }

        function showNotification(message, isError) {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notificationText');
            
            notificationText.textContent = message;
            
            if (isError) {
                notification.classList.add('error');
            } else {
                notification.classList.remove('error');
            }
            
            notification.classList.add('active');
            
            setTimeout(() => {
                notification.classList.remove('active');
            }, 3000);
        }
    </script>
</body>
</html>

<?php
// PHP helper functions
function getRandomColor() {
    $colors = [
        '#3a86ff', '#4361ee', '#8338ec', '#7209b7', '#06d6a0', 
        '#04a777', '#ff6b6b', '#ef476f', '#ff9e00', '#ff9100',
        '#00b4d8', '#0096c7'
    ];
    return $colors[array_rand($colors)];
}

function getStarRating($rating) {
    $stars = '';
    $fullStars = floor($rating);
    $hasHalfStar = $rating - $fullStars >= 0.5;
    
    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '<i class="fas fa-star"></i>';
    }
    
    if ($hasHalfStar) {
        $stars .= '<i class="fas fa-star-half-alt"></i>';
    }
    
    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '<i class="far fa-star"></i>';
    }
    
    return $stars;
}
?>