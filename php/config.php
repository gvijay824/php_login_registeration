<!-- <?php
    $con = mysqli_connect("localhost","root","","simple") or die("couldn't connect");
    ?> -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name= "simple";
// Create connection
$con = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";
?>