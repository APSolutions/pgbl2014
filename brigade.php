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


if (isset($_SESSION["brigadeID"]) && !empty($_SESSION["brigadeID"])){
    //Configures data for existing brigades
    $bdeID = $_SESSION["brigadeID"];
    $brigade->getBasicData($bdeID);
    $brigade->getUniversitiesData($bdeID);
}else {
    //Configures data for a new brigade
    $bdeID = "";
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
                var progs = <?php echo json_encode($bdeData->getPrograms());?>;
                var univs = <?php echo json_encode($bdeData->getUniversities());?>;            
                setData(progs,univs);
                setBrigade(bdeID);
                setStage(bdeID);
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
                        <dd> Pending </dd>
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
                <form id="brigade-form">
                    <dl>
                        <!-- Select for the program of the brigade -->
                        <dt>                        
                            <label>
                                <span class="label">Programa:</span>
                                <select id="progSelect1" onclick="updateSubProg()">
                                    <option>Seleccione un programa</option>
                                </select>
                                <span class="error"></span>
                            </label>
                        </dt>
                        
                        <!-- hidden program field to select the secondary program-->                                            
                        
                        <dt class="subProgramField hidden">
                            <label>
                                <span class="label">Programa Secundario:</span>
                                <select id="progSelect2" onclick="updateProg()">
                                    <option>Seleccione un programa</option>
                                </select>
                                <span class="error"></span>
                            </label>
                        </dt>
                        
                        <dt>
                        <button type="button" id="btnAddProg" onclick="addSubProgram()"> Agregar Programa </button>
                        <input type="checkbox" name="subprogram" id="subProgramSelected" hidden="hidden"/>
                        </dt>
                        
                        <!-- Multi select for universities field -->
                        <dt>
                            <label>
                                <span class="label">Universidad:</span>
                                <select id="univSelect" onclick="addUniversity()">
                                    <option>Seleccione una o varias universidades</option>
                                </select>
                                <span class="error"></span>
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
                                <input type="date" id="dtop" onchange="updateDate(0)"/>
                                <span class="error"></span>
                            </label>
                        </dd>

                        <dd>
                            <label>
                                <span class="label">Conclusión:</span>
                                <input type="date" id="dted" onchange="updateDate(1)"/>
                                <span class="error"></span>
                            </label>
                        </dd>

                        <!-- Hidden date fields for primary and sub program -->
                        
                        <dt class="subProgramField hidden"> Programa Primario</dt>
                        
                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Inicio:</span>
                                <input type="date" id="priDtop"/>
                                <span class="error"></span>
                            </label>
                        </dd>

                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Conclusión:</span>
                                <input type="date" id="priDted"/>
                                <span class="error"></span>
                            </label>
                        </dd>
                        
                        <dt class="subProgramField hidden"> Programa Secundario</dt>
                        
                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Inicio:</span>
                                <input type="date" id="subDtop"/>
                                <span class="error"></span>
                            </label>
                        </dd>

                        <dd class="subProgramField hidden">
                            <label>
                                <span class="label">Conclusión:</span>
                                <input type="date" id="subDted"/>
                                <span class="error"></span>
                            </label>
                        </dd>
                        
                        <dt>
                        <button id="btnPriSubmit"> Salvar Cambios </button>                            
                        </dt>
                    </dl>
                </form>
            </div>
        </div>
    </body>
</html>
