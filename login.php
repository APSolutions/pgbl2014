<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/login/style1.css" media="screen" rel='stylesheet' type='text/css' />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <title>Global Brigades Panama</title>
    </head>
    <body>
        <div class="login-body-logo">
            <img id="bdlogo" src="img/logo.png"/>
            <span class="slogan"> Students Empowering Communities </span>            
        </div>
        <div class ="login">
            <div class="login-screen">
                <div class="app-title">
                    <h1>Global Brigades Panama</h1>
                </div>
                <div class="login-form">
                    <?php
                    require 'src/login/login.php';
                    ?>
                    <a class="login-link" href="#">Forgot your password?</a>
                </div>
            </div>
        </div> 
    </body>
</html>
