<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
    require 'src/login/connect.php';
    $query = "CALL get_brigade_universities_list();";
    $result = $conn->query($query);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo '<option id="university'.$row["id"].'" value="'.$row["id"].'">'.$row["name"].'</option>';
        }
    }
}

