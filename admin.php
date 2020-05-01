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
<br><br><br><br><br>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">

        <?php

        if (isset($_SESSION['success'])) {
            echo "<span style=\\" . $_SESSION['success'] . "</#44ff00>";
            unset($_SESSION['success']);
        }
        if (isset($_SESSION['failed'])) {
            echo "<span style=\\" . $_SESSION['failed'] . "</#0022ff>";
            unset($_SESSION['failed']);
        }

        ?>

        <legend>Coursework Setup</legend>

        <form class="form-horizontal" method="post" action="adminexe.php" enctype="multipart/form-data">
            <div class="form-group">
                <?php $sqd7 = "SELECT coursecode, coursename FROM `courses`";
                $q6 = mysqli_query($serverconnect, $sqd7);
                echo "  <select class=\"col-sm-12 form-control\" name='course'>";
                while ($rown = mysqli_fetch_assoc($q6)) {
                    echo "<option value='{$rown['coursecode']}'>{$rown['coursecode']}" . ":" . "{$rown['coursename']}" . "</option>";
                }
                echo " </select>";

                ?>
            </div>
            <div class="form-group">
                <label for="crsttle">Coursework Title:</label>
                <input name="crsttle" class="col-sm-12 form-control" type="text" placeholder="Enter Coursework Title"/>
            </div>
            <div class="form-group">
                <label for="crswrk">Coursework Description:</label>
                <textarea name="crswrk" class="col-sm-12 form-control" rows="5" cols="25"
                          placeholder="Describe The Coursework"></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Submission Deadline:</label>
                <input name="deadline" class="col-sm-12 form-control" type="date" placeholder=""/>
            </div>
            <div class="form-group">
                <span class="glyphicon glyphicon-cloud-upload col-sm-1 col-sm-offset-7" aria-hidden="true"></span>
                <input type="submit" class="col-sm-4 btn btn-primary" value="Upload"/>
            </div>
    </div>
</div>
<?php include "footer.php" ?>
</body>
</html>