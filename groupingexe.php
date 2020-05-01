<?php
session_start();
include_once 'connect.php';
$std= $_POST['student'];

$grp= $_POST['groups'];

foreach ($std as $val){
    $sql= "INSERT INTO groups(userid,group_id) VALUES ('$val','$grp')";
    mysqli_query($serverconnect, $sql);
}

header("location:grouping.php?s=".$grp);exit;