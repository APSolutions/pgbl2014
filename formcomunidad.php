<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
//variables para editar
require 'src/settings/Edit.php';
if ($ename != "" && $elocation != "" && $emembers != ""){  
    $nameTemp = $locationTemp = $commMembersTemp = $programTemp ="";   
    $selected = "selected";
    $selected1 = $selected2 = $selected3 = "";
    $programAmbienteCh = $programHumanRightsCh = $programMedicalCh = $programMicrofinanceCh = $programBusinessCh = $programPublicHealthCh = $programProfesionalCh = "";
    $flag = $flag2 = TRUE;
    $nameTemp = $ename;
    $locationTemp = $elocation;
    $commMembersTemp = $emembers;
    if($locationTemp == "Darien"){
           $selected1 ="selected"; 
    }elseif($locationTemp == "Panama Este"){
        $selected2 ="selected";
    }else{
        $selected3 = "selected";  
    }
    for ($i=0;$i<count($ecommunityProgram);$i++){
        for($j=0;$j<$col;$j++){
            if  ($ecommunityProgram[$i][$j] == 2){
                $programBusinessCh = "checked";
            }elseif ($ecommunityProgram[$i][$j] == 4){
                $programAmbienteCh = "checked";
            }elseif ($ecommunityProgram[$i][$j] == 5){
                $programHumanRightsCh = "checked";
            }elseif ($ecommunityProgram[$i][$j] == 6){
                $programMedicalCh = "checked";
            }elseif ($ecommunityProgram[$i][$j] == 7){
                $programMicrofinanceCh = "checked";
            }elseif ($ecommunityProgram[$i][$j] == 8){
                $programPublicHealthCh = "checked";
            }elseif ($ecommunityProgram[$i][$j] == 10){
                $programProfesionalCh = "checked";
            }
        }
    }
   
    
} else{
    $nameTemp = $locationTemp = $commMembersTemp = $programTemp ="";   
    $selected = "selected";
    $selected1 = $selected2 = $selected3 = "";
    $programAmbienteCh = $programHumanRightsCh = $programMedicalCh = $programMicrofinanceCh = $programBusinessCh = $programPublicHealthCh = $programProfesionalCh = "";
    $flag = $flag2 = TRUE;
}

//variables del formulario
$name = $location = $commMembers = $program = "";
$nameErr = $locationErr = $commMembersErr = $programErr ="";
$errorMessage = "";


//asignacion de variables
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"]) && $ename == "" ){
        $nameErr = "El nombre del campamento es requerido!";
    }elseif ($ename == ""){
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
        }else{
            $programAmbienteCh = "";
        }
        if (!empty($_POST["humanRights"])){
            $programHumanRightsCh = "checked";
        }else{
            $programHumanRightsCh = "";
        }
        if (!empty($_POST["medical"])){
            $programMedicalCh = "checked";
        }else{
            $programMedicalCh = "";
        }
        if (!empty($_POST["microfinanzas"])){
            $programMicrofinanceCh = "checked";
        }else{
            $programMicrofinanceCh = "";
        }
        if (!empty($_POST["negocios"])){
            $programBusinessCh = "checked";
        }else{
            $programBusinessCh = "";
        }
        if (!empty($_POST["publicHealth"])){
            $programPublicHealthCh = "checked";
        }else{
            $programPublicHealthCh= "";
        }
        if (!empty($_POST["profesional"])){
            $programProfesionalCh = "checked";
        }else{
            $programProfesionalCh = "";
        }
    }
}

if(!$name == "" && !$location == "" && !$commMembers && $flag){
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
            header("location:src/webrouter.php?position=Comunidades+&action= ");     
        }    
    }
     
}elseif (!$ename == "" && !$location == "" && !$commMembers == "" && $flag){
    require 'src/login/connect.php';
    $query = "CALL modify_community('$ename','$location','$commMembers')";
    $result= $conn->query($query);
    if (!$result){
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }else{
        for ($i=0;$i<count($ecommunityProgram);$i++){
            for($j=0;$j<$col;$j++){
                if ($programBusinessCh == "checked" && $ecommunityProgram[$i][$j] != 2){
                    $query = "CALL insert_communityxprogram('$ename','2')";
                    $result= $conn->query($query);
                }
                if ($programAmbienteCh == "checked" && $ecommunityProgram[$i][$j] != 4){
                    $query = "CALL insert_communityxprogram('$ename','4')";
                    $result= $conn->query($query);
                }
                if ($programHumanRightsCh == "checked" && $ecommunityProgram[$i][$j] != 5){
                    $query = "CALL insert_communityxprogram('$ename','5')";
                    $result= $conn->query($query);
                }
                if ($programMedicalCh == "checked" && $ecommunityProgram[$i][$j] != 6){
                    $query = "CALL insert_communityxprogram('$ename','6')";
                    $result= $conn->query($query);
                }
                if ($programMicrofinanceCh == "checked" && $ecommunityProgram[$i][$j] != 7){
                    $query = "CALL insert_communityxprogram('$ename','7')";
                    $result= $conn->query($query);
                }
                if ($programPublicHealthCh == "checked" && $ecommunityProgram[$i][$j] != 8){
                    $query = "CALL insert_communityxprogram('$ename','8')";
                    $result= $conn->query($query);
                }
                if ($programProfesionalCh == "checked" && $ecommunityProgram[$i][$j] != 10){
                    $query = "CALL insert_communityxprogram('$ename','10')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 2 && $programBusinessCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','2')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 4 && $programAmbienteCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','4')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 5 && $programHumanRightsCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','5')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 6 && $programMedicalCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','6')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 7 && $programMicrofinanceCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','7')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 8 && $programPublicHealthCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','8')";
                    $result= $conn->query($query);
                }
                if ($ecommunityProgram[$i][$j] == 10 && $programProfesionalCh != "checked"){
                    $query = "CALL delete_communityxprograms('$ename','10')";
                    $result= $conn->query($query);
                }
            }
        }
        $name = $location = $commMembers = $program = "";
        $nameTemp = $locationTemp = $commMembersTemp = $programTemp ="";
        $nameErr = $locationErr = $commMembersErr = $programErr ="";
        $selected = "selected";
        $selected1 = $selected2 = $selected3 = "";
        $programAmbienteCh = $programHumanRightsCh = $programMedicalCh = $programMicrofinanceCh = $programBusinessCh = $programPublicHealthCh = $programProfesionalCh = "";
        header("location:src/webrouter.php?position=Comunidades+&action= ");
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
<script>
    function disableName(){
            var ename = "";
            ename = <?php echo json_encode($ename); ?>;
            if (!ename == ""){
                document.getElementById('name').disabled = true;
            }
    }
</script>
</head>
<body id="main_body" onload="disableName();" >
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
