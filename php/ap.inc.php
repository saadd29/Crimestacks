<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
        $offname = $_POST["pname"];
        $email = $_POST["Email"];   
        $phno = $_POST["mobno"]; 
        $address = $_POST["adrs"]; 
        $password = $_POST["pswd"]; 
        $psid = $_POST["posid"];

		$psid = stripcslashes($psid);  
        $offname = stripcslashes($offname);
        $email = stripcslashes($email);  
        $phno = stripcslashes($phno);
        $address = stripcslashes($address);  
        $password = stripcslashes($password);
        $psid = mysqli_real_escape_string($conn,$psid);  
        $offname = mysqli_real_escape_string($conn,$offname);
        $email = mysqli_real_escape_string($conn,$email);  
        $phno = mysqli_real_escape_string($conn,$phno);
        $address = mysqli_real_escape_string($conn,$address);  
        $password = mysqli_real_escape_string($conn,$password); 
        $sql="INSERT INTO `policeofficer`( `OFF_NAME`, `EMAIL`, `PH_NO`, `P_ADD`, `PSWD`, `STN_ID`) VALUES ('$offname','$email','$phno','$address','$password','$psid')";
        $result = mysqli_query($conn, $sql);
        

        if($result){
            echo "<script>
            window.location.href='admindash.php';
            alert('The record has been inserted successfully!!! ');
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