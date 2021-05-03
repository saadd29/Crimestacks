<?php
    include_once "dbh.php";
    //$offid=$_GET['oid'];
    $sql="DELETE FROM `criminal` WHERE C_ID='$_GET[cid]'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>
            window.location.href='managecriminals.php';
            alert('The record has been deleted successfully!!! ');
            </script>";
            exit();

    }
    else{
        $message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
                echo '<script language="Javascript" type="text/javascript">';
                echo     'alert('. json_encode($message) .');';
                echo '</script>';
                exit();
    }