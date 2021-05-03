<?php
    include_once "dbh.php";

    $sql2 = "DELETE from charges where CID=$crid";
    $result2 = mysqli_query($conn, $sql2);

    
    for($x=0 ; $x<count($cid_arr) ; $x++){
        
        $sql3 = "INSERT INTO charges VALUES ('$crid','$cid_arr[$x]') ";
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