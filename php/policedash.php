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
    // $sqlc="SELECT * FROM `policeofficer`";
    $sqlc="CALL `nfp`();";
    $resultc = mysqli_query($conn,$sqlc);
    $row1 = mysqli_num_rows($resultc);

    $conn->next_result();

    // $sqls="SELECT * FROM `station`";
    $sqls="CALL `nfs`();";
    $result1 = mysqli_query($conn,$sqls);
    $row2 = mysqli_num_rows($result1);

    $conn->next_result();

    // $sqlcr="SELECT * FROM `criminal`";
    $sqlcr="CALL `nfc`();";
    $resultcr = mysqli_query($conn,$sqlcr);
    $row3 = mysqli_num_rows($resultcr);

    $conn->next_result();

    // $sqlcrime="SELECT * FROM `fir`";
    $sqlcrime="CALL `nfcc`();";
    $resultcrime = mysqli_query($conn,$sqlcrime);
    $row4 = mysqli_num_rows($resultcrime);

    $conn->next_result();   
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
            <!--<li><a href="user.php" >User</a></li>-->
            <li class="current"><a href="police.php" >Police</a></li>
            <li><a href="admin.php">Admin</a></li>
        </ul>
    </nav>

    <section class='showcase-user'>
        <aside class='side-menu'>
            <ul>
                <li class='current'><i class="fas fa-home"></i><a href="policedash.php">Dashboard</a></li>
                <li><i class="fas fa-dungeon"></i><a href="#">Criminals</a>
                    <ul>
                        <li><a href="ac.php">Add Criminal</a></li>
                        <li><a href="managecriminals.php">Manage Criminal</a></li>
                    </ul>
                
                </li>
                <li><i class="fas fa-clipboard-list"></i><a href="#">FIR</a>
                    <ul>
                        <li><a href="addfir.php">New FIR</a></li>
                        <li><a href="managefir.php">View FIR</a></li>
                    </ul>
                </li>
                <li><i class="fas fa-clipboard-list"></i><a href="criminallog.php">Criminal LOG</a></li>
                <li><i class="fas fa-clipboard-list"></i><a href="viewcrime.php">Crime Categories</a></li>
                <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">Log Out</a></li>

            </ul>
        </aside>
        <div class='cards'>
            <div class="card">
                <i class="fas fa-file sc1"></i>
                <h3 class ='sc2'>F I R</h3>
                <h1 class='sc3'><?php echo $row4 ; ?></h1>

            </div>
            <div class="card">
                <i class="fas fa-dungeon sc1"></i>
                <h3 class='sc2'>CRIMINALS</h3>
                <h1 class='sc3'><?php echo $row3 ; ?></h1>

            </div>
            <div class="card">
                <i class="fas fa-user-tie sc1"></i>
                <h3 class='sc2'>POLICE OFFICERS</h3>
                <h1 class='sc3'><?php echo $row1 ; ?></h1>

            </div>
            <div class="card">
                <i class="fas fa-building sc1"></i>
                <h3 class='sc2'>POLICE STATIONS</h3>
                <h1 class='sc3'><?php echo $row2 ; ?></h1>

            </div>
        </div>
    </section>

    <footer>
        <p>Criminal Record Management System , Copyright &copy 2020</p>
    </footer>
</body>
</html>
<!--<li><i class="fas fa-clipboard-list"></i><a href="#">View Criminals</a></li>-->