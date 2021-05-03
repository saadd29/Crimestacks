<?php
    session_start();
    if(!isset($_SESSION["favsport"])){
        echo "<script>
    window.location.href='police.php';
    alert('YOU NEED TO LOGIN FIRST TO ACCESS THIS PAGE!!! ');
    </script>";
    exit();
    }
    include "dbh.php";
    $fid=$_GET['cdc'];
    $b=$_GET['s'];
    $c=$_GET['cn'];
    $d=$_GET['ct'];
    $e=$_GET['ca'];
    $f=$_GET['cs'];
    $g=$_GET['cd'];
    $h=$_GET['ai'];
    $i=$_GET['id'];
    $j=$_GET['nu'];
    $k=$_GET['g'];
    $l=$_GET['od'];
    $m=$_GET['cad'];
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
<body style='background:black;'>
<!-- <nav>
        <div class="logo">
            <h4>CRIME STACK</h4>
        </div>
        <ul class="nav-links">
            <li><a href="index.php" >Home</a></li>
           
            <li class="current"><a href="police.php" >Police</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>  -->

    <section class='showcase-usr'>
        
        <section class='add_fir'>
            <h2>Update FIR Details</h2><br><br>
            <form action="updatefir.inc.php" method="post" enctype="multipart/form-data">
            <label for="fi"> FIR NO*</label>
            <input type="varchar" name="fi" value="<?php echo "$fid"; ?>" readonly="readonly" required><br><br>
            <!-- <label for="si">STN ID *</label>
            <input type="number" name="si" value="<?php echo "$b"; ?>" required><br><br> -->
            <label for="cna">Accused Name *</label>
            <input type="text" name="cna" value="<?php echo "$c"; ?>" required><br><br>
            <label for="photo">Accused Photo *</label>
            <input type="file" name="photo" value="" required><br><br>
            <label for="cti">DATE AND TIME OF EVENT *</label>
            <input type="datetime" name="cti" value="<?php echo "$d"; ?>"><br><br>
           
            <label for="cri">Crime Scene *</label>
            <textarea name="cri" id="cs" cols="50" rows="3" style='font-size: 15pt' value="<?php echo "$f"; ?>" required><?php echo "$f"; ?></textarea><br><br>
            
            <label for="crd">Crime Description *</label>
            <textarea name="crd" id="cd" cols="50" rows="5" style='font-size: 15pt' value="<?php echo "$g"; ?>" required><?php echo "$g"; ?></textarea><br><br>
           
            <label for="in">Informer Name *</label>
            <input type="text" name="in" value="<?php echo "$h"; ?>" required><br><br>
            <label for="iad">Informer Address *</label>
            <textarea name="iad" id="Iadd" cols="50" rows="3" style='font-size: 15pt' value="<?php echo "$i"; ?>" required><?php echo "$i"; ?></textarea><br><br>
            
            <label for="num">Informer Number *</label>
            <input type="text" name="num" value="<?php echo "$j"; ?>" required><br><br>
            <label for="fird"> FIR Date</label>
            <input type="date" name="fird" value="<?php echo "$k"; ?>" readonly="readonly" required><br><br>
            <label for="offd">OFF ID *</label>
            <input type="number" name="offd" value="<?php echo "$l"; ?>" required><br><br>
            <label for="stats"> Status * </label>
            <select name="stats">
                <option value="<?php echo "$m"; ?>"><?php echo "$m"; ?></option>
                <option value="NOT UPDATED">NOT UPDATED</option>
                <option value="APPROVED">APPROVED</option>
                <option value="CANCELLED">CANCELLED</option>
            </select><br><br><br>
            <input type="submit" name="submitted" value="UPDATE" class='btn'>
            </form> 
        </section>
        <form action="policedash.php" method="post">
        <button  type=submit class="button" >Dashboard</button>
    </section>

   
</body>
</html>
