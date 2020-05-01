<?php
include("connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

/**if(isset($_SESSION['success'])){
 * echo "<font color='blue'>".$_SESSION['success']."</font>";
 * unset($_SESSION['success']);
 * }
 **/
if (isset($_SESSION['failed']) && ($_SESSION['role'] == "student")) {
    echo "<span style=\"color: red; \">" . $_SESSION['failed'] . "</span>";
    unset($_SESSION['failed']);
}
if ($_SESSION['role'] == "student") {
    $userid = $_SESSION['users'];
    $userFN = $_SESSION['firstname'];
    echo $userid;
    if (isset($_FILES) && isset($_POST['feedback'])) {
        $title = $_POST['title'];
        $texta = $_POST['feedback'];
        $file = $_FILES['novel'];
        //file properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
//        $content = addslashes(file_get_contents($_FILES['novel']['tmp_name']));
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file = rand(1000, 100000) . "-" . $_FILES['novel']['name'];
        //Work out the file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
        $allowed = array('txt', 'docx', 'jpeg', 'jpg', 'pdf');
        if (in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 2007152) {
                    $file_name_new = $file;
                    //uniqid('', true) . '.' . $file_ext;
                    $file_destination = 'submitted/' . $file_name_new;
                    $query = "SELECT * FROM uploads WHERE userid='$userid' and courseworktitle='$title'";
                    $result = mysqli_query($serverconnect, $query);
                    if (mysqli_num_rows($result) == 0) {
                        $query1 = "INSERT INTO uploads (userid,texta,type,courseworktitle,name,fileloc) VALUES ('$userid','$texta','$file_ext','$title','$file_name_new','$file_destination')";
                        $result1 = mysqli_query($serverconnect, $query1);
                        echo "<font color='blue'>" . "File saved to " . $file_destination . "</font>";
                        move_uploaded_file($file_tmp, $file_destination);
                    } else {
                        echo "<font color='red'>" . "One submission is allowed!" . "</font>";
                    }
                }
            }
        } else {
            $_SESSION['failed'] = "Please use valid file type";
            //header('location:courseWork.php');
        }
    } elseif (isset($_POST['feedback'])) {
        $title = $_POST['title'];
        $texta = $_POST['feedback'];
        $query = "SELECT * FROM uploads WHERE userid='$userid' and courseworktitle='$title'";
        $result = mysqli_query($serverconnect, $query);
        if (mysqli_num_rows($result) == 0) {
            $query1 = "INSERT INTO uploads (userid,texta,courseworktitle) VALUES ('$userid','$texta','$title')";
            $result1 = mysqli_query($serverconnect, $query1);
            echo "<font color='blue'>" . "Submission successful" . "</font>";
        } else {
            $_SESSION['failed'] = "<font color='red'>" . "One entry is allowed" . "</font>";
        }
    } else {
        $_SESSION['failed'] = "Include Report!";
        //header('location:courseWork.php');
    }
} ?>

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
<?php include "nav.php" ?>
<br><br><br><br><br>
<fieldset>
    <?php if (!empty($_SESSION["role"]) && isset($_SESSION["student"])) {
        echo "<legend><h3>" . $userFN . "_" . $userid . "</h3>";
        echo "<table width='80%' border='1'>
        <tr>
            <td>Coursework Title</td>
            <td>Report</td>
            <td>File Name</td>
            <td>View</td>
            <td>Delete</td>
        </tr>";
        $view = "SELECT * FROM uploads WHERE userid='$userid'";
        $show = mysqli_query($serverconnect, $view);
        while ($row = mysqli_fetch_array($show)) {
            echo "<tr><td>" . $row['courseworktitle'] . " </td> ";
            echo "<td>" . $row['texta'] . " </td> ";
            echo "<td> " . $row['name'] . "</td> ";
            echo "<td><a href=\"submitted/" . $row['name'] . " \" target=\"_blank\">view file</a></td>";
            echo "<td>
              <a href='deletecrs.php?y=" . $row['courseworktitle'] . "'>Delete</a>
            </td>";
        }
        echo "</tr></table></legend>";
    } else { echo "<legend align='center'><h3>All Submissions</h3>";
        echo "<table class=\"table\">
        <tr>
            <td>S/No</td>
            <td>Coursework Title</td>
            <td>Student ID</td>
            <td>Report</td>
            <td>Supporting Documents</td>
            <td>Delete</td>
        </tr>";
        $counter = 1;
        $adm = "SELECT * FROM uploads ";
        $lec = mysqli_query($serverconnect, $adm);
        while ($displ = mysqli_fetch_assoc($lec)) {
            echo "<tr><td>" . $counter++ . " </td > ";
            echo "<td><a href='viewspec.php?=" . $displ = (isset($_GET['userid'])) . "'>" . $displ=(isset($_GET['courseworktitle'])) . " .</a></td>";
            echo "<td>" . $displ = (isset($_GET['userid'])) . " </td > ";
            echo "<td > " . $displ= (isset($_GET['texta'])) . "</td > ";
            if (empty($displ['name'])) {
                echo "<td >None</a></td>";
            } else {
                echo "<td ><a href = \"submitted/" . $displ['name'] . " \" target=\"_blank\">view file</a></td>";
            }
            echo "<td>
              <a href='deletecrs.php?y=" . $displ = (isset($_GET['courseworktitle'])). "'>Delete</a>
            </td>";
        }
        echo "</tr></table></legend>";
    } ?>
    <?php include "footer.php" ?>
</fieldset>
</body>
</html>
