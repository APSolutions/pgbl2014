<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
    require 'src/login/connect.php';
    $query = "SELECT get_brigade_ending_date('$brigadeID') as endingDate;";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $brigadeEdingDate = $row["endingDate"];
    if (!empty($brigadeEdingDate)){
        echo $brigadeEdingDate;
    }else {
        echo date("Y-m-d");
    }    
}else{
    echo date("Y-m-d");
}