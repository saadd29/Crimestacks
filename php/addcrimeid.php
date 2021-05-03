<?php
    include_once "dbh.php";

    $sql2 = "SELECT C_ID FROM criminal where FIR_NO=$fid";
    $result2 = mysqli_query($conn, $sql2);
    $rows2 = mysqli_fetch_assoc($result2);

    // print_r($rows2['C_ID']);
    $id=$rows2['C_ID'];
    
    for($x=0 ; $x<count($cid_arr) ; $x++){
        
        $sql3 = "INSERT INTO charges VALUES ('$id','$cid_arr[$x]') ";
        $result3 = mysqli_query($conn, $sql3);
        if(!$result3)
        {
            echo "<script>
            window.location.href='ac.php';
            alert('Error: Check if crime id is valid ');
            </script>";
            exit();
        }
    }
    

?>