<?php
    include_once "dbh.php";
    
    $sql2 = "DELETE from `witness` where F_NO='$stnid'";
    $result2 = mysqli_query($conn, $sql2);
    
    $id=$stnid;
    for($x=0 ; $x<count($info_arr['name']) ; $x++){
        $name=$info_arr['name'][$x];
        $add=$info_arr['add'][$x];
        $num=$info_arr['num'][$x];

        $sql3 = "INSERT INTO `witness` VALUES ('$id','$name','$add','$num')";
        $result3 = mysqli_query($conn, $sql3);
        if(!$result3)
        {
            // echo "<script>
            // window.location.href='ac.php';
            // alert('Error: Check if crime id is valid ');
            // </script>";
            // exit();

            $message = "ERROR: Could not execute $sql3. " . mysqli_error($conn);
            echo '<script language="Javascript" type="text/javascript">';
            echo     'alert('. json_encode($message) .');';
            echo '</script>';
        }
    }
    

?>