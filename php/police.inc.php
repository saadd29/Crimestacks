<?php
    session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
		$policeuser = $_POST["user"];
		$password = $_POST["passwd"];  

		$policeuser = stripcslashes($policeuser);  
		$password = stripcslashes($password);  
		$policeuser = mysqli_real_escape_string($conn, $policeuser);  
		$password = mysqli_real_escape_string($conn, $password);  
	
		$sql = "SELECT * FROM policeofficer where OFF_NAME='$policeuser' and PSWD ='$password' ; ";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($result);  
        $count =mysqli_num_rows($result);
		
		
		if($count == 1)
		{  
			$_SESSION["favsport"] = "CRICKET";
			header("location:policedash.php");  			
		}  
		else{  
			echo "<script>
            window.location.href='police.php';
            alert('Login failed.Invalid username or password! ');
            </script>";
            exit();
			// echo "<h3> Login failed. Invalid username or password.</h1>";  
		}  
	}  
?>