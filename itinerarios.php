<?php
    require 'src/login/usuario.php';
    
    session_name('Global');
    session_id('pgbl');
    session_start();
    $_SESSION["position"] = "Itinerarios";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Page description-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Global Brigades Panama: Programacion" />
        <meta name="keywords" content="global brigades, panama, development" />
        <meta name="author" content="APSolution" />        
        <title>Global Brigades Panama | Programacion</title>
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <!-- CSS scripts-->
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/logistic_menu/component.css" />
        <!-- JS scripts-->
    </head>
    <body>
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="main">
                <ul class="cbp-ig-grid">
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=eviromental"?>" name="eviromental" >
                            <span class="cbp-ig-icon icon-eviromental"></span>
                            <h3 class="cbp-ig-title">Ambiente</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=humanRights"?>" name="humanRights" >
                            <span class="cbp-ig-icon icon-humanRights"></span>
                            <h3 class="cbp-ig-title">Derechos Humanos</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=medical"?>" name="medical" >
                            <span class="cbp-ig-icon icon-medical"></span>
                            <h3 class="cbp-ig-title">Medico/Dental</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=microfinance"?>" name="microfinance" >
                            <span class="cbp-ig-icon icon-microfinance"></span>
                            <h3 class="cbp-ig-title">Microfinanzas</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=business"?>" name="business" >
                            <span class="cbp-ig-icon icon-business"></span>
                            <h3 class="cbp-ig-title">Negocios</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=publicHealth"?>" name="publicHealth" >
                            <span class="cbp-ig-icon icon-publicHealth"></span>
                            <h3 class="cbp-ig-title">Salud Pública</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "src/webrouter.php?position=professional"?>" name="professional" >
                            <span class="cbp-ig-icon icon-professional"></span>
                            <h3 class="cbp-ig-title">Profesional</h3>
                            <span class="cbp-ig-category">short description</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>       
    </body>
</html>
