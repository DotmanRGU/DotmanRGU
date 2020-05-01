<?php
include("connect.php");
if(isset($_GET['groups'])){
    $tag=$_GET['groups'];
   echo $tag;
    $act = "DELETE FROM `groups` WHERE `groups`.`userid` = '$tag'";
    echo $act."<br/>";
    if (mysqli_query($serverconnect, $act)) {
        echo "Deleted successfully";

  //      header("location:group.php");
    } else {
        echo "Unable to complete request";
    }

    session_write_close();
   header("location:group.php");
    exit;
}
if(isset($_GET['assignmnet'])){
    $tag=$_GET['assignmnet'];
    echo $tag;

    $act = "DELETE FROM `assignment` WHERE `assignment`.`a_id` = $tag";
    echo $act."<br/>";
    if (mysqli_query($serverconnect, $act)) {
        echo "Deleted successfully";

        header("location:crsremove.php");
    } else {
        echo "unable to complete request";
    }
    session_write_close();
  header("location:crsremove.php");
    exit;
}


$targe=$_GET['y'];
echo $act;
    $action = "DELETE FROM `uploads` WHERE courseworktitle='$act'";
    $remov = mysqli_query($serverconnect, $action);

     if (mysqli_query($serverconnect, $remov)) {
         echo "Deleted successfully";

         header("location:submit.php");
     } else {
        echo "Unable to complete request";
     }

     session_write_close();
header("location:submit.php");
exit;
