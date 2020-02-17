<?php
/**
 * Created by PhpStorm.
 * User: Helen Harle
 * Date: 15/02/2020
 * Time: 16:40
 */
$loginMessage = null;
if (isset($_SESSION['firstName'])) {
    $loginMessage = "<span>Welcome:   ". $_SESSION['firstName'] ."    </span>";
    $loginMessage .= "<span><a href='../logout.php'>Logout</a></span>";
}