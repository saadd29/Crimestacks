<?php
    session_start();
    if(!isset($_SESSION["favsport"])){
        echo "<script>
    window.location.href='police.php';
    alert('YOU NEED TO LOGIN FIRST TO ACCESS THIS PAGE!!! ');
    </script>";
    exit();
    }
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

    <section class='showcase-usr'>
       
        <section class='add_fir'>
            <h2>Add FIR</h2><br><br>
            <form action="addfir.inc.php" method="post" enctype="multipart/form-data">
            <!-- <label for="stnid">STN ID *</label>
            <input type="number" name="stnid" value="" required><br><br> -->
            <label for="Cname">Accused Name *</label>
            <input type="text" name="Cname" value="" required><br><br>
            <label for="photo" >Accused Photo *</label>
            <input type="file" name="photo" value="" class='upload-box' ><br><br>
            <label for="cdt">DATE AND TIME OF EVENT *</label>
            <input type="datetime-local" name="cdt" value="" required><br><br>
            <!-- <label for="fadd">Accused Address *</label>
            <textarea name="fadd" id="fadd" cols="50" rows="3" required></textarea><br><br> -->
            <!-- <input type="text" name="fadd" value="" required><br><br> -->
            <label for="cs">Crime Scene *</label>
            <textarea name="cs" id="cs" cols="50" rows="3" required></textarea><br><br>
            <!-- <input type="text" name="cs" value="" required><br><br> -->
            <label for="cd">Crime Description *</label>
            <textarea name="cd" id="cd" cols="50" rows="5" required></textarea><br><br>
            <!-- <input type="text" name="cd" value="" required><br><br> -->
            <label for="Iname">Witness Name *</label>
            <input type="text" name="Iname" value="" required placeholder="Seperate names by ',' "><br><br>
            <label for="Iadd">Witness Address *</label>
            <textarea name="Iadd" id="Iadd" cols="50" rows="3" required placeholder="Seperate multiple addresses by ';' "></textarea><br><br>
            <!-- <input type="text" name="Iadd" value="" required><br><br> -->
            <label for="no">Witness Number *</label>
            <input type="text" name="no" value="" required placeholder="Seperate by ',' "><br><br>
            <label for="ofid">OFF ID *</label>
            <input type="number" name="ofid" value="" required><br><br>
            <label for="status"> Status </label>
            <select name="status" class='select' required>
                <option value="">--Select--</option>
                <option value="NOT UPDATED">Not Updated</option>
                <option value="APPROVED">Approved</option>
                <option value="CANCELLED">Cancelled</option>
            </select><br><br><br>
            <!-- <input type="text" name="status" value="" ><br><br> -->
            <input type="submit" name="submitted" value="Add" class='btn2'>
            </form> 

        </section>
        <form action="policedash.php" method="post">
    <button  type=submit class="button" >Dashboard</button>
    </section>



</body>
</html>
