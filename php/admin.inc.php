<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
		$email = $_POST["email"];
		$password = $_POST["passwd"];  

		$email = stripcslashes($email);  
		$password = stripcslashes($password);  
		$email = mysqli_real_escape_string($conn, $email);  
		$password = mysqli_real_escape_string($conn, $password);  
	
		$sql = "SELECT * FROM admin where A_EMAIL = '$email' and A_PSWD = '$password' ; ";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_assoc($result);  
        $count =mysqli_num_rows($result);
		
		
		if($count == 1)
		{  
			$_SESSION["favcolor"] = "NAVYBLUE";
			header("location:admindash.php");  			
		}  
		else{  
			echo "<script>
            window.location.href='admin.php';
            alert('Login failed.Invalid username or password! ');
            </script>";
            exit();
			// echo "<h3> Login failed. Invalid username or password.</h1>";  
		}  
	}  
?>