<?php 
    include 'connect.php';
    if(isset($_POST['add_to_cart'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $products_quantity = 1;

        // select cart database on condition
        $select_cart=mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name'");
        if(mysqli_num_rows($select_cart)>0) {
            $display_message[]="Product already added to cart";
        }else {
            // insert cart data into the cart table
            $insert_products = mysqli_query($conn, "INSERT INTO `cart` (`name`, `price`, `image`, `quantity`) VALUES
            ('$product_name', '$product_price', '$product_image', $products_quantity)");
            $display_message[]="Product added to cart";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products-Project</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- header -->
    <?php include 'header.php'?>
    <div class="container">
        <?php 
            if(isset($display_message)) {
                foreach($display_message as $message) {
                    echo "
                        <div class='display_message'>
                            <span>$message</span>
                            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
                        </div>
                    ";
                }
            }
        ?>
        <section class="products">
            <h1 class="heading">Lets Shop</h1>
            <div class="product_container">
                <?php 
                    $select_products=mysqli_query($conn, "SELECT * FROM `product`");
                    if(mysqli_num_rows($select_products)>0){
                        while($fetch_products=mysqli_fetch_assoc($select_products)) {
                            // echo $fetch_products['name'];
                ?>
                <form method="post">
                    <div class="edit_form">
                        <img src="img/<?php echo $fetch_products['image']?>" alt="products_image">
                        <h3><?php echo $fetch_products['name']?></h3>
                        <div class="price">Price: $<?php echo $fetch_products['price']?></div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']?>">
                        <input type="submit" class="submit_btn cart-btn" value="Add to cart" name="add_to_cart">
                    </div>
                </form>
                <?php
                        }
                    }else {
                        echo "<div class='empty_text'>No product available</div>";
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>