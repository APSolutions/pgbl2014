<?php
require_once '..\src\connection\connection.php';
header('Content-Type: text/html; charset=UTF-8');
echo htmlspecialchars($_SERVER["PHP_SELF"]);    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$nameErr = $locationErr = $townErr = $electricityErr = $wifiErr = $cellphoneErr = $acErr = $fanErr = $accommodationErr = "";
$name = $location = $town = $electricity = $wifi = $cellphone = $ac = $fan = $accommodation = $disable =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["element_1"])){
       $nameErr ="El nombre es requerido";
   }else{
       $name = test_input($_POST["element_1"]); 
   }
   if (empty($_POST["element_5"])){
       $locationErr ="La Provincia es requerida";
   }else{
     if (test_input($_POST["element_5"]) == "1"){
       $location = "Panamá Oeste";
   }else if (test_input($_POST["element_5"]) =="2"){
       $location = "Panamá Este";
   }else {
       $location = "Darien";
   }
   }
   if (empty($_POST["element_2"])){
       $townErr ="La comunidad es requerida";
   }else{
       $town = test_input($_POST["element_2"]);
   }
   if (empty($_POST["element_6"])){
       $electricityErr ="Favor especificar si tiene o no luz";
   }else{
       $electricity = test_input($_POST["element_6"]);
   }
   if (empty($_POST["element_7"])){
       $wifiErr ="Favor especificar si tiene o no wifi";
   }else{
       $wifi = test_input($_POST["element_7"]);
   }
   if (empty($_POST["element_8_1"])){
       $cellphoneErr ="Favor especificar si tiene o no señal de celular";
   }else{
       $cellphone = test_input($_POST["element_8_1"]);
   }
   if (empty($_POST["element_9"])){
       $acErr ="Favor especificar si tiene o no aire acondicionado";
   }else{
       $ac = test_input($_POST["element_9"]);
   }
   if (empty($_POST["element_10"])){
       $acErr ="Favor especificar si tiene o no abanicos";
   }else{
       $fan = test_input($_POST["element_10"]);
   }
   $accomodation = test_input($_POST["element_3"]);
   $disable = FALSE;
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$sql = "INSERT INTO compound (name,location,town,electricity,wifi,cellphone_signal,air_condition,fan,accommodation,disable) 
        VALUES ('$name','$location','$town','$electricity','$wifi','$cellphone','$ac','$fan','$accomodation','$disable')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
include 'index.html';
?>

        

