<?php
require '../login/connect.php';
$query = "call get_brigades_calendar_data();";
$result = $conn->query($query);

function getColor($param_prog){
    switch ($param_prog){
        case 1:
            $color = "rgb(250,183,25)";/*linear-gradient(to right, red , blue)*/
            break;
        case 2:
            $color = "rgb(40,48,116)";
            break;
        case 3:
            $color = "rgb(141,0,183)";
            break;
        case 4:
            $color = "#971f56";
            break;
        case 5:
            $color = "rgb(135,186,64)";
            break;
        case 6:
            $color = "rgb(103,20,73)";
            break;
        case 7:
            $color = "rgb(221,31,38)";
            break;
        case 8:
            $color = "rgb(93,154,94)";
            break;
        case 9:
            $color = "rgb(119,136,153)";
            break;
        case 10:
            $color = "rgb(231,132,59)";
            break;
        case 11:
            $color = "rgb(20,154,215)";
            break;
        default:
            $color = "cyan";
    }
    
    return $color;
}

$outp = "[";

while($rs = $result->fetch_assoc()) {
    $bdeId      = $rs["bdeId"];
    $dtop       = $rs["dtop"];
    $dted       = $rs["dted"];
    $progID     = $rs["progID"];
    $prog       = $rs["prog"];
    $sProgId    = $rs["subProgID"];
    $sProg      = $rs["subProg"];
    $univ       = $rs["univ"];
    $stdt       = $rs["totalStudents"];    
    
    $color = getColor($progID);   
    
    if(is_null($sProgId)){
        $eventProg = $prog;
    }else{
        $eventProg = $prog . " & " . $sProg;
        $gradient = getColor($sProgId);
    }
    
    //Formating the  dates
    $date = new DateTime($dted);
    $date->add(new DateInterval('P1D'));
    
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"' . $bdeId . '",';    
    $outp .= '"title":"' .  $eventProg . " - " . $univ . " (" .$stdt .')",';
    $outp .= '"url":"src/calendars/setFichaData.php?brigadeID='.$bdeId .'",';
    
    //For the gradient to show
    if (is_null($sProgId)){
        $outp .= '"color":"'.$color.'",';
    }else{
        $outp .= '"borderColor ":"'.$color.'",';
        $outp .= '"backgroundColor":"linear-gradient(to right, '.$color.' , '.$gradient.')",';
    }
    
    $outp .= '"start":"' .  $dtop .    '",'; 
    $outp .= '"end":"' .    $date->format("Y-m-d")   .    '"}';     
}

$outp .="]";

file_put_contents('events.json',$outp);

header('location:../../brigades_calendar.php');