<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
        // $cname = $_POST["cname"];
        $age = $_POST["cage"];   
        $gender = $_POST["gender"]; 
        $address = $_POST["adrs"]; 
        $cid = $_POST["cid"]; 
        $offid = $_POST["offid"];
        // $stnid = $_POST["sid"];
        $fid = $_POST["fid"];

        // $cname = stripcslashes($cname);
        $age = stripcslashes($age);  
        $gender = stripcslashes($gender);
        $address = stripcslashes($address);  
        $cid = stripcslashes($cid);
        $offid = stripcslashes($offid);
        // $stnid = stripcslashes($stnid);
        $fid = stripcslashes($fid);

        // $cname = mysqli_real_escape_string($conn,$cname);
        $age = mysqli_real_escape_string($conn,$age);  
        $gender = mysqli_real_escape_string($conn,$gender);  
        $address = mysqli_real_escape_string($conn,$address);  
        $cid = mysqli_real_escape_string($conn,$cid); 
        $offid = mysqli_real_escape_string($conn,$offid);
        // $stnid = mysqli_real_escape_string($conn,$stnid);    
        $fid = mysqli_real_escape_string($conn,$fid);

        $cid_arr=explode(',',$cid);
        $sql= "INSERT INTO `criminal`( `C_AGE`, `C_GENDER`, `C_ADDRESS`, `OFF_ID`,`FIR_NO`) VALUES ('$age','$gender','$address','$offid',(SELECT fir.FIR_NO FROM `fir` WHERE `FIR_NO`='$fid' and `STATUS`='APPROVED' ))";
        $result = mysqli_query($conn, $sql);
        
        if($result){
            include 'addcrimeid.php';
            echo "<script>
            window.location.href='policedash.php';
            alert('The record has been inserted successfully!!! ');
            </script>";
            exit();
        }
        else{
                echo "<script>
                window.location.href='managefir.php';
                alert('FIR needs to be Approved ');
                </script>";
                exit();
                // $message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
                // echo '<script language="Javascript" type="text/javascript">';
                // echo     'alert('. json_encode($message) .');';
                // echo '</script>';
                // exit();
        }
    }
    else {
        echo "<script>
        window.location.href='ac.php';
        alert('There was a error!!! ');
        </script>";
        exit();
    }
?>