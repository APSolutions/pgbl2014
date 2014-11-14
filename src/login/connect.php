<?php
require 'connectionProperties.php';

// Create connection
$conn = new mysqli($db_hostname, $db_user, $db_password, $db_database);
 
//Check connection
if ($conn->connect_error) {
    die("<strong>ERROR:</stron>" . $conn->connect_error);
}
?>
