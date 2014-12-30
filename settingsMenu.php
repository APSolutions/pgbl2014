<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
require 'src/settings/viewAndEdit.php';
$position = $_SESSION["position"];
$_SESSION["primaryKeyConf"] = "empty";
$row = $llavePrimaria = $eliminar = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["row"] != ""){
        $row=$_POST["row"];
    }
    if($_POST["del"] != ""){
        $eliminar= $_POST["del"];
    }
}

if ($row != ""){
    if ($position == "Personal"){
        $_SESSION["primaryKeyConf"] = $aContenido[$row][1];
        $llavePrimaria = $aContenido[$row][1];
    }else if ($position == "Comunidades"){
        $_SESSION["primaryKeyConf"] = $aContenido[$row][0];
        $llavePrimaria = $aContenido[$row][0];
    }elseif ($position == "Campamentos"){
       $_SESSION["primaryKeyConf"] = $aContenido[$row][0];
       $llavePrimaria = $aContenido[$row][0];
    }else if ($position == "Inventario de Comida"){
        print "Inventario de Comida";
    }else if ($position == "Equipos de Cocina"){
        print "Equipos de Cocina";
    }else if ($position == "Inventario de Medicinas"){
        print "Inventario de Medicinas";
    }else if ($position == "Equipos de Seguridad"){
        print "Equipos de Seguridad";
    }else if ($position == "Vehiculos"){
        $_SESSION["primaryKeyConf"] = $aContenido[$row][1];
        $llavePrimaria = $aContenido[$row][1];
    }else if ($position == "Roles"){
        print "Roles";
    }else{
        $_SESSION["primaryKeyConf"] = $aContenido[$row][0];
        $llavePrimaria = $aContenido[$row][0];
    }
    
    if ($eliminar == "false"){
        header("location:src/webrouter.php?position=$position+&action=Editar");
    } else{
        require 'src/login/connect.php'; 
        if ($position == "Personal"){
            $query = "CALL disable_staff('$llavePrimaria')";
            $result= $conn->query($query);
        }else if ($position == "Comunidades"){
            $query = "CALL disable_communities('$llavePrimaria')";
            $result= $conn->query($query);
        }elseif ($position == "Campamentos"){
            $query = "CALL disable_compounds('$llavePrimaria')";
            $result= $conn->query($query);
        }else if ($position == "Inventario de Comida"){
            print "Inventario de Comida";
        }else if ($position == "Equipos de Cocina"){
            print "Equipos de Cocina";
        }else if ($position == "Inventario de Medicinas"){
            print "Inventario de Medicinas";
        }else if ($position == "Equipos de Seguridad"){
            print "Equipos de Seguridad";
        }else if ($position == "Vehiculos"){
            $query = "CALL disable_vehicles('$llavePrimaria')";
            $result= $conn->query($query);
        }else if ($position == "Roles"){
            print "Roles";
        }else{
            $query = "CALL disable_university('$llavePrimaria')";
            $result= $conn->query($query);
        }
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $llavePrimaria = $eliminar = "";
            header("location:src/webrouter.php?position=$position");
        }
    }
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
        <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
        <link rel="stylesheet" type="text/css" href="css/settingsMenu.css" media="all">
        <script type="text/javascript">
            var sel = pos = "";
            function ChangeColor(tableRow, highLight, index){
                if (index != pos){
                    if (highLight){
                        tableRow.style.backgroundColor = '#F8F8FF';
                    }else{
                        tableRow.style.backgroundColor = 'white';
                    }                 
                }
            }

            function DoNav(tableRow, index){
                if (!sel == ""){
                    sel.style.backgroundColor = 'white';
                    sel = tableRow;
                    pos = index;      
                    document.getElementById('edit').value = pos;
                    document.getElementById('eliminar').value = pos;
                    sel.style.backgroundColor = '#dcfac9';                
                }else{
                    sel = tableRow;
                    pos = index; 
                    document.getElementById('edit').value = pos;
                    document.getElementById('eliminar').value = pos;
                    sel.style.background = '#dcfac9';
                }
            }  
            function editarEliminar(){
                var botonedit = document.getElementById('bedit');
                var botonelim = document.getElementById('beliminar');
                if (pos != ""){
                    botonedit.disabled=false;
                    botonedit.style.background = '#3498DB';
                    botonedit.style.color = 'white';
                    botonelim.disabled=false;
                    botonelim.style.background = '#3498DB';
                    botonelim.style.color = 'white';
                }else{
                    botonedit.disabled=true;
                    botonedit.style.background = '#808080';
                    botonedit.style.color = '#DCDCDC';
                    botonelim.disabled=true; 
                    botonelim.style.background = '#808080';
                    botonelim.style.color = '#DCDCDC';
                }                             
            }
            function botonEdithover(resaltar){
                var botonedit = document.getElementById('bedit');              
                if (pos != ""){
                    if (resaltar){
                        botonedit.style.background = '#2980B9';                     
                    } else{
                        botonedit.style.background = '#3498DB';                     
                    }
                }                           
            }
            function botonEliminarhover(resaltar){
                var botoneliminar = document.getElementById('beliminar');              
                if (pos != ""){
                    if (resaltar){
                        botoneliminar.style.background = '#2980B9';                     
                    } else{
                        botoneliminar.style.background = '#3498DB';                     
                    }
                }                           
            }
        </script>
    </head>
    <body onload="editarEliminar();botonEdithover(false);botonEliminarhover(false);">
        <div class="main_body">
            <?php
                require 'header.php';
            ?>           
        </div>
        <div id="wrapper">
            <div id="content">
                <table class="vista">
                    <tr>
                        <?php
                            for ($i=0; $i<count($aHeader); $i++) {
                            echo "<td>".$aHeader[$i]."</td>";                       
                            }
                        ?>
                    </tr> 
                    <?php
                        for($i=0;$i<count($aContenido);$i++){
                            echo "<tr id=\"$i\" onmouseover=\"ChangeColor(this, true, this.id);\" onmouseout=\"ChangeColor(this, false, this.id);\" onclick=\"DoNav(this, this.id);editarEliminar();\" >";
                            for($j=0;$j<$col;$j++){
                                echo "<td>".$aContenido[$i][$j]."</td>";
                            }
                            echo"</tr>";
                        }
                    ?>
                </table>
            </div>
            <div id="menu">
                <a href="<?php echo "src/webrouter.php?position=$position+&action=Crear"?>" name="Crear">
                    <button class="btn" name="Crear">Crear</button>
                </a>
                <br><br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="Editar">
                        <input id="edit" type="text" name="row" value="" hidden /> 
                        <input type="text" name="del" value="false" hidden />
                        <input id="bedit" type="submit" class="button_text" name="Editar" onmouseover="botonEdithover(true);" onmouseout="botonEdithover(false);" value="Editar" />
                </form>   
                <br>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" name="Eliminar">
                        <input id="eliminar" type="text" name="row" value="" hidden />
                        <input type="text" name="del" value="true" hidden />
                        <input id="beliminar" type="submit" class="button_text" name="Eliminar" onmouseover="botonEliminarhover(true);" onmouseout="botonEliminarhover(false);" value="Eliminar" />
                </form>   
            </div>
            <div id="cleared"></div>
        </div>
    </body>
</html>
