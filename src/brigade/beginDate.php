<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
    require 'src/login/connect.php';
    $query = "SELECT get_brigade_begin_date('$brigadeID') as beginDate;";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $brigadeBeginDate = $row["beginDate"];
    if (!empty($brigadeBeginDate)){
        echo $brigadeBeginDate;
    }else {
        echo date("Y-m-d");
    }    
}else{
    echo date("Y-m-d");
}