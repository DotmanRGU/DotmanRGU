<?php
/**
 * Created by PhpStorm.
 * User: Helen Harle
 * Date: 15/02/2020
 * Time: 14:43
 */

session_start();
session_destroy();

// Redirect to Welcome screen
header('Location: Welcome Page/Welcome_Page.php');