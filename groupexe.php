<?php
session_start();
include_once 'connect.php';
$coursetitle = $_POST['coursetitle'];


$grp = $_POST['groups'];

$sql = "INSERT INTO groups(group_name,a_id) VALUES ('$coursetitle','$grp')";

if (mysqli_query($serverconnect, $sql)) {
    $_SESSION['success'] = "New record has been created";

    header("Location: group.php");
} else {
    $_SESSION['failed'] = "Request not completed";
}

session_write_close();
header("location:group.php");
exit;

