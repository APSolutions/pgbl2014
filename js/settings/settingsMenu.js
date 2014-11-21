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
        if (position == "Personal"){
            address = "formpersonal.php";
        }
        else if (position == "Comunidades"){
            address = "formcomunidad.php";
        }
        else if (position == "Campamentos"){
            address = "formcampamento.php";
        }
        else if (position == "Vehículos"){
            address = "formvehiculo.php";
        }
        else if(position == "Universidades"){
            address = "formuniversidad.php"
        }
    }
    else if (locale =="Editar"){
         if (position == "Personal"){
            address = "formpersonal.php";
        }
        else if (position == "Comunidades"){
            address = "formcomunidad.php";
        }
        else if (position == "Campamentos"){
            address = "formcampamento.php";
        }
        else if (position == "Vehículos"){
            address = "formvehiculo.php";
        }
    }
    else{
        //Mensaje si esta seguro que quiere "borrar" el registro
    }
    window.location.href = address + "?position=" + locale + " " + position + "&locale=" + locale;
}
