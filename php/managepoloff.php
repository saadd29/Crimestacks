<?php
include_once "dbh.php";
$sql = "SELECT `OFF_ID`, `OFF_NAME`, `EMAIL`, `PH_NO`, `P_ADD`, `STN_ID` FROM policeofficer";
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
    <h2 class='table-heading'>POLICE RECORD</h2>
    <input type="text" id="search" name="search" placeholder="Search" autocomplete="off">
    </div>
    <tr>
      <td id="table-data">
      </td>
    </tr>
    <section class='display_table'>
        <table class='content-table'>
            
            <thead>
            
                <th>OFF ID</th>
                <th>OFFICER NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>ADDRESS</th>
                <th>STN ID</th>
                <th>MANAGE</th>
            
            </thead>
        <?php
            while($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $rows['OFF_ID'];  ?></td>
                    <td><?php echo $rows['OFF_NAME']; ?></td>
                    <td><?php echo $rows['EMAIL']; ?></td>
                    <td><?php echo $rows['PH_NO']; ?></td>
                    <td><?php echo $rows['P_ADD']; ?></td>
                    <td><?php echo $rows['STN_ID']; ?></td>
                    <?php echo "<td><a href=updatep.php?oid=".$rows['OFF_ID']."&oname=".urlencode($rows['OFF_NAME'])."&omail=".$rows['EMAIL']."&op=".$rows['PH_NO']."&oadd=".urlencode($rows['P_ADD'])."&snid=".$rows['STN_ID']."><i class='fas fa-edit manage_icons'></i></a><a href=deletep.php?oid=".$rows['OFF_ID']."><i class='fas fa-trash manage_icons'></i></a></td>";?>
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
    window.location.href='admindash.php';
    alert('NEED TO RECRUIT OFFICERS URGENTLY!!! ');
    </script>";
    exit();
}
?>
<!--<td><a href="updatep.php?oid='php echo $rows['OFF_ID'];?>'"><i class="fas fa-edit manage_icons"></i></a><a href='deletep.php?value= "php $rows['OFF_ID'];?>"'><i class="fas fa-trash manage_icons"></i></a></td>-->