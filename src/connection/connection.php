<?php //connection.php
 require_once 'database.php';

// Create connection
$conn = new mysqli($db_hostname,$db_user,$db_password,$db_database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 