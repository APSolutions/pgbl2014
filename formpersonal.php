<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
//variables del formulario
$name = $lastname = $id = $bloodType = $bornDate = $citizenship = $gender = $maritalStatus = $address = $cellphone = $email = $university = $career = "";
$nameTemp = $lastnameTemp = $idTemp = $bloodTypeTemp = $citizenshipTemp = $genderTemp = $maritalStatusTemp = $addressTemp = $cellphoneTemp = $emailTemp = $universityTemp = $careerTemp = "";
$nameErr = $lastnameErr = $idErr = $bloodTypeErr = $bornDateErr = $citizenshipErr = $genderErr = $maritalStatusErr = $addressErr = $cellphoneErr = $emailErr = $universityErr = $careerErr = "";
$bornDateYearTemp = $bornDateMonthTemp = $bornDateDayTemp = $age = "";
$arreglo = array(
        'yearErr' => "",
        'monthErr' => "",
        'dayErr' => "",
        );
$bornDateYearErr = $bornDateMonthErr = $bornDateDayErr = "";
$selectedBloodType = $selectedGender = "selected";
$selectedBloodType1 = $selectedBloodType2 = $selectedBloodType3 = $selectedBloodType4 = $selectedBloodType5 = $selectedBloodType6 = $selectedBloodType7 = $selectedBloodType8 = $selectedGender1 = $selectedGender2 = "";
$checkedmaritalstatus = "";
$checkedmaritalstatus1 = $checkedmaritalstatus2 = $checkedmaritalstatus3 = $checkedmaritalstatus4 = $checkedmaritalstatus5 = "";
$flag = $flag2 = TRUE;
$errorMessage = "";


