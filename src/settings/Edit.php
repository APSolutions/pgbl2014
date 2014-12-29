<?php
    session_name('Global');
    session_id('pgbl');
    $primary = "";
    if ($_SESSION["primaryKeyConf"] != "empty"){
        $primary = $_SESSION["primaryKeyConf"];
    }
    $configuracion = $_SESSION["position"];
    $result = FALSE;
    $ename = $ecountry = $ecity = "";
    if ($configuracion == "Personal"){

    }else if ($configuracion == "Comunidades"){

    }elseif ($configuracion == "Campamentos"){

    }else if ($configuracion == "Inventario de Comida"){
        print "Inventario de Comida";
    }else if ($configuracion == "Equipos de Cocina"){
        print "Equipos de Cocina";
    }else if ($configuracion == "Inventario de Medicinas"){
        print "Inventario de Medicinas";
    }else if ($configuracion == "Equipos de Seguridad"){
        print "Equipos de Seguridad";
    }else if ($configuracion == "Vehiculos"){

    }else if ($configuracion == "Roles"){
        print "Roles";
    }else{
        require_once 'src/login/connect.php';  
        $query = "CALL edit_university('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $result->fetch_assoc();
            $ename = $row['name'];
            $ecountry = $row['country'];
            $ecity = $row['city'];
        }
    }

