<?php

class Brigade{
    
    private $prog, $univ, $dtop, $dted, $vol, $ft;


    public function __construct($bdeID) {
        if ($bdeID != "Ninguno") {
            $this->prog = "";
            $this->univ = "";
            $this->dtop = "";
            $this->dted = "";
            $this->vol = "";
            $this->ft = "";
        };
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
    function getProgram() {
        return $this->prog;
    }
    
    function getUniversities(){
        return $this->univ;
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