//asignacion de variables
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"]) ){
        $nameErr = "El nombre del personal es requerido!";
    }else{
        $nameTemp = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$nameTemp)){
            $nameErr = "El nombre solo debe incluir letras!";
        }else{
            $name = $nameTemp;
        }
    }
    if($_POST["lastname"] == "" ){
        $lastnameErr = "El apellido del personal es requerido!";
    }else{
        $lastnameTemp = cleanInput($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$lastnameTemp)){
            $lastnameErr = "El apellido solo debe incluir letras!";
        }else{
            $lastname = $lastnameTemp;
        }
    }
     if(empty($_POST["id"]) ){
        $idErr = "La cédula/pasaporte del personal es requerida!";
    }else{
        $idTemp = cleanInput($_POST["id"]);
        if (!preg_match("/^[a-zA-Z0-9- ]*$/",$idTemp)){
            $idErr = "La cédula/pasaporte solo debe incluir letras y números!";
        }else{
            $id = $idTemp;
        }
    }
    if(empty($_POST["bloodType"]) ){
        $bloodTypeErr = "El tipo de sangre del personal es requerido!";
    }else{
        $bloodTypeTemp = cleanInput($_POST["bloodType"]);
        if($bloodTypeTemp == "A+"){
            $selectedBloodType1 ="selected"; 
        } else if ($bloodTypeTemp == "A-"){
            $selectedBloodType2 ="selected";
        } else if ($bloodTypeTemp == "B+"){
            $selectedBloodType3 ="selected";
        } else if ($bloodTypeTemp == "B-"){
            $selectedBloodType4 ="selected";
        } else if ($bloodTypeTemp == "O+"){
            $selectedBloodType5 ="selected";
        } else if ($bloodTypeTemp == "O-"){
            $selectedBloodType6 ="selected";
        } else if ($bloodTypeTemp == "AB+"){
            $selectedBloodType7 ="selected";
        } else {
            $selectedBloodType8 = "selected";  
        }
        $bloodType = $bloodTypeTemp;
    }
    if(empty($_POST["bornDateYear"]) || empty($_POST["bornDateMonth"]) || empty($_POST["bornDateDay"]) ){
        $bornDateErr = "La fecha de nacimiento del personal es requerido";
    }else{
        $bornDateYearTemp = cleanInput($_POST["bornDateYear"]);
        $bornDateMonthTemp = cleanInput($_POST["bornDateMonth"]);
        $bornDateDayTemp = cleanInput($_POST["bornDateDay"]);
        if (!preg_match("/^[0-9]*$/",$bornDateYearTemp) || !preg_match("/^[0-9]*$/",$bornDateMonthTemp) || !preg_match("/^[0-9]*$/",$bornDateDayTemp) ){
            $bornDateErr = "La fecha de nacimiento solo debe incluir numeros!";
        } else{
            $arreglo = validateDate($bornDateYearTemp, $bornDateMonthTemp, $bornDateDayTemp);
            print $arreglo['yearErr']." xD".$arreglo['monthErr']." xD".$arreglo['dayErr'];
            if (!empty($arreglo['yearErr']) || !empty($arreglo['monthErr']) || !empty($arreglo['dayErr'])){
                $bornDateErr = " ";
            } else{
                $bornDate = $bornDateYearTemp."-".$bornDateMonthTemp."-".$bornDateDayTemp;
            }
        }  
    }
    //lógica para calcular la edad a partir del año
    if ($bornDateMonthTemp <= date("m") && empty($bornDateErr)){
        if($bornDateMonthTemp == date("m") && $bornDateDayTemp < date("d")){
            $age = date("Y") - $bornDateYearTemp - 1;
        } else{
            $age = date("Y") - $bornDateYearTemp;
        }
    } else if (empty($bornDateErr)){
        $age = date("Y") - $bornDateYearTemp;
    }
    
    if(empty($_POST["citizenship"]) ){
        $citizenshipErr = "La nacionalidad es requerida!";
    }else{
        $citizenshipTemp = cleanInput($_POST["citizenship"]);
        if (!preg_match("/^[a-zA-Zñ ]*$/",$citizenshipTemp)){
            $citizenshipErr = "La nacionalidad solo debe incluir letras!";
        }else{
            $citizenship = $citizenshipTemp; 
        }
    }
    if(empty($_POST["gender"]) ){
        $genderErr = "Favor elegir el tipo de sexo!";
    }else{
        $genderTemp = cleanInput($_POST["gender"]);
        if($genderTemp == "1"){
            $selectedGender1 ="selected"; 
        } else {
            $selectedGender2 = "selected";  
        }
        $gender = $genderTemp;
    }
     if(($_POST["maritalStatus"] == 0)){
        $maritalStatusErr = "Favor especificar Estado Civil";
    }else{
        $maritalStatusTemp = cleanInput($_POST["maritalStatus"]);
        if($maritalStatusTemp == 1){
            $checkedmaritalstatus1 ="checked";
            $maritalStatusTemp = "Soltero(a)";
        }else if ($maritalStatusTemp == 2){
            $checkedmaritalstatus2 ="checked";
            $maritalStatusTemp = "Casado(a)";
        }else if ($maritalStatusTemp == 3){
            $checkedmaritalstatus3 ="checked";
            $maritalStatusTemp = "Separado(a)";
        }else if ($maritalStatusTemp == 4){
            $checkedmaritalstatus4 ="checked";
            $maritalStatusTemp = "Viudo(a)";
        }else{
            $checkedmaritalstatus5 ="checked";
            $maritalStatusTemp = "Divorciado(a)";
        }
        $maritalStatus = $maritalStatusTemp;
    }   
    if(empty($_POST["address"]) ){
        $addressErr = "La direccion es requerida!";
    }else{
        $addressTemp = cleanInput($_POST["address"]);
        if (!preg_match("/^[a-zA-Z0-9-# ]*$/",$addressTemp)){
            $addressErr = "La dirección solo debe incluir letras y numeros!";
        }else{
            $address = $addressTemp; 
        }
    } 
    if(empty($_POST["cellphone"]) ){
        $cellphoneErr = "El No. de celular es requerido!";
    }else{
        $cellphoneTemp= cleanInput($_POST["cellphone"]);
        if (!preg_match("/^[0-9- ]*$/",$cellphoneTemp)){
            $cellphoneErr = "El No. de celular solo debe tener numeros, espacios y guiones!";
        }else{
            $cellphone = $cellphoneTemp; 
        }
    }
    if(empty($_POST["email"]) ){
        $emailErr = "El correo electrónico es requerido!";
    }else{
        $emailTemp= cleanInput($_POST["email"]);
        if (!preg_match("/^[a-zA-Z0-9-@. ]*$/",$emailTemp)){
            $emailErr = "El correo electrónico no puede tener caracteres especiales";
        }else{
            $email = $emailTemp; 
        }
    }
    if(empty($_POST["university"]) ){
        $universityErr = "La universidad es requerida!";
    }else{
        $universityTemp = cleanInput($_POST["university"]);
        if (!preg_match("/^[a-zA-Z0-9-# ]*$/",$universityTemp)){
            $universityErr = "La universidad solo debe incluir letras y numeros!";
        }else{
            $university = $universityTemp; 
        }
    } 
    if(empty($_POST["career"]) ){
        $careerErr = "La direccion es requerida!";
    }else{
        $careerTemp = cleanInput($_POST["career"]);
        if (!preg_match("/^[a-zA-Z-# ]*$/",$careerTemp)){
            $careerErr = "La carrera solo debe incluir letras!";
        }else{
            $career = $careerTemp; 
        }
    } 
}
if(!$name == "" && !$location == ""  && !$town == "" && !$capacity == "" && !$bedroom == "" && !$electricity == "" && !$wifi == "" && !$cellphoneSignal == "" && !$ventilation == "" && !$drinkableWater == "" && $flag){
    require_once 'src/login/connect.php';
    $query = "CALL insert_compound('$name','$location','$town','$capacity','$bedroom','$electricity','$wifi','$cellphoneSignal','$ventilation','$toiletQuantity','$drinkableWater')";
    $result= $conn->query($query);
    if (!$result){
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } else{
        if(!empty($_POST["toiletLetrine"])){
                $toiletType = cleanInput($_POST["toiletLetrine"]);
                $query = "CALL insert_compound_toiletType('$name','$toiletType')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["toiletMultiple"])){
                $toiletType = cleanInput($_POST["toiletMultiple"]);
                $query = "CALL insert_compound_toiletType('$name','$toiletType')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error1: '.$conn->error;
                }   
        }
        if(!empty($_POST["toiletSingle"])){
                $toiletType = cleanInput($_POST["toiletSingle"]);
                $query = "CALL insert_compound_toiletType('$name','$toiletType')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error2: '.$conn->error;
                }  
        }
        if (!$flag2){
            echo "<script type='text/javascript'>alert($errorMessage)</script>";
        } else{
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
            $nameTemp = $locationTemp = $townTemp = $capacityTemp = $bedroomTemp = $electricityTemp = $wifiTemp = $cellphoneSignalTemp = $ventilationTemp = $drinkableWaterTemp = $toiletQuantityTemp = $toiletTypeTemp = "";
            $name = $location = $town = $capacity = $bedroom = $electricity = $wifi = $cellphoneSignal = $ventilation = $toiletQuantity = $drinkableWater = $toiletType = "";
            $checkedelectricity = $checkedwifi = $checkedcellphonesignal = $checkedventilation = $checkeddrinkablewater = "checked";
            $checkedelectricity1 = $checkedelectricity2 = $checkedwifi1 = $checkedwifi2 = $checkedcellphonesignal1 = $checkedcellphonesignal2 = $checkedventilation1 = $checkedventilation2 = $checkedventilation3 = $checkeddrinkablewater1 = $checkeddrinkablewater2 = "";
            $selected = "selected";
            $selected1 = $selected2 = $selected3 = "";
            $toiletLetrineCh = $toiletSingleCh = $toiletMultipleCh = "";
        }    
    }
     
}
function cleanInput($data){
    $data = trim($data);
    $data = stripcslashes($data) ;
    $data = htmlspecialchars($data);
    return $data;
}
function validateDate($year,$month,$day){
    $yearErr = $monthErr = $dayErr = "";
    if($year > date("Y") || $year <1){
        $yearErr = "El año no puede ser mayor al actual o negativo";
    }
    if($month > 12 || $month <1){
        $monthErr = "El mes debe ser un numero valido de 1 a 12 ";
    }
    if($day < 1 || $day > 31){
            $dayErr = "El dia no puede ser mayor a 31 o negativo";
    }
    if ($day == 31 && ($month == 4 || $month == 6 || $month == 9 || $month == 11)){
        $dayErr = "Para los meses de Abril, Junio, Septiembre y Noviembre el dia no puede ser mayor a 30";
    }
    if (($day > 28 && $day <32) && $month == 2){
              if (!(is_leap_year($year) == 1)){
                  $dayErr = "Para el mes de Febrero el día no puede ser mayor a 28, solo en años bisiestos";
              }
              else if ($day > 29){
                  $dayErr = "El año seleccionado es bisiesto, Febrero solo tiene 29 dias";
              }
    }
    $validation = array(
        'yearErr' => $yearErr,
        'monthErr' => $monthErr,
        'dayErr' => $dayErr,
    );
    return $validation;
}

