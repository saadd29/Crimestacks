<?php
    session_start();
    if(!isset($_SESSION["favcolor"])){
        echo "<script>
    window.location.href='admin.php';
    alert('YOU NEED TO LOGIN FIRST TO ACCESS THIS PAGE!!! ');
    </script>";
    exit();
    }
    include_once "dbh.php";
    $si=$_GET['sid'];
    $sn=$_GET['sname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
    <nav>
        <div class="logo">
            <h4>CRIME STACK</h4>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" >Home</a></li>
            <!-- <li><a href="user.php" >User</a></li> -->
            <li><a href="police.php" >Police</a></li>
            <li class="current"><a href="admin.php">Admin</a></li>
        </ul>
    </nav>

    <section class='showcase-user'>
        <section class='side-menu'>
            <ul>
                <li class='current'><i class="fas fa-home"></i><a href="admindash.php">Dashboard</a></li>
                <li><i class="fas fa-file-contract"></i><a href="#">Police Station</a>
                    <ul>
                        <li><a href="aps.php">Add Police Station</a></li>
                        <li><a href="manageposstn.php">Manage Police Station</a></li>
                    </ul>
                </li>
                <li><i class="fas fa-user-tie"></i><a href="#">Police</a>
                    <ul>
                        <li><a href="ap.php">Add Police</a></li>
                        <li><a href="managepoloff.php">Manage Police</a></li>
                    </ul>
                
                </li>
                <li><i class="fas fa-clipboard-list"></i><a href="viewcriminal.php">View Criminals</a></li>
                <li><i class="fas fa-clipboard-list"></i><a href="viewfir.php">View FIR</a></li>
                <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">Log Out</a></li>
            </ul>
        </section>
        <section class='aps'>
            <h2>Update Police Station Details</h2><br><br>
            <form action="updateps.inc.php" method="post">
            <label for="pscode">Police Station Code *</label>
            <input type="text" id="pscode" name="pscode" readonly="readonly" value="<?php echo "$si";?>"><br><br>
            <label for="psname">Police Station Name *</label>
            <input type="text" id="psname" name="psname" value="<?php echo "$sn"; ?>" ><br><br>
            <input type="submit" name = "submitted" value="Update" class='btn'>
            </form> 
        </section>
    </section>

    <footer>
        <p>Criminal Record Management System , Copyright &copy 2020</p>
    </footer>
</body>
</html>