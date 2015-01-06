<?php

session_name('Global');
session_id('pgbl');
session_start();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET) && !empty($_GET)){
    $_SESSION["brigadeID"] = $_GET["brigadeID"];
    header("Location:../../brigade.php");
}else{
    header("location:../../brigades_calendar.php");
}
