<?php
$user = "alexrosi_alexros";
$pass = '44Hedgehog$';
$dbname = "alexrosi_ard_data0526";

$db = mysqli_connect("localhost", "$user", "$pass", "$dbname") or die(mysqli_error());

$color1 = $_POST['finalcolor1'];
$color2 = $_POST['finalcolor2'];
$color3 = $_POST['finalcolor3'];
$color4 = $_POST['finalcolor4'];
$color5 = $_POST['finalcolor5'];
/*$color1 = "blue";
$color2 = "purple";
$color3 = "purple";
$color4 = "purple";
$color5 = "orange";*/

mysqli_query($db, "INSERT INTO colors (color1,color2,color3,color4,color5) VALUES('$color1', '$color2', '$color3', '$color4', '$color5')");

mysqli_close($db);
header("Location: colorgen.php");
?>
