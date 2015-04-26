<?php

/**
 * Description of ficha
 *
 * @author AP Solutions
 */
class Ficha {
    //atributes
    private $id, $iDate, $fDate, $dDate, $aDate, $tStudents, $cityTour;
    private $compound, $community, $program;
    private $flightsa = array(array(
        "0" => "",
        "1" => "",
        "2" => ""
    ));   
    private $flightsd = array(array(
        "0" => "",
        "1" => "",
        "2" => ""
    ));    
    private $staff = array(array(
        "id" => "",
        "role" => ""
    ));
    private $volunteers = array(array(
        "0" => "",
        "1" => "",
        "2" => "",
        "3" => "",
        "4" => "",
        "5" => "",
        "6" => "",
        "7" => ""
    ));
    private $universities = array();
    private $vehicles = array();
    private $staff_coordinator = array();
    private $staff_interpreter = array();
    private $staff_driver = array();
    private $staff_paramedic = array();
    private $staff_tecnician = array();
    private $staff_others = array();
    //methods

    public function __construct($param_id){
    
        $this->id = $param_id;
        $this->obtainAll();
    }
    
    private function obtainAll(){
        try{
            require '../login/connect.php';
            $query = "CALL get_fichaSelectedData('$this->id');";
            $result= $conn->query($query);
            if ($result->num_rows > 0){
                $i = $j = $k = $l = $m = $n = $o = $p = $q = $r = $s = 0;
                while($row = $result->fetch_assoc()){
                    if (!is_null($row["ficha"])){
                        $this->iDate = $row["iDate"];
                        $this->fDate = $row["fDate"];
                        $this->dDate = $row["dDate"];
                        $this->aDate = $row["aDate"];
                        $this->tStudents = $row["tStudents"];
                        $this->cityTour= $row["tour"];
                        $this->compound = $row["compound"];
                        $this->community = $row["community"];
                        $this->program = $row["program"];
                    }

                    if (!is_null($row["flight"])){
                        if ($row["type"] == 0){
                            $this->flightsa[$i]["0"] = $row["flight"];
                            $this->flightsa[$i]["1"] = $row["arrivalTime"];
                            $this->flightsa[$i]["2"] = $row["tStudentsf"];
                            $i ++;
                        }else{
                            $this->flightsd[$i]["0"] = $row["flight"];
                            $this->flightsd[$i]["1"] = $row["arrivalTime"];
                            $this->flightsd[$i]["2"] = $row["tStudentsf"];
                            $r ++;
                        }
                        
                    }
                    
                    if (!is_null($row["vehicle"])){
                        $this->vehicles[$j] = $row["vehicle"];
                        $j ++;
                    }
                    
                    if (!is_null($row["staffCoordinator"])){
                        $this->staff_coordinator[$k] = $row["staffCoordinator"];
                        $k ++;
                    }
                    
                    if (!is_null($row["staffInterpreter"])){
                        $this->staff_interpreter[$l] = $row["staffInterpreter"];
                        $l ++;
                    }
                    
                    if (!is_null($row["staffDriver"])){
                        $this->staff_driver[$m] = $row["staffDriver"];
                        $m ++;
                    }
                    
                    if (!is_null($row["staffParamedic"])){
                        $this->staff_paramedic[$n] = $row["staffParamedic"];
                        $n ++;
                    }
                    
                    if (!is_null($row["staffTecnicians"])){
                        $this->staff_tecnician[$o] = $row["staffTecnicians"];
                        $o ++;
                    }
                    
                    if (!is_null($row["staffOthers"])){
                        $this->staff_others[$p] = $row["staffOthers"];
                        $p ++;
                    }
                    if (!is_null($row["vid"])){
                        $this->volunteers[$q]["0"] = $row["vid"];
                        $this->volunteers[$q]["1"] = $row["vname"];
                        $this->volunteers[$q]["2"] = $row["vlastname"];
                        $this->volunteers[$q]["3"] = $row["earlyArrival"];
                        $this->volunteers[$q]["4"] = $row["ownLeave"];
                        $this->volunteers[$q]["5"] = $row["allergies"];
                        $this->volunteers[$q]["6"] = $row["diet"];
                        $this->volunteers[$q]["7"] = $row["comments"];
                        $q ++;
                    }
                    if (!is_null($row["university"])){
                        $this->universities[$s] = $row["university"];
                        $s ++;
                    }
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
    public function getFlightsa() {
        return $this->flightsa;
    }
    public function getFlightsd() {
        return $this->flightsd;
    }
    public function getVehicles() {
        return $this->vehicles;
    }
    public function getCompCommStaff(){
        $compCommStaff = $this->runQueryTwoDim("CALL get_fichaCompCommStaff()");
        return $compCommStaff;
    } 
    public function getCompound(){
        return $this->compound;
    }
    public function getCommunity(){
        return $this->community;
    }
    public function getStaffCoordinator(){
        return $this->staff_coordinator;
    } 
    public function getStaffInterpreter(){
        return $this->staff_interpreter;
    } 
    public function getStaffDriver(){
        return $this->staff_driver;
    } 
    public function getStaffParamedic(){
        return $this->staff_paramedic;
    } 
    public function getStaffTecnician(){
        return $this->staff_tecnician;
    } 
    public function getStaffOthers(){
        return $this->staff_others;
    } 
    public function getUniversities(){
        return $this->universities;
    }
    public function getVolunteers(){
        return $this->volunteers;
    }
    
    
    private function runQuery($query, $rowName){        
        try{
            require '../login/connect.php';
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
    private function runQueryTwoDim($query){
        $aContenido = array();
        try{
            require 'src/login/connect.php';
            $result= $conn->query($query);
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $col = count($row);
                for($j=0;$j<$col;$j++){
                    $aContenido[$i][$j] = $row[$j];
                }
                $i++;
            }
            return $aContenido;
        } catch (Exception $ex) {
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

?>