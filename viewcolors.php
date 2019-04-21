<html>
<head>
	<title>Saved Schemes</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<link href="https://fonts.googleapis.com/css?family=Poppins|Prata" rel="stylesheet">


</head>
<body>
	<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="colorgen.php">Color Schemer</a>
<ul class="navbar-nav">
    <li class="nav-item">
      <a href="colorgen.php" class="nav-link">Make a Scheme</a>
  </li>
  <li class="nav-item">
      <a href="viewcolors.php" class="nav-link">View Schemes</a>

  </li>
</ul>
    </div>
    <br>
	</div>

	<div class="container-fluid">
<?php
        $user = "alexrosi_alexros";
        $pass = '44Hedgehog$';///
        $dbname = "alexrosi_ard_data0526";


          //connect to the database
        $db = mysqli_connect("localhost" , "$user" , "$pass", "$dbname") or die(mysqli_error());
        $filter= mysqli_real_escape_string($db, "#");
        $sql = "SELECT * FROM colors WHERE color1 LIKE '%$filter%'";
        $result = mysqli_query($db, $sql);
        $queryResults= mysqli_num_rows($result);


            while($row= mysqli_fetch_assoc($result)){
              echo "<div class='card' style='margin:30px;'>";
              	echo "<div class='saved-scheme' style='background-color:".$row['color1'].";'>".$row['color1']."</div>";
              	echo "<div class='saved-scheme' style='background-color:".$row['color2'].";'>".$row['color2']."</div>";
              	echo "<div class='saved-scheme' style='background-color:".$row['color3'].";'>".$row['color3']."</div>";
              	echo "<div class='saved-scheme' style='background-color:".$row['color4'].";'>".$row['color4']."</div>";
              	echo "<div class='saved-scheme' style='background-color:".$row['color5'].";'>".$row['color5']."</div>";
              echo "</div>";
            }
?>

</div>
