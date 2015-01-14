<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["brigadeID"])){
    $brigadeID = $_SESSION["brigadeID"];
    require 'src/login/connect.php';
    $query = "CALL get_programs();";
    $result = $conn->query($query);
    if ($result->num_rows > 0){
        $i = 0;
        while($row = $result->fetch_assoc()){
            $programs["id"][$i] = $row["id"];
            $programs["program"][$i] = $row["program"];
            $i ++;
            echo '<option id="program'.$row["id"].'" value="'.$row["id"].'">'.$row["program"].'</option>';
        }
    }
}

