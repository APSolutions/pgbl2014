/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function locator(location){
    var locale = location.getAttribute("name");
    var address = "" ;
    //From main menu
    if (locale=="Administración"){
        address = "menu_admin.php" ;
    }else if(locale=="Logística"){
         address = "logistic.php" ; 
    }
    else if(locale=="Programación"){
        address = "menu_devel.php" ;
    }
    //From logistic menu
    else if(locale=="Fichas"){
        //go to reports
    }
    else if(locale=="Itinerario"){
        //go to reports
    }
    else if(locale=="Calendarios"){
        //go to reports
    }
    else if(locale=="Evaluaciones"){
        //go to reports
    }
    else if(locale=="Reportes"){
        //go to reports
    }
    else if(locale=="Configuraciones"){
        address = "settings.php"
    }
    //From Settings Menu
    else if(locale=="Staff"){
        address ="settingsMenu.php"
    }
    else if(locale=="Communities"){
        address ="settingsMenu.php"
    }
    else if(locale=="Compounds"){
        address ="settingsMenu.php"
    }
    else if(locale=="Food Inventory"){
        address ="settingsMenu.php"
    }
    else if(locale=="Kitchen Equipment"){
        address ="settingsMenu.php"
    }
    else if(locale=="Medicine Inventory"){
        address ="settingsMenu.php"
    }
    else if(locale=="Security Equipment"){
        address ="settingsMenu.php"
    }
    else if(locale=="Vehicles"){
        address ="settingsMenu.php"
    }
    else if(locale=="Roles"){
        address ="settingsMenu.php"
    }
    else if(locale=="Universities"){
        address ="settingsMenu.php"
    }
    //From other menus add else if(locale=="name attribute"){}
    window.location.href = address + "?position=" + locale;
    //window.location.href = address + "?position=" + locale + "&variable=" + variable;
}

