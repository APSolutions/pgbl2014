<?php
    session_name('Global');
    session_id('pgbl');
    require_once 'src/login/connect.php';   
    $query = "CALL get_roleNames()";
    $result= $conn->query($query);
    if (!$result){
        $errorMessage = $errorMessage.'Error2: '.$conn->error;
    } else{
        if ($result->num_rows > 0){
            $i = 0;
            $j = 0;
            while($row = $result->fetch_assoc()){
                if ($row['tipos'] == 1){
                    $permanentRoles[$i] = $row['roles'];
                    $i ++;
                } else{
                    $temporaryRoles[$j] = $row['roles'];
                    $j++;
                }                
            }
        }
    }

