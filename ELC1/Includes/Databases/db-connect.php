<?php
/**
 * Created by PhpStorm.
 * User: Helen Harle
 * Date: 15/02/2020
 * Time: 12:25
 */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', '1813047');
define('DB_PASSWORD', '1813047');
define('DB_DATABASE', 'db1813047_database');
$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    $feedback .= '<p>Error: Could not connect to database. Please try again later.</p>';
    exit;
}