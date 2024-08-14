<?php

@include 'configg.php';

if(isset($_POST['add_product'])){
   $vehicle_type= $_POST['vehicle_type'];
   $depature_location= $_POST['depature_location'];
   $arrival_location = $_POST['arrival_location'];
   $travel_date= date('Y-m-d',strtotime($_POST['travel_date']));
   $travel_time= $_POST['time'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;
   
 //  if(empty($vehicle_type) || empty($depature_location) || empty($rrival_location)){
     // $message[] = 'please fill out all';
  // }else{
      $insert = "INSERT INTO products(vehicle_type,depature_location,arrival_location,travel_date,travel_time,product_image) VALUES('$vehicle_type', '$depature_location', '$arrival_location', '$travel_date','$time','$product_image')";

//$upload = mysqli_query($con,$insert);
      if(mysqli_query($con,$insert)){
         echo "Record inserted successfully";
         mysqli_error($con);
         header('Location:display.php');
      
        // move_uploaded_file($product_image_tmp_name, $product_image_folder);
        // $message[] = 'new product added successfully';
      }else{
         echo"Could not insert record";
         mysqli_error($con);
         //$message[] = 'could not add the product';
      }
      mysqli_close($con);
   }

//};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($con, "DELETE FROM products WHERE id = $id");
   header('location:display.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>ADD DETAILS</h3>
         <input type="text" placeholder="Enter the vehicle type" name="vehicle_type" class="box">
         <input type="text" placeholder="Enter Depature location" name="depature_location" class="box">
         <input type="text" placeholder="Enter Arrival location" name="arrival_location" class="box">
         <div class="imput-box">
         <label for="">Enter Travel Date</label>
         </div>
         <input type="date" name="travel_date" class="box">

         <div class= "time">

            <input type="time" placeholder="Enter Time" name="time" class="time_class">
         </div>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         
         <input type="submit" class="btn" name="add_product" value="ADD">
        <!-- <a href="display.php">
            <button style="background-color:blue;color:white;"> View</button>
         </a>-->
      </form>

   </div>

   
</div>


</body>
</html>