<?php
session_start();

include("connection22.php");
include("functions22.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		
		$cname = $_POST["cfirstname"] . " " . $_POST["clastname"];
		$cphone = $_POST["cphone"];
		$cmail=$_POST["cmail"];
	
		$password = $_POST['password'];
		

		if(!empty($cname) && !empty($cphone) && !empty($cmail) && !empty($password)  && !is_numeric($cname))
		{

			//save to database
			$customer_id = random_num(20);
			//$query = "insert into customers (customer,user_name,email,password) values ('$user_id','$user_name','$email','$password')";
			$sql = "INSERT INTO `customers` (`customer_name`, `customer_phone`, `customer_mail`,`password`,`customer_created`) VALUES ('$cname', '$cphone', '$cmail','$password',current_timestamp());";
			

			mysqli_query($con, $sql);
			$autoInc_id = mysqli_insert_id($con);
                    // If the id exists then, 
                    if($autoInc_id)
                    {
                        $code = rand(1,99999);
                        // Generates the unique userid
                        $customer_id = "CUST-".$code.$autoInc_id;
                        
                        $query = "UPDATE `customers` SET `customer_id` = '$customer_id' WHERE `customers`.`id` = $autoInc_id;";
                        $queryResult = mysqli_query($con, $query);

                        if(!$queryResult)
                            echo "Not Working";
                    }



			header("Location: login22.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up page</title>
    
    
<link rel="stylesheet" type="text/css" href="styles4.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>



<div class= "wrapper">

		
		<form method="post">
			
            <h1> Sign up </h1>
<div class="col">    
			<div class="input-box">
			<input type="text" name="cfirstname" required>
            <label for="">First Name</label>
            <i class='bx bxs-user'></i>
            </div>

			<div class="input-box">
			<input type="text" name="clastname" required>
            <label for="">Last name</label>
            <i class='bx bxs-user'></i>
            </div>

			<div class="input-box">
			<input type="text" name="cphone" id="cphone" required pattern="\d{10}" title="Invalid Contact length">
            <label for="">Contacts</label>
            <i class='bx bxs-user-detail'></i>
            </div>
</div>
<div class="col">  

           <div class="input-box">
           <input type="email" name="cmail" required pattern=".+\.com$"title="..@example.com">
            <label for="">Email</label>
            <i class='bx bxl-gmail'></i>
            </div>
        
            <div class="input-box">
            <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			<!--<input type="password" name="password" id="password" required pattern="(?=.*[A-Z])(?=.*[!@#$%^&*()_+|{};':\",./<>?]).{8,}" title="Password must be 8 characters long, include at least one capital letter, and one symbol">-->
            <label for="">Password</label>
            <i class='bx bxs-lock-alt'></i>
        
            </div>

            <div class="input-box">
    <input type="password" id="confirm_password" name="confirm_password" required>
    <label for="confirm_password">Confirm Password</label>
    <i class='bx bxs-lock-alt'></i>
</div>
</div>
<script>
    document.getElementById('password').addEventListener('input', function() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        var confirmInput = document.getElementById('confirm_password');
        
        if (password === confirmPassword) {
            confirmInput.setCustomValidity('');
        } else {
            confirmInput.setCustomValidity('Passwords do not match');
        }
    });

    document.getElementById('confirm_password').addEventListener('input', function() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        var confirmInput = document.getElementById('confirm_password');
        
        if (password === confirmPassword) {
            confirmInput.setCustomValidity('');
        } else {
            confirmInput.setCustomValidity('Passwords do not match');
        }
    });
</script>

        
          <!-- <div class="input-box">
			<input type="text" name="user_name" placeholder="Enter Username" required>
            <i class='bx bxs-user'></i>
            </div>
        
			<div class="input-box">
			<input type="email" name="email" placeholder="Enter Username" required>
            </div>
        

            <div class="input-box">
			<input type="password" name="password" placeholder="Enter Password" required>
            <i class='bx bxs-lock-alt'></i>
        
            </div> -->
            <div class="forgot">


			<button type="submit" class="btn"> Sign Up </button><br><br>
    
</div>

<div class= "sign">
			<a href="login22.php">Back</a></p>
        
            </div>
            
		</form>
	</div>


    
</body>
</html>