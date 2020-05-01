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
    <title>Peer Assessment</title>
</head>

<body class="container-fluid">
<?php include "nav.php";
if (isset($_GET['title'])) {
    echo "<br><br><br>";
        $title = $_GET['title'];
    if (isset($_SESSION['failed'])) {
        echo "<span style=\\" . $_SESSION['failed'] . "</#0004ff>";
        unset($_SESSION['failed']);
    }
} else {
    header('location:landing.php');
}
?>
<div class="row">
    <br><br>    <!--    <span class="glyphicon glyphicon-user col-md-4 col-md-offset-5" aria-hidden="true" ></span>!-->
    <div class="col-md-6 col-md-offset-3">
        <h3 align="center">Peer Assessment & Feedback</h3>

        <form class="form-horizontal">
            <fieldset>
                <legend>Coursework Details</legend>

                <div class="container">
                    <div class="form-group row">
                        <label for="inputTitle" class="col-md-8 col-form-label">title: <?php echo $title ?></label>
                    </div>
                    <?php $sqd3 = "SELECT * FROM assignment WHERE title ='$title' ";
                    $res1 = null;
                    $q4 = mysqli_query($serverconnect, $sqd3);
                    if (mysqli_num_rows($q4) == 1) {
                        $res1 = mysqli_fetch_assoc($q4);
                    }
                    ?>
                    <div class="form-group row">
                        <label for="descr"
                               class="col-md-8 col-form-label">Description: <?php echo $res1['description'] ?></label>
                    </div>
                    <div class="form-group row">
                        <label for="subm" class="col-md-8 col-form-label">Submission Deadline: <?php echo $res1['submissiondate'] ?></label>
                    </div>
            </fieldset>
        </form>

        <?php if (!empty($_SESSION["role"]) && isset($_SESSION["student"])) {
            echo '<form class="form-horizontal" action="submit.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Feedback Details</legend>
                <div class="form-group">
                <input type="hidden" name="title" value="' . $title . '"/>
                    <label for="feedback">Student Feedback:</label>

                    <textarea class="form-control" rows="5" name="fdback"
                              placeholder="Please enter your feedback here"></textarea>
                </div>
                <div class="form-group">
                    <label for="group">Supporting Document:</label>
                    <input name="novel" class="col-md-12 form-control" type="file" placeholder="Upload Supporting Document"/>
                </div>
                <div class="form-group">
                    <span class="glyphicon glyphicon-floppy-open col-md-1 col-md-offset-6" aria-hidden="true"></span>
                    <input type="submit" class="col-md-5 btn btn-primary" value="Submit"/>
                </div>
            </fieldset>
        </form>';
        } ?>
    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>