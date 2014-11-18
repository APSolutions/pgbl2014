<?php
session_name('Global');
session_id('pgbl');

$user = $_SESSION["user"];
$position = $_GET["position"];
$name = $user->get_name();
$lastname = $user->get_lastname();
    echo <<<_END
    <header class="clearfix">
                    <div class="header-user">
                        <p class="userInfo">
                           Hi $name, $lastname
                        </p>
                        <a href="#" class="tooltip" data-content="notifications">
                            <span class="header-user-icon flaticon-bell46" id="notifications"></span>
                        </a>
                        <a href="logout.php" class="tooltip" data-content="logout"> 
                            <span class="header-user-icon flaticon-logout13" id="logout"></span>  
                        </a>                        
                    </div>
                    <div class="header-logo">
                        <span> 
                            <img class="logo" src="img/logo.png"/> 
                            <p class="slogan"> Students Empowering Communities                                                                
                            </p> 
                        </span>
                    </div>
                    <div class="header-title">
                        <h1>$position</h1>
                    </div>                
    </header>
_END;
?>

    


