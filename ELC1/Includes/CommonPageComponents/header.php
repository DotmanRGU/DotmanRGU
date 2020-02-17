<?php
/**
 * Created by PhpStorm.
 * User: Helen Harle
 * Date: 13/02/2020
 * Time: 22:06
 */

$loginMessage = null;
if (isset($_SESSION['firstName'])) {
    $loginMessage = "<span>Welcome:   ". $_SESSION['firstName'] ."</span>";
    $loginMessage .= "<span><a href='logout.php'>Logout</a></span>";
}


?>
<header>
    <!--Need to replace ELC.PNG-->
    <img src="Assets/images/doglogo.png" alt="ELC Logo" id="logo"/>
    <h1>Your ELC ID lets you log into your learning from anywhere. You can store all your certificates and results in one place and share your achievements with your employer</h1>
    <?php echo $loginMessage; ?>
</header>

