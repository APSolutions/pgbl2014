/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function selectform (location){
    var locale = location.getAttribute("name");
    var address = "";
    var position = document.getElementById("position").getAttribute("name");
    if (locale =="Crear"){
        if (position == "Staff"){
            address = "formpersonal.php";
        }
        else if (position == "Communities"){
            address = "formcomunidad.php";
        }
        else if (position == "Compounds"){
            address = "formcampamento.php"
        }
        else if (position == "Vehicles"){
            address = "formvehiculo.php"
        }
    }
    else if (locale =="Editar"){
         if (position == "Staff"){
            address = "formpersonal.php";
        }
        else if (position == "Communities"){
            address = "formcomunidad.php";
        }
        else if (position == "Compounds"){
            address = "formcampamento.php"
        }
        else if (position == "Vehicles"){
            address = "formvehiculo.php"
        }
    }
    else{
        //Mensaje si esta seguro que quiere "borrar" el registro
    }
    window.location.href = address + "?position=" + locale + " " + position;
}
