<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
//variables del formulario
$name = $location = $town = $capacity = $bedroom = $electricity = $wifi = $cellphoneSignal = $ventilation = $toiletQuantity = $drinkableWater = $accomodation = $toiletType = "";
$nameTemp = $locationTemp = $townTemp = $capacityTemp = $bedroomTemp = $electricityTemp = $wifiTemp = $cellphoneSignalTemp = $ventilationTemp = $toiletQuantityTemp = $drinkableWaterTemp = $toiletTypeTemp ="";
$nameErr = $locationErr = $townErr = $capacityErr = $bedroomErr = $electricityErr = $wifiErr = $cellphoneSignalErr = $ventilationErr = $toiletQuantityErr = $drinkableWaterErr = $toiletTypeErr = "";
$checkedelectricity = $checkedwifi = $checkedcellphonesignal = $checkedventilation = $checkeddrinkablewater = "checked";
$checkedelectricity1 = $checkedelectricity2 = $checkedwifi1 = $checkedwifi2 = $checkedcellphonesignal1 = $checkedcellphonesignal2 = $checkedventilation1 = $checkedventilation2 = $checkedventilation3 = $checkeddrinkablewater1 = $checkeddrinkablewater2 = "";
//asignacion de variables
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"]) ){
        $nameErr = "El nombre del campamento es requerido!";
    }else{
        $nameTemp = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$nameTemp)){
            $nameErr = "El nombre solo debe incluir letras!";
        }else{
            $name = $nameTemp;
        }
    }
    if($_POST["location"] == "" ){
        $locationErr = "La provincia del campamento es requerida!";
    }else{
        $locationTemp = cleanInput($_POST["location"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$locationTemp)){
            $locationErr = "El nombre solo debe incluir letras!";
        }else{
            $location = $locationTemp;
        }
    }
     if(empty($_POST["town"]) ){
        $townErr = "La comunidad del campamento es requerida!";
    }else{
        $locationTemp = cleanInput($_POST["town"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$townTemp)){
            $townErr = "El nombre solo debe incluir letras!";
        }else{
            $town = $townTemp;
        }
    }
    if(empty($_POST["capacity"]) ){
        $capacityErr = "La capacidad del campamento es requerida!";
    }else{
        $capacityTemp = cleanInput($_POST["capacity"]);
        if (!preg_match("/^[0-9]*$/",$capacityTemp)){
            $capacityErr = "La capacidad solo debe incluir números!";
        }else{
            $capacity = $capacityTemp; 
        }
    }
    if(empty($_POST["bedroom"]) ){
        $bedroomErr = "La cantidad de habitaciones del campamento es requerida!";
    }else{
        $bedroomTemp = cleanInput($_POST["bedroom"]);
        if (!preg_match("/^[0-9]*$/",$bedroomTemp)){
            $bedroomErr = "La cantidad de habitaciones solo debe incluir números!";
        }else{
            $bedroom = $bedroomTemp; 
        }
    }
    if(($_POST["electricity"] == 0)){
        $electricityErr = "Favor especificar si tiene o nó electricidad el campamento";
    }else{
        $electricityTemp = cleanInput($_POST["electricity"]);
        if($electricityTemp == 1){
            $checkedelectricity1 ="checked"; 
        } else{
            $checkedelectricity2 ="checked";
        }
        $electricity = $electricityTemp;
    }
    if(($_POST["wifi"] == 0)){
        $wifiErr = "Favor especificar si tiene o nó wifi el campamento";
    }else{
        $wifiTemp = cleanInput($_POST["wifi"]);
        if($wifiTemp == 1){
            $checkedwifi1 ="checked"; 
        } else{
            $checkedewifi2 ="checked";
        }
        $wifi = $wifiTemp;
    }
    if(($_POST["cellphoneSignal"] == 0)){
        $cellphoneSignalErr = "Favor especificar si tiene o nó señal de celular el campamento";
    }else{
        $cellphoneSignalTemp = cleanInput($_POST["cellphoneSignal"]);
        if($cellphoneSignalTemp == 1){
            $checkedcellphonesignal1 ="checked"; 
        } else{
            $checkedcellphonesignal2 ="checked";
        }
        $cellphoneSignal = $cellphoneSignalTemp;
    }
    if(($_POST["ventilation"] == 0)){
        $ventilationErr = "Favor especificar tipo de ventilación en el campamento";
    }else{
        $ventilationTemp = cleanInput($_POST["ventilation"]);
        if($ventilationTemp == 1){
            $checkedventilation1 ="checked"; 
        }else if($ventilationTemp == 2){
            $checkedventilation2 ="checked"; 
        } else{
            $checkedcellphonesignal3 ="checked";
        }
        $ventilation = $ventilationTemp;
    }
    if(($_POST["drinkableWater"] == 0)){
        $drinkableWaterErr = "Favor especificar si tiene o nó agua potable el campamento";
    }else{
        $drinkableWaterTemp = cleanInput($_POST["drinkableWater"]);
        if($drinkableWaterTemp == 1){
            $checkeddrinkablewater1 ="checked"; 
        } else{
            $checkeddrinkablewater2 ="checked";
        }
        $drinkableWater = $drinkableWaterTemp;
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
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["toiletLetrine"]) && empty($_POST["toiletMultiple"]) && empty($_POST["toiletSingle"]) ){
            $toiletTypeErr = "Favor especificar los tipos de baños del campamento!";
        }
        else{
            if(!empty($_POST["toiletLetrine"])){
                $toiletTypeTemp = cleanInput($_POST["toiletLetrine"]);
                $toiletType = $toiletTypeTemp;
                require_once 'src/login/connect.php';
                $query = "CALL insert_compound_toiletType('$name','$toiletType')";
                $result= $conn->query($query);
                if (!$result){
                        echo "<script type='text/javascript'>alert('failed!')</script>";
                    } else{
                        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";   
                    }
            }
            if(!empty($_POST["toiletMultiple"])){
                $toiletTypeTemp = cleanInput($_POST["toiletMultiple"]);
                $toiletType = $toiletTypeTemp;
                require_once 'src/login/connect.php';
                $query = "CALL insert_compound_toiletType('$name','$toiletType')";
                $result= $conn->query($query);
                if (!$result){
                        echo "<script type='text/javascript'>alert('failed!')</script>";
                    } else{
                        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";   
                    }
            }
            if(!empty($_POST["toiletSingle"])){
                $toiletTypeTemp = cleanInput($_POST["toiletSingle"]);
                $toiletType = $toilettypeTemp;
                require_once 'src/login/connect.php';
                $query = "CALL insert_compound_toiletType('$name','$toiletSingle')";
                $result= $conn->query($query);
                if (!$result){
                        echo "<script type='text/javascript'>alert('failed!')</script>";
                    } else{
                        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";   
                    }
            }
            $nameTemp = $contractTypeTemp = $capacityTemp = $carYearTemp = $licencePlateTemp = $ownerTemp = $ownerCellphoneTemp = $insuranceCompanyTemp = $insuranceNumberTemp = $insuranceTypeTemp = "";
            $name = $contractType = $capacity = $carYear = $licencePlate = $owner = $ownerCellphone = $insuranceCompany = $insuranceNumber = $insuranceType = "";
        }
}
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
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crear Nuevo Campamento</title>
    <link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/settings/default.css" />
