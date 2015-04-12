<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brigadeData
 *
 * @author Arturo
 */
class BrigadeData {
    
    private $programs, $univeristies;
    
    public function __construct() {
        require 'src/login/connect.php';
        $query = "CALL get_brigade_basic_data();";        
        $result = $conn->query($query);
        
        if ($result->num_rows > 0){
            $i = $j = 0;
            while($row = $result->fetch_assoc()){
                if (!is_null($row["progID"])){
                    $this->programs[$i]["progID"] = $row["progID"];
                    $this->programs[$i]["prog"] = $row["prog"];
                    $i ++;
                }
                
                if (!is_null($row["univID"])){
                    $this->univeristies[$j]["univID"] = $row["univID"];
                    $this->univeristies[$j]["univ"] = $row["univ"];
                    $j ++;
                }
            }
        }
    }
    
    public function getPrograms(){
        return $this->programs;
    }
    
    public function getUniversities(){
        return $this->univeristies;
    }
    
}
