<?php
// Connecting to the Database
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$database = "dbms";

// Create a connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
  
?>

