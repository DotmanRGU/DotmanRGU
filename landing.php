<?php
include("connect.php");
session_start();
$sid = (isset($_SESSION['username']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Dashboard</title>
</head>
<body class="container-fluid">

<?php include "nav.php" ?>
<?php
echo "<br><br><br><br><br>";
echo "<h4>" . "Hello" . isset($_SESSION['student']);  "<h4>";
echo "Access Level: " . isset($_SESSION['role'])
?>

<?php
//Checking for user role

echo '<span class="glyphicon glyphicon-list col-md-4 col-md-offset-5" aria-hidden="true"></span>
            <div class="col-md-8 col-md-offset-2">
            <h3 align="center">Coursework Details</h3>';
$dbquery = "SELECT * FROM courses";
$result = mysqli_query($serverconnect, $dbquery);
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><class="list-group-item active">' . $row['coursecode'].': '.$row['coursename']. '</a></div>';

    echo getCourseTitle($row['coursecode']);
}

function getcoursetitle($cid)
{
    global $serverconnect;
    $msg = "";
    $dbqueryx = "SELECT title FROM assignment WHERE coursecode ='$cid'";
    $resultx = mysqli_query($serverconnect, $dbqueryx);
    $msg .= '<div class="list-group">';
    while ($rowx = mysqli_fetch_assoc($resultx)) {
        $msg .= "<a href='courseWork.php?t=" . $rowx['title'] . "' class='list-group-item'>" . $rowx['title'] . "</a>";
    }
    $msg .= "</div></div>";
    return $msg;
}

if (mysqli_num_rows($result) === 0) {
    echo '<div class="list-group">' . "There is currently no coursework for you." . '</div>';
}
?>

<?php include "footer.php" ?>

</body>
</html>