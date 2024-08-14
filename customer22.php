<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer page</title>
    <link rel="stylesheet" href="style3.css">
    <script type="text/javascript" src="javascript/script.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
</head>


<body>
  <div>
  <form action="" class="form">
  

<h2 class="from2" > Hello, Welcome</h2>
<p class="from3" > Select a ROUTE.....</p>

<form action="process_form.php" method="post">
    <div class="area">

<div>
  <label for="item" class= "from">FROM: </label>
  <select id="item" class="selection" name="itemA" onchange="select_items()">
    <?php
     include('configg.php');

    // Query to retrieve data from the database
    $sql = "SELECT route_cities FROM routes";
    $result = $con->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
      // Loop through each row and populate the dropdown list
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['route_cities'] . "'>" . $row['route_cities'] . "</option>";
      }
    } else {
      echo "<option value=''>No items found</option>";
    }

    // Close database connection
   // $conn->close();
    ?>
  </select>
  </div>


  <div>
  <label for="item" class= "from">TO: </label>
  <select id="item" class="selection" name="itemA" onchange="select_items()">
    <?php
     include('configg.php');

    // Query to retrieve data from the database
    $sql = "SELECT route_cities FROM routes";
    $result = $con->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
      // Loop through each row and populate the dropdown list
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['route_cities'] . "'>" . $row['route_cities'] . "</option>";
      }
    } else {
      echo "<option value=''>No items found</option>";
    }

    // Close database connection
   // $conn->close();
    ?>
  </select>
  </div>



  <br><br>

  <!--<span class="spacer"></span>-->
 
  <br><br>
  <button id="itemB" class="submit_btn" onclick = "fun()" >submit </button>
  </form>
  <!--<input type="submit" value="Submit" class="submit_btn"> -->
  </div>

  <!--<p>Selected item: <span id="selected-item"></span></p>
  <script src="script2.js"></script>
<p class="from3"> Scdeduled Depatures  </p>


</form>
<div class="area2">
<table>
  <thread>
  <th>image </th>
    <th style="width:30%">vehicle_type </th>
    <th style="width:10%">travel_date </th>
    <th style="width:10%">time </th>
    <th style="width:30%">cost </th>
  </thread>
  <tbody id="ans">

  </tbody>
</table>
</div>
</form>
</div>
  
</body>
</html>