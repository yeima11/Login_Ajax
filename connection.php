<?php
// Variable declaration
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_school"; 

// Create connection
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($connection) {
    // echo "Connection Successful!";
} else {
    echo "Connection Failed: " . mysqli_connect_error();
}
?>
