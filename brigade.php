<?php
require 'src/login/usuario.php';
require 'src/brigade/brigade.php';
require 'src/brigade/brigadeData.php';

session_name('Global');
session_id('pgbl');
session_start();

$_SESSION["position"] = "Formulario de Brigada";
$brigade = new Brigade();
$bdeData = new BrigadeData();

$priProg = $secProg = $univ = $dtop = $dted = $priDtop = $priDted = $secDtop = $secDted = "";
$error = $subProg = 0;
$priProgErr = $secProgErr = $univError = $priDtopError = $priDtedError = $secDtopError = $secDtedError = "";

if (isset($_SESSION["brigadeID"]) && !empty($_SESSION["brigadeID"])){
    //Configures data for existing brigades
    $bdeID = $_SESSION["brigadeID"];
    $brigade->getBasicData($bdeID);
}else {
    //Configures data for a new brigade
    $bdeID = "";
}

if(!empty($_POST)){
    require 'src/login/connect.php';    
    
    if($_POST["priProg"] == 0){
        $priProgErr = "Debe Seleccionar un programa";
        $error = 1;
    }  else {
        $priProg = $_POST["priProg"];
    }
    if(isset($_POST["subprogram"])){
        $subProg = 1;
        if($_POST["secProg"] == 0){
            $secProgErr = "Debe Seleccionar un programa secundario";
            $error = 1;
        }else{
            $secProg = $_POST["secProg"];
        }
        if($_POST["priDtop"]===""){
            $priDtopError = "Debe elegir una fecha de inicio para el programa primario";
            $error = 1;
        }  else {
            $priDtop = $_POST["priDtop"];
        }
        if($_POST["priDted"]===""){
            $priDtedError = "Debe elegir una fecha de conclusion para el programa primario";
            $error = 1;
        }else{
            $priDted = $_POST["priDted"];
        }
        if($_POST["secDtop"]===""){
            $secDtopError = "Debe elegir una fecha de inicio para el programa secundario";
            $error = 1;
        }else{
            $secDtop = $_POST["secDtop"];
        }
        if($_POST["secDted"]===""){
            $secDtedError = "Debe elegir una fecha de conclusion para el programa secundario";
            $error = 1;
        }else{
            $secDted = $_POST["secDted"];
        }
    }else{
        $subProg = 0;
    }    
    if(!isset($_POST["univ"])){
        $error = 1;
        $univError = "Debe seleccionar al menos una universidad";
    }else{
        $univ = $_POST["univ"];
    }
    
    
    if ($error == 0){
        $dtop = $_POST["dtop"];
        $dted = $_POST["dted"];
        
        $bdeID = $brigade->generateID($priProg, $subProg, $dtop);
        if ($brigade->saveBasics($bdeID, $_POST["dtop"], $dted, $priProg, $secProg, $priDtop, $priDted, $secDtop, $secDted) == 1){
            $_SESSION["brigadeID"] = $bdeID;
        }
    }
}

if (isset($_SESSION["brigadeID"]) && !empty($_SESSION["brigadeID"])){
    //Configures data for existing brigades
    $bdeID = $_SESSION["brigadeID"];
    $brigade->getBasicData($bdeID);
}else {
    //Configures data for a new brigade
    $bdeID = "";
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
        
            <!--Principales-->
            <link rel="stylesheet" type="text/css" href="css/header.css" />
            <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
            <link rel="stylesheet" type="text/css" href="css/brigade.css"/>
            <link rel="stylesheet" type="text/css" href="css/Table.css"/>
            <link rel="stylesheet" type="text/css" href="css/brigade/main.css"/>
            
            <!--Para el formulario de Brigada-->
            <link rel="stylesheet" type="text/css" href="css/brigade/brigadeForm.css">
            
            
                
        
        <!-- Javasctipt scripts-->
        
            <!--Principales-->
            
            <script type="text/javascript" src="js/brigade.js"></script>
            <script type="text/javascript" src="js/settings/tablesorter/jquery-latest.js"></script>
            <script type="text/javascript" src="js/settings/tablesorter/jquery.tablesorter.js"></script> 
            <script type="text/javascript" src="js/settings/tablesorter/jquery.tablesorter.min.js"></script> 
            <script type="text/javascript" src="js/Table.js"></script>
        
            <!--Para el formulario de brigada-->
            
            <script type="text/javascript" src="js/brigade/newBrigade.js"></script>
            
        <!--Javacript para inicializar la pagina-->
        
        <script type="text/javascript">
            function init(){
                
                //Definicion de variables
                
                var bdeID = <?php echo json_encode($bdeID);?>;
                var subProg = <?php echo json_encode($subProg);?>;
                var error = <?php echo json_encode($error);?>;
                var progs = <?php echo json_encode($bdeData->getPrograms());?>;
                var univs = <?php echo json_encode($bdeData->getUniversities());?>;
                var univ = <?php echo json_encode($brigade->getUniversities());?>;
                var vols = <?php echo json_encode($brigade->getVolunteers());?>;
                var flts = <?php echo json_encode($brigade->getFlights());?>;               
                
                //Condiciones de inicio
                
                //Brigada
                setProgSelect(progs);
                setUnivSelect(univs);
                
                
                setBrigade(bdeID);
                setStage(bdeID);
                loadInfo(bdeID,univ,vols,flts);
                
                
                if (subProg === 1 && error === 1){
                    addSubProgram();
                }
                
                //viewEdit();
                //botonViewhover(false);
                //botonEdithover(false); 
                $(document).ready(function() 
                { 
                    $("#table-flights").tablesorter();
                    $("#table-volunteers").tablesorter();
                } 
                );
                }                              
        </script>        
    </head>
    <body onload="init();">
        <?php
        require 'header.php';
        ?>
        <div class="contenido">
            
            <!--
            Seccion para el formulario de los datos principales de la brigada 
            -->
            
            <div class="seccion" id="brigada">
                
                <!--Formulario de datos principales de brigada-->
                
                <div class="formulario">                    
                    
                    <span class="tituloFormulario"> Formulario de la Brigada </span>
                    <span class="instrucciones"> Todos los campos son requeridos</span>
                    
                    <form id="formBrigada" name="formBrigada" method="post" action="">
                        
                        <!--Programa Principal-->
                        
                        <label for="mainProgSelect" class="bgdeLabel"> Programa: </label>
                        <select id="mainProgSelect" name="mainProg" class="bgdeField bgdeSelect">
                            <option value=NULL> seleccione un programa </option>
                        </select>
                        <span id="mainProgErro" class="error"></span>
                        
                        <!--Universidades-->
                        
                        <label for="univSelect" class="bgdeLabel"> Universidad/es: </label>
                        <select id="univSelect" class="bgdeField bgdeSelect" onclick="addUniversity()" >
                            <option value=NULL>seleccione una o varias universidades</option>
                        </select>
                        <span class="error"></span>                        
                        <!--Multiselect de las universidades-->
                        <select id="selectedUniv" name="univ" multiple="multiple" hidden="hidden"></select>
                        <!--Lista para mostar las universidades selccionadas-->
                        <label class="bgdeLabel"> Universidad seleccionada: </label>
                        <ol id="selectedUnivList" class="bgdeField"></ol>
                        
                        <!--Fecha de inicio del programa principal-->
                            
                        <label for="mainProgBgnDate" class="bgdeLabel"> Fecha de inicio: </label>
                        <input  id="mainProgBgnDate" name="pPBD" class="bgdeField" type="date" onchange="updateDate(0)"/>
                        <span class="error"></span>
                            
                        <!--Fecha de conclusion del programa principal-->
                            
                        <label for="mainProgEndDate" class="bgdeLabel"> Fecha de Conclusión: </label>
                        <input  id="mainProgEndDate" name="pPED" class="bgdeField" type="date" onchange="updateDate(0)"/>
                        <span class="error"></span>
                        
                        <!--Programa Secundario-->
                        
                        <div class="progSecundario visible">
                            
                            <!--Seleccion del programa secundario-->
                            
                            <label for="minoProgSelect" class="bgdeLabel"> Programa secundario: </label>
                            <select id="minoProgSelect" name="minoProg" class="bgdeField bgdeSelect">                           
                                <option value=NULL> seleccione un programa </option>
                            </select>
                            <span id="minoProgErro" class="error"></span>                            
                            
                            <!--Fecha de inicio del programa secundario-->
                            
                            <label for="minoProgBgnDate" class="bgdeLabel"> Fecha de inicio: </label>
                            <input  id="minoProgBgnDate" name="sPBD" class="bgdeField" type="date" onchange="updateDate(0)"/>
                            <span class="error"></span>
                            
                            <!--Fecha de conclusion del programa secundario-->
                            
                            <label for="minoProgEndDate" class="bgdeLabel"> Fecha de Conclusión: </label>
                            <input  id="minoProgEndDate" name="sPED" class="bgdeField" type="date" onchange="updateDate(0)"/>
                            <span class="error"></span>                            
                        </div>                        
                    </form>
                    
                </div>
                
                <!--Seccion para mostar los datos principales salvados-->
                
                <div class="vista"></div>
                
            </div>
            
            <!--
            Seccion para el formulario de los datos de los vuelos de la brigada 
            -->
            
            <div class="seccion" id="vuelos">
                
                <!--Formulario de datos para los vuelos de la brigada-->
                
                <div class="formulario"></div>
                
                <!--Seccion para mostar los datos de los vuelo salvados-->
                
                <div class="vista"></div>
                
            </div>
            
            <!--
            Seccion para el formulario de los datos de los voluntarios de la
            brigada 
            -->
            
            <div class="seccion" id="voluntarios">
                
                <!--Formulario de datos de voluntarios de la brigada-->
                
                <div class="formulario"></div>
                
                <!--Seccion para mostar los datos de los voluntarios salvados-->
                
                <div class="vista"></div>
                
            </div>
        </div>
    </body>
</html>
