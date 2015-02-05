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
            echo $this->univ; 
        }else{
            $i = 0;            
            foreach ($this->univ as $value) {
                echo '<li id="univ'.$value["id"].'">'.$value["name"].'<span class="icon-cancel" onclick="deleteUniversity('.$value["id"].')"><span></li>';
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
