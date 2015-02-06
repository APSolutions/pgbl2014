<?php
    require 'src/login/usuario.php'; 
    session_name('Global');
    session_id('pgbl');
    session_start();    
    $program = $selectedFicha = $edit = "";
    $aHeader = $aContenido = array();
    
    //header of table
    $aHeader = array(
            '0' => "ID",
            '1' => "Fecha de Inicio",
            '2' => "Fecha de Culminación",
            '3' => "Comunidad",
            );
    
    //Program where position is
    if ($_SESSION["program"] == "Ambiente"){
        $program = 5;
    } elseif($_SESSION["program"] == "Derechos Humanos"){
        $program = 6;
    }elseif($_SESSION["program"] == "Medico"){
        $program = 7;
    }elseif($_SESSION["program"] == "Microfinanzas"){
        $program = 8;
    }elseif($_SESSION["program"] == "Negocios"){
        $program = 2;
    }elseif($_SESSION["program"] == "Dental"){
        $program = 3;
    }elseif($_SESSION["program"] == "Salud Publica"){
        $program = 10;
    }else{
        $program = 9;
    }
    
    //Query to get fichalist
    require 'src/login/connect.php';
    $query = "CALL get_fichalist('$program')";
    $result= $conn->query($query);
    if (!$result){          
        echo "<script type='text/javascript'>alert('failed')</script>";
    }else{
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $col = count($row);
            for($j=0;$j<$col;$j++){
                $aContenido[$i][$j] = $row[$j];
            }
            $i++;
        }
    }
    //onclick of view or edit to open ficha
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["row"] != ""){
            $row=$_POST["row"];
            $selectedFicha = $aContenido[$row][0];
        }
        //para saber si entre a la ficha por el botón ver o edit
        if($_POST["edit"] != ""){
            $edit= $_POST["edit"];
            if ($edit == "True"){
                header("location:src/ficha/prepareFicha.php?fichaID=$selectedFicha+&edit=$edit");
            } else{
                header("location:src/ficha/prepareFicha.php?fichaID=$selectedFicha+&edit=$edit");
            }
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
        <meta name="description" content="Global Brigades Panama: Fichas" />
        <meta name="keywords" content="global brigades, panama, fichas, programa" />
        <meta name="author" content="APSolution" />        
        <title>Global Brigades Panama | Fichas</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/settingsMenu.css" media="all">
        <script type="text/javascript" src="js/settings/tablesorter/jquery-latest.js"></script> 
        <script type="text/javascript" src="js/settings/tablesorter/jquery.tablesorter.min.js"></script> 
        <!-- JS scripts-->
         <script type="text/javascript">
            var sel = pos = "";
            function ChangeColor(tableRow, highLight, index){
                if (index != pos){
                    if (highLight){
                        tableRow.style.backgroundColor = '#e6EEEE';
                    }else{
                        tableRow.style.backgroundColor = 'ghostwhite';
                    }                 
                }
            }

            function DoNav(tableRow, index){
                if (!sel == ""){
                    sel.style.backgroundColor = 'ghostwhite';
                    sel = tableRow;
                    pos = index;   
                    document.getElementById('view').value = pos;
                    document.getElementById('edit').value = pos;
                    sel.style.backgroundColor = '#D9EFC2';                
                }else{
                    sel = tableRow;
                    pos = index; 
                    document.getElementById('view').value = pos;
                    document.getElementById('edit').value = pos;
                    sel.style.background = '#D9EFC2';
                }
            }
            
            function viewEdit(){
                var botonview = document.getElementById('bver');
                var botonedit = document.getElementById('bedit');
                if (pos != ""){
                    botonview.disabled=false;
                    botonview.style.background = '#3498DB';
                    botonview.style.color = 'white';
                    botonedit.disabled=false;
                    botonedit.style.background = '#3498DB';
                    botonedit.style.color = 'white';
                }else{
                    botonview.disabled=true;
                    botonview.style.background = '#808080';
                    botonview.style.color = '#DCDCDC';
                    botonedit.disabled=true; 
                    botonedit.style.background = '#808080';
                    botonedit.style.color = '#DCDCDC';
                }                             
            }
            
            function botonViewhover(resaltar){
                var botonview = document.getElementById('bver');              
                if (pos != ""){
                    if (resaltar){
                        botonview.style.background = '#2980B9';                     
                    } else{
                        botonview.style.background = '#3498DB';                     
                    }
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
        </script>
        <script type="text/javascript">
            $(document).ready(function() 
            { 
                $("#vista").tablesorter( {sortList: [[0,0]]} ); 
            } 
            );
        </script>
        <style>
            th.headerSortUp { 
                background-image: url(img/settings/sort_asc.gif);   
            } 
            th.headerSortDown { 
                background-image: url(img/settings/sort_desc.gif); 
            } 
            table.tablesorter {
                font-family: sans-serif;
                margin:10px 0pt 15px;
                background-color: ghostwhite; 
                font-size: 9pt;
                width: 90%;
                text-align: left;
                border-collapse: collapse;
            }
            table.tablesorter thead tr th, table.tablesorter tfoot tr th {
                background-color: #e6EEEE;
                border: 1px solid #FFF;
                font-size: 8pt;
                padding: 4px;
            }
            th{
                padding: 5px;
                border: 1px solid #FFF;
                text-align: center;
                vertical-align: center;
                background-repeat: no-repeat; 
                background-position: center right;
                cursor: pointer; 
                font-weight: bold;
                background-image: url(img/settings/bg.gif);
            }
            table.tablesorter tbody td {
                color: #000;
                padding: 4px;
                vertical-align: top;
            }              
        </style>
    </head>
    <body onload="viewEdit();botonViewhover(false);botonEdithover(false); ">
        <div class="main body">
        <?php
        require 'header.php';
        ?>
        </div>
        <div id="wrapper">
            <div id="content">
                <table id="vista" class="tablesorter">
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
                       for($i=0;$i<count($aContenido);$i++){
                            echo "<tr id=\"$i\" onmouseover=\"ChangeColor(this, true, this.id);\" onmouseout=\"ChangeColor(this, false, this.id);\" onclick=\"DoNav(this, this.id);viewEdit();\" >";
                            for($j=0;$j<$col;$j++){
                               echo "<td>".$aContenido[$i][$j]."</td>";  
                            }                                                               
                        }
                        echo"</tr>";                         
                    ?>
                    </tbody>
                </table>
            </div>
            <div id ="menu">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="Ver">
                        <input id="view" type="text" name="row" value="" hidden /> 
                        <input type="text" name="edit" value="False" hidden />
                        <input id="bver" type="submit" class="button_text" name="Ver" onmouseover="botonViewhover(true);" onmouseout="botonViewhover(false);" value="Ver" />
                </form>   
                <br>
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="Editar">
                        <input id="edit" type="text" name="row" value="" hidden /> 
                        <input type="text" name="edit" value="True" hidden />
                        <input id="bedit" type="submit" class="button_text" name="Editar" onmouseover="botonEdithover(true);" onmouseout="botonEdithover(false);" value="Editar" />
                </form>   
            </div>
            <div id="cleared"></div>
        </div>
    </body>
</html>
