<?php
    session_start();
    if(!isset($_SESSION["favcolor"])){
        echo "<script>
    window.location.href='admin.php';
    alert('YOU NEED TO LOGIN FIRST TO ACCESS THIS PAGE!!! ');
    </script>";
    exit();
    }
    include_once "dbh.php";
    $sid=$_GET['sid'];
?>

