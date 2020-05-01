<?php
include("connect.php");
session_start();
include "nav.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Grouping</title>
</head>
<body class="container-fluid">
<div class="row">
    <br><br><br><br><br>
    <div class="col-md-4 col-md-offset-3">
        <h3 align="center">GROUP ALLOCATION</h3>
        <form class="form-horizontal" method="post" action="groupingexe.php">
            <?php
            if (!isset($_GET['groups'])) {
                echo "<div><br>";
                $ct = 1;
                $dbquery2 = "SELECT * FROM `groups`";
                $result2 = mysqli_query($serverconnect, $dbquery2);
                echo '<table width="100%" border="0" cellpadding="1" cellspacing="1" class="box">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="text-align: center">Group Name</th>
                        <th>Number of Student</th>
                        <th>Delete Group</th>
                    </tr>
                    </thead>';
                echo '<tbody>';
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<tr>
                        <th scope="row">' . $ct . '</th>
                        <td><a href="">';
                    echo "<a href='grouping.php?s=" . $row2['userid'] . "' class='list-group-item'style=\"text-align: center\">" . $row2['group_name'] . "</a>";
                    echo "<td><a href='#' class='list-group-item'style=\"text-align: center\">";
                    $dbquery2x3x = "SELECT * FROM `groups` where group_id='{$row2['userid']}'";
                    $result2x3x = mysqli_query($serverconnect, $dbquery2x3x);
                    echo mysqli_num_rows($result2x3x);
                    echo "</td>";
                    echo "<td><a href='deletecrs.php?g=" . $row2['userid'] . "' class='list-group-item'style=\"text-align: center\">Delete</a>";
                    echo "</a></td></tr>";

                    $ct++;
                }
                echo '</tbody></table>';

                echo "</div>";
                echo "<br>Select a group to start.";
                exit;
            } else {
                ?>
                <?php
                $nxx = $_GET['groups'];
                ?>
                <?php
                echo "<div>";
                $nxx = $_GET['groups'];
                $ct = 1;
                $dbquery2 = "SELECT * FROM `groups`";
                $result2 = mysqli_query($serverconnect, $dbquery2);
                echo '<table width="100%" border="0" cellpadding="1" cellspacing="1" class="box">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="text-align: center">Group Name</th>
                        <th>Number of Student</th>
                        <th>Delete Group</th>
                    </tr>
                    </thead>';
                echo '<tbody>';
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<tr>
                        <th scope="row">' . $ct . '</th>
                        <td><a href="">';
                    echo "<a href='grouping.php?s=" . $row2['userid'] . "' class='list-group-item'style=\"text-align: center\">" . $row2['group_name'] . "</a>";
                    echo "<td><a href='#' class='list-group-item'style=\"text-align: center\">";
                    $dbquery2x3x = "SELECT * FROM `groups` where group_id='{$row2['userid']}'";
                    $result2x3x = mysqli_query($serverconnect, $dbquery2x3x);
                    echo mysqli_num_rows($result2x3x);
                    echo "</td>";
                    echo "<td><a href='deletecrs.php?g=" . $row2['id'] . "' class='list-group-item'style=\"text-align: center\">Delete</a>";
                    echo "</a></td></tr>";

                    $ct++;
                }
                echo '</tbody></table>';
                echo "</div>"; ?>


                <?php
                $ct = 1;
                $dbquery2 = "SELECT * FROM `groups` where group_id='$nxx'";
                $result2 = mysqli_query($serverconnect, $dbquery2);
                $sqd8 = "SELECT group_name FROM groups where userid = '$nxx'";
                $q8 = mysqli_query($serverconnect, $sqd8);
                $rowd = mysqli_fetch_assoc($q8);
                echo "<h4>" . "{$rowd['group_name']}" . "</h4>";
                echo '<table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Student ID</th>
                    </tr>
                    </thead>';
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo '<tbody>';
                    $gh = $row2['userid'];
                    $dbquery23 = "SELECT * FROM `users` where userid='$gh'";
                    $result23 = mysqli_query($serverconnect, $dbquery23);
                    $row23 = mysqli_fetch_assoc($result23);
                    echo '<tr>
                        <td>';
                    echo "{$row23['firstname']}";
                    echo '</td>
                        <td>';
                    echo "{$row23['lastname']}";
                    echo '</td>
                        <td>';
                    echo "{$row2['userid']}";
                    echo '</td>
                    </tr>
                    </tbody>';
                }
                echo '</table>';
            } ?>

            <div class="form-group">
                <form>
                    <select class='col-md-12 form-control' name="std[]" multiple>
                        <option>Make use of control & select to choose multiple students</option>
                        ;
                        <?php
                        $ss = "student";
                        $sqd9 = "SELECT userid FROM users WHERE role = '{$ss}'";
                        $q9 = mysqli_query($serverconnect, $sqd9);
                        print_r(mysqli_fetch_assoc($q9));
                        while ($rowen = mysqli_fetch_assoc($q9)) {
                            echo "<option class='list-group-item'  value='{$rowen['userid']}'>{$rowen['userid']}</option>";
                        }
                        ?>
                    </select>
                    <INPUT type="hidden" name="grp" value="<?php echo $nxx; ?>"/>
                    <span class="glyphicon glyphicon-cloud-upload col-md-1 col-md-offset-7" aria-hidden="true"></span>
                    <input type="submit" class="col-md-4 btn btn-primary" style="float: right" value="Add to Group"/>
            </div>
        </form>

    </div>
</div>
<?php include "footer.php" ?>
</body>
</html>
