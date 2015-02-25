<?php
require 'src/ficha/ficha.php';
require 'src/login/usuario.php';

session_name('Global');
session_id('pgbl');
session_start();

$position=$_SESSION["position"] = "Detalle de la Ficha";
$_SESSION["action"] = "";
$_SESSION["program"] = "";

$ficha = $_SESSION["ficha"];

$fichaID = $ficha->getID();
$fichaGenerals = $ficha->getFichaData();
$aContenido = $ficha->getCompCommStaff();
$compounds = getArray($aContenido, 0);
$communities = getArray($aContenido, 1);
$staffCoordinator = getArray($aContenido, 2);
$staffInterpreter = getArray($aContenido, 3);
$staffDrivers = getArray($aContenido, 4);
$staffParamedics = getArray($aContenido, 5);
$staffTecnicians = getArray($aContenido, 6);
$staffOthers = getArray($aContenido, 7);

print $fichaGenerals['id'].$fichaGenerals['compound'].$fichaGenerals['community'];
function getArray($aContenido, $col){
    $array = array();
    $i=0;
    $rows = count($aContenido);
    for ($row = 0; $row < $rows; $row++) {
        if ($aContenido[$row][$col] != ""){
            $array[$i] = $aContenido[$row][$col];
            $i=$i+1;
        } 
    }
    return $array;
}



?>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Fichas" />
        <meta name="keywords" content="global brigades, panama, fichas, programa" />
        <meta name="author" content="APSolution" />
        <title>Global Brigades Panama | Fichas</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/ficha.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <!-- JS scripts-->
        <script src="js/ficha.js"></script>
        <script type="text/javascript">
            function getCommunities(){
                var a = <?php echo json_encode($communities)?>;
                return a;
            }
            function getCompounds(){
                var a = <?php echo json_encode($compounds)?>;
                return a;
            }
            function getStaffCoordinator(){
                var a = <?php echo json_encode($staffCoordinator)?>;
                return a;
            }
            function getStaffInterpreter(){
                var a = <?php echo json_encode($staffInterpreter)?>;
                return a;
            }
            function getStaffDrivers(){
                var a = <?php echo json_encode($staffDrivers)?>;
                return a;
            }
            function getStaffParamedics(){
                var a = <?php echo json_encode($staffParamedics)?>;
                return a;
            }
            function getStaffTecnicians(){
                var a = <?php echo json_encode($staffTecnicians)?>;
                return a;
            }
            function getStaffOthers(){
                var a = <?php echo json_encode($staffOthers)?>;
                return a;
            }
            function selectedCommunity(){
                var a = <?php echo json_encode($fichaGenerals["community"])?>;
                return a;
            }
            function selectedCompound(){
                var a = <?php echo json_encode($fichaGenerals["compound"])?>;
                return a;
            }
        </script>
    </head>
    <body onload="loadData(getCommunities(),getCompounds(),getStaffCoordinator(),getStaffInterpreter(),getStaffDrivers(),getStaffParamedics(),getStaffTecnicians(),getStaffOthers());loadCommunities(selectedCommunity());loadCompounds(selectedCompound());loadStaffCoordinator(' ');loadStaffInterpreter(' ');loadStaffDrivers(' ');loadStaffParamedics(' ');loadStaffTecnicians('');loadStaffOthers('')" >
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="fichaSection fichaGenerals">
                <h2 class="ficha-tittle"><?php echo $fichaID;?>
                    <span class="ficha-program"><?php echo $fichaGenerals["program"]?></span>
                </h2>
                <h2 class="ficha-places"> Comunidad </h2>
                <select class="cs-select" id="communityList"></select>
                <h2 class="ficha-places"> Campamento </h2>                
                <select class="cs-select" id="compoundList"></select>                            
            </div>
            <div class="fichaSection fichaFlights">
                <div class="flights">
                    <h2 class="ficha-tittle">Vuelos</h2>
                    <table id="tableFlights">
                        <tr>
                            <td><h4>Vuelo</h4></td>
                            <td><h4>Fecha y Hora</h4></td>
                            <td><h4>Estudiantes</h4></td>
                        </tr>
                    </table>                    
                </div>                
            </div>
            <div class="fichaSection fichaTransportation">
                <div class="busses">
                    <h2 class="ficha-tittle">Transporte</h2>
                </div>
                <h2 class="ficha-places">Tour por la ciudad</h2>
                <select class="cs-select">
                    <option value="0" selected>No</option>
                    <option value="1">Si</option>
                </select>
                <h3>Total de Estudiantes</h3><span>10</span> 
            </div>
            <div class="fichaSection fichaStaff">
                <h2 class="ficha-tittle">Staff</h2>
                <div>
                    <h2 class="ficha-places"> Coordinador </h2>
                    <select class="cs-select" id="coordinatorList"></select>
                    <h2 class="ficha-places"> Interpretes </h2>                
                    <select class="cs-select" id="interpreterList"></select>
                    <h2 class="ficha-places"> Chofer </h2>                
                    <select class="cs-select" id="driverList"></select>
                </div>
            </div>
            <div class="fichaSection fichaStaff">
                <h2 class="ficha-tittle">Staff</h2>
                <div>
                    <h2 class="ficha-places"> Paramédico </h2>
                    <select class="cs-select" id="paramedicList"></select>
                    <h2 class="ficha-places"> Técnico </h2>                
                    <select class="cs-select" id="technicianList"></select>  
                    <h2 class="ficha-places"> Otros </h2>                
                    <select class="cs-select" id="otherList"></select>
                </div>
            </div>            
            <div class="fichaSection fichaVolunteers" style="clear: both;">
                <h2 class="ficha-tittle">Voluntarios</h2>
                <div class="volunteers">
                    <table id="tableVolunteers">
                        <tr>
                            <td><h4>Identificación</h4></td>
                            <td><h4>Nombre</h4></td>
                            <td><h4>Apellido</h4></td>
                            <td><h4>Llega antes</h4></td>
                            <td><h4>Se retira solo</h4></td>
                            <td><h4>Alergias</h4></td>
                            <td><h4>Dieta</h4></td>
                            <td><h4>Comentarios</h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>      
    </body>
</html>
