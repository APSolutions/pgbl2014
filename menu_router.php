<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();

$user = $_SESSION["user"];
$user_admin = $user->get_permission_admin();
$user_logic = $user->get_permission_logic();
$user_devel = $user->get_permission_devel();
$position ="";

if ($user_admin && !$user_devel && !$user_logic ){
    //lleva al menu de administracion
    $destination = 'Location:menu_admin.php';
    $_SESSION["position"] = 'Administracion';
}elseif (!$user_admin && $user_devel && !$user_logic) {
    //lleva al menu de programacion
    $destination = 'Location:development.php';
    $_SESSION["position"] = 'Programacion';
}elseif  (!$user_admin && !$user_devel && $user_logic){
    //lleva al menu de logistica
    $destination = 'Location:logistic.php';
    $_SESSION["position"] = 'Logistica';
}else {
    //lleva al menu principal
    $destination = 'Location:home.php';
    $_SESSION["position"] = 'Menu Principal';
}
header($destination);
?>
