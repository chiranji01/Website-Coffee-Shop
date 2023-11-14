<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $description = mysqli_real_escape_string($conn, $_POST['description']);
   $image = "../uploaded_img/" .basename($_FILES["image"]["name"]);
   move_uploaded_file($_FILES["image"]["tmp_name"], $image);
   

   $select_product_name = mysqli_query($conn, "SELECT name FROM `product` WHERE name = '$name'") or die
   ('query failed4544656');

   if(mysqli_num_rows($select_product_name) > 0){
      echo'product name already added';
   }else{
	   $add_product_query =mysqli_query($conn, "INSERT INTO `product`(`name`, `description`, `price`, `image`) VALUES
      ('$name','$description','$price', '$image')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
         echo'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            echo'product added successfully';
         }
      }else{
         echo'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `product` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `product` WHERE id = '$delete_id'") or die('query failed');
   header('location:products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `product` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = "../uploaded_img/".$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `product` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>product</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
<div class="wrapper">
    <section class="form product">
        <section class='add-product'>
        <header>
          <h1 style="text-align: center">Coffee Express</h1>
          <p>&nbsp;</p>
          <p>Product Details</p>
        </header>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="error-text">Couldn't add product</div>
                <div class="field input">
                    <input type="text" name="name" placeholder="Enter product name">
                </div>
                <div class="field input">
                    <input type="number" name="price" placeholder="Quantity">
                </div>
                <div class="field input">
                    <input type="text" name="description" placeholder="Enter product description">
                </div>
                <div class="field image">
                    <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Add to Cart">
                </div>
        </form>
        </section>
    </section>

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `product`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">LKR<?php echo $fetch_products['price']; ?>/-</div>
         <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `product` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="Enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="Enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>
<script src="js/admin_script.js"></script>

</body>
</html>