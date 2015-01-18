<?php
require '../login/connect.php';
$query = "call get_brigades_calendar_data();";
$result = $conn->query($query);

$outp = "[";

while($rs = $result->fetch_assoc()) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"' .    $rs["id"] .         '",';
    $outp .= '"title":"' .  $rs["program"] . " - " . $rs["universities"] . " (" .$rs["totalStudents"] .')",';
    $outp .= '"url":"src/calendars/setFichaData.php?brigadeID='.$rs["id"] .'",';
    $outp .= '"start":"' .  $rs["startingDate"] .    '",'; 
    $outp .= '"end":"' .    $rs["endDate"] .    '"}'; 
}

$outp .="]";

file_put_contents('events.json',$outp);

header('location:../../brigades_calendar.php');