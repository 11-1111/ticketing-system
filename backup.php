<?php

   $select = mysqli_query($con, "SELECT * FROM products");
   
   ?>
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
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
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








   <!-- <form>
    <label>FROM: </label>
    <select>
    <?php 
        include('configg.php');
        $depatures=mysqli_query($con,"Select depature_location from products");
        while($cc=mysqli_fetch_array($depatures)){
            ?>
            <option value="<?php echo $cc['id']?>"><?php echo $cc['depature_location']?></option>
            <?php
        }
        ?>
 </select>


   </form> -->




s



   THIS SCRIPT!!!
   function select_items(){
   var x =document.getElementById("item").value; 
  //var y =document.getElememtById("items").value;
   $.ajax({
    url:"showmobile.php",
    method:"POST",
    data:{
      id : x
      //id : y
    },
    success:function(data){
      $("#ans").html(data);
    }
   })
}



SHOWMOBILE!!
<?php
$k=$_POST['id'];
//$m=$_POST['itemB'];

$k=trim($k);
//$m=trim($m);

$con= mysqli_connect('localhost','root','','cart_db');
$sql="Select * from products where depature_location='{$k}'";
$res=mysqli_query($con,$sql);
while($rows=mysqli_fetch_array($res)){
    ?>
    <tr>
        <td> <?php echo $rows['vehicle_type']; ?></td>
        <td> <?php echo $rows['depature_location']; ?></td>
        <td> <?php echo $rows['arrival_location']; ?></td>
        <td> <?php echo $rows['travel_date']; ?></td>
    </tr>
    <?php 

}
?>

AND arrival_location='{$m}'";