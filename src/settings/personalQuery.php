<?php
    require 'src/login/usuario.php';
    session_name('Global');
    session_id('pgbl');
    session_start();
    require_once 'src/login/connect.php';   
    $query = "CALL get_roleNames()";
    $result= $conn->query($query);
    if (!$result){
        $errorMessage = $errorMessage.'Error2: '.$conn->error;
    } else{
        if ($result->num_rows > 0){
            $i = 0;
            while($row = $result->fetch_assoc()){
                if ($row['tipos'] == 1){
                    $permanentRoles[$i] = $row['roles'];
                } else{
                    $temporaryRoles[$i] = $row['roles'];
                }
                $i ++;
            }
        }
    }

