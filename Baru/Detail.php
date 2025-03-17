<?php
include 'Data.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$game = null;
foreach ($games as $g) {
    if ($g['id'] === $id) {
        $game = $g;
        break;
    }
}

if (!$game) {
    echo "Game not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($game['nama']); ?></title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
<div class="pagination">
    <h4>
        <a href="index.php">Shop</a> > 
        <?php echo htmlspecialchars($game['nama']); ?>
    </h4>
</div>


    <section class="product-container">
        <!-- Left side -->
        <div class="img-card">
            <img src="<?php echo htmlspecialchars($game['gambar']); ?>" alt="<?php echo htmlspecialchars($game['nama']); ?>" id="featured-image">
            <div class="small-Card">
                <?php foreach ($game['galeri'] as $img) : ?>
                    <img src="<?php echo htmlspecialchars($img); ?>" alt="Gallery Image" class="small-Img">
                <?php endforeach; ?>
            </div>

            <div class="requirements">
                <!-- Minimum Requirements -->
                <div class="requirement-card">
                    <h4>MINIMUM:</h4>
                    <?php foreach ($game['minimum'] as $key => $value) : ?>
                        <p><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></p>
                    <?php endforeach; ?>
                </div>
                
                <!-- Recommended Requirements -->
                <div class="requirement-card">
                    <h4>RECOMMENDED:</h4>
                    <?php foreach ($game['recommended'] as $key => $value) : ?>
                        <p><strong><?php echo htmlspecialchars($key); ?>:</strong> <?php echo htmlspecialchars($value); ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="product-info">
            <h3><?php echo htmlspecialchars($game['nama']); ?></h3>
            <p><?php echo htmlspecialchars($game['desk']); ?></p>
            <div class="quantity">
                <h5>Price: Rp<?php echo number_format($game['harga'], 0, ',', '.'); ?></h5>
                <button>Add to Cart</button>
            </div>            
        </div>
    </section>

    <script src="js/cart.js"></script>
</body>
</html>
