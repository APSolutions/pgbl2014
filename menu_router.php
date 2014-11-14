<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();

$user = $_SESSION["user"];
$user_admin = $user->get_permission_admin();
$user_logic = $user->get_permission_logic();
$user_devel = $user->get_permission_devel();

if ($user_admin && !$user_devel && !$user_logic ){
    //lleva al menu de administracion
    $destination = 'Location:menu_admin.php';
}elseif (!$user_admin && $user_devel && !$user_logic) {
    //lleva al menu de programacion
    $destination = 'Location:menu_devel.php';
}elseif  (!$user_admin && !$user_devel && $user_logic){
    //lleva al menu de logistica
    $destination = 'Location:logistic.php';
}else {
    //lleva al menu principal
    $destination = 'Location:home.php';
}
header($destination);

?>
