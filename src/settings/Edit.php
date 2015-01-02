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
    $econtractType = $elessor = $ecapacity = $evyear = $einsuranceCompany = $einsuranceNumber = $einsuranceType = $econtactPhone = $eid = "";
    $elocation = $ebedrooms = $eelectricity = $ewifi = $esignal = $eventilation = $etoilet = $edrinkablew = "";
    $etoiletType = array() ; 
    if ($configuracion == "Personal"){

    }else if ($configuracion == "Comunidades"){
       
    }elseif ($configuracion == "Campamentos"){
        require 'src/login/connect.php';  
        $query = "CALL edit_compound('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $result->fetch_assoc();
            $ename = $row['name'];
            $elocation = $row['location'];
            $ecity = $row['town'];
            $ecapacity = $row['capacity'];
            $ebedrooms = $row['bedrooms'];
            $eelectricity = $row['electricity'];
            $ewifi = $row['wifi'];
            $esignal = $row['cellphone_signal'];
            $eventilation = $row['ventilation'];
            $etoilet = $row['toilet_quantity'];
            $edrinkablew = $row['drinkable_water'];
        }
        require 'src/login/connect.php';
        $query = "CALL edit_toiletType('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $col = count($row);
                for($j=0;$j<$col;$j++){
                    $etoiletType[$i][$j] = $row['toilet'];
                }
                $i ++;
            }
        }
    }else if ($configuracion == "Inventario de Comida"){
        print "Inventario de Comida";
    }else if ($configuracion == "Equipos de Cocina"){
        print "Equipos de Cocina";
    }else if ($configuracion == "Inventario de Medicinas"){
        print "Inventario de Medicinas";
    }else if ($configuracion == "Equipos de Seguridad"){
        print "Equipos de Seguridad";
    }else if ($configuracion == "Vehiculos"){
        require_once 'src/login/connect.php';  
        $query = "CALL edit_vehicles('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $result->fetch_assoc();
            $ename = $row['name'];
            $econtractType = $row['contractType'];
            $elessor = $row['lessor'];
            $ecapacity = $row['capacity'];
            $evyear = $row['vyear'];
            $einsuranceCompany = $row['insuranceCompany'];
            $einsuranceNumber = $row['insuranceNumber'];
            $einsuranceType = $row['insuranceType'];
            $econtactPhone = $row['contactPhone'];
            $eid = $row['id'];
        }
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

