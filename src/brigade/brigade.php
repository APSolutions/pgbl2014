<?php

class Brigade{
    
    private $progID, $prog, $univ, $dtop, $dted, $vol, $ft;
    
    function __construct() {
        $this->progID = "0";
        $this->prog = "Ninguno";
        $this->dtop = date("Y-m-d");
        $this->dted = date("Y-m-d",strtotime("+7 day"));
        $this->univ = "Ninguno";
    }
            
    function getBasicData($bdeID){
        require 'src/login/connect.php';
        $query = "CALL get_brigade_data('$bdeID');";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $this->progID = $row["id"];
        $this->prog = $row["program"];
        $this->dtop = $row["startingDate"];
        $this->dted = $row["endDate"];
    }
    
    function getUniversitiesData($bdeID){
        require 'src/login/connect.php';
        $query = "CALL get_brigade_universities('$bdeID');";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){            
                $this->univ[$row["id"]] = $row["name"];
            }
        }
    }
    
    /*Functions to save and update data*/
    function saveBasics($program, $universities, $openingDate, $endingDate) {
        
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
    
    function getUniversities(){
        if ($this->univ === "Ninguno"){
            return $this->univ;
        }else{
            echo '<li id="univ'.$row["id"].'">'.$row["name"].'<span class="icon-cancel" onclick="deleteUniversity('.$row["id"].')"><span></li>';
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
