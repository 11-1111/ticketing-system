<?php
require_once('configg.php');
$query= "select * from products";
$result=mysqli_query($con, $query);

//@include 'configg.php';
//include "admin_page.php";//

   //$select = mysqli_query($con, "SELECT * FROM products");
   if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      mysqli_query($con, "DELETE FROM products WHERE id = $id");
      //header('location:admin_page.php');
   };
   
   
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

      <title>display</title>
   </head>
   <body>

<div class="product-display">

      <table class="product-display-table">
         <thead>
         <tr>
         <th>image</th>
            <th>vehicle_type</th>
            <th>depature_location</th>
            <th>arrival_location</th>
            <th>travel_date</th>
            <th>action</th>
         </tr>
         </thead>
         <tr>
         <?php 
         
         while($row = mysqli_fetch_assoc($result)){ ?>
      
            <td><img src="uploaded_img/<?php echo $row['product_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['vehicle_type']; ?></td>
            <td><?php echo $row['depature_location']; ?></td>
            <td><?php echo $row['arrival_location']; ?></td>
            <td><?php echo $row['travel_date']; ?></td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
         
      <?php } ?>
      </table>
   </div>
   </body>
   </html>

