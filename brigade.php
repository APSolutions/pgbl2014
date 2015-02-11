<?php
require 'src/login/usuario.php';
require 'src/brigade/brigade.php';

session_name('Global');
session_id('pgbl');
session_start();

$_SESSION["position"] = "Formulario de Brigada";
$brigade = new Brigade();


if (isset($_SESSION["brigadeID"]) && !empty($_SESSION["brigadeID"])){
    //Configures data for existing brigades
    $bdeID = $_SESSION["brigadeID"];
    $brigade->getBasicData($bdeID);
    $brigade->getUniversitiesData($bdeID);
}else {
    //Configures data for a new brigade
    $bdeID = "Ninguno";
}

if(!empty($_POST)){
    require 'src/login/connect.php';
    $date = date('Md',strtotime($_POST["dtop"]));
    $var1 = $_POST["dtop"];
    $var2 = $_POST["dted"];
    $var3 = $_POST["prog"];
    $query = "INSERT INTO pgbl2014.ficha (id, startingDate, endDate, officeArrivalDate, officeLeaveDate, totalStudents, cityTour, compound, community, program) VALUES ('TEST0?-$date', '$var1', '$var2', NULL, NULL, NULL, NULL, NULL, NULL, '$var3');";
    $result = $conn->query($query);
    if (!$result) {
        die('Invalid query: ' . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Brigada" />
        <meta name="keywords" content="global brigades, panama, brigada" />
        <meta name="author" content="APSolution" />
        <title>Global Brigades Panama | Brigade</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="css/brigade.css"/>
        <!-- CSS scripts-->
        <script type="text/javascript" src="js/brigade.js"></script>
        <script type="text/javascript">
            function init(){
                var bdeID = <?php echo json_encode($bdeID);?>; 
                setBrigade(bdeID);
            }
        </script>
    </head>
    <body onload="init();">
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <h2>Datos de la Brigada</h2>
            <div class="basics">                
                <div class="brigade-id main">
                    <span class="title">ID Asignado:</span>
                    <span class="content" id="bde-id">
                        <?php echo $bdeID?>
                    </span>
                </div>
                
                <div class="brigade-program main">
                    <span class="title">Programa:</span>
                    <span class="content" id="program-content" data-value="<?php echo $brigade->getProgramID();?>">
                        <?php echo $brigade->getProgram();?>
                    </span>                    
                    <select id="selectProgram" class="cs-select" onclick="programClick()">
                        <option value="" selected></option>
                        <?php require 'src/brigade/getProgramsList.php';?>
                    </select>
                    <div id="updateProgram" class="update-field pointer">
                        <a class="update-field" onclick="updateProgram()">
                            <span class="icon-add"></span>
                        </a>
                    </div>                    
                </div>
                <span class="error" id="prog-error"></span>
                <div class="brigade-subprog main">
                    <span class="title">Sub programa:</span>
                    <span class="content" id="subprog-content" data-value="<?php echo $brigade->getProgramID();?>">
                        <?php echo $brigade->getProgram();?>
                    </span>                    
                    <select id="selectProgram" class="cs-select" onclick="programClick()">
                        <option value="" selected></option>
                        <?php require 'src/brigade/getProgramsList.php';?>
                    </select>
                    <div id="updateProgram" class="update-field pointer">
                        <a class="update-field" onclick="updateProgram()">
                            <span class="icon-add"></span>
                        </a>
                    </div>                    
                </div>
                
                <div class="brigade-universities main">
                    <span class="title">Universidad/es:</span>
                    <div class="content" id="univ-content">
                        <ul class="univesitiesList" id="universitiesList">
                            <?php $brigade->getUniversities();?>
                        </ul>                        
                    </div>
                    <div id="addUniv" class="add-field pointer">
                        <a class="add-field" onclick="showUniversityList()">
                            <span class="icon-add"></span>
                        </a>
                    </div>
                    <select id="selectUniversity" class="cs-select" onclick="addUniversity()">
                        <option value="" selected></option>
                        <?php require 'src/brigade/getUniversitiesList.php';?>
                    </select>
                </div>
                <span class="error" id="univ-error"></span>
                
                <div class="brigade-dates main">
                    <h3>Fechas</h3>
                    <div>
                        <span class="title">Inicio:</span>
                        <span class="content">
                            <input type="date" name="dtop" id="dtop" value="<?php echo $brigade->getOpeningDate();?>" onchange="updateDate(0)"/>
                        </span>
                    </div>
                    <div>
                        <span class="title">Final:</span>
                        <span class="content">
                            <input type="date" name="dted" id="dted" value="<?php echo $brigade->getEndingDate();?>" onchange="updateDate(1)"/>
                        </span>
                    </div>
                </div>
                <div class="btn-save-updt">
                    <button id="bde-save-updt" onclick="saveUpdateBasics()">Save/Update</button>
                </div>
            </div>
            <div class="flights">
                <h2>Vuelos</h2>                
                <form id="frmFlights" class="required" method="post" action="">
                    <input type="text" name="flightNumber" required/>
                    <input type="date" name="flightDate" required/>
                    <input type="time" name="flightTime" required/>
                    <input type="number" name="flightStudents"/>
                    <select name="flightType">
                        <option value="0" selected>Llegada</option>
                        <option value="1">Salida</option>
                    </select>
                    <input type="button" value="Add"/>
                </form>                
            </div>
            <div class="volunteers">
                <h2>Voluntarios</h2>
                <form id="frmVolunteers" class="required" method="post" action="">
                    <input type="text" name="volunteerID" required/>
                    <input type="text" name="volunteerName" required/>
                    <input type="text" name="volunteerLastName" required/>
                    <select name="flightType">
                        <option value="0" selected>Voluntario</option>
                        <option value="1">Presidente</option>
                        <option value="2">Tutor</option>
                    </select>
                    <input type="text" name="volunteerAllergies"/>
                    <input type="text" name="volunteerDiet"/>
                    <input type="text" name="volunteerComments"/>
                    <input type="checkbox" name="volunteerArrive"/>
                    <input type="checkbox" name="volunteerLeave"/>
                </form>
            </div>
            <div id="forms-space" class="forms">
                <form id="bas-frm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <input type="hidden" name="prog" id="prog-input" value="null">
                    <input type="hidden" name="univ" id="univ-count" value="null">
                    <input type="hidden" name="dtop" id="dtop-input" value="null">
                    <input type="hidden" name="dted" id="dted-input" value="null">
                </form>
                <form id="flt-frm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <input type="hidden" name="fltQT" id="fltQt-input" value="null">
                </form>
                <form id="vol-frm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <input type="hidden" name="volQT" id="volQt-input" value="null">
                </form>
            </div>
        </div>
    </body>
</html>
