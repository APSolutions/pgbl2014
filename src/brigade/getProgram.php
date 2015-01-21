<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
    require 'src/login/connect.php';
    $query = "SELECT get_brigade_program('$brigadeID') as program;";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $brigadeProgram = $row["program"];
    if (!empty($brigadeProgram)){
        echo $brigadeProgram;
    }else {
        echo 'Ninguno';
    }    
}else{
    echo 'Ninguno';
}
