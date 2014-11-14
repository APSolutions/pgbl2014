<?php
session_name('Global');
session_id('pgbl');
session_start();

IF (!is_null($_SESSION["username"])){
    header('Location:menu_router.php');
}else{
    header('Location:login.php');
}
    
?>
