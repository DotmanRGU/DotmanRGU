<?php
session_start();

if (!isset($_SESSION['firstname'])) {
    header("Location: login.php");
} else if (isset($_SESSION['firstname'])!="") {
    header("Location: login.php");
}

if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['firstname']);
    header("Location: login.php");
}