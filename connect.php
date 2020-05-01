<?php
//Local server//
 {
    $connectstr_dbhost = "localhost";
    $connectstr_dbname = "cmm007";
    $connectstr_dbusername = "root";
    $connectstr_dbpassword = "";
}

$serverconnect = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);
if(!$serverconnect){
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;

}
else{echo "<header class=\"col-md-12\" style='background-color:; color:maroon; font-size: 25px; font-style:italic; position: initial'>Hello</header>";}
?>
