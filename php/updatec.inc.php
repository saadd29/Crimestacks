<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
        $crid=$_POST["criminalid"];
        // $cname = $_POST["cname"];
        $age = $_POST["cage"];   
        $gendr = $_POST["gender"]; 
        $address = $_POST["adrs"];  
        $crimid = $_POST["cid"];
        $oid = $_POST["offid"];  
        $snid = $_POST["sid"];

		$crimid = stripcslashes($crimid);  
        // $cname = stripcslashes($cname);
        $age = stripcslashes($age);  
        $gendr = stripcslashes($gendr);
        $address = stripcslashes($address);  
        $oid = stripcslashes($oid);
        $snid = stripcslashes($snid); 


        $crimid = mysqli_real_escape_string($conn,$crimid);  
        // $cname = mysqli_real_escape_string($conn,$cname);
        $age = mysqli_real_escape_string($conn,$age);  
        $gendr = mysqli_real_escape_string($conn,$gendr);
        $address = mysqli_real_escape_string($conn,$address);  
        $oid = mysqli_real_escape_string($conn,$oid);
        $snid = mysqli_real_escape_string($conn,$snid);  

        $cid_arr=explode(',',$crimid);
        $sql="UPDATE `criminal` SET `C_AGE`='$age',`C_GENDER`='$gendr',`C_ADDRESS`='$address',`OFF_ID`= '$oid' WHERE `C_ID`='$crid'";
        $result = mysqli_query($conn, $sql);

        if($result){
            include 'updatecrimeid.php';
            echo "<script>
            window.location.href='managecriminals.php';
            alert('The record has been updated successfully!!! ');
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
    }
    else {
        echo "<script>
            window.location.href='aps.php';
            alert('There was a error!!! ');
            </script>";
            exit();
    }
?>