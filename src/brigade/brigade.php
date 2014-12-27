<?php

function loadPrograms(){
    require 'src/login/connect.php';
    $query = "CALL get_programs();";
    $result = $conn->query($query);
    if ($result->num_rows > 0){
        $i = 0;
        while($row = $result->fetch_assoc()){
            $programs["id"][$i] = $row["id"];
            $programs["program"][$i] = $row["program"];
            $i ++;
        }
    }
    return $programs;
}

function loadUniveristies(){
    require 'src/login/connect.php';
    $query = "CALL get_universities();";
    $result = $conn->query($query);
    if ($result->num_rows > 0){
        $i = 0;
        while($row = $result->fetch_assoc()){
            $univesity["id"][$i] = $row["id"];
            $univesity["univesity"][$i] = $row["name"];
            $i ++;
        }
    }
    return $univesity;
}

