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
    $sql = "SELECT * FROM `criminal`";
    $result = mysqli_query($conn, $sql);
    $resultcheck=mysqli_num_rows($result);

    if($resultcheck>0) {
    ?>
    <html>
        <link rel="stylesheet" href="./styles/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <body class='abc'>
        <div class='top_div'>
        <form action="policedash.php" method="post">
        <button  type=submit class="button" >Dashboard</button>
            <h2 class='table-heading'>CRIMINAL RECORD</h2>
            <input type="text" id="search" name="search" placeholder="Search" autocomplete="off">
        </div>
    <tr>
      <td id="table-data">
      </td>
    </tr>
            <section class='display_table'>
            <table class='content-table'>
                <thead>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>AGE</th>
                    <th>GENDER</th>
                    <th>ADDRESS</th>
                    <th>CRIME ID</th>
                    <th>OFF ID</th>
                    <th>STN NAME</th>
                    <th>FIR ID</th>
                    <th>MANAGE</th>
                    <th>CHARGE SHEET</th>

                </thead>
            <?php
                while($rows = mysqli_fetch_assoc($result)) {
                    include 'crids.php';include 'displaycriminals.php';

            ?>
                <tbody>
                    <tr>
                        <td><?php echo $a=$rows['C_ID'];  ?></td>
                        <?php 
                        $sql22 = "SELECT * FROM `fir`,`criminal` where criminal.C_ID =$a and criminal.FIR_NO=fir.FIR_NO ";
                        $result22 = mysqli_query($conn, $sql22);
                        $resultcheck22=mysqli_num_rows($result22);
                        $rome = mysqli_fetch_assoc($result22);?>
                        <td><?php echo $rome['C_NAME']; ?></td>
                        <td><?php echo $rows['C_AGE']; ?></td>
                        <td><?php echo $rows['C_GENDER']; ?></td>
                        <td><?php echo $rows['C_ADDRESS']; ?></td>
                        <td><?php echo $crids; ?></td>
                        <td><?php echo $rows['OFF_ID']; ?></td>
                        <td><?php echo $rows7['STN_NAME']; ?></td>
                        <td><?php echo $rows['FIR_NO']; ?></td>
                        <?php echo "<td><a href=updatec.php?cd=".$rows['C_ID']."&a=".$rows['C_AGE']."&g=".$rows['C_GENDER']."&cad=".urlencode($rows['C_ADDRESS'])."&crd=".urlencode($crids)."&od=".$rows['OFF_ID']."&fi=".$rows['FIR_NO']."><i class='fas fa-edit manage_icons'></i></a><a href=deletec.php?cid=".$rows['C_ID']."><i class='fas fa-trash manage_icons'></i></a></td>";?>
                        <?php echo "<td><a href=chargesheet.php?cd=".$rows['C_ID']."&s=".urlencode($rows7['STN_NAME'])."&cn=".urlencode($rome['C_NAME'])."&cdc=".$rows['FIR_NO']."&a=".$rows['C_AGE']."&g=".$rows['C_GENDER']."&ca=".urlencode($rows['C_ADDRESS'])."&od=".$rows['OFF_ID']."><i class='fas fa-eye manage_icons'></i></a></td>";?>;
                    </tr>
                </tbody>
                <?php
                    }
                    ?>
            </table>
        </section>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $("#search").keyup(function () {
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function (index) {
            if (!index) return;
            $(this).find("td:nth-child(1), :nth-child(2), :nth-child(5)").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
                });
            });
        });
    </script>  
        </body>
    </html>
    <?php
     }

    else{
        echo "<script>
        window.location.href='policedash.php';
        alert('NO CRIMINALS TO DISPLAY!...GOOD JOB! ');
        </script>";
        exit();
    }
?>

<!--<td><a href=""><i class="fas fa-edit manage_icons"></i></a><a href=""><i class="fas fa-trash manage_icons"></i></a></td>-->