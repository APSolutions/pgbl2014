
<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
//variables del formulario
$name = $contractType = $capacity = $carYear = $licencePlate = $owner = $ownerCellphone = $insuranceCompany = $insuranceNumber = $insuranceType = "";
$nameTemp = $contractTypeTemp = $capacityTemp = $carYearTemp = $licencePlateTemp = $ownerTemp = $ownerCellphoneTemp = $insuranceCompanyTemp = $insuranceNumberTemp = $insuranceTypeTemp = "";
$nameErr = $contractTypeErr = $capacityErr = $carYearErr = $licencePlateErr = $ownerErr = $ownerCellphoneErr = $insuranceCompanyErr = $insuranceNumberErr = $insuranceTypeErr = "";
$checkedcontract = $checkedinsurance = "checked";
$checkedcontract1 = $checkedcontract2 = $checkedcontract3 = $checkedinsurance1 = $checkedinsurance2 = "";
//asignacion de variables
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"]) ){
        $nameErr = "El nombre del vehículo es requerido!";
    }else{
        $nameTemp = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$nameTemp)){
            $nameErr = "El nombre solo debe incluir letras!";
        }else{
            $name = $nameTemp;
        }
    }
    if(($_POST["contractType"] == 0)){
        $contractTypeErr = "El tipo de contrato del vehículo es requerido!";
    }else{
        $contractTypeTemp = cleanInput($_POST["contractType"]);
        if($contractTypeTemp == 1){
            $checkedcontract1 ="checked"; 
        } else if ($contractTypeTemp == 2){
            $checkedcontract2 ="checked";
        } else{
            $checkedcontract3 ="checked";
        }
        $contractType = $contractTypeTemp;
    }
    if(empty($_POST["capacity"]) ){
        $capacityErr = "La capacidad del vehículo es requerida!";
    }else{
        $capacityTemp = cleanInput($_POST["capacity"]);
        if (!preg_match("/^[0-9]*$/",$capacityTemp)){
            $capacityErr = "La capacitdad solo debe incluir números!";
        }else{
            $capacity = $capacityTemp; 
        }
    }
    if(empty($_POST["carYear"]) ){
        $carYearErr = "El año del vehículo es requerido!";
    } else {
        $carYearTemp = cleanInput($_POST["carYear"]);
        if (!preg_match("/^[0-9]*$/",$carYearTemp)){
            $carYearErr = "El año solo debe incluir números!";
        }else{
            $carYear = $carYearTemp;
        }
    }
    if(empty($_POST["licencePlate"]) ){
        $licencePlateErr = "La placa del vehículo es requerida!";
    } else {
        $licencePlateTemp = cleanInput($_POST["licencePlate"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$licencePlateTemp)){
            $licencePlateErr = "La placa solo debe incluir letras y números!";
        }else{
            $licencePlate = $licencePlateTemp;
        }
    }  
    if(empty($_POST["owner"]) ){
        $ownerErr = "El arrendatario del vehículo es requerido!";
    } else {
        $ownerTemp = cleanInput($_POST["owner"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$ownerTemp)){
            $ownerErr = "El nombre del arrendatario solo debe incluir letras!";
        }else{
            $owner = $ownerTemp;
        }
    }
    if(empty($_POST["ownerCellphone"]) ){
        $ownerCellphoneErr = "El teléfono del arrendatario del vehículo es requerido!";
    } else {
        $ownerCellphoneTemp = cleanInput($_POST["ownerCellphone"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$ownerCellphoneTemp)){
            $ownerCellphoneErr = "El teléfono del arrendatario solo debe incluir letras y números!";
        }else{
            $ownerCellphone = $ownerCellphoneTemp;
        }
    }
    if(empty($_POST["insuranceCompany"]) ){
        $insuranceCompanyErr = "La aseguradora del vehículo es requerida!";
    } else {
        $insuranceCompanyTemp = cleanInput($_POST["insuranceCompany"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$insuranceCompanyTemp)){
            $insuranceCompanyErr = "El nombre de la aseguradora solo debe incluir letras y números!";
        }else{
            $insuranceCompany = $insuranceCompanyTemp;
        }
    }
    if(empty($_POST["insuranceNumber"]) ){
        $insuranceNumberErr = "La poliza del seguro del vehículo es requerida!";
    } else {
        $insuranceNumberTemp = cleanInput($_POST["insuranceNumber"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$insuranceNumberTemp)){
            $insuranceNumberErr = "La poliza de seguro solo debe incluir letras y números!";
        }else{
            $insuranceNumber = $insuranceNumberTemp;
        }
    }
    if($_POST["insuranceType"] == 0 ){
        $insuranceTypeErr = "El tipo de seguro del vehículo es requerido!";
    } else {
        $insuranceTypeTemp = cleanInput($_POST["insuranceType"]);
        if($insuranceTypeTemp == 1){
            $checkedinsurance1 ="checked"; 
        } else{
            $checkedinsurance2 ="checked";
        }
        $insuranceType = $insuranceTypeTemp;
    }
}

