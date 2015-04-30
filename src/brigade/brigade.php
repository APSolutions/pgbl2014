<?php

class Brigade{
    
    /*Variables de la brigada
     * ID del programa principal
     * Nombre del Programa Principal
     * ID del programa secundario
     * Nombre del programa secundario
     * Fecha de inicio de la brigada
     * Fecha de conclusion de la brigada
     * Fecha de inicio del programa principal
     * Fecha de conclusion del programa principal
     * Fecha de inicio del programa secundario
     * Fecha de conclusion del programa secundario
    */
    private $progID;
    private $prog;
    private $sProgID;
    private $sProg;    
    private $dtop;
    private $dted;
    private $priDtop;
    private $priDted;
    private $secDtop;
    private $secDted;
    
    /*
     *Variables para universidades, voluntarios y vuelos 
     *      
    */
    private $univ;
    private $vol;
    private $flt;
    
    
    function __construct() {
        $this->progID = NULL;
        $this->prog = "Ninguno";
        $this->sProgID = NULL;
        $this->sProg = "Ninguno";
        $this->dtop = date("Y-m-d");
        $this->dted = date("Y-m-d",strtotime("+7 day"));
    }
            
    function getBasicData($bdeID){
        require 'src/login/connect.php';
        $query = "CALL get_brigade_data('$bdeID');";        
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        if ($result->num_rows > 0){
            $i = $j = $k = 0;
            
            $this->progID = $row["priProgID"];
            $this->prog = $row["priProg"];
            $this->sProgID = $row["secProgID"];
            $this->sProg = $row["secProg"];
            $this->dtop = $row["dtop"];
            $this->dted = $row["dted"];
            $this->priDtop = $row["priDtop"];
            $this->priDted = $row["priDted"];
            $this->secDtop = $row["secDtop"];
            $this->secDted = $row["secDted"];
            
            while($row = $result->fetch_assoc()){
                if (!is_null($row["univID"])){
                    $this->univ[$i]["univID"] = $row["univID"];
                    $this->univ[$i]["univName"] = $row["univName"];
                    $i ++;
                }
                if (!is_null($row["fltID"])){
                    $this->flt[$j]["fltID"]= $row["fltID"];
                    $this->flt[$j]["fltType"]= $row["fltType"];
                    $this->flt[$j]["fltArrTime"]= $row["fltArrTime"];
                    $this->flt[$j]["fltTotalStud"]= $row["fltTotalStud"];
                    $j ++;
                }
                if (!is_null($row["volID"])){
                    $this->vol[$k]["volID"] = $row["volID"];
                    $this->vol[$k]["volName"] = $row["volName"];
                    $this->vol[$k]["volLastName"] = $row["volLastName"];
                    $this->vol[$k]["volType"] = $row["volType"];
                    $this->vol[$k]["volEarArr"] = $row["volEarArr"];
                    $this->vol[$k]["volOwnLve"] = $row["volOwnLve"];
                    $this->vol[$k]["volAlg"] = $row["volAlg"];
                    $this->vol[$k]["volDiet"] = $row["volDiet"];
                    $this->vol[$k]["volCmts"] = $row["volCmts"];
                    $k ++;
                }
            }
        }
    }
    
    /*Other functions*/
    function generateID($prog, $subProg, $dtop){          
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
        $date = strtotime($dtop);
        $month = date('m',$date);
        $year = date('Y',$date);
        
        if ($subProg == 1){
            $progAB = "HYB";
            $query = "select count(id) from ficha where subProgram > 0 and MONTH(startingDate) = $month and YEAR(startingDate) = $year;";   
        }else{
            $query = "select count(id) from ficha where program = $prog and MONTH(startingDate) = $month and YEAR(startingDate) = $year;";   
        }
        
        require 'src/login/connect.php';             
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $count = $row["count(id)"];
        
        if ($count == 0){
            $count = $count++;
        }
        
        if ($count < 10){
            $count = "0".$count;
        }
        
        return $progAB . $count . "-" . date('M',$date) . date('y',$date);
    }    
    
    /*Functions to save and update data*/
    function saveBasics($bdeID, $sdtop, $sdted, $priProg, $secProg, $spriDtop, $spriDted, $ssecDtop, $ssecDted) {
        require 'src/login/connect.php';
        $query = "INSERT INTO pgbl2014.ficha (id, startingDate, endDate, program, subProgram, priDtop, priDted, secDtop, secDted) VALUES ('$bdeID', '$sdtop', '$sdted', $priProg, NULL, NULL, NULL, NULL, NULL);";
        $result = $conn->query($query);
        
        if ($result) {
            return 1;
        }else{
            return 0;
        }        
         
        
        
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
        return $this->univ;        
    }
    
    function getDtop(){
        return $this->dtop;
    }
    
    function getDted() {
        return $this->dted;
    }
    
    function getPriDtop(){
        return $this->priDtop;
    }
    
    function getPriDted() {
        return $this->priDted;
    }
    
    function getSecDtop(){
        return $this->secDtop;
    }
    
    function getSecDted() {
        return $this->secDted;
    }
    
    function getVolunteers() {
        return $this->vol;
    }
    
    function getFlights(){
        return $this->flt;
    }
}