<!--<script type="text/javascript" src="../js/viewformcampamento.js"></script> -->
    </head>	           
    <body id="main_body" >
            <?php
                require 'header.php';
            ?>
	<div id="form_container">
		<form id="form_930028" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form_description">
			<h1>Formulario de campamento</h1>
                    </div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Nombre </label>
		<div>
			<input id="name" name="name" class="element text large" type="text" maxlength="255" value=""/> 
                        <span class="error">
                            <a><?php echo $nameErr;?></a>
                        </span>
		</div><p class="guidelines" id="guide_1"><small>Nombre del Campamento</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="location">Provincia </label>
		<div>
		<select class="element select medium" id="location" name="location"> 
			<option value="" selected="selected"></option>
                        <option value="1" >Daríen</option>
                        <option value="2" >Panamá Este</option>
                        <option value="3" >Panamá Oeste</option>
		</select>
                    <span class="error">
                           <a><?php echo $locationErr;?></a>
                    </span>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="town">Comunidad </label>
		<div>
			<input id="town" name="town" class="element text medium" type="text" maxlength="255" value=""/> 
                        <span class="error">
                            <a><?php echo $townErr;?></a>
                        </span>
                </div><p class="guidelines" id="guide_2"><small>Pueblo o Comunidad donde esta ubicado el campamento</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="capacity">Capacidad </label>
		<div>
			<input id="capacity" name="capacity" class="element text small" type="text" maxlength="255" value=""/> 
                        <span class="error">
                            <a><?php echo $capacityErr;?></a>
                        </span>
                </div><p class="guidelines" id="guide_4"><small>Cantidad de personas que puede recibir el campamento</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="bedroom">Habitaciones </label>
		<div>
			<input id="bedroom" name="bedroom" class="element text small" type="text" maxlength="255" value=""/> 
                        <span class="error">
                            <a><?php echo $bedroomErr;?></a>
                        </span>
                </div><p class="guidelines" id="guide_6"><small>Cantidad de habitaciones que tiene el campamento</small></p> 
		</li>		<li id="li_7" >
		<label class="description" for="electricity">Electricidad </label>
		<span>
                    <input  name="electricity" type="radio" value="0" style="display:none;" <?php echo $checkedelectricity;?>>
                    <input name="electricity"  type="radio" value="1" <?php echo $checkedelectricity1;?> />Sí
                    <input name="electricity"  type="radio" value="2" <?php echo $checkedelectricity2;?> />No
                    <span class="error">
                            <a><?php echo $electricityErr;?></a>
                    </span>
		</span><p class="guidelines" id="guide_7"><small>¿El campamento tiene electricidad?</small></p> 
		</li>		<li id="li_8" >
		<label class="description" for="wifi">Wifi </label>
		<span>
                    <input  name="wifi" type="radio" value="0" style="display:none;" <?php echo $checkedwifi;?>>
                    <input  name="wifi"  type="radio" value="1" <?php echo $checkedwifi1;?>/>Sí
                    <input  name="wifi"  type="radio" value="2" <?php echo $checkedwifi2;?> />No
                    <span class="error">
                            <a><?php echo $wifiErr;?></a>
                    </span>
		</span><p class="guidelines" id="guide_8"><small>¿El campamento tiene acceso a Internet?</small></p> 
		</li>		<li id="li_9" >
		<label class="description" for="cellphoneSignal">Señal de Celular </label>
		<span>
                    <input  name="cellphoneSignal" type="radio" value="0" style="display:none;" <?php echo $checkedcellphonesignal;?>>
                    <input  name="cellphoneSignal"  type="radio" value="1" <?php echo $checkedcellphonesignal1;?>/>Sí
                    <input  name="cellphoneSignal"  type="radio" value="2" <?php echo $checkedcellphonesignal2;?>/>No
                    <span class="error">
                            <a><?php echo $cellphoneSignalErr;?></a>
                    </span>
		</span> 
		</li>		<li id="li_10" >
		<label class="description" for="ventilation">Ventilación </label>
		<span>
                     <input  name="ventilation" type="radio" value="0" style="display:none;" <?php echo $checkedventilation;?>>
			<input id="name0_1" name="ventilation" class="element radio" type="radio" value="1" <?php echo $checkedventilation1;?>/>
                <label class="choice" for="name0_1">Aire Acondicionado</label>
                <input id="name0_2" name="ventilation" class="element radio" type="radio" value="2" <?php echo $checkedventilation2;?> />
                <label class="choice" for="name0_2">Abanico</label>
                <input id="name0_3" name="ventilation" class="element radio" type="radio" value="3" <?php echo $checkedventilation3;?>/>
                <label class="choice" for="name0_3">Ninguno</label>
                <span class="error">
                            <a><?php echo $ventilationErr;?></a>
                </span>
		</span> 
		</li>		<li id="li_11" >
		<label class="description" for="drinkableWater">Agua Potable </label>
		<span>
                    <input  name="drinkableWater" type="radio" value="0" style="display:none;" <?php echo $checkeddrinkablewater;?>>
                    <input  name="drinkableWater" type="radio" value="1" <?php echo $checkeddrinkablewater1;?> />Sí
                    <input  name="drinkableWater" type="radio" value="2" <?php echo $checkeddrinkablewater2;?> />No
                    <span class="error">
                            <a><?php echo $drinkableWaterErr;?></a>
                    </span>
                </span> 
		</li>		<li id="li_12" >
		<label class="description" for="name2">Tipo de Baño </label>
		<span>
			<input id="name2_1" name="toiletLetrine" class="element checkbox" type="checkbox" value="Letrina" />
                <label class="choice" for="name2_1">Letrina</label>
                <input id="name2_2" name="toiletMultiple" class="element checkbox" type="checkbox" value="Baño Comunal" />
                <label class="choice" for="name2_2">Baño Comunal</label>
                <input id="name2_3" name="toiletSingle" class="element checkbox" type="checkbox" value="Baño Individual" />
                <label class="choice" for="name2_3">Baño Individual</label>
                <span class="error">
                    <a><?php echo $toiletTypeErr;?></a>
                </span>
		</span><p class="guidelines" id="guide_12"><small>Tipos de baño que tiene el campamento</small></p> 
		</li>		<li id="li_5" >
		<label class="description" for="toiletQuantity">Cantidad de baños </label>
		<div>
			<input id="toiletQuantity" name="toiletQuantity" class="element text small" type="text" maxlength="255" value=""/> 
                        <span class="error">
                            <a><?php echo $toiletQuantityErr;?></a>
                        </span>
                </div> 
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