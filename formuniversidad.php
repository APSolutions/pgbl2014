<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
//variables del formulario
$university = $country = $location = "";
$universityTemp = $countryTemp = $locationTemp = "";
$universityErr = $countryErr = $locationErr = "";
//asignacion de variables
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["university"]) ){
        $universityErr = "El nombre de la universidad es requerido!";
    }else{
        $universityTemp = cleanInput($_POST["university"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$universityTemp)){
            $universityErr = "El nombre solo debe incluir letras!";
        }else{
            $university = $universityTemp;
        }
    }
    if(empty($_POST["country"]) ){
        $countryErr = "El País de la universidad es requerido!";
    }else{
        $countryTemp = cleanInput($_POST["country"]); 
        if (!preg_match("/^[a-zA-Z ]*$/",$countryTemp)){
            $countryErr = "El país solo debe incluir letras!";
        }else{
            $country = $countryTemp;
        }
    }
    if(empty($_POST["location"]) ){
        $locationErr = "La ubicación de la universidad es requerida!";
    }else{
        $locationTemp = cleanInput($_POST["location"]);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/",$locationTemp)){
            $locationErr = "La ciudad/estado solo debe incluir letras!";
        }else{
            $location = $locationTemp; 
        }
    }
}
if(!$university == "" && !$country == "" && !$location == ""){
    require_once 'src/login/connect.php';
    $query = "CALL insert_university('$university','$country','$location')";
    $result= $conn->query($query);
    if (!$result){
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } else{
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        $universityTemp = $countryTemp = $locationTemp = "";
        $university = $country = $location = "";
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Configuraciones de <?php echo $_SESSION["position"]?> </title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, main, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
    </head>
    <body id="main_body" >
        <?php
            require 'header.php';
        ?>
	<div id="form_container">
            <form id="form_928984" class="appnitro"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form_description">
                    <h1>Formulario de Universidad</h1>
                </div>						
                <ul >
                    <li id="li_1" >
                        <label class="description" for="university">Nombre de la Universidad</label>
                        <div>
                            <input id="university" name="university" class="element text medium" type="text" maxlength="255" value="<?php echo $universityTemp;?>"/> 
                            <span class="error">
                                <?php echo $universityErr;?>
                            </span>
                        </div><p class="guidelines" id="guide_1"><small>Nombre de la Comunidad</small></p>
                    </li>
                    <li id="li_2" >
                        <label class="description" for="country">Páis </label>
                        <div>
                            <input id="country" name="country" class="element text medium" type="text" maxlength="255" value="<?php echo $countryTemp;?>"/>
                            <span class="error">
                                <?php echo $countryErr;?>
                            </span>
                        </div><p class="guidelines" id="guide_2"><small>País de origen de la Universidad</small></p> 
                    </li>
                    <li id="li_3" >
                        <label class="description" for="location">Ciudad/Estado </label>
                        <div>
                            <input id="location" name="location" class="element text medium" type="text" maxlength="255" value="<?php echo $locationTemp;?>"/>
                            <span class="error">
                                <?php echo $locationErr;?>
                            </span>
                        </div><p class="guidelines" id="guide_3"><small>Ciudad de origen de la universidad o estado si es de Estados Unidos</small></p> 
                    </li>
                    <li class="buttons">
                        <a>
                            <input type="submit" name="Submit" class="btn btn-primary btn-large btn-block" value="Submit"/>
                        </a>                
                    </li>
                </ul>
            </form> 
        </div>
    </body>
</html>
