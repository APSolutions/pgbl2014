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
    <header class="container">
        <div class="header-logo">
            <img class="img-logo" src="img/logo.png"/>
            <p class="slogan">Students Empowering Communities</p> 
        </div>
        <div class="header-user">
            <p class="user-details">Hi $name, $lastname</p>
            <a href="#" class="tooltip" data-content="notifications">
                <span class="header-user-icon flaticon-bell46" id="notifications">2</span>
            </a>
            <a href="logout.php" class="tooltip" data-content="logout"> 
                <span class="header-user-icon flaticon-logout13" id="logout">1</span>  
            </a>                        
        </div> 
        <div class="header-title">
            <h1 class="position">$position</h1>
        </div>
        
    </header>
END;
