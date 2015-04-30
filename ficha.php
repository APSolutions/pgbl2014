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
$idate = $fichaGenerals["iDate"];
$fdate = $fichaGenerals["fDate"];
$fichaFlightsa = $ficha->getFlightsa();
$fichaFlightsd = $ficha->getFlightsd();
$fichaVehicles = $ficha->getVehicles();
$fichaUniversity = $ficha->getUniversities();
//$selectedStaffCoordinator = $ficha->getStaff();
$aContenido = $ficha->getCompCommStaff();
$compounds = getArray($aContenido, 0);
$communities = getArray($aContenido, 1);
$staffCoordinator = getArray($aContenido, 2);
$staffInterpreter = getArray($aContenido, 3);
$staffDrivers = getArray($aContenido, 4);
$staffParamedics = getArray($aContenido, 5);
$staffTecnicians = getArray($aContenido, 6);
$staffOthers = getArray($aContenido, 7);

 $aHeader = $bHeader = $aVoluntarios = array();
 $aVoluntarios = $ficha->getVolunteers();

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

//header of table
    $aHeader = array(
            '0' => "Identificacion",
            '1' => "Nombre",
            '2' => "Apellido",
            '3' => "Llega antes",
            '4' => "Se retira solo",
            '5' => "Alergias",
            '6' => "Dieta",
            '7' => "Comentarios",
            );
    $bHeader = array(
            '0' => "Vuelo",
            '1' => "Fecha",
            '2' => "# de Estudiantes",
        );

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
            function selectedArrivalHour(){
                var a = <?php echo json_encode($fichaGenerals["aDate"])?>;
                return a;
            }
            function selectedLeaveHour(){
                var a = <?php echo json_encode($fichaGenerals["dDate"])?>;
                return a;
            }
        </script>
    </head>
    <body onload="loadData(getCommunities(),getCompounds(),getStaffCoordinator(),getStaffInterpreter(),getStaffDrivers(),getStaffParamedics(),getStaffTecnicians(),getStaffOthers());loadCommunities(selectedCommunity());loadCompounds(selectedCompound());loadStaffCoordinator(' ');loadStaffInterpreter(' ');loadStaffDrivers(' ');loadStaffParamedics(' ');loadStaffTecnicians('');loadStaffOthers('');loadArrivalHour(selectedArrivalHour());loadLeaveHour(selectedLeaveHour())" >
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="fichaSection fichaGenerals">
                <h2 class="ficha-tittle"><?php echo $fichaID?>
                    <span class="ficha-program"><?php echo $fichaGenerals["program"]?></span>
               
                <table id="tableUniversidad"> 
                    <thead>
                        <tr>                                 
                            <th align="left"></th>                                                                                                
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                           for($i=0;$i<count($fichaUniversity);$i++){
                                echo "<tr id=\"$i\">";
                                echo "<td id=\"$i\">".$fichaUniversity[$i]."</td>";
                                echo"</tr>"; 
                            }                                                                                                     
                        ?>  
                    </tbody>
                </table>
                <h2 class="ficha-places"> Comunidad </h2>
                <select class="cs-select" id="communityList"></select>
                <h2 class="ficha-places"> Campamento </h2>                
                <select class="cs-select" id="compoundList"></select>                            
            </div>
            <div class="fichaSection fichaDates">
                <div class="fechas">
                    <h2 class="ficha-tittle">Fechas</h2>
                </div>
                <h2 class="ficha-places">Inicio de Brigada</h2>
                <span><?php echo $idate ?></span>
                <h3>Fin de Brigada</h3>
                <span><?php echo $fdate ?></span>
                <h2 class="ficha-places">Hora de Llegada</h2>
                <select class="cs-select" id="arrivalhour">
                    <?php
                        $start = "08:00";
                        $end = "20:00";
                        $tStart = strtotime($start);
                        $tEnd = strtotime($end);
                        $tNow = $tStart;
                        while($tNow <= $tEnd){
                            echo "<option value="."".date("H:i",$tNow).">".date("H:i",$tNow)." </option>"."\n";
                            $tNow = strtotime('+30 minutes',$tNow);
                        }
                    ?>               
                </select >
                <h3>Hora de Salida</h3>
                <select class="cs-select" id="leavehour">
                    <?php
                        $start = "08:00";
                        $end = "20:00";
                        $tStart = strtotime($start);
                        $tEnd = strtotime($end);
                        $tNow = $tStart;
                        while($tNow <= $tEnd){
                            echo "<option value=".date("H:i",$tNow).">".date("H:i",$tNow)." </option>"."\n";
                            $tNow = strtotime('+30 minutes',$tNow);
                        }
                    ?>               
                </select>
            </div>
            <div class="fichaSection fichaFlights">
                <div class="flights">
                    <h3 class="ficha-tittle">Vuelos</h3>
                    <h3 class="ficha-h3">Vuelos de Llegada</h3>
                        <table class="tableFlightsArrival">
                            <thead>
                                <tr>
                                    <?php
                                        for ($i=0; $i<count($bHeader); $i++) {
                                        echo "<th align=\"center\" >".$bHeader[$i]."</th>";                       
                                        }
                                    ?>
                                </tr> 
                            </thead>
                            <tbody>
                            <?php
                               for($i=0;$i<count($fichaFlightsa);$i++){
                                    echo "<tr id=\"$i\">";
                                    for($j=0;$j<3;$j++){
                                       echo "<td align=\"center\">".$fichaFlightsa[$i][$j]."</td>";  
                                    }                                                               
                                }
                                echo"</tr>";                         
                            ?>
                            </tbody>
                        </table>
                </div>
                <div class="flights">
                    <h3 class="ficha-h3">Vuelos de Salida</h3>
                        <table class="tableFlightsDeparture">
                            <thead>
                                <tr>
                                    <?php
                                      for ($i=0; $i<count($bHeader); $i++) {
                                      echo "<th align=\"center\">".$bHeader[$i]."</th>";                       
                                      }
                                    ?>
                              </tr> 
                            </thead>
                            <tbody>
                            <?php
                               for($i=0;$i<count($fichaFlightsd);$i++){
                                    echo "<tr id=\"$i\">";
                                    for($j=0;$j<3;$j++){
                                       echo "<td align=\"center\">".$fichaFlightsd[$i][$j]."</td>";  
                                    }                                                               
                                }
                                echo"</tr>";                         
                            ?>
                            </tbody>
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
                    <!-- Multi select for coordinator field -->
                    <dt>
                        <label>Coordinador
                            <select class="cs-select" id="coordinatorList" onclick="addCoordinator()">
                                <option>Seleccione uno o varios</option>
                            </select>
                            <span class="error"></span>
                            <select id="selectedCoordinator" name="coor" multiple="multiple" hidden="hidden"></select>
                        </label>
                    </dt>  
                    <!-- List for selected coordinators-->
                    <dd>
                        <ol id="selectedCoordinatorList">

                        </ol>
                    </dd>
                    <!-- Multi select for Interpreter field -->
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
        </div>     
        <div class="fichaSection fichaVolunteers" style="clear: both;">
                <h2 class="ficha-tittle">Voluntarios</h2>
                <div class="volunteers">
                    <table id="tableVolunteers">
                         <thead>
                    <tr>
                        <?php
                            for ($i=0; $i<count($aHeader); $i++) {
                            echo "<th>".$aHeader[$i]."</th>";                       
                            }
                        ?>
                    </tr> 
                    </thead>
                    <tbody>
                    <?php
                       for($i=0;$i<count($aVoluntarios);$i++){
                            echo "<tr id=\"$i\">";
                            for($j=0;$j<8;$j++){
                               echo "<td>".$aVoluntarios[$i][$j]."</td>";  
                            }                                                               
                        }
                        echo"</tr>";                         
                    ?>
                    </tbody>
                    </table>
                </div>
        </div>
    </body>
</html>
