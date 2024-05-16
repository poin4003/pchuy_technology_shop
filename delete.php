<?php 
    include 'connect.php';
    if(isset($_GET['delete'])) {
        $delete_id=$_GET['delete'];
        $delete_query=mysqli_query($conn, "DELETE FROM `product` WHERE id=$delete_id") or
        die("Query failed");
        if($delete_query) {
            echo "Product deleted";
            header('location:view_products.php');
        }else {
            echo "Product not deleted";
            header('location:view_products.php');
        }
    }
?>