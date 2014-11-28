<?php
    session_name('Global');
    session_id('pgbl');
    session_start();
    $address =$position=$action=$program="";
    //if para guardar la posicion y accion que tiene GET
    if(isset($_GET["position"])){
        $_SESSION["position"] = trim($_GET["position"]);
        $position=$_SESSION["position"];
        if (isset($_GET["action"])){
             $_SESSION["action"] = $_GET["action"];
             $action= $_SESSION["action"];
        }
        if (isset($_GET["program"])){
             $_SESSION["program"] = $_GET["program"];
             $program= $_SESSION["program"];
        }
    }
    //From settingsMenu
    If(!empty($action)){
        if($position == "Personal"){
            $address = "formpersonal.php";
        }else if($position == "Comunidades"){
            $address = "formcomunidad.php";
        }else if($position == "Campamentos"){
            $address = "formcampamento.php";
        }else if($position == "Inventario de Comida"){
            //$address = "";
        }else if($position == "Equipos de Cocina"){
            //$address = "";
        }else if($position == "Inventario de Medicina"){
            //$address = "";
        }else if($position == "Equipos de Seguridad"){
            //$address = "";
        }else if($position == "Roles"){
            //$address = "";
        }else if($position == "Universidades"){
            $address = "formuniversidad.php";
        }else if($position == "Vehiculos"){
            $address = "formvehiculo.php";
        }
    }else if(!empty($program)){
        if(strcmp($location,"Fichas")){
            $address = "fichasList.php";
        }else{
            $address = "itinerariosList.php";
        }
    }else{
        //From main menu
        if ($position=="Administracion"){
            $address = "management.php" ;
        }else if($position=="Logistica"){
            $address = "logistic.php" ; 
        }
        else if($position=="Programacion"){
            $address = "development.php" ;
        }
        //From logistic menu
        else if($position=="Fichas"){
            $address = "fichas.php" ;
        }
        else if($position=="Itinerario"){
            $address = "itinerarios.php" ;
        }
        else if($position=="Calendarios"){
            $address = "calendars_menu.php" ;
        }
        else if($position=="Evaluaciones"){
            $address = "evaluations_menu.php" ;
        }
        else if($position=="Reportes"){
            $address = "reports.php" ;
        }
        else if($position=="Configuraciones"){
            $address = "settings.php";
        }
        //From Settings Menu
        else if($position=="Personal" || $position=="Comunidades" || $position=="Campamentos" || $position=="Inventario de Comida" || $position=="Equipos de Cocina" || $position=="Inventario de Medicinas" || $position=="Equipos de Seguridad" || $position=="Vehiculos" || $position=="Roles" || $position=="Universidades"){      
            $address ="settingsMenu.php";
        } 
    }
       
    header('location:../'.$address);
?>

