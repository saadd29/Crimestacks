<?php
include 'dbh.php';

$id=$rows['FIR_NO'];
// $id=738;
$sql2 = "SELECT C_NAME FROM fir where FIR_NO=$id";
$result2 = mysqli_query($conn, $sql2);
$rows2=mysqli_fetch_assoc($result2);

$offid1=$rows['OFF_ID'];
// $offid1=2;
$sql6 = "SELECT STN_ID from pos where OFFID='$offid1'";
$result6 = mysqli_query($conn, $sql6);
$rows6 = mysqli_fetch_assoc($result6);
$b=$rows6['STN_ID'];

$sql7 = "SELECT STN_NAME from station where STN_ID='$b'";
$result7 = mysqli_query($conn, $sql7);
$rows7 = mysqli_fetch_assoc($result7);
$st_name=$rows7['STN_NAME'];
?>