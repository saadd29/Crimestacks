<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
        $oid=$_POST["poid"];
        $offname = $_POST["pname"];
        $email = $_POST["Email"];   
        $phno = $_POST["mobno"]; 
        $address = $_POST["adrs"];  
        $psid = $_POST["posid"];

		$psid = stripcslashes($psid);  
        $offname = stripcslashes($offname);
        $email = stripcslashes($email);  
        $phno = stripcslashes($phno);
        $address = stripcslashes($address);  
        $psid = mysqli_real_escape_string($conn,$psid);  
        $offname = mysqli_real_escape_string($conn,$offname);
        $email = mysqli_real_escape_string($conn,$email);  
        $phno = mysqli_real_escape_string($conn,$phno);
        $address = mysqli_real_escape_string($conn,$address);  
        $sql="UPDATE `policeofficer` SET `OFF_NAME`='$offname',`EMAIL`='$email',`PH_NO`='$phno',`P_ADD`='$address',`STN_ID`='$psid' WHERE `OFF_ID`=$oid ";
        $result = mysqli_query($conn, $sql);

        $sqlop="UPDATE `pos` SET `STN_ID`='$psid' WHERE `OFFID`=$oid  ";
        $resultop = mysqli_query($conn, $sqlop);

        if($result){
            echo "<script>
            window.location.href='managepoloff.php';
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
            window.location.href='managepoloff.php';
            alert('There was a error!!! ');
            </script>";
            exit();
    }
?>