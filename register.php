<?php
include('connect.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
       if( $_POST['password1'] && $_POST['role']!="neutral") {
         $userid= $_POST['userid'];
         $firstname= $_POST['firstname'];
         $lastname= $_POST['lastname'];
         $email= $_POST['email'];
         $password1= password_hash($_POST['password1'], PASSWORD_DEFAULT);
         $role=  $_POST['role'];

         $sql= "INSERT INTO users (userid, firstname, lastname, email, password1, role) VALUES ('$userid','$firstname','$lastname','$email','$password1','$role')";

           if (mysqli_query($serverconnect, $sql)) {
               header("Location: login.php");
           } else {
               echo "Error: " . $sql . "<br>" . mysqli_error($serverconnect);
           }
       }
       else{
            echo "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Please use correct details!
    </div>";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>
<body class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <h3 align="center">Register</h3>
            <form class="form-horizontal" action = "register.php" method="POST" <?php $_SERVER['PHP_SELF']?>>
                <div class="form-group">
                    <input name="username"   class="col-md-12 form-control" type="text" placeholder="e.g Username" />
                </div>
                <div class="form-group">
                    <input name="firstname"   class="col-md-12 form-control" type="text" placeholder="Firstname" />
                </div>
                <div class="form-group">
                    <input name="lastname"   class="col-md-12 form-control" type="text" placeholder="Lastname" />
                </div>
                <div class="form-group">
                    <input name="email"   class="col-md-12 form-control" type="email" placeholder="Email" />
                </div>
                <div class="form-group">
                    <input name="password1" class="col-md-12 form-control" type="password" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <label>
                        <select class="col-md-12 form-control" style="width: 100%" name="role">
                            <option value="neutral">Select Role</option>
                            <option value="student">Student</option>
                            <option value="administrator">Admin</option>
                        </select>
                    </label>
                </div>
                <div class="form-group">
<!--<span class="glyphicon glyphicon-cog col-md-1 col-md-offset-7" aria-hidden="true" ></span>!-->
                    <input type="submit" class="col-md-4 btn btn-primary"  value="Sign up"/>
                </div>
            </form>
            <span>Already have an account? <a href="login.php">Login</a></span>
        </div>
    </div>
</body>
</html>