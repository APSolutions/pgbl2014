<?php
require 'connect.php';

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
}
$query = "CALL get_staffData('$user', @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8);";
$conn->query($query);
$query = "SELECT @p1 AS id, @p2 AS name, @p3 AS lastname, @p4 AS email, @p5 AS role, @p6 AS admin, @p7 AS logic, @p8 AS devel;";  
$result = $conn->query($query);
if (!$result) {
    throw new Exception("<strong>Database Error </strong> :{$conn->error}");
}
$row = $result->fetch_assoc();
$user_id = $row['id'];
$user_name = $row['name'];
$user_lastname = $row['lastname'];
$user_email = $row['email'];
$user_role = $row['role'];
$user_admin = $row['admin'];
$user_logic = $row['logic'];
$user_devel = $row['devel'];
?>