<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $vehicle_type = $_POST['vehicle_type'];
   $depature_location = $_POST['depature_location'];
   $arrival_location = $_POST['arrival_location'];
   $travel_date= date('Y-m-d',strtotime($_POST['travel_date']));
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($vehicle_type) || empty($depature_location) || empty($arrival_location) || empty($travel_date)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE products SET vehicle_type='$vehicle_type', depature_location='$depature_location',arrival_location='$arrival_location',travel_date='$travel_date', image='$product_image'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="vehicle_type" value="<?php echo $row['vehicle_type']; ?>" placeholder="Enter the vehicle type">
      <input type="text" min="0" class="box" name="depature_location" value="<?php echo $row['depature_location']; ?>" placeholder="Enter Depature location">
      <input type="text" class="box" name="arrival_location" value="<?php echo $row['arrival_location']; ?>" placeholder="Enter Arrival location">
      <input type="date" class="box" name="travel_date" value="<?php echo $row['travel_date']; ?>" placeholder="Enter Travel Date">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>