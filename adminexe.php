<?php
session_start();
include_once 'connect.php';
$courses = $_POST['courses'];
$coursetitle = $_POST['coursetitle'];
$coursework = $_POST['coursework'];
$deadline = $_POST['deadline'];


$a_id = rand(100, 999);
$sql = "INSERT INTO assignment (a_id, description, submissionaate, title, coursecode) VALUES ('$a_id','$coursework','$deadline','$coursetitle','$courses')";

if (mysqli_fetch_assoc($serverconnect, $sql)) {
    $_SESSION['success'] = "New record created successfully";

    header("Location: admin.php");
} else {
    $_SESSION['failed'] = "Error: " . $sql . "<br>" . mysqli_error($serverconnect);
}

session_write_close();
header("location:admin.php");
exit;
