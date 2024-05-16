<?php 
    include 'connect.php';
    if(isset($_POST['add_product'])) {
        $product_name=$_POST['product_name'];
        $product_price=$_POST['product_price'];
        $product_image=$_FILES['product_image']['name'];
        $product_image_temp_name=$_FILES['product_image']['tmp_name'];
        $product_image_folder='img/'.$product_image;

        $insert_query=mysqli_query($conn, "INSERT INTO `product` (`name`, `price`, `image`)
        VALUES ('$product_name', '$product_price', '$product_image')") or die("Insert query filed");
        if ($insert_query) {
            move_uploaded_file($product_image_temp_name, $product_image_folder);
            $display_message = "Product inserted Successfully";
        }else {
            $display_message =  "There is some error inserting the product";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X_UA_Compatible" content="IE=edge">
    <meta name="viewport" content="width=devive-width, intial-scale=1.0">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<body>
    <!-- include header -->
    <?php include('header.php'); ?>
    <!-- form section -->
    <div class="container">
        <!-- message display -->
        <?php 
            if(isset($display_message)) {
                echo "
                <div class='display_message'>
                    <span>'.$display_message.'</span>
                    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
                </div>
                ";
            }
        ?>

        <section>
            <h3 class="heading">Add Products</h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Enter product name" class="input_fields" requierd>
                <input type="number" name="product_price" placeholder="Enter product Price" class="input_fields" requierd>
                <input type="file" name="product_image" class="input_fields" requierd accept="image/png, image/jpg, image/jpeg">
                <input type="submit" name="add_product" class="submit_btn" value="Add Product">
            </form>
        </section>
    </div>
    <script src="js/script.js"></script>
</body>
</html>