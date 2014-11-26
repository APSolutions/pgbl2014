<?php
session_name('Global');
session_id('pgbl');

if (isset($_SESSION["user"])){
    $user = $_SESSION["user"];
    $name = $user->get_name();
    $lastname = $user->get_lastname();
}

$position = $_SESSION["position"];


echo <<<END
    <header class="clearfix">
        <div class="header-logo">
            <img class="img-logo" src="img/logo.png"/>
            <p class="slogan">Students Empowering Communities</p> 
        </div>
        <div class="header-user">
            <p class="user-details">Hi $name, $lastname</p>
            <a href="#" class="tooltip">
                    <span class="header-icon flaticon-bell" data-content="notifications"></span>
                </a>
                <a href="logout.php" class="tooltip"> 
                    <span class="header-icon flaticon-logout" data-content="logout"></span>  
                </a>                          
        </div> 
        <div class="header-title">
            <h1 class="position">$position</h1>
        </div>
        
    </header>
END;
