<?php
include("connect.php");
echo "<br><br>";
if (isset($_GET['login'])){
    echo "New record created successfully";
}
if (!isset($_SESSION['users'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {            //Checking login credentials
        $email = strip_tags($_POST['email']);         //Checking Security
        $password = strip_tags($_POST['password']);

        $email = $serverconnect->real_escape_string($email);
        $password = $serverconnect->real_escape_string($password);


        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; e-mail and Password are compulsory!
    </div>";

        } else {
            $query = "SELECT * FROM users WHERE userid='" . $email . "' and password='" . $password . "'";
            $credentials = mysqli_query($serverconnect, $query);

            $userid = "";
            $currentuser = "";
            if (!$credentials || mysqli_num_rows($credentials) != 1) {
                echo "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid email or Password !
    </div>";
            } else {
                session_start();

                $reference = mysqli_fetch_array($credentials);
                $userid = $reference[0];
                $currentuser = $reference[1];
                $role = $reference[5];

                $_SESSION['role'] = $role;
                $_SESSION['firstname'] = $currentuser;
                $_SESSION['users'] = $userid;
                header('location:landing.php');
            }
        }
    }
}else{
    header('location:landing.php');
}
$serverconnect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Asar" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home</title>
</head>
<br><br>
<body class="freestyle">
<div class="free">
    <div class="row">
        <div class="col-md-11">
            <h3 id="first" align="center">Login</h3>

            <!-- Self-referencing form!-->
            <form class="form-horizontal" action="login.php" method="POST">
                <div class="form-group">
                    <input name="email" class="col-md-12 form-control" type="text" placeholder="E-mail"/>
                </div>
                <div class="form-group">
                    <input name="password" class="col-md-12 form-control" type="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input type="button" class="col-md-3 col-md-offset-5 btn" onclick="location.href='register.php'" value="Sign up"/>
                    <input type="submit" class="col-md-3 col-md-offset-1 btn btn-primary" value="Login"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>