<?php

require 'src/login/connect.php';

$query = "call get_brigades_calendar_data();";
$result = $conn->query($query);

$outp = "[";

while($rs = $result->fetch_assoc()) {
    $title = "";
    $query = "CALL get_brigades_calendar_universities('".$rs['id']."');";
    require 'src/login/connect.php';
    $result1 = $conn->query($query) or die('failed!');;
    
    while($rs1 = $result1->fetch_assoc()) {
        if ($title == ""){
            $title .= $rs1["name"];
        }else{
            $title .= "/ " . $rs1["name"];
        }
    }    
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"' .    $rs["id"] .         '",';
    $outp .= '"title":"' .  $rs["program"] . " - " . $title . " (" .$rs["totalStudents"] .')",';
    $outp .= '"url":"www.google.com",';
    $outp .= '"start":"' .  $rs["startingDate"] .    '",'; 
    $outp .= '"end":"' .    $rs["endDate"] .    '"}'; 
}

$outp .="]";

file_put_contents('src/calendars/events.json', $outp);
