<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
    require 'src/login/connect.php';
    $query = "CALL get_brigade_universities('$brigadeID');";
    $result = $conn->query($query);
    if ($result->num_rows > 0){
        $i = 1;
        while($row = $result->fetch_assoc()){            
            echo '<li id="'.$row["id"].'">'.$row["name"].' <button class="delete-university" name="'.$row["id"].'" onclick="deleteUniversity("'.$i.'")" ">X</button></li>';
            $i ++;
        }
    }
}
