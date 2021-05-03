<?php
include_once "dbh.php";
$sql = "SELECT * FROM `station`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
<html>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <body class='abc'>
    <div class='top_div'>
    <form action="admindash.php" method="post">
    <button  type=submit class="button" >Dashboard</button>
    <h2 class='table-heading'>STATION RECORD</h2>
    <input type="text" id="search" name="search" placeholder="Search" autocomplete="off">
    </div>
    <tr>
      <td id="table-data">
      </td>
    </tr>
    <section class='display_table'>
        <table class='content-table'>
            <thead>
                <tr>
                    <th>STATION ID</th>
                    <th>STATION NAME</th>
                    <th>OFFICERS</th>
                    <th>CRIMINALS</th>
                    <th>MANAGE</th>
                    <!-- <th>VIEW</th> -->
                </tr>
            </thead>
        <?php
            while($rows = mysqli_fetch_assoc($result)) {
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $sid=$rows['STN_ID']; ?></td>
                        <td><?php echo $rows['STN_NAME']; ?></td>
                        <?php $abc="SELECT * FROM `station`,`policeofficer`WHERE station.STN_ID=$sid and policeofficer.STN_ID =station.STN_ID";
                        $resultc = mysqli_query($conn,$abc);
                         $ro1 = mysqli_num_rows($resultc);?>
                        <td><?php echo $ro1; ?></td>
                         <?php $abcd="SELECT * FROM `criminal`,`pos` WHERE  pos.STN_ID=$sid and criminal.OFF_ID = pos.OFFID";
                         $resultcc = mysqli_query($conn,$abcd);
                         $ro2 = mysqli_num_rows($resultcc);?>
                        <td><?php echo $ro2; ?></td>
                        <?php echo "<td><a href=updateps.php?sid=".$rows['STN_ID']."&sname=".urlencode($rows['STN_NAME'])."><i class='fas fa-edit manage_icons'></i></a><a href=deleteps.php?sid=".$rows['STN_ID']."><i class='fas fa-trash manage_icons'></i></a></td>";?>
                        <!-- < ?php echo "<td><a href=viewposstn.php?sid=".$rows['STN_ID']."><i class='fas fa-eye manage_icons'></i></a></td>";?> -->
                    </tr>
                </tbody>
        <?php
        }
        ?>
        <table>
    </section>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $("#search").keyup(function () {
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function (index) {
            if (!index) return;
            $(this).find("td:nth-child(1), :nth-child(2)").each(function () {
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
    window.location.href='admindash.php';
    alert('NO CRIMINALS TO DISPLAY!...GOOD JOB! ');
    </script>";
    exit();
}
?>
<!--php echo "<td><a href=updateps.php?sid=".$rows['STN_ID']."><i class='fas fa-edit manage_icons'></i></a><a href=deleteps.php?sid=".$rows['STN_ID']."><i class='fas fa-trash manage_icons'></i></a></td>";?>-->
<!--<td><a href=""><i class="fas fa-edit manage_icons"></i></a><a href=""><i class="fas fa-trash manage_icons"></i></a></td>-->