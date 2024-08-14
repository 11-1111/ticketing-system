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
<p class="from3" > You'd like to travel .....</p>

<form action="process_form.php" method="post">
    <div class="area">

<div>
  <label for="depature" class= "from">FROM: </label>
  <select id="depature" class="selection" name="depature" onchange="select_items()">
    <?php
     include('configg.php');

    // Query to retrieve data from the database
    $sql = "SELECT depature_location FROM products";
    $result = $con->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
      // Loop through each row and populate the dropdown list
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['depature_location'] . "'>" . $row['depature_location'] . "</option>";
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
  <div>


  <label for="arrival" class= "from">TO:</label>
  <select id="arrival" class="selection" name="arrival" onchange="select_items()">
    <?php
     include('configg.php');

    // Query to retrieve data from the database
    $sql = "SELECT arrival_location FROM products";
    $result = $con->query($sql);

    // Check if there are rows returned
    if ($result->num_rows > 0) {
      // Loop through each row and populate the dropdown list
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['arrival_location'] . "'>" . $row['arrival_location'] . "</option>";
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
  <button type="submit" class="submit_btn" >submit </button>
  <!--<input type="submit" value="Submit" class="submit_btn"> -->
  </div>

  <!--<p>Selected item: <span id="selected-item"></span></p>
  <script src="script2.js"></script>
<p class="from3"> Scdeduled Depatures  </p>-->


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