<?php

/**
 * Description of usuario
 *
 * @author APSolutions
 */
class usuario {
    private $username, $id, $name, $lastname, $email, $role, $program;
    private $admin, $logic, $devel;
    
    function __construct() {
        require 'get_staffData.php';
        $this->username = $user;
        $this->id = $user_id;
        $this->name = $user_name;
        $this->lastname = $user_lastname;
        $this->email = $user_email;
        $this->role = $user_role;
        $this->admin = $user_admin;
        $this->logic = $user_logic;
        $this->devel = $user_devel;
    }
         
    function get_username() {
        return $this->username;
    }
    
    function get_id(){
        return $this->id;
    }
    
    function get_name() {
        return $this->name;
    }
    
    function get_lastname() {
        return $this->lastname;
    }
    
    function get_email() {
        return $this->email;
    }
    
    function get_role() {
        return $this->role;
    }
    
    function get_program() {
        return $this->program;
    }
    
    function get_permission_admin() {
        return $this->admin;
    }
    
    function get_permission_logic() {
        return $this->logic;
    }
    
    function get_permission_devel() {
        return $this->devel;
    }
}

?>
