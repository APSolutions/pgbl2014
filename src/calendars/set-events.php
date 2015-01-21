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
    print $rs["program"]. " color: ";
    switch ($rs["program"]){
        case "Architecture":
            $color = "rgb(250,183,25)";
            break;
        case "Business":
            $color = "rgb(40,48,116)";
            break;
        case "Dental":
            $color = "rgb(141,0,183)";
            break;
        case "Engineering":
            $color = "#971f56";
            break;
        case "Environmental":
            $color = "rgb(135,186,64)";
            break;
        case "Human Rights":
            $color = "rgb(103,20,73)";
            break;
        case "Medical":
            $color = "rgb(221,31,38)";
            break;
        case "Microfinance":
            $color = "rgb(93,154,94)";
            break;
        case "Professional":
            $color = "rgb(119,136,153)";
            break;
        case "Public Health":
            $color = "rgb(231,132,59)";
            break;
        case "Water":
            $color = "rgb(20,154,215)";
            break;
        default:
            $color = "red";
    }
    print $color;
    $outp .= '"color":"'.$color.'",';
    $outp .= '"start":"' .  $rs["startingDate"] .    '",'; 
    $outp .= '"end":"' .    $rs["endDate"] .    '"}'; 
}

$outp .="]";

file_put_contents('events.json',$outp);

header('location:../../brigades_calendar.php');