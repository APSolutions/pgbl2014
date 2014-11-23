<?php
    session_name('Global');
    session_id('pgbl');
    session_start();
    $address =$position=$action="";
    //if para guardar la posicion y accion que tiene GET
    if(isset($_GET["position"])){
        $_SESSION["position"] = trim($_GET["position"]);
        $position=$_SESSION["position"];
        if (isset($_GET["action"])){
             $_SESSION["action"] = $_GET["action"];
             $action= $_SESSION["action"];
        } 
    }
    //From settingsMenu
    If($action == "crear" || $action == "editar" || $action == "eliminar"){
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
    }else{
        //From main menu
        if ($position=="Administracion"){
            $address = "menu_admin.php" ;
        }else if($position=="Logistica"){
            $address = "logistic.php" ; 
        }
        else if($position=="Programacion"){
            $address = "development.php" ;
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
    }
       
    header('location:../'.$address);
?>

