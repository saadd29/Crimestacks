<?php
    session_start();
    if(isset($_SESSION["favcolor"])){
        echo "<script>
        window.location.href='logout.php';
        alert('Logout of Admin?? ');
        </script>";
        exit();
    }
    if(isset($_SESSION["favsport"])){
        header("location:policedash.php"); 
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLICE</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <header>
       <nav>
           <div class="logo">
               <h4>CRIME STACK</h4>
           </div>
           <ul class="nav-links">
               <li><a href="index.php" >Home</a></li>
               <!-- <li><a href="user.php" >User</a></li> -->
               <li class="current"><a href="police.php" >Police</a></li>
               <li><a href="admin.php">Admin</a></li>
           </ul>
       </nav>
    </header>
    <section class="showcase-admin">
        <form action="police.inc.php" method="post">
            <div class="login-box">
                <h1>Login</h1>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="user" value="">
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="passwd" value="">
                </div>
                <input type="submit" class="btn" name="submitted" value="Sign In">
            </div>
        </form>
    </section>
    <footer>
        <p>Criminal Record Management System , Copyright &copy 2020</p>
    </footer>
</body>
</html>