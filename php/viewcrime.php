<?php
include_once "dbh.php";
$sql = "SELECT * FROM `crime`";
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
        <h2 class='table-heading'>CRIME CATEGORIES</h2>
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
                <th>DESCRIPTION</th>
            </thead>
        <?php
            while($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $rows['CRIME_ID'];  ?></td>
                    <td><?php echo $rows['CRIME_NAME']; ?></td>
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
    window.location.href='policedash.php';
    alert('No Crime Categories! ');
    </script>";
    exit();
}
?>
<!-- <td><a href=""><i class="fas fa-edit manage_icons"></i></a><a href=""><i class="fas fa-trash manage_icons"></i></a></td> -->