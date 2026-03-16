<?php
// Include database configuration for potential future use
// require_once 'config.php';

// You can add PHP logic here in the future, such as:
// - User session management
// - Dynamic content loading
// - Analytics tracking
// - A/B testing
// - Personalized recommendations
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - tele-helath</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/product.css">
    <!-- bootstrap cdn -->
    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <!-- google fonts cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    <?php include 'partials/header.php'; ?>

    <!-- shop hero section -->
    <section class="shop-hero">
        <div class="container">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6">
                    <div class="shop-hero-content">
                        <span class="hero-badge">Premium Healthcare Products</span>
                        <h1>Quality Medical Supplies & Equipment</h1>
                        <p>Discover our curated collection of trusted healthcare products designed to support your wellness journey.</p>
                        <div class="shop-hero-stats">
                            <div class="stat-card">
                                <div class="stat-icon">📦</div>
                                <h4>1000+</h4>
                                <p>Products</p>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">🚚</div>
                                <h4>Fast</h4>
                                <p>Shipping</p>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon">🔒</div>
                                <h4>Secure</h4>
                                <p>Payments</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-hero-image">
                        <img src="images/shop-hero.jpg" alt="Medical Products">
                        <div class="floating-card shop-card1">
                            🩺 Medical Equipment
                        </div>
                        <div class="floating-card shop-card2">
                            💊 Health Supplements
                        </div>
                        <div class="floating-card shop-card3">
                            🧴 Personal Care
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- shop filters section -->
    <section class="shop-filters">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="filters-container">
                        <div class="filter-group">
                            <label>Category</label>
                            <select id="categoryFilter" class="form-select">
                                <option value="all">All Categories</option>
                                <option value="medical">Medical Equipment</option>
                                <option value="supplements">Health Supplements</option>
                                <option value="personal">Personal Care</option>
                                <option value="diagnostics">Diagnostics</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Price Range</label>
                            <select id="priceFilter" class="form-select">
                                <option value="all">All Prices</option>
                                <option value="under50">Under $50</option>
                                <option value="50-100">$50 - $100</option>
                                <option value="100-200">$100 - $200</option>
                                <option value="over200">Over $200</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label>Sort By</label>
                            <select id="sortFilter" class="form-select">
                                <option value="featured">Featured</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="rating">Customer Rating</option>
                                <option value="newest">Newest Arrivals</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- shop products section -->
    <section class="shop-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h2>Our Product Collection</h2>
                        <p>Explore our carefully selected range of healthcare products</p>
                    </div>
                </div>
            </div>
            <div class="row" id="productsGrid">
                <!-- Products will be loaded here via JavaScript -->
            </div>
        </div>
    </section>

    <!-- shop features section -->
    <section class="shop-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card glass-card">
                        <div class="feature-icon">🔒</div>
                        <h4>Secure Shopping</h4>
                        <p>Your health data and payments are protected with bank-level security.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card glass-card">
                        <div class="feature-icon">🚚</div>
                        <h4>Fast Delivery</h4>
                        <p>Get your healthcare essentials delivered quickly and safely.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card glass-card">
                        <div class="feature-icon">💡</div>
                        <h4>Expert Advice</h4>
                        <p>Products recommended by healthcare professionals.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- shop newsletter section -->
    <section class="shop-newsletter">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="newsletter-content">
                        <h3>Stay Updated</h3>
                        <p>Subscribe to our newsletter for health tips, product updates, and exclusive offers.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="newsletter-form">
                        <input type="email" placeholder="Your email address" class="form-control">
                        <button class="btn btn-primary">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'partials/footer.php'; ?>
    
    <!-- custom js -->
    <script src="js/products.js"></script>
    <script src="js/script.js"></script>
    <script>
        // Initialize shop functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Load products when page loads
            loadProducts();
            
            // Add filter functionality
            const categoryFilter = document.getElementById('categoryFilter');
            const priceFilter = document.getElementById('priceFilter');
            const sortFilter = document.getElementById('sortFilter');
            
            [categoryFilter, priceFilter, sortFilter].forEach(filter => {
                filter.addEventListener('change', function() {
                    loadProducts();
                });
            });
        });
    </script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>