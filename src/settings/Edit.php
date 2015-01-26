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
    $emembers = "";
    $elastname = $esex = $eborndate = $ecitizenship = $ebloodType = $emaritalStatus = $ecellphone = $eemail = $euniversity = $ecareer = $eaddress = $econtractDate = $einterviewDate = $erole = "";
    $eename = $eeaddress = $eephoneNumber = $ealergia = "";
    $etoiletType = array() ; 
    $ecommunityProgram = array();
    $estaffmcondition = array();
    $estaffSpokenLanguage = array();
    if ($configuracion == "Personal"){
        require 'src/login/connect.php';
        $query = "CALL edit_staff('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed-editar')</script>";
        }else{
            $row = $result->fetch_assoc();
            $ename = $row['name'];  
            $elastname = $row['lastname'];
            $eid = $row['id'];
            $esex = $row['sex'];
            $eborndate = $row['bornDate'];
            $ecitizenship = $row['citizenship'];
            $ebloodType = $row['bloodType'];
            $emaritalStatus = $row['maritalStatus'];
            $ecellphone = $row['cellphoneNumber'];
            $eemail = $row['email'];
            $euniversity = $row['university'];
            $ecareer = $row['career'];
            $eaddress = $row['address'];
            $econtractDate = $row['contractDate'];
            $einterviewDate = $row['interviewDate'];
            //$erole = $row['role'];          
        }
        require 'src/login/connect.php';
        $query = "CALL edit_staffEmergencyContact('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $result->fetch_assoc();
            $eename = $row['name']; 
            $eeaddress = $row['address'];
            $eephoneNumber = $row['phoneNumber'];
        }
        require 'src/login/connect.php';
        $query = "CALL edit_staffMedicalCon('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $col = count($row);
                for($j=0;$j<$col;$j++){
                    $estaffmcondition[$i][$j] = $row['mcondition'];
                }
                $i ++;
            }
        }
        require 'src/login/connect.php';
        $query = "CALL edit_staffAllergies('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $result->fetch_assoc();
            $ealergia = $row['allergy']; 
        }
        require 'src/login/connect.php';
        $query = "CALL edit_staffSpokenLanguage('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $col = count($row);
                for($j=0;$j<$col;$j++){
                    $estaffSpokenLanguage[$i][$j] = $row['slanguage'];
                }
                $i ++;
            }
        }
        
       
    }else if ($configuracion == "Comunidades"){
        require 'src/login/connect.php';
        $query = "CALL edit_community('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $row = $result->fetch_assoc();
            $ename = $row['name'];
            $elocation = $row['location'];
            $emembers = $row['comm_members'];
        }
        require 'src/login/connect.php';
        $query = "CALL edit_communityPrograms('$primary')";
        $result= $conn->query($query);
        if (!$result){          
            echo "<script type='text/javascript'>alert('failed')</script>";
        }else{
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $col = count($row);
                for($j=0;$j<$col;$j++){
                    $ecommunityProgram[$i][$j] = $row['program'];
                }
                $i ++;
            }
        }     
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

