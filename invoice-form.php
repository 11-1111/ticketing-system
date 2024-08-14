<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>


<html>
    <head>
        <title>
            Invoice generator
        </title>

    </head>
    <body>
        select invoice:
        <form method='post' action='invoice-db.php'>
            <select name="customer_route">
                <?php

                //show invoices
                $query=mysqli_query($con,"select * from bookings");
                while($invoice=mysqli_fetch_array($query)){
                    echo "<option value='".$invoice['id']."'>".$invoice['customer_route']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Generate">
        </form>
    </body>



</html>