<?php
    require 'src/login/usuario.php';
    session_name('Global');
    session_id('pgbl');
    session_start();
    $_SESSION["position"] = "Calendario de Brigadas";
    $_SESSION["action"] = "";
    $_SESSION["program"] = "";
    if(!isset($_REQUEST['day'])) $_REQUEST['day'] = date('d');
    if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
    if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

    $monthNames = Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", 
                        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $cDay = $_REQUEST['day'];
    $cMonth = $_REQUEST["month"];
    $cYear = $_REQUEST["year"]; 

    $next_month = getDate(mktime(0,0,0,$cMonth+1,$cDay,$cYear));
    $prev_month = getDate(mktime(0,0,0,$cMonth-1,$cDay,$cYear));

    $next_year = getDate(mktime(0,0,0,$cMonth,$cDay,$cYear+1));
    $prev_year =getDate(mktime(0,0,0,$cMonth,$cDay,$cYear-1));
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Calendario de Brigadas</title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, main, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/calendar.css" />
        <script src="js/logistic_menu/modernizr.custom.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            require 'header.php';
            ?>	
        </div>  
        <table class="calendar_header">
            <tr>
                <td>
                    <a class="link" href="<?php echo $_SERVER['PHP_SELF']."?day=". $prev_year['mday'] ."&year=". $prev_year['year'] ."&month=". $prev_year['mon'] ?>" ><</a>
                    <strong><?php echo $cYear; ?></strong>
                    <a class="link" href="<?php echo $_SERVER['PHP_SELF']."?day=". $next_year['mday'] ."&year=". $next_year['year'] ."&month=". $next_year['mon'] ?>" >> </a>
                </td>
            </tr>
            <tr>                           
                <td>
                    <a class="link" href="<?php echo $_SERVER['PHP_SELF']."?day=". $prev_month['mday'] ."&year=". $prev_month['year'] ."&month=". $prev_month['mon'] ?>">< </a>
                    <strong><?php echo $monthNames[$cMonth-1]; ?></strong>
                    <a class="link" href="<?php echo $_SERVER['PHP_SELF']."?day=". $next_month['mday'] ."&year=". $next_month['year'] ."&month=". $next_month['mon']; ?>">> </a>
                </td>
            </tr>
            <tr>
                <td><a class="link" href="<?php echo $_SERVER["PHP_SELF"];?>">Día Actual</a></td>
            </tr>
        </table>
        <table class="gridtable" >   
            <tr class="tr_days" >
                <td><strong>Domingo</strong></td>
                <td><strong>Lunes</strong></td>
                <td><strong>Martes</strong></td>
                <td><strong>Miercoles</strong></td>
                <td><strong>Jueves</strong></td>
                <td><strong>Viernes</strong></td>
                <td><strong>Sabado</strong></td>
            </tr>
            <?php 

            $timestamp = mktime(0,0,0,$cMonth,1,$cYear);
            $maxday = date("t",$timestamp);                 
            $thismonth = getdate ($timestamp);             
            $startday = $thismonth['wday'];                 
            for ($i=0; $i<($maxday+$startday); $i++) {
                if(($i % 7) == 0 ) echo "<tr>";
                if($i < $startday) echo "<td></td>";
                elseif(($i - $startday + 1) == $cDay){
                    echo "<td bgcolor='red'> ". ($i - $startday + 1) ."</td>";}
                else{
                    echo "<td>". ($i - $startday + 1) ."</td>";}
                if(($i % 7) == 6 ) echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>