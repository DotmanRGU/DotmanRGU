<?php
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Administrator Page</title>
</head>
<body class="container-fluid">
<?php include "nav.php" ?>
<div class="row">
    <br><br><br><br>
    <div class="col-sm-6 col-sm-offset-3">
        <h3 align="center">Delete Coursework</h3>
        <legend>Coursework Setup</legend>

        <div>
            <?php
            $ct = 1;
            $dbquery2 = "SELECT * FROM `assignment`";
            $result2 = mysqli_query($serverconnect, $dbquery2);
            echo '<table width="100%" border="0" cellpadding="1" cellspacing="1" class="box">
    <thead>
    <tr>
        <th>#</th>
        <th style="text-align: center">Coursework Name</th>
        <th>Delete Coursework</th>
    </tr>
    </thead>';
            while ($row2 = mysqli_fetch_assoc($result2)) {
                echo '<tbody>
    <tr>
        <th scope="row">' . $ct . '</th>
        <td><a href="">';
                echo "<a href='courseWork.php?title=" . $row2['title'] . "' class='list-group-item'style=\"text-align: center\">" . $row2['title'] . "</a>";
                echo "<td><a href='deletecrs.php? assigment=" . $row2['a_id'] . "' class='list-group-item'style=\"text-align: center\">Delete</a>";
                echo "</a></td>
            </tr>";

                $ct++;
            }
            echo '</tbody></table>';
            ?>
        </div>
<?php include "footer.php" ?>
</body>
</html>