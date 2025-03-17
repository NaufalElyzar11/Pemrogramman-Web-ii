<?php
include 'Data.php'; 
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NIKI Game Store</title>
  <link rel="stylesheet" href="/css/style.css" />
  <script src="https://kit.fontawesome.com/0e53af926d.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Header Section -->
  <header>
    <div id="header">
      <div class="header-logo">
        <a href="index.php"><img src="images/logo.png" alt="Logo" /></a>
      </div>
      <div class="header-list">
        <nav class="header-list-nav">
          <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="index.php">Shop</a></li>
            <li><a href="index.php">About</a></li>
            <li><a href="index.php">Contact Us</a></li>
          </ul>
        </nav>
        <div class="header-list-icon">
          <a href="index.php"><i class="fa fa-bag-shopping"></i></a>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Section -->
  <main>
    <section id="hero">
      <h4>Trade-in-offer</h4>
      <h2>Super value deals</h2>
      <h1>On all Games!</h1>
      <button>Shop now</button>
    </section>

    <section class="product-section section-p1">
      <h1>Open World</h1>
      <p>Best Games</p>
      <div class="pro-collection">
      <?php foreach (array_slice($games, 0, 4) as $game) : ?>
          <div class="product-cart">
            <img src="<?php echo $game['gambar']; ?>" alt="Product image" />
            <span><?php echo !empty($game['developer']) ? $game['developer'] : "Unknown Developer"; ?></span>
            <h4><?php echo $game['singkatan']; ?></h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">Rp<?php echo number_format($game['harga'], 0, ',', '.'); ?></h4>
            <a href="Detail.php?id=<?php echo $game['id']; ?>">
              <i class="fa-solid fa-cart-shopping buy-icon"></i>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      <section class="product-section section-p1">
      <h1>Sports</h1>
      <p>Top sellers</p>
      <div class="pro-collection">
      <?php foreach (array_slice($games, 4, 8) as $game) : ?>
          <div class="product-cart">
            <img src="<?php echo $game['gambar']; ?>" alt="Product image" />
            <span><?php echo !empty($game['developer']) ? $game['developer'] : "Unknown Developer"; ?></span>
            <h4><?php echo $game['singkatan']; ?></h4>
            <div class="stars">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <h4 class="price">Rp<?php echo number_format($game['harga'], 0, ',', '.'); ?></h4>
            <a href="Detail.php?id=<?php echo $game['id']; ?>">
              <i class="fa-solid fa-cart-shopping buy-icon"></i>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
      
    </section>
  </main>

  <!-- Footer Section -->
  <footer>
    <p>Naufal Elyzar - 2310817210019.<br>M. Rizki Ramadhan - 23108</p>
    </footer>


</body>
</html>