function is_leap_year($year){
    return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crear Nuevo Personal</title>
    <link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
    <!--<script type="text/javascript" src="../js/viewformcampamento.js"></script> -->
    <script type="text/javascript" src="js/calendar.js"></script>
    </head>	           
    <body id="main_body" >
            <?php
                require 'header.php';
            ?>
            <div id="form_container">
                    <form id="form_930028" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="form_description">
                            <h1>Formulario de personal</h1>
                    </div>						
                            <ul >

                                            <li id="li_7" >
                    <label class="description" for="element_7">Tipo de Personal </label>
                    <span>
                            <input  name="staffType"  type="radio" value="1" />Permanente
                            <input  name="staffType"  type="radio" value="2" />Temporal
                    </span><p class="guidelines" id="guide_7"><small>Permanentes para contratos indefinidos o de mas de 6 meses
    Temporal para contratos de menos de 6 meses</small></p> 
                    </li>		<li id="li_29" >
                    <label class="description" for="element_29">Fecha de Contratación </label>
                    <span>
                            <input id="element_29_1" name="element_29_1" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_29_1">DD</label>
                    </span>
                    <span>
                            <input id="element_29_2" name="element_29_2" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_29_2">MM</label>
                    </span>
                    <span>
                            <input id="element_29_3" name="element_29_3" class="element text" size="4" maxlength="4" value="" type="text">
                            <label for="element_29_3">YYYY</label>
                    </span>

                    <span id="calendar_29">
                            <img id="cal_img_29" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
                    </span>
                    <script type="text/javascript">
                            Calendar.setup({
                            inputField	 : "element_29_3",
                            baseField    : "element_29",
                            displayArea  : "calendar_29",
                            button		 : "cal_img_29",
                            ifFormat	 : "%B %e, %Y",
                            onSelect	 : selectEuropeDate
                            });
                    </script>

                    </li>		<li id="li_30" >
                    <label class="description" for="element_30">Fecha de Entrevista </label>
                    <span>
                            <input id="element_30_1" name="element_30_1" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_30_1">DD</label>
                    </span>
                    <span>
                            <input id="element_30_2" name="element_30_2" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_30_2">MM</label>
                    </span>
                    <span>
                            <input id="element_30_3" name="element_30_3" class="element text" size="4" maxlength="4" value="" type="text">
                            <label for="element_30_3">YYYY</label>
                    </span>

                    <span id="calendar_30">
                            <img id="cal_img_30" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
                    </span>
                    <script type="text/javascript">
                            Calendar.setup({
                            inputField	 : "element_30_3",
                            baseField    : "element_30",
                            displayArea  : "calendar_30",
                            button		 : "cal_img_30",
                            ifFormat	 : "%B %e, %Y",
                            onSelect	 : selectEuropeDate
                            });
                    </script>

                    </li>		<li id="li_32" >
                    <label class="description" for="element_32">Rol </label>
                    <div>
                    <select class="element select medium" id="element_32" name="element_32"> 
                            <option value="" selected="selected"></option>
    <option value="1" >Rol 1</option>
    <option value="2" >Rol 2</option>
    <option value="3" >Rol 3</option>

                    </select>
                    </div><p class="guidelines" id="guide_32"><small>Cargo del personal</small></p> 
                    </li>		<li id="li_37" >
                    <label class="description" for="element_37">Programas </label>
                    <span>
                            <input  name="ambiental"  type="checkbox" value="1" />Ambiental
                            <input  name="derechosHumanos"  type="checkbox" value="1" />Derechos Humanos
                            <input  name="medical"  type="checkbox" value="1" />Medical
                            <br>
                            <input  name="microfinanzas"  type="checkbox" value="1" />Microfinanzas                           
                            <input  name="negocios"  type="checkbox" value="1" />Negocios
                            <input  name="saludPublica"  type="checkbox" value="1" />Salud Publica
                            <input  name="profesional"  type="checkbox" value="1" />Profesional
                    </span><p class="guidelines" id="guide_37"><small>Programas en los que esta involucrado</small></p>
                    </li>		<li id="li_8" >
                    <label class="description" for="element_8">Nombre </label>
                    <div>
                            <input id="element_8" name="name" class="element text medium" type="text" maxlength="255" value="<?php echo $nameTemp;?>"/> 
                
                    </div> 
                            <span class="error">
                                <p class="error"><?php echo $nameErr;?></p>
                            </span>
                    </li>		<li id="li_9" >
                    <label class="description" for="element_9">Apellido </label>
                    <div>
                            <input id="element_9" name="lastname" class="element text medium" type="text" maxlength="255" value="<?php echo $lastnameTemp;?>"/> 
                    </div> 
                    <span class="error">
                                <p class="error"><?php echo $lastnameErr;?></p>
                            </span>
                    </li>		<li id="li_10" >
                    <label class="description" for="element_10">Cédula/Pasaporte </label>
                    <div>
                            <input id="element_10" name="id" class="element text medium" type="text" maxlength="255" value="<?php echo $idTemp;?>"/> 
                    </div> 
                     <span class="error">
                                <p class="error"><?php echo $idErr;?></p>
                            </span>
                    </li>		<li id="li_11" >
                    <label class="description" for="element_11">Tipo de Sangre </label>
                    <div>
                    <select class="element select medium" id="element_32" name="bloodType"> 
                        <option value="" <?php echo $selectedBloodType;?>></option>
                        <option value="A+" <?php echo $selectedBloodType1;?>>A+</option> 
                        <option value="A-" <?php echo $selectedBloodType2;?>>A-</option>
                        <option value="B+" <?php echo $selectedBloodType3;?>>B+</option>
                        <option value="B-" <?php echo $selectedBloodType4;?>>B-</option>
                        <option value="O+" <?php echo $selectedBloodType5;?>>O+</option>
                        <option value="O-" <?php echo $selectedBloodType6;?>>O-</option>
                        <option value="AB+" <?php echo $selectedBloodType7;?>>AB+</option>
                        <option value="AB-" <?php echo $selectedBloodType8;?>>AB-</option>
                    </select>
                        <span class="error">
                            <p class="error"><?php echo $bloodTypeErr;?></p>
                         </span>
                    </div>
                    </li>		<li id="li_13" >
                    <label class="description" for="element_13">Fecha de Nacimiento </label>
                    <span>
                            <input id="element_13_1" name="bornDateDay" class="element text" size="2" maxlength="2" value="<?php echo $bornDateDayTemp;?>" type="text"> /
                            <label for="element_13_1">DD</label>
                    </span>
                    <span>
                            <input id="element_13_2" name="bornDateMonth" class="element text" size="2" maxlength="2" value="<?php echo $bornDateMonthTemp;?>" type="text"> /
                            <label for="element_13_2">MM</label>
                    </span>
                    <span>
                            <input id="element_13_3" name="bornDateYear" class="element text" size="4" maxlength="4" value="<?php echo $bornDateYearTemp;?>" type="text">
                            <label for="element_13_3">YYYY</label>
                    </span>

                    <span id="calendar_13">
                            <img id="cal_img_13" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
                    </span>
                    <script type="text/javascript">
                            Calendar.setup({
                            inputField	 : "element_13_3",
                            baseField    : "element_13",
                            displayArea  : "calendar_13",
                            button		 : "cal_img_13",
                            ifFormat	 : "%B %e, %Y",
                            onSelect	 : selectEuropeDate
                            });
                    </script>
                    <span class="error">
                            <p class="error"><?php 
                            $print ="";
                            if (!$bornDateErr == ""){
                                $print .= $bornDateErr."<br>";
                            }
                            if (!empty($arreglo['yearErr'])){
                                $print .= $arreglo['yearErr']."<br>";
                            }
                            if (!empty($arreglo['monthErr'])){
                                $print .= $arreglo['monthErr']."<br>";
                            } 
                            if (!empty($arreglo['dayErr'])){
                                $print .= $arreglo['dayErr'];
                            }
                            echo $print;?></p>
                    </span>
                    </li>		<li id="li_12" >
                    <label class="description" for="element_12">Edad </label>
                    <div>
                            <input id="element_12" name="element_12" class="element text small" type="text" maxlength="255" value="<?php echo $age;?>" disabled/> 
                    </div> 
                    </li>		<li id="li_14" >
                    <label class="description" for="element_14">Nacionalidad </label>
                    <div>
                            <input id="element_14" name="citizenship" class="element text medium" type="text" maxlength="255" value="<?php echo $citizenshipTemp;?>"/> 
                    </div> 
                     <span class="error">
                            <p class="error"><?php echo $citizenshipErr;?></p>
                         </span>
                    </li>		<li id="li_34" >
                    <label class="description" for="element_34">Género </label>
                    <div>
                    <select class="element select medium" id="element_34" name="gender"> 
                            <option value="" <?php echo $selectedGender;?>></option>
                            <option value="1" <?php echo $selectedGender1;?> >Masculino </option>
                            <option value="2" <?php echo $selectedGender2;?> >Femenino</option>
                    </select>
                    <br>
                    <span class="error">
                            <p class="error"><?php echo $genderErr;?></p>
                         </span>
                    </div> 
                    </li>		<li id="li_33" >
                    <label class="description" for="element_33">Estado Civil </label>
                    <span>
                            <input  name="maritalStatus" type="radio" value="0" style="display:none;" <?php echo $checkedmaritalstatus;?>/>
                            <input  name="maritalStatus"  type="radio" value="1" <?php echo $checkedmaritalstatus1;?>/>Soltero(a)
                            <input  name="maritalStatus"  type="radio" value="2" <?php echo $checkedmaritalstatus2;?> />Casado(a)
                            <input  name="maritalStatus"  type="radio" value="3" <?php echo $checkedmaritalstatus3;?>/>Separado(a)
                            <br>
                            <input  name="maritalStatus"  type="radio" value="4" <?php echo $checkedmaritalstatus4;?> />Viudo(a)
                            <input  name="maritalStatus"  type="radio" value="5" <?php echo $checkedmaritalstatus5;?> />Divorciado(a)
                    </span> 
                    <span class="error">
                            <p class="error"><?php echo $maritalStatusErr;?></p>
                    </span>
                    </li>		<li id="li_15" >
                    <label class="description" for="element_15">Dirección </label>
                    <div>
                            <input id="element_15" name="address" class="element text large" type="text" maxlength="255" value="<?php echo $addressTemp;?>"/> 
                    </div> 
                      <span class="error">
                            <p class="error"><?php echo $addressErr;?></p>
                         </span>
                    </li>		<li id="li_16" >
                    <label class="description" for="element_16">No. de Celular </label>
                    <div>
                            <input id="element_16" name="cellphone" class="element text medium" type="text" maxlength="255" value="<?php echo $cellphoneTemp;?>"/> 
                    </div> 
                      <span class="error">
                            <p class="error"><?php echo $cellphoneErr;?></p>
                         </span>
                    </li>		<li id="li_17" >
                    <label class="description" for="element_17">Email </label>
                    <div>
                            <input id="element_17" name="email" class="element text medium" type="text" maxlength="255" value="<?php echo $emailTemp;?>"/> 
                    </div> 
                      <span class="error">
                            <p class="error"><?php echo $emailErr;?></p>
                         </span>
                    </li>		<li class="section_break">
                            <h3>Contacto de Emergencia</h3>
                            <p></p>
                    </li>		<li id="li_19" >
                    <label class="description" for="element_19">Nombre </label>
                    <div>
                            <input id="element_19" name="element_19" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_20" >
                    <label class="description" for="element_20">Telefono </label>
                    <div>
                            <input id="element_20" name="element_20" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_21" >
                    <label class="description" for="element_21">Dirección </label>
                    <div>
                            <input id="element_21" name="element_21" class="element text large" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Salud</h3>
                            <p></p>
                    </li>		<li id="li_35" >
                    <label class="description" for="element_35">Condición Médica </label>
                    <span>
                            <input id="element_35_1" name="diabetes"  type="checkbox" value="1" />Diabetes
                            <input id="element_35_2" name="hipertension"  type="checkbox" value="1" />Hipertension
                            <input id="element_35_3" name="asma"  type="checkbox" value="1" />Asma
                            <br>
                            <input id="element_35_4" name="problemasCardiacos"  type="checkbox" value="1" />Problemas Cardiacos
                            <input id="element_35_5" name="epilepsia"  type="checkbox" value="1" />Epilepsia
                            <br>
                            <input id="element_35_6" name="na"  type="checkbox" value="1" />Ninguna de las anteriores
                            <br>
                            <input id="element_35_7" name="otro"  type="checkbox" value="1" />Otro
                    </span> 
                    </li>		<li id="li_23" >
                    <label class="description" for="element_23">Otro: </label>
                    <div>
                            <input id="element_23" name="element_23" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_36" >
                    <label class="description" for="element_36">Alergias </label>
                    <span>
                            <input id="element_36_1" name="alergia"  type="radio" value="1" />Si   
                            <input id="element_36_2" name="alergia"  type="radio" value="2" />No
                    </span> 
                    </li>		<li id="li_24" >
                    <label class="description" for="element_24">¿Cual? </label>
                    <div>
                            <input id="element_24" name="element_24" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Conocimiento de Idiomas</h3>
                            <p></p>
                    </li>		<li id="li_38" >
                    <label class="description" for="element_38">Idiomas </label>
                    <span>
                        <input id="element_38_1" name="ingles"  type="checkbox" value="1" />Ingles                        
                        <input id="element_38_2" name="frances"  type="checkbox" value="1" />Frances                        
                        <input id="element_38_3" name="portugues"  type="checkbox" value="1" />Portugues                        
                        <br>
                        <input id="element_38_4" name="otro"  type="checkbox" value="1" />Otro                     
                    </span> 
                    </li>		<li id="li_31" >
                    <label class="description" for="element_31">Otro: </label>
                    <div>
                            <input id="element_31" name="element_31" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Educación</h3>
                            <p></p>
                    </li>		<li id="li_27" >
                    <label class="description" for="element_27">Universidad </label>
                    <div>
                            <input id="element_27" name="university" class="element text large" type="text" maxlength="255" value="<?php echo $universityTemp;?>"/> 
                    </div> 
                    <span class="error">
                            <p class="error"><?php echo $universityErr;?></p>
                         </span>
                    </li>		<li id="li_28" >
                    <label class="description" for="element_28">Carrera </label>
                    <div>
                            <input id="element_28" name="career" class="element text large" type="text" maxlength="255" value="<?php echo $careerTemp;?>"/> 
                    </div>
                    <span class="error">
                            <p class="error"><?php echo $careerErr;?></p>
                         </span>
                    </li>

                                            <li class="buttons">
                                <input type="hidden" name="form_id" value="930028" />

                                    <input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                    </li>
                            </ul>
                    </form>	
            </div>
    </body>
</html>