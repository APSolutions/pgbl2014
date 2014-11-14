<?php
session_name('Global');
session_id('pgbl');

$user = $_SESSION["user"];
$name = $user->get_name();
$lastname = $user->get_lastname();
    echo <<<_END
    <header class="clearfix">
                    <div class="header-user">
                        <span class="userInfo">
                           Hi $name, $lastname |
                        </span>
                        <span class="logout">
                            <a href="logout.php"> logout </a>
                        </span>
                    </div>
                    <div class="header-logo">
                        <span> 
                            <img class="logo" src="img/logo.png"/> 
                            <p class="slogan"> Students Empowering Communities
                            <span class="bp-icon bp-icon-about" data-content="help button"></span>                                        
                            </p> 
                        </span>
                    </div>
                    <div class="header-title">
                        <h1>Title</h1>
                    </div>                
    </header>
_END;
?>

    


