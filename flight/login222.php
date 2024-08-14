<?php

session_start();
include "connection22.php";
include "functions22.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{

   // $cname = $_POST["cfirstname"] . " " . $_POST["clastname"];
   // $cphone = $_POST["cphone"];
    $user=$_POST["user"];
    $password = $_POST['password'];
		

    //something was posted


    if( !empty($user) && !empty($password))
    {

        //read from database
        $query = "select * from users where user_name= '$user' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['user_password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header('Location: http://localhost/SimpleBusTicket-PHP/admin/dashboard.php');
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }
    else
    {
        echo "wrong username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    
    
<link rel="stylesheet" type="text/css" href="styless4.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>



<div class= "wrapper">
<div class="form-wrapper">
		
		<form method="post">
			
            <h1> Login </h1>
        
           <div class="input-box">
			<input type="text" name="user" required>
            <label for="">username</label>
            <i class='bx bxl-gmail'></i>
           <!-- <i class='bx bxs-user'></i> -->
            </div>
        
            <div class="input-box">

            
			<input type="password" name="password"required>
            <label for="">Password</label>
            <i class='bx bxs-lock-alt'></i>
        
            </div>
            <div class="forgot">


			<button type="submit" class="btn">Login </button><br><br>
            <a href="#">Forgot your password?</a><br><br>
</div>

<div class= "sign">
			<p>Don't have an account? <a href="http://localhost/SimpleBusTicket-PHP/signup22.php">Click to Signup</a></p>
        
            </div>
            
		</form>
        </div>
	</div>


    
</body>
</html>