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
    <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- shop hero section -->


   <section class="th-shop">
  <div class="container">
    <div class="row">

      <!-- LEFT -->
      <div class="col-lg-9">

        <div class="th-shop-bar">

  <div class="th-left">
    <p id="thCount">Showing 0 products</p>
  </div>

  <div class="th-right">
    <select id="thSort" class="form-select">
      <option value="default">Default Sorting</option>
      <option value="low">Low to High</option>
<option value="high">High to Low</option>
    </select>
  </div>

</div>

        <div id="gtaGrid" class="gta-grid"></div>
        <div id="thPagination" class="th-pagination" aria-label="Shop pagination"></div>

      </div>

      <!-- RIGHT -->
      <div class="col-lg-3">

        <div class="th-sidebar">

          <div class="th-box">
            <input type="text" id="thSearch" placeholder="Search..." />
          </div>

          <div class="th-box">
            <h5>Price</h5>
          <div>


  <div class="th-price-info">
    <span>The highest price is <b id="thMaxPrice">$0</b></span>
    <span class="th-reset" id="thReset">Reset</span>
  </div>

  <input type="range" id="thPriceRange" min="0" max="100" value="100">

  <div class="th-price-values">
    <span>From: <b id="thFrom">0</b></span>
    <span>-</span>
    <span>To: <b id="thTo">100</b></span>
  </div>

</div>
          </div>

          <div class="th-box">
            <h5>Categories</h5>
            <ul id="thCategory">
  <li data-cat="all">All</li>
  <li data-cat="medical">Medical Equipment</li>
  <li data-cat="health">Health</li>
</ul>
          </div>

        </div>

      </div>

    </div>
  </div>
</section>

    <?php include __DIR__ . '/partials/footer.php'; ?>
    
    <!-- custom js -->
    <script src="js/th-shop.js"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

