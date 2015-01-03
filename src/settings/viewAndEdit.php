<?php
    session_name('Global');
    session_id('pgbl');
    $configuracion = $_SESSION["position"];
    $result = FALSE;
    $aHeader = $aContenido = array();
    if ($configuracion == "Personal"){
        $aHeader = array(
            '0' => "Nombre",
            '1' => "Cédula",
            '2' => "Rol",
            '3' => "Teléfono",
            '4' => "Correo Electrónico",
            );
        require_once 'src/login/connect.php';   
        $query = "CALL get_staffConf()";
        $result= $conn->query($query);
    }else if ($configuracion == "Comunidades"){
        $aHeader = array(
            '0' => "Comunidad",
            '1' => "Provincia",
            );
        require_once 'src/login/connect.php';   
        $query = "CALL get_communitiesConf()";
        $result= $conn->query($query);
    }elseif ($configuracion == "Campamentos"){
        $aHeader = array(
            '0' => "Nombre",
            '1' => "Provincia",
            '2' => "Capacidad",
            '3' => "Habitaciones",
            );
        require_once 'src/login/connect.php';   
        $query = "CALL get_compoundsConf()";
        $result= $conn->query($query);
    }else if ($configuracion == "Inventario de Comida"){
        print "Inventario de Comida";
    }else if ($configuracion == "Equipos de Cocina"){
        print "Equipos de Cocina";
    }else if ($configuracion == "Inventario de Medicinas"){
        print "Inventario de Medicinas";
    }else if ($configuracion == "Equipos de Seguridad"){
        print "Equipos de Seguridad";
    }else if ($configuracion == "Vehiculos"){
        $aHeader = array(
            '0' => "Nombre",
            '1' => "Placa",
            '2' => "Capacidad",
            '3' => "Tipo de Contrato",
            '4' => "Arrendatario",
            '5' => "Teléfono del Arrendatario",
            );
        require_once 'src/login/connect.php';   
        $query = "CALL get_vehiclesConf()";
        $result= $conn->query($query);
    }else if ($configuracion == "Roles"){
        print "Roles";
    }else{
        $aHeader = array(
            '0' => "Nombre",
            '1' => "País",
            '2' => "Ciudad/Estado",
            );
        require_once 'src/login/connect.php';   
        $query = "CALL get_universityConf()";
        $result= $conn->query($query);
    }
    if (!$result){
            echo "<script type='text/javascript'>alert('failed')</script>";
    }else{
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $col = count($row);
            for($j=0;$j<$col;$j++){
                $aContenido[$i][$j] = $row[$j];
                if ($configuracion == "Vehiculos" && $j == 3){
                    if ($aContenido[$i][$j] == 1){
                        $aContenido[$i][$j] = "Propio";
                    }elseif ($aContenido[$i][$j] == 2){
                        $aContenido[$i][$j] = "Arrendadora";
                    }else{
                        $aContenido[$i][$j] = "Contrato";
                    }
                }
            }
            $i ++;
        }
    }
