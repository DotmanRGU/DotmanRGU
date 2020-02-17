<?php
/**
 * Created by PhpStorm.
 * User: Helen Harle
 * Date: 13/02/2020
 * Time: 19:36
 */
$feedback = null;
session_start();

// includes
include("Includes/Databases/db-connect.php");
include("Includes/Databases/user.php");

// First time the app is used there may not be a User DB table
createUserTableIfNeeded($db);

// Attempt to find admin user, create is required
$result = getUserData($db, 1000000);
if ($result['firstName'] == null) {
    createUser($db, "Lex", "Harle", "lex@lex-associates.com", "woofwoof");
}

// CHECK IF USER ATTEMPTED A LOGIN

if(isset($_POST['signin'])) {
    // Will either redirect out of this page or will give feedback
    $userID = trim($_POST['userID']);
    $password = trim($_POST['password']);
    // Check for user login
    if (checkUserLogin($db,$userID, $password) !== null) {
        $result = getUserData($db, $userID);
        $db->close();
        $_SESSION['userID'] =$result{'userID'};
        $_SESSION['firstName'] = $result{'firstName'};
        $_SESSION['lastName'] = $result{'lastName'};
        $_SESSION['email'] = $result{'email'};

        // Redirect to Welcome screen
        header('Location: Welcome Page/Welcome_Page.php');
    }
    $feedback .= "Email and password did not match. <br />Or you are not registered as a 'user' and need to contact your administrator.  <br />";
}

// USER NOT REDIRECTED SO SHOW FORM AND ANY FEEDBACK

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ELC Login Screen</title>
    <link rel="stylesheet" href="Assets/CSS/login.css">
</head>
<body>
    <?php include("Includes/CommonPageComponents/header.php"); ?>
    <main>
        <!-- Styling centers main within body and centralises the contents of main horizontally -->
        <section class="vertical-center">  <!-- Styling will centralise content vertically - between this and the main styling the content should be horizontally and vertically centred in main -->
            <!-- styling needs inserting-->
            <div class="column">
                <h2>Existing User</h2>
                <h2> Sign into your account</h2>
                <form action="" method="post">
                    <p><label for="userID">Your ELC ID</label><input type="number" name="userID" min="1000000" max="9000001" id="userID" value="1000001" required/><br /></p>
                    <p><label for="password">Password</label><input type="password" name="password" minlength="8" maxlength="16" =value="" id="password" required/><br /></p>

                    <!--    <p><input type ="checkbox" id="remember" name="remember" value="remember"><label for="remember">Keep me signed in</label><a href="./forgottenpassword.php" target=""blank"> Forgotten Password</a></p> -->
                    <p><input type="submit" name="signin" value="Sign in" /><br /></p>
                </form>
            </div>
            <div class="column">
                <?php if ($feedback != '') echo '<p id="feedback">' . $feedback . '</p>' ?>
            </div>
        </section>
    </main>
    <?php include("Includes/CommonPageComponents/footer.php"); ?>
</body>
</html>
