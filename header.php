<?php
session_name('Global');
session_id('pgbl');

$user = $_SESSION["user"];
$name = $user->get_name();
$lastname = $user->get_lastname();
    echo <<<_END
    <header class="clearfix">
                    <div class="header-user">
                        <p class="userInfo">
                           Hi $name, $lastname
                        </p>
                        <a href="#"> 
                            <span class="header-user-icon flaticon-bell46" id="notifications" data-content="notifications"></span>
                        </a>
                        <a href="logout.php"> 
                            <span class="header-user-icon flaticon-logout13" id="logout" data-content="logout"></span>  
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
                        <h1>Title</h1>
                    </div>                
    </header>
_END;
?>

    


