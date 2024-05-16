<!-- including php logic - connecting to databse -->
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>View products</title>
</head>
<body>
    <?php include 'header.php'?>
    <div class="container">
        <section class="display_product">
            <table>
                <thead>
                    <th>Sl No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <!-- php code -->
                    <?php 
                        $display_product=mysqli_query($conn, "SELECT * FROM `product`");
                        if (mysqli_num_rows($display_product) > 0) {
                            $stt=1;
                            while($row=mysqli_fetch_assoc($display_product)) {
                                $product_name=$row['name'];
                                $product_image='img/' . $row['image'];
                                $product_price=$row['price'];
                                echo "
                                    <tr>
                                        <td>$stt</td>
                                        <td><img src='$product_image' alt='$product_name'></td>
                                        <td>$product_name</td>
                                        <td>$product_price</td>
                                        <td>
                                            <a href='delete.php?delete=$row[id]'
                                            class='delete_product_btn' onclick='confirm(`Are you sure to want delete this product?`);'>
                                            <i class='fas fa-trash'></i></a>
                                            <a href='edit.php?edit=$row[id]' 
                                            class='update_product_btn'><i class='fas fa-edit'></i></a>
                                        </td>
                                    </tr> 
                                    ";   
                                $stt++;
                            }
                        } else {
                            echo "<div class='empty_text'>No product available</div>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>