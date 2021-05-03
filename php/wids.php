<?php
include 'dbh.php';

$id=$rows['FIR_NO'];
// $id=733;
$sql2 = "SELECT * FROM witness where F_NO=$id";
$result2 = mysqli_query($conn, $sql2);
$rows2=mysqli_fetch_all($result2);

$inf_name=array();
$inf_add=array();
$inf_num=array();

foreach($rows2 as $i){
    
    array_push($inf_name,$i[1]);
    array_push($inf_add,$i[2]);
    array_push($inf_num,$i[3]);
}
// print_r($inf_name);
// print_r($inf_add);
// print_r($inf_num);

// $crids=implode(',',$arr);
// echo $crids;
?>