<?php
include_once "dbh.php";
$sql = "SELECT * FROM `criminallog` ORDER BY 'NO.' ";
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
        <h2 class='table-heading'>CRIMINAL LOG</h2>
        <input type="text" id="search" name="search" placeholder="Search" autocomplete="off">
        </div>
    <tr>
      <td id="table-data">
      </td>
    </tr>
        <section class='display_table'>
        <table class='content-table'>
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>OFFID</th>
                <th>STNID</th>
                <th>FIRNO</th>
                <th>DATE</th>
            </thead>
        <?php
            while($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $rows['NO.'];  ?></td>
                    <td><?php echo $b=$rows['CRIMINAL_ID']; ?></td>
                    <?php 
                    $ab=$rows['FIRNO'];
                    $sql = "SELECT C_NAME FROM `fir` where fir.FIR_NO=$ab ";
                    $resu = mysqli_query($conn, $sql);
                    $rom = mysqli_fetch_assoc($resu);?>
                    <td><?php echo $rom['C_NAME']; ?></td>
                    <td><?php echo $rows['AGE']; ?></td>
                    <td><?php echo $rows['GENDER'];  ?></td>
                    <td><?php echo $rows['ADDRESS']; ?></td>
                    <td><?php echo $of=$rows['OFFID'];  ?></td>
                    <?php
                    $sq="SELECT STN_ID FROM `pos` where OFFID=$of ";
                    $res = mysqli_query($conn, $sq);
                    $r = mysqli_fetch_assoc($res);?>
                    <td><?php echo $r['STN_ID'];  ?></td>
                    <td><?php echo $rows['FIRNO'];  ?></td>
                    <td><?php echo $rows['DATE']; ?></td>
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
            $(this).find("td:nth-child(2), :nth-child(3)").each(function () {
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
    alert('No entries! ');
    </script>";
    exit();
}
?>
