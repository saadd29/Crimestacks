<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
		$posname = $_POST["psname"];
		$psid = $_POST["pscode"];  

		$posname = stripcslashes($posname);  
		$psid = stripcslashes($psid);  
		$posname = mysqli_real_escape_string($conn, $posname);  
		$psid = mysqli_real_escape_string($conn, $psid);  
        
        $sql = "UPDATE `station` SET `STN_NAME`= '$posname ' WHERE STN_ID= '$psid'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script>
            window.location.href='manageposstn.php';
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