<?php

/**
 * Description of ficha
 *
 * @author AP Solutions
 */
class Ficha {
    //atributes
    private $id, $iDate, $fDate, $dDate, $aDate, $tStudents, $cityTour;
    private $compound, $community, $program , $staffCoordinator;
    private $flights = array(array(
        "id" => "",
        "type" => "",
        "arrivalTime" => "",
        "tStudents" => ""
    ));    
    private $staff = array(array(
        "id" => "",
        "role" => ""
    ));
    private $volunteers = array(array(
        "id" => "",
        "name" => "",
        "lastname" => "",
        "earlyArrival" => "",
        "ownLeave" => "",
        "allergies" => "",
        "diet" => "",
        "comments" => ""
    ));
    private $universities = array();
    private $vehicles = array();
    //methods
    public function __construct($param_id){
        $this->id = $param_id;
        $this->obtainVariables();
        $this->obtainFlights();
        $this->obtainVolunteers();
        $this->obtainStaff();
        $this->obtainVehicles();
        $this->obtainUniversities();
    }
    
    private function obtainVariables(){
       try {
           require '../login/connect.php';
           $query = "CALL get_fichasData('$this->id');";
           $result = $conn->query($query);
           if ($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                   $this->iDate = $row["iDate"];
                   $this->fDate = $row["fDate"];
                   $this->dDate = $row["dDate"];
                   $this->aDate = $row["aDate"];
                   $this->tStudents = $row["tStudents"];
                   $this->cityTour = $row["tour"];
                   $this->compound = $row["compound"];
                   $this->community = $row["community"];
                   $this->program = $row["program"];    
               }
            }
       } catch (Exception $ex) {
           //in error case
       } 
    }
    private function obtainFlights(){
        try {
            require '../login/connect.php';
            $query = "CALL get_fichasFlights('$this->id');";
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                   $this->flights[$i]["id"] = $row["flight"];
                   $this->flights[$i]["type"] = $row["type"];
                   $this->flights[$i]["arrivalTime"] = $row["arrivalTime"];
                   $this->flights[$i]["tStudents"] = $row["tStudents"];
                   $i ++; 
               }
            }
            return 'ok';
        }catch (Exception $ex) {
            return 'error';
        }      
    }
    private function obtainVehicles(){
        try {
            require '../login/connect.php';
            $query = "CALL get_fichaVehicles('$this->id');";
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                   $this->vehicles[$i] = $row["vehicle"];
                   $i ++;
               }
            }
            return 'ok';
        } catch (Exception $ex) {
            return 'error';
        }
    }
    private function obtainStaff(){
        try {
            require '../login/connect.php';
            $query = "CALL get_fichaStaff('$this->id');";
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                   $this->staff[$i]["id"] = $row["staff"];
                   $this->staff[$i]["role"] = $row["role"];
                   $i ++;
               }
            }
            return 'ok';
        } catch (Exception $ex) {
            return 'error';
        }
    }
    private function obtainVolunteers(){
        try {
            require '../login/connect.php';
            $query = " CALL get_fichaVolunteers($this->id)";
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                   $this->volunteers[$i]["id"] = $row["id"];
                   $this->volunteers[$i]["name"] = $row["name"];
                   $this->volunteers[$i]["lastname"] = $row["lastname"];
                   $this->volunteers[$i]["earlyArrival"] = $row["earlyArrival"];
                   $this->volunteers[$i]["ownLeave"] = $row["ownLeave"];
                   $this->volunteers[$i]["allergies"] = $row["allergies"];
                   $this->volunteers[$i]["diet"] = $row["diet"];
                   $this->volunteers[$i]["comments"] = $row["comments"];
                   $i ++;
               }
            }
        } catch (Exception $ex) {
        }
    }
    private function obtainUniversities(){
        try{
            require '../login/connect.php';
            $query = "CALL get_fichaUniversities($this->id);";
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                   $this->universities[$i] = $row["name"];
                   $i ++;
               }
            }
            return 'ok';
        } catch (Exception $ex) {
            return 'error';
        }
    }
    
    public function getFichaData(){
        return $result= array(
            "id" => $this->id,
            "iDate" => $this->iDate,
            "fDate" => $this->fDate,
            "dDate" => $this->dDate,
            "aDate" => $this->aDate,
            "tStudents" => $this->tStudents,
            "tour" => $this->cityTour,
            "compound" => $this->compound,
            "community" => $this->community,
            "program" => $this->program
        );
    }
    public function getID() {
        return $this->id;
    }
    public function getFlights() {
        return $this->flights;
    }
    public function getVehicles() {
        return $this->vehicles;
    }
    public function getSatff(){
        return $this->staff;
    }    
    public function getUniversities(){
        return $this->universities;
    }
    public function getVolunteers(){
        return $this->volunteers;
    }
    public function getCommunities(){
        $communities = $this->runQuery("CALL get_communities();", "communities");
        return $communities;
    }
    public function getCompounds(){
        $compounds = $this->runQuery("CALL get_compounds();", "compound");
        return $compounds;
    }
    
    
    private function runQuery($query, $rowName){        
        try{
            require 'src/login/connect.php';
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                    $variable[$i] = $row[$rowName];
                    $i ++;
               }
            }
            return $variable;
        } catch (Exception $ex){
            return "Error";
        }
    }
     
    public function setiDate($param_iDate){
        try{
            $this->iDate = $param_iDate;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }    
    public function setfDate($param_fDate){
        try{
            $this->fDate = $param_fDate;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setdDate($param_dDate){
        try{
            $this->dDate = $param_dDate;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setaDate($param_aDate){
        try{
            $this->aDate = $param_aDate;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setTStudents($param_tStudents){
        try{
            $this->tStudents = $param_tStudents;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setCityTour($param_cityTour){
        try{
            $this->cityTour = $param_cityTour;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setCompound($param_compound){
        try{
            $this->compoundID = $param_compound;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setCommunity($param_community){
        try{
            $this->communityID = $param_community;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setFight($param_id, $param_type, $param_arrivalTime, $param_tStudents){
        try{
            $this->flights[i]["id"] = $param_id;
            $this->flights[i]["type"] = $param_type;
            $this->flights[i]["arrivalTime"] = $param_arrivalTime;
            $this->flights[i]["tStudents"] = $param_tStudents;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setVehicle($param_vehicle){
        try{
            $this->vehicles[$i] = $param_vehicle;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
    public function setStaff($param_staff, $param_role){
        try{
            $this->staff[i]["id"] = $param_staff;
            $this->staff[i]["role"] = $param_role;
            //query para insertar el campo
        } catch (Exception $ex) {

        }
    }
}