if(!$name == "" && !$contractType == ""  && !$capacity == "" && !$carYear == "" && !$licencePlate == "" && !$owner == "" && !$ownerCellphone == "" && !$insuranceCompany == "" && !$insuranceNumber == "" && !$insuranceType == ""){
    require_once 'src/login/connect.php';
    $query = "CALL insert_vehicles('$name','$contractType','$capacity','$carYear','$licencePlate','$owner','$ownerCellphone','$insuranceCompany','$insuranceNumber','$insuranceType')";
    $result= $conn->query($query);
    if (!$result){
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } else{
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        $nameTemp = $contractTypeTemp = $capacityTemp = $carYearTemp = $licencePlateTemp = $ownerTemp = $ownerCellphoneTemp = $insuranceCompanyTemp = $insuranceNumberTemp = $insuranceTypeTemp = "";
        $name = $contractType = $capacity = $carYear = $licencePlate = $owner = $ownerCellphone = $insuranceCompany = $insuranceNumber = $insuranceType = "";
        $checkedcontract1 = $checkedcontract2 = $checkedcontract3 = $checkedinsurance1 = $checkedinsurance2 = "";
        $checkedcontract = $checkedinsurance = "checked";
    }
}
function cleanInput($data){
    $data = trim($data);
    $data = stripcslashes($data) ;
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Crear Nuevo Vehículo</title>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
<link rel="stylesheet" type="text/css" href="css/settings/default.css" />
<!--<script type="text/javascript" src="../js/viewformuniversidad.js"></script>-->
</head>
<body id="main_body" >
        <?php
        require 'header.php';
        ?>
	<div id="form_container">
		<form id="form_930114" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form_description">
			<h1>Formulario de Vehículo</h1>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Nombre </label>
		<div>
			<input id="name" name="name" class="element text medium" type="text" maxlength="255" value="<?php echo $nameTemp;?>"/> 
                        <span class="error">
                            <a><?php echo $nameErr;?></a>
                        </span>
                </div><p class="guidelines" id="guide_1"><small>Modelo, Apodo, Marca, que identifique el vehículo</small></p> 
		</li>		<li id="li_9" >
		<label class="description" for="contractType">Tipo de Contrato </label>
                <span>
                    <input  name="contractType" type="radio" value="0" style="display:none;" <?php echo $checkedcontract;?>>
                    <input  name="contractType" type="radio" value="1" <?php echo $checkedcontract1;?>>Propio
                    <input  name="contractType" type="radio" value="2" <?php echo $checkedcontract2;?>>Arrendadora
                    <input  name="contractType" type="radio" value="3" <?php echo $checkedcontract3;?>>Contrato

                <span class="error">
                    <a><?php echo $contractTypeErr;?></a>
</span>

		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="capacity">Capacidad </label>
		<div>
			<input id="capacity" name="capacity" class="element text small" type="text" maxlength="255" value="<?php echo $capacityTemp;?>"/> 
                        <br>
                        <span class="error">
                            <a> <?php echo $capacityErr;?></a>
                        </span>
                </div><p class="guidelines" id="guide_2"><small>Cantidad de puestos que tiene el vehículo</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="carYear">Año  </label>
		<div>
			<input id="carYear" name="carYear" class="element text small" type="text" maxlength="255" value="<?php echo $carYearTemp;?>"/> 
                        <br>
                        <span class="error">
                            <a><?php echo $carYearErr;?></a> 
                        </span>
                </div><p class="guidelines" id="guide_3"><small>Año del vehículo</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="licencePlate">Placa </label>
		<div>
			<input id="licencePlate" name="licencePlate" class="element text small" type="text" maxlength="255" value="<?php echo $licencePlateTemp;?>"/> 
                        <br>
                        <span class="error">
                            <a><?php echo $licencePlateErr;?></a>
                        </span>
                </div> 
		</li>		<li id="li_5" >
		<label class="description" for="owner">Arrendatario </label>
		<div>
			<input id="owner" name="owner" class="element text medium" type="text" maxlength="255" value="<?php echo $ownerTemp;?>"/> 
                        <span class="error">
                            <a><?php echo $ownerErr;?></a>
                        </span>
                </div><p class="guidelines" id="guide_5"><small>Nombre de la compañía o persona dueña del vehículo</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="ownerCellphone">Telefono del arrendatario </label>
		<div>
			<input id="ownerCellphone" name="ownerCellphone" class="element text small" type="text" maxlength="255" value="<?php echo $ownerCellphoneTemp;?>"/> 
                        <span class="error">
                            <a><?php echo $ownerCellphoneErr;?></a>
                        </span>
                </div> 
		</li>		<li id="li_7" >
		<label class="description" for="insuranceCompany">Aseguradora </label>
		<div>
			<input id="insuranceCompany" name="insuranceCompany" class="element text medium" type="text" maxlength="255" value="<?php echo $insuranceCompanyTemp;?>"/> 
                        <span class="error">
                            <a><?php echo $insuranceCompanyErr;?></a>
                        </span>
                </div> 
		</li>		<li id="li_8" >
		<label class="description" for="insuranceNumber">Poliza </label>
		<div>
			<input id="insuranceNumber" name="insuranceNumber" class="element text medium" type="text" maxlength="255" value="<?php echo $insuranceNumberTemp;?>"/> 
                        <span class="error">
                            <a><?php echo $insuranceNumberErr;?></a>
                        </span>
                </div> 
		</li>		<li id="li_10" >
		<label class="description" for="insuranceType">Tipo de Seguro </label>
		<span>
                    <input style="display:none;" name="insuranceType"  type="radio" value="0" <?php echo $checkedinsurance;?> />
                    <input  name="insuranceType"  type="radio" value="1" <?php echo $checkedinsurance1;?>/>Completo
                    <input name="insuranceType"  type="radio" value="2" <?php echo $checkedinsurance2;?> />Terceros

<span class="error">
    <a><?php echo $insuranceTypeErr;?></a>
</span>
		</span> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="930114" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>