<?php
require '../login/connect.php';
$query = "call get_brigades_calendar_data();";
$result = $conn->query($query);

$outp = "[";

while($rs = $result->fetch_assoc()) {
    $hybBde = $rs["hybBde"];
    $hybDtop = $rs["hybDtop"];
    $hybDted = $rs["hybDted"];
    $hybType = $rs["hybType"];
    $hybProgID = $rs["hybProgID"];
    $hybProg = $rs["hybProg"];
    $univ = $rs["univ"];
    $stdt = $rs["totalStudents"];
    
    $priBde = $rs["priBde"];
    $priDtop = $rs["priDtop"];
    $priDted = $rs["priDted"];
    $priType = $rs["priType"];
    $priProgID = $rs["priProgID"];
    $priProg = $rs["priProg"];

    $subBde = $rs["subBde"];
    $subDtop = $rs["subDtop"];
    $subDted = $rs["subDted"];
    $subType = $rs["subType"];
    $subProgID = $rs["subProgID"];
    $subProg = $rs["subProg"];
    
    //Selects the id to put in the event
    if ($hybType === "0"){
        $eventID = $hybBde;
        $eventProg = $hybProg;
    }else{
        $eventID = $priBde;
        $eventProg = $priProg . " / " . $subProg;
    }
    
    //Formating the  dates
    $date = new DateTime($hybDted);
    $date->add(new DateInterval('P1D'));
    
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"' .    $eventID .         '",';
    
    $outp .= '"title":"' .  $eventProg . " - " . $univ . " (" .$stdt .')",';
    //sets the link to the form
    $outp .= '"url":"src/calendars/setFichaData.php?brigadeID='.$eventID .'&type='.$hybBde .'",';
    
    //Sets the color per brigade
    switch ($hybProg){
        case "Architecture":
            $color = "rgb(250,183,25)";/*linear-gradient(to right, red , blue)*/
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
            $color = "cyan";
    }
    
    //Sets the color for the primary brigade
    switch ($priProg){
        case "Architecture":
            $gradient1 = "rgb(250,183,25)";/*linear-gradient(to right, red , blue)*/
            break;
        case "Business":
            $gradient1 = "rgb(40,48,116)";
            break;
        case "Dental":
            $gradient1 = "rgb(141,0,183)";
            break;
        case "Engineering":
            $gradient1 = "#971f56";
            break;
        case "Environmental":
            $gradient1 = "rgb(135,186,64)";
            break;
        case "Human Rights":
            $gradient1 = "rgb(103,20,73)";
            break;
        case "Medical":
            $gradient1 = "rgb(221,31,38)";
            break;
        case "Microfinance":
            $gradient1 = "rgb(93,154,94)";
            break;
        case "Professional":
            $gradient1 = "rgb(119,136,153)";
            break;
        case "Public Health":
            $gradient1 = "rgb(231,132,59)";
            break;
        case "Water":
            $gradient1 = "rgb(20,154,215)";
            break;
        default:
            $gradient1 = "cyan";
    }
    
    //Sets the color for the sub brigade
    switch ($subProg){
        case "Architecture":
            $gradient2 = "rgb(250,183,25)";
            break;
        case "Business":
            $gradient2 = "rgb(40,48,116)";
            break;
        case "Dental":
            $gradient2 = "rgb(141,0,183)";
            break;
        case "Engineering":
            $gradient2 = "#971f56";
            break;
        case "Environmental":
            $gradient2 = "rgb(135,186,64)";
            break;
        case "Human Rights":
            $gradient2 = "rgb(103,20,73)";
            break;
        case "Medical":
            $gradient2 = "rgb(221,31,38)";
            break;
        case "Microfinance":
            $gradient2 = "rgb(93,154,94)";
            break;
        case "Professional":
            $gradient2 = "rgb(119,136,153)";
            break;
        case "Public Health":
            $gradient2 = "rgb(231,132,59)";
            break;
        case "Water":
            $gradient2 = "rgb(20,154,215)";
            break;
        default:
            $gradient2 = "cyan";
    }
    
    //For the gradient to show
    if ($hybType === "0"){
        $outp .= '"color":"'.$color.'",';
    }else{
        $outp .= '"borderColor ":"'.$gradient1.'",';
        $outp .= '"backgroundColor":"linear-gradient(to right, '.$gradient1.' , '.$gradient2.')",';
    }    
    $outp .= '"start":"' .  $hybDtop .    '",'; 
    $outp .= '"end":"' .    $date->format("Y-m-d")   .    '"}';     
}

$outp .="]";

file_put_contents('events.json',$outp);

header('location:../../brigades_calendar.php');