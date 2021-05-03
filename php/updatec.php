<?php
    session_start();
    if(!isset($_SESSION["favsport"])){
        echo "<script>
    window.location.href='police.php';
    alert('YOU NEED TO LOGIN FIRST TO ACCESS THIS PAGE!!! ');
    </script>";
    exit();
    }
    include_once "dbh.php";
    $cid=$_GET['cd'];
    // $name=$_GET['cn'];
    $ag=$_GET['a'];
    $gen=$_GET['g'];
    $adr=$_GET['cad'];
    $crimeid=$_GET['crd'];
    $ofid=$_GET['od'];
    // $stnid=$_GET['si'];
    $fid=$_GET['fi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Police</title>
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
            <li class="current"><a href="police.php" >Police</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>

    <section class='showcase-user'>
        <section class='side-menu'>
            <ul>
                <li class='current'><i class="fas fa-home"></i><a href="policedash.php">Dashboard</a></li>
                <!-- <li><i class="fas fa-file-contract"></i><a href="#">Police Station</a>
                    <ul>
                        <li><a href="aps.php">Add Police Station</a></li>
                        <li><a href="manageposstn.php">Manage Police Station</a></li>
                    </ul>
                </li> -->
                <li><i class="fas fa-dungeon"></i><a href="#">Criminals</a>
                    <ul>
                        <li><a href="ac.php">Add Criminal</a></li>
                        <li><a href="managecriminals.php">Manage Criminals</a></li>
                    </ul>
                
                </li>
                <li><i class="fas fa-clipboard-list"></i><a href="#">FIR</a>
                    <ul>
                        <li><a href="addfir.php">New FIR</a></li>
                        <li><a href="managefir.php">View FIR</a></li>
                    </ul>
                </li>
                <li><i class="fas fa-clipboard-list"></i><a href="viewcrime.php">Crime Categories</a></li>
                <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">Log Out</a></li>
            </ul>
        </section>
        <section class='aps'>
            <h2>Update Criminal Details</h2><br><br>
            <form action="updatec.inc.php" method="post" >
            <label for="criminalid"> Criminal ID *</label>
            <input type="number" name="criminalid" value="<?php echo "$cid"; ?>" readonly="readonly" ><br><br>
            <label for="fid"> FIR NO *</label>
            <input type="number" name="fid" value="<?php echo "$fid"; ?>"><br><br>
            <!-- <label for="cname"> Name *</label>
            <input type="text" name="cname" value="<?php echo "$name"; ?>" ><br><br> -->
            <!-- <label for="photo" >Photo *</label>
            <input type="file" name="photo" value="" class='upload-box' required><br><br> -->
            <label for="cage"> Age *</label>
            <input type="number" name="cage" value="<?php echo "$ag"; ?>" ><br><br>
            <label for="gender"> Gender</label>
            <input type="text" name="gender" value="<?php echo "$gen"; ?>" ><br><br>
            <label for="adrs"> Address *</label>
            <input type="text" name="adrs" value="<?php echo "$adr"; ?>" ><br><br>
            <label for="cid"> Crime ID *</label>
            <input type="text" name="cid" value="<?php echo "$crimeid"; ?>"><br><br>
            <label for="offid"> OFF ID *</label>
            <input type="number" name="offid" value="<?php echo "$ofid"; ?>"><br><br>
            <!-- <label for="sid"> STN ID *</label>
            <input type="number" name="sid" value="<?php echo "$stnid"; ?>"><br><br> -->
            
            <input type="submit" name="submitted" value="UPDATE" class='btn'>
            </form> 
        </section>
    </section>

    <footer>
        <p>Criminal Record Management System , Copyright &copy 2020</p>
    </footer>
</body>
</html>
<!--<li><i class="fas fa-clipboard-list"></i><a href="viewcriminal.php">View Criminals</a></li>-->