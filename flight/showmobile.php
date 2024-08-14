<?php
$k=$_POST['id'];
//$m=$_POST['id'];

$k=trim($k);
//$m=trim($m);

$con= mysqli_connect('localhost','root','','sbtbsphp');
$sql="Select * from routes where route_cities='{$k}'";
$res=mysqli_query($con,$sql);
while($rows=mysqli_fetch_array($res)){
    ?>
    <tr>
        <td> <?php echo $rows['bus_no']; ?></td>
        <td> <?php echo $rows['route_dep_time']; ?></td>
       
    </tr>
    <?php 

}
?>

AND arrival_location='{$m}'";