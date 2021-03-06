<?php
session_start();
// THIS IS AN INCLUDE AS THIS LITTLE PIECE OF CODE WILL BE USED REPEATEDLY IN MOST PAGES
// ONCE A USER IS SUCESSFULLY LOGED IN THEY RETURN TO THE WELCOME PAGE AND WILL THEN HAVE OPTION TO LOGOUT
include("../Includes/CommonPageComponents/welcomefirstname&logout.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ELC Company Welcome Page</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="CSS/Colours.css">
</head>

<body>

<!--Header Start-->
<header>
    <!-- If logged in Displays the user name & logout option -->
    <?php echo $loginMessage; ?>
    <a href="Welcome_Page.php"> <img id="elc" src="IMAGES/Header/doglogo.png"  alt="ELC COMPANY LOGO"/></a>

    <h1>EVERYONE LEARNING CENTER</h1>
    <!--Selection Option Start-->

    <!--Selection Option End-->
    <nav id="main">
        <ul>
            <li><a href="../Login.php">Login or Create account</a></li>
            <li><a href="#">Upload Tasks </a></li>
            <li><a href="#">Support</a></li>
            <!--            <selection>-->
            <!--                <label for="Support"></label>-->
            <!--                <select name="Support" id="">-->
            <!--                    <option value="">Support</option>-->
            <!--                    <option value="technical problem">Technical Problem</option>-->
            <!--                    <option value="hardware problem">Hardware Problem</option>-->
            <!--                    <option value="software problem">Software Problem</option>-->
            <!--                    <option value="others">Others</option>-->

            <!--                </select>-->
            <!--            </selection>-->
        </ul>
    </nav>
    <a href="#"> <img id="account" src="IMAGES/Header/create.png" alt="account"/></a>
    <a href="../Login.php"> <img  id="login" src="IMAGES/Header/login.png" alt="LoginIcon"/></a>

</header>
<!--Header End-->
<!--Main Start-->

<main class="grid-container">

    <img id="welcome"  src="IMAGES/Main/welcome.gif"  alt="Welcome gif"/>
    <h3>Sliding Welcome Page Picture</h3>
    <!--Video Link question mark-->


    <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/aXI_hdCddNQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3>Watch Our Welcome Video to getting started</h3>

</main>
<!--Main End-->
<!--Footer Start-->
<footer>
    <!--Navigation Start for the Footer-->
    <nav id="menu">
        <ul>
            <li><a href="Welcome_Page.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Our Service</a></li>
            <li><a href="#">More</a></li>
        </ul>
    </nav>
    <!--Navigation End for the Footer-->
    <nav id="social">
        <ul>
            <li><a href="https://www.facebook.com/"><img id="facebook" src="IMAGES/Footer/Facebook.png" width="100"/></a></li>
            <li><a href="https://twitter.com"><img id="twitter" src="IMAGES/Footer/Twitt.png" width="100" /></a></li>
            <li><a href="https://www.youtube.com/"><img id="youtube" src="IMAGES/Footer/youtube.png" width="100"/></a></li>
            <li><a href="https://www.instagram.com"><img id="instagram" src="IMAGES/Footer/instagram.png" width="100"/></a></li>
        </ul>
    </nav>
</footer>
<!--Footer End-->
</body>
</html>