<?php
require 'connect.php';
require 'usuario.php';

if (isset($_POST['username']) && isset($_POST['pass'])) {
    $user = $_POST['username'];
    $pass = $_POST['pass'];
}
$query = "SELECT validateUser('$user','$pass') as valid;";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$valid = $row['valid'];
if ($valid == 1) {
    session_name('Global');
    session_id('pgbl');
    session_start();
    $_SESSION["username"] = $_POST['username'];
    $_SESSION["user"] = new usuario(); 
    header('location:../../menu_router.php');
}  else {
    header('location:../../index.php');
    echo '<script type="text/javascript">'
        , 'window.alert("Wrong username or password, try it again.");'
        , '</script>';
}
?>