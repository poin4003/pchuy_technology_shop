<!-- header -->
<header class="header">
    <div class="header_body">
        <a href="index.php" class="logo">PCHUY-TECHNOLOGY</a>
        <nav class="navbar">
            <a href="index.php">Add Products</a>
            <a href="view_products.php">View Products</a>
            <a href="shop_products.php">Shopit</a>
        </nav>
        <!-- select query -->
        <?php 
            $select_product=mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count=mysqli_num_rows($select_product);
        ?>
        <!-- shopping cart icon -->
        <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"><span><sup><?php echo $row_count; ?></sup></span></i></a>
        <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
    </div>
</header>