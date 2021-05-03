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
    $sql = "SELECT * FROM `fir`";
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
        <h2 class='table-heading'>FIR</h2>
        <input type="text" id="search" name="search" placeholder="Search" autocomplete="off">
    </div>
    <tr>
      <td id="table-data">
      </td>
    </tr>
            <section class='display_table'>
            <table class='content-table'>
                <thead>
                    <th>FIR NO.</th>
                    <th>ACCUSED NAME</th>
                    <th>FIR DATE</th>
                    <th>STATUS</th>
                    <th>MANAGE</th>
                    <th>REPORT</th>

                </thead>
            <?php
                while($rows = mysqli_fetch_assoc($result)) {
                    include 'wids.php';
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $rows['FIR_NO'];  ?></td>
                        <td><?php echo $rows['C_NAME']; ?></td>
                        <td><?php echo $rows['FIR_DATE']; ?></td>
                        <td><?php echo $rows['STATUS']; ?></td>
                        <?php echo "<td><a href=updatefir.php?cdc=".$rows['FIR_NO']."&cn=".urlencode($rows['C_NAME'])."&ct=".urlencode($rows['CRIME_TIME'])."&cs=".urlencode($rows['CRIME_SCENE'])."&ai=".urlencode(implode(',',$inf_name))."&id=".urlencode(implode(';',$inf_add))."&nu=".urlencode(implode(',',$inf_num))."&cd=".urlencode($rows['CRIME_DESC'])."&g=".$rows['FIR_DATE']."&od=".$rows['OFFICER_ID']."&cad=".urlencode($rows['STATUS'])."><i class='fas fa-edit manage_icons'></i></a>";?>
                        <!-- < ?php echo "<td><a href=updatefir.php?cdc=".$rows['FIR_NO']."&cn=".urlencode($rows['C_NAME'])."&ct=".urlencode($rows['CRIME_TIME'])."&cs=".urlencode($rows['CRIME_SCENE'])."&ai=".urlencode(implode(',',$inf_name))."&id=".urlencode(implode(';',$inf_add))."&nu=".urlencode(implode(',',$inf_num))."&cd=".urlencode($rows['CRIME_DESC'])."&g=".$rows['FIR_DATE']."&od=".$rows['OFFICER_ID']."&cad=".urlencode($rows['STATUS'])."><i class='fas fa-edit manage_icons'></i></a><a href=deletefir.php?fid=".$rows['FIR_NO']."><i class='fas fa-trash manage_icons'></i></a></td>";?> -->
                        <?php echo "<td><a href=report.php?photo=".urlencode($rows['PHOTO'])."&cdc=".$rows['FIR_NO']."&s="."&cn=".urlencode($rows['C_NAME'])."&ct=".urlencode($rows['CRIME_TIME'])."&ia=".urlencode(implode(',',$inf_name))."&id=".urlencode(implode(';',$inf_add))."&nu=".urlencode(implode(',',$inf_num))."&cs=".urlencode($rows['CRIME_SCENE'])."&cd=".urlencode($rows['CRIME_DESC'])."&g=".$rows['FIR_DATE']."&od=".$rows['OFFICER_ID']."&cad=".urlencode($rows['STATUS'])."><i class='fas fa-eye manage_icons'></i></a></td>";?>;
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
            $(this).find("td:nth-child(1), :nth-child(2), :nth-child(3)").each(function () {
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
        alert('NO FIR's TO DISPLAY! ');
        </script>";
        exit();
    }
?>
 <!-- < ?php echo "<td><a href=updatefir.php?cdc=".$rows['FIR_NO']."&s=".$rows['STN_ID']."&cn=".urlencode($rows['C_NAME'])."&ct=".urlencode($rows['CRIME_TIME'])."&ca=".urlencode($rows['C_ADDRESS'])."&cs=".urlencode($rows['CRIME_SCENE'])."&cd=".urlencode($rows['CRIME_DESC'])."&ai=".urlencode($rows['I_NAME'])."&id=".urlencode($rows['I_ADDREESS'])."&nu=".$rows['NUMBER']."&g=".$rows['FIR_DATE']."&od=".$rows['OFFICER_ID']."&cad=".urlencode($rows['STATUS'])."><i class='fas fa-edit manage_icons'></i></a><a href=deletefir.php?fid=".$rows['FIR_NO']."><i class='fas fa-trash manage_icons'></i></a></td>";?>
                        < ?php echo "<td><a href=report.php?photo=".urlencode($rows['PHOTO'])."&cdc=".$rows['FIR_NO']."&s=".$rows['STN_ID']."&cn=".urlencode($rows['C_NAME'])."&ct=".urlencode($rows['CRIME_TIME'])."&ca=".urlencode($rows['C_ADDRESS'])."&cs=".urlencode($rows['CRIME_SCENE'])."&cd=".urlencode($rows['CRIME_DESC'])."&ia=".urlencode($rows['I_NAME'])."&id=".urlencode($rows['I_ADDREESS'])."&nu=".$rows['NUMBER']."&g=".$rows['FIR_DATE']."&od=".$rows['OFFICER_ID']."&cad=".urlencode($rows['STATUS'])."><i class='fas fa-eye manage_icons'></i></a></td>";?>; -->