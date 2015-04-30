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
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="css/brigade.css"/>
        <link rel="stylesheet" type="text/css" href="css/Table.css"/>
        <!-- CSS scripts-->
        <script type="text/javascript" src="js/brigade.js"></script>
        <script type="text/javascript" src="js/settings/tablesorter/jquery-latest.js"></script>
        <script type="text/javascript" src="js/settings/tablesorter/jquery.tablesorter.js"></script> 
        <script type="text/javascript" src="js/settings/tablesorter/jquery.tablesorter.min.js"></script> 
        <script type="text/javascript" src="js/Table.js"></script>
        <script type="text/javascript">
            function init(){
                var bdeID = <?php echo json_encode($bdeID);?>;
                var subProg = <?php echo json_encode($subProg);?>;
                var error = <?php echo json_encode($error);?>;
                var progs = <?php echo json_encode($bdeData->getPrograms());?>;
                var univs = <?php echo json_encode($bdeData->getUniversities());?>;
                var univ = <?php echo json_encode($brigade->getUniversities());?>;
                var vols = <?php echo json_encode($brigade->getVolunteers());?>;
                var flts = <?php echo json_encode($brigade->getFlights());?>;
                setData(progs,univs);
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
        <div class="container">
            <div class="section basic-data">
                <!-- Seccion para mostrar la informacion de la brigada -->
                
                <h2> Datos Basicos </h2>
                
                <div id="brigade-information">
                    <h3 id="bdeID"> <?php echo $bdeID;?> </h3>
                    <dl>
                        <dt>Programa Principal: </dt>
                        <dd> <?php echo $brigade->getProgram();?> </dd>
                        <dt>Programa Secundario: </dt>
                        <dd> <?php echo $brigade->getSubProgram();?> </dd>
                        <dt>Universidades: </dt>
                        <dd> <ol id="loaded-univ-list"></ol> </dd>
                        <dt>Fecha de Inicio: </dt>
                        <dd> <?php echo $brigade->getDtop();?> </dd>
                        <dt>Fehca de Conclusion: </dt>
                        <dd> <?php echo $brigade->getDted();?> </dd>
                        <dt>Fecha de Inicio Primario: </dt>
                        <dd> <?php echo $brigade->getPriDtop();?> </dd>
                        <dt>Fehca de Conclusion Primario: </dt>
                        <dd> <?php echo $brigade->getPriDted();?> </dd>
                        <dt>Fecha de Inicio Secundario: </dt>
                        <dd> <?php echo $brigade->getSecDtop();?> </dd>
                        <dt>Fehca de Conclusion Secundario: </dt>
                        <dd> <?php echo $brigade->getSecDted();?> </dd>
                    </dl>
                </div>                
                <form id="brigade-form" name="form-basic" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <dl>
                        <!-- Select for the program of the brigade -->
                        <dt>                        
                            <label>
                                <span class="label">Programa:</span>
                                <select id="progSelect1" name="priProg" onclick="updateSubProg()" required="required">
                                    <option value=0>Seleccione un programa</option>
                                </select>
                                <span class="error"> <?php echo $priProgErr;?> </span>
                            </label>
                        </dt>
                        
                        <!-- hidden program field to select the secondary program-->                                            
                        
                        <dt class="subProgramField hidden">
                            <label>
                                <span class="label">Programa Secundario:</span>
                                <select id="progSelect2" name="secProg" onclick="updateProg()">
                                    <option value=0>Seleccione un programa</option>
                                </select>
                                <span class="error"> <?php echo $secProgErr;?> </span>
                            </label>
                        </dt>
                        
                        <dt>
                        <button type="button" id="btnAddProg" onclick="addSubProgram();" disabled="disabled"> Agregar Programa </button>
                        <input type="checkbox" name="subprogram" id="subProgramSelected" hidden="hidden"/>
                        </dt>
                        
                        <!-- Multi select for universities field -->
                        <dt>
                            <label>
                                <span class="label">Universidad:</span>
                                <select id="univSelect" onclick="addUniversity()">
                                    <option value="0">Seleccione una o varias universidades</option>
                                </select>
                                <span class="error"> <?php echo $univError;?> </span>
                                <select id="selectedUniv" name="univ" multiple="multiple" hidden="hidden"></select>
                            </label>
                        </dt>                        
                        
                        <!-- List for selected universities-->
                        <dd>
                            <ol id="selectedUnivList">
                                
                            </ol>
                        </dd>
                        
                        <!-- Dates fields -->
                        <dt> Fechas </dt>
                        
                        <dd>
                            <label>
                                <span class="label">Inicio:</span>
                                <input type="date" id="dtop" name="dtop" onchange="updateDate(0)"/>
                                <span class="error"></span>
                            </label>
                        </dd>

                        <dd>
                            <label>
                                <span class="label">Conclusión:</span>
                                <input type="date" id="dted" name="dted" onchange="updateDate(1)"/>
                                <span class="error"></span>
                            </label>
                        </dd>

                        <!-- Hidden date fields for primary and sub program dates-->
                        
                        <dt class="subProgramField hidden"> Programa Primario</dt>
                        
                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Inicio:</span>
                                <input type="date" name="priDtop" id="priDtop"/>
                                <span class="error"> <?php echo $priDtopError;?> </span>
                            </label>
                        </dd>

                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Conclusión:</span>
                                <input type="date" name="priDted" id="priDted"/>
                                <span class="error"> <?php echo $priDtedError;?> </span>
                            </label>
                        </dd>
                        
                        <dt class="subProgramField hidden"> Programa Secundario</dt>
                        
                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Inicio:</span>
                                <input type="date" name="secDtop" id="subDtop"/>
                                <span class="error"> <?php echo $secDtopError;?> </span>
                            </label>
                        </dd>

                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Conclusión:</span>
                                <input type="date" name="secDted" id="subDted"/>
                                <span class="error"> <?php echo $secDtedError;?> </span>
                            </label>
                        </dd>
                        
                        <dt>
                        <button id="btnPriSubmit" onclick="submit()"> Salvar Cambios </button>                            
                        </dt>
                    </dl>
                </form>
            </div>
            <div class="section flights">
                <table id="table-flights" class="tablesorter">
                    
                    <thead>
                        <tr>
                            <th>Numero de Vuelo</th>
                            <th>Tipo de Vuelo</th>
                            <th>Fecha de Arribo</th>
                            <th>Estudiantes Abordo</th>
                        </tr>
                    </thead>
                    <tbody id="table-flights-content">
                        
                    </tbody>
                </table>
                <div class="pager1"></div>
            </div>           
            
            <div class="section volunteers">
                <table id="table-volunteers" class="tablesorter">
                    <thead>
                        <tr>
                            <th>Numero de Identificacion</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cargo</th>
                            <th>Arribo Temprano</th>
                            <th>Salida por Cuenta Propia</th>
                            <th>Alergias</th>
                            <th>Dieta</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody id="table-volunteers-content">
                        
                    </tbody>
                </table>
                <div class="pager2"></div>
            </div>
        </div>
    </body>
</html>
