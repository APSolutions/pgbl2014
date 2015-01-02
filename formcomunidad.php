<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
//variables del formulario
$name = $location = $commMembers = $program = "";
$nameTemp = $locationTemp = $commMembersTemp = $programTemp ="";
$nameErr = $locationErr = $commMembersErr = $programErr ="";
$selected = "selected";
$selected1 = $selected2 = $selected3 = "";
$programAmbienteCh = $programHumanRightsCh = $programMedicalCh = $programMicrofinanceCh = $programBusinessCh = $programPublicHealthCh = $programProfesionalCh = "";
$flag = $flag2 = TRUE;
$errorMessage = "";
//asignacion de variables
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"]) ){
        $nameErr = "El nombre de la comunidad es requerido!";
    }else{
        $nameTemp = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$nameTemp)){
            $nameErr = "El nombre solo debe incluir letras!";
        }else{
            $name = $nameTemp;
        }
    }
    if($_POST["location"] == "" ){
        $locationErr = "La provincia de la comunidad es requerida!";
    }else{
        $locationTemp = cleanInput($_POST["location"]);
        if($locationTemp == "Darien"){
            $selected1 ="selected"; 
        } else if ($locationTemp == "Panama Este"){
            $selected2 ="selected";
        } else {
            $selected3 = "selected";  
        }
        $location = $locationTemp;
    }
   
    $commMembersTemp = cleanInput($_POST["commMembers"]);
    if (!preg_match("/^[0-9 ]*$/",$commMembersTemp)){
        $commMembersErr = "La población solo debe incluir números!";
    }else{
        $commMembers = $commMembersTemp;
    }
    if(empty($_POST["ambiente"]) && empty($_POST["humanRights"]) && empty($_POST["medical"]) && empty($_POST["microfinanzas"]) && empty($_POST["negocios"]) && empty($_POST["publicHealth"]) && empty($_POST["profesional"]) ){
        $programErr = "Favor especificar los programas activos en la comunidad!";  
        $flag = FALSE;
    } else {
        if (!empty($_POST["ambiente"])){
            $programAmbienteCh = "checked";
        }
        if (!empty($_POST["humanRights"])){
            $programHumanRightsCh = "checked";
        }
        if (!empty($_POST["medical"])){
            $programMedicalCh = "checked";
        }
        if (!empty($_POST["microfinanzas"])){
            $programMicrofinanceCh = "checked";
        }
        if (!empty($_POST["negocios"])){
            $programBusinessCh = "checked";
        }
        if (!empty($_POST["publicHealth"])){
            $programPublicHealthCh = "checked";
        }
        if (!empty($_POST["profesional"])){
            $programProfesionalCh = "checked";
        }
    }
}

if(!$name == "" && !$location == "" && $flag){
    require 'src/login/connect.php';
    $query = "CALL insert_community('$name','$location','$commMembers')";
    $result= $conn->query($query);
    if (!$result){
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } else{
        if(!empty($_POST["ambiente"])){
                $program = cleanInput($_POST["ambiente"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["humanRights"])){
                $program = cleanInput($_POST["humanRights"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["medical"])){
                $program = cleanInput($_POST["medical"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["microfinanzas"])){
                $program = cleanInput($_POST["microfinanzas"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["negocios"])){
                $program = cleanInput($_POST["negocios"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["publicHealth"])){
                $program = cleanInput($_POST["publicHealth"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if(!empty($_POST["profesional"])){
                $program = cleanInput($_POST["profesional"]);
                $query = "CALL insert_communityxprogram('$name','$program')";
                $result= $conn->query($query);
                if (!$result){
                        $flag2 = FALSE;
                        $errorMessage = $errorMessage.'Error0: '.$conn->error;
                    }
        }
        if (!$flag2){
            echo "<script type='text/javascript'>alert($errorMessage)</script>";
        } else{
            echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
            $name = $location = $commMembers = $program = "";
            $nameTemp = $locationTemp = $commMembersTemp = $programTemp ="";
            $nameErr = $locationErr = $commMembersErr = $programErr ="";
            $selected = "selected";
            $selected1 = $selected2 = $selected3 = "";
            $programAmbienteCh = $programHumanRightsCh = $programMedicalCh = $programMicrofinanceCh = $programBusinessCh = $programPublicHealthCh = $programProfesionalCh = "";
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
<title>Crear Nueva Comunidad </title>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
<!--<script type="text/javascript" src="../js/viewformcomunidad.js"></script>-->
</head>
<body id="main_body" >
	<?php
        require 'header.php';
        ?>
	<div id="form_container">
		<form id="form_928984" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form_description">
			<h1>Formulario de Comunidad</h1>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="name">Nombre </label>
		<div>
			<input id="name" name="name" class="element text medium" type="text" maxlength="255" value="<?php echo $nameTemp;?>"/> 
                         <span class="error">
                            <p class="error"><?php echo $nameErr;?></p>
                        </span>
                </div><p class="guidelines" id="guide_1"><small>Nombre de la Comunidad</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="location">Provincia </label>
		<div>
		<select class="element select medium" id="location" name="location"> 
			<option value="" <?php echo $selected;?>></option>
                        <option value="Darien" <?php echo $selected1;?> >Darien</option>
                        <option value="Panama Este" <?php echo $selected2;?> >Panamá Este</option>
                        <option value="Panama Oeste" <?php echo $selected3;?> >Panamá Oeste</option>
		</select>
                <span class="error">
                       <p class="error"><?php echo $locationErr;?></p>
                </span>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="commMembers">Población </label>
		<div>
			<input id="commMembers" name="commMembers" class="element text medium" type="text" maxlength="255" value="<?php echo $commMembersTemp;?>"/> 
                        <span class="error">
                            <p class="error"><?php echo $commMembersErr;?></p>
                        </span>
                </div><p class="guidelines" id="guide_2"><small>Total de habitantes en la comunidad</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Programas </label>
		<span>
			<input id="element_4_1" name="ambiente" class="element checkbox" type="checkbox"<?php echo $programAmbienteCh;?>  value="4" />
<label class="choice" for="element_4_1">Ambiente</label>
<input id="element_4_2" name="humanRights" class="element checkbox" type="checkbox" <?php echo $programHumanRightsCh;?> value="5" />
<label class="choice" for="element_4_2">Derechos Humanos</label>
<input id="element_4_3" name="medical" class="element checkbox" type="checkbox"<?php echo $programMedicalCh;?> value="6" />
<label class="choice" for="element_4_3">Medico Dental</label>
<input id="element_4_4" name="microfinanzas" class="element checkbox" type="checkbox"<?php echo $programMicrofinanceCh;?> value="7" />
<label class="choice" for="element_4_4">Microfinanzas</label>
<input id="element_4_5" name="negocios" class="element checkbox" type="checkbox"<?php echo $programBusinessCh;?> value="2" />
<label class="choice" for="element_4_5">Negocios</label>
<input id="element_4_6" name="publicHealth" class="element checkbox" type="checkbox"<?php echo $programPublicHealthCh;?> value="8" />
<label class="choice" for="element_4_6">Salud Pública</label>
<input id="element_4_7" name="profesional" class="element checkbox" type="checkbox" <?php echo $programProfesionalCh;?> value="10" />
<label class="choice" for="element_4_7">Profesional</label>

		</span><p class="guidelines" id="guide_4"><small>Programas activos en la comunidad</small></p> 
		 <span class="error">
                            <p class="error"><?php echo $programErr;?></p>
                        </span>
                </li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="928984" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>
