<?php
    session_name('Global');
    session_id('pgbl');
    session_start();
    $address =$position=$action="";
    //if para guardar la posicion y accion que tiene GET
    if(isset($_GET["position"])){
        $_SESSION["position"] = $_GET["position"];
        $position=$_SESSION["position"];
        if (isset($_GET["action"])){
             $_SESSION["action"] = $_GET["action"];
             $action= $_SESSION["action"];
        } 
    }
    //From main menu
    if ($position=="Administracion"){
        $address = "menu_admin.php" ;
    }else if($position=="Logistica"){
         $address = "logistic.php" ; 
    }
    else if($position=="Programacion"){
        $address = "menu_devel.php" ;
    }
    //From logistic menu
    else if($position=="Fichas"){
        //go to reports
    }
    else if($position=="Itinerario"){
        //go to reports
    }
    else if($position=="Calendarios"){
        $address = "calendars_menu.php" ;
    }
    else if($position=="Evaluaciones"){
        $address = "evaluations_menu.php" ;
    }
    else if($position=="Reportes"){
        //go to reports
    }
    else if($position=="Configuraciones"){
        $address = "settings.php";
    }
    //From Settings Menu
    else if($position=="Personal" || $position=="Comunidades" || $position=="Campamentos" || $position=="Inventario de Comida" || $position=="Equipos de Cocina" || $position=="Inventario de Medicinas" || $position=="Equipos de Seguridad" || $position=="Vehiculos" || $position=="Roles" || $position=="Universidades"){      
        $address ="settingsMenu.php";
    }
    
    //From settingsMenu
    else if ($position == "SMPersonal"){
        $address = "formpersonal.php";
    }else if ($position == "SMComunidades"){
        $address = "formcomunidad.php";
    }else if ($position == "SMCampamentos"){
        $address = "formcampamento.php";
    }else if($position == "SMInventario de Comida"){
        //$address = "";
    }else if ($position == "SMEquipos de Cocina"){
        //$address = "";
    }else if ($position == "SMInventario de Medicina"){
        //$address = "";
    }else if($position == "SMEquipos de Seguridad"){
        //$address = "";
    }else if ($position == "SMRoles"){
        //$address = "";
    }else if ($position == "SMUniversidades"){
        $address = "formuniversidad.php";
    }else if ($position == "SMVehiculos"){
        $address = "formvehiculo.php";
    }
    
    //From other menus add else if($position=="name attribute"){}
    if ($address = ""){
       echo $address;
    }else{
       header('location:../'.$address);
    }
?>

