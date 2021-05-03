<?php
include 'dbh.php';

$id=$rows['C_ID'];
$sql2 = "SELECT CRIME_IDS FROM charges where CID=$id";
$result2 = mysqli_query($conn, $sql2);
$rows2=mysqli_fetch_all($result2);

$arr=array();
foreach($rows2 as $i){
    array_push($arr,implode($i));
}
$crids=implode(',',$arr);
?>