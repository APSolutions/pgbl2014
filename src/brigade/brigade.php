<?php

class Brigade{
    
    private $progID, $prog, $sProgID, $sProg, $univ, $dtop, $dted, $sDtop, $sDted, $vol, $ft;
    
    function __construct() {
        $this->progID = NULL;
        $this->prog = "Ninguno";
        $this->sProgID = NULL;
        $this->sProg = "Ninguno";
        $this->dtop = date("Y-m-d");
        $this->dted = date("Y-m-d",strtotime("+7 day"));
        $this->univ = "Ninguno";
    }
            
    function getBasicData($bdeID){
        require 'src/login/connect.php';
        $query = "CALL get_brigade_data('$bdeID');";        
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $this->progID = $row["progID"];
        $this->prog = $row["prog"];
        $this->dtop = $row["dtop"];
        $this->dted = $row["dted"];
        $this->sProgID = $row["subProgID"];
        $this->sProg = $row["subProg"];
    }
    
    function getUniversitiesData($bdeID){
        require 'src/login/connect.php';
        $query = "CALL get_brigade_universities('$bdeID');";
        $result = $conn->query($query);
        if ($result->num_rows > 0){
            $i = 0;
            $this->univ = array();
            while($row = $result->fetch_assoc()){
                $this->univ[$i]["id"] = $row["id"];
                $this->univ[$i]["name"] = $row["name"];
                $i++;                
            }
        }
    }
    
    /*Other functions*/
    function setBrigadeID($prog, $dtop){          
        switch ($prog) {
            case 1:
                $progAB = "ARC";
                break;
            case 2:
                $progAB = "BUS";
                break;
            case 3:
                $progAB = "DEN";
                break;
            case 4:
                $progAB = "ENG";
                break;
            case 5:
                $progAB = "ENV";
                break;
            case 6:
                $progAB = "HRB";
                break;
            case 7:
                $progAB = "MED";
                break;
            case 8:
                $progAB = "MFB";
                break;
            case 9:
                $progAB = "PRO";
                break;
            case 10:
                $progAB = "PHB";
                break;
            case 11:
                $progAB = "H2O";
                break;
        }
        
        
        
        return $progAB . $count . "-" . $month . $year;
    }    
    
    /*Functions to save and update data*/
    function saveBasics($prog, $univ, $dtop, $dted) {
        $bdeID = setBrigadeID($prog,$dtop);
        
        if (true) {
            return 1;
        }        
        return 0;
    }
    
    function updateBasics($universities, $openingDate, $endingDate){
        
        if (true) {
            return 1;
        }        
        return 0;
    }
    
    function saveFlights(){
        
        if (true) {
            return 1;
        }        
        return 0;
    }
    
    function updateFlight(){
        
        if (true) {
            return 1;
        }        
        return 0;
    }
    
    function saveVolunteers(){
        
        if (true) {
            return 1;
        }        
        return 0;
    }
    
    function updateVolunteer(){
        
        if (true) {
            return 1;
        }        
        return 0;
    }

    /*Returning functions to retrive values*/
    function getProgramID() {
        return $this->progID;
    }
    
    function getProgram() {
        return $this->prog;
    }
    
    function getSubProgramID() {
        return $this->sProgID;
    }
    
    function getSubProgram() {
        return $this->sProg;
    }
    
    function getUniversities(){
        if ($this->univ === "Ninguno"){
            echo $this->univ; 
        }else{
            $i = 0;            
            foreach ($this->univ as $value) {
                echo '<li id="univ'.$i.'" class="univ-item" data-id="'.$value["id"].'">'.$value["name"].'<span class="icon-cancel" onclick="deleteUniversity('.$i.')"><span></li>';
                $i++;
            }
            
        }
        
    }
    
    function getOpeningDate(){
        return $this->dtop;
    }
    
    function getEndingDate() {
        return $this->dted;
    }
    
    function getVolunteers() {
        return $this->vol;
    }
    
    function getFlights(){
        return $this->ft;
    }
}
