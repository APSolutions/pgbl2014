<?php
session_name('Global');
session_id('pgbl');
session_start('pgbl');
session_unset('pgbl');
session_destroy('pgbl');
header('Location:index.php');
?>