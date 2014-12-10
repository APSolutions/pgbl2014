<?php
require 'ficha.php';

session_name('Global');
session_id('pgbl');
session_start();    

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["fichaID"])) {
        $_SESSION["ficha"] = new Ficha($_GET["fichaID"]);
        $address = "../../ficha.php";
    }
}
header("Location:$address");
    
    

