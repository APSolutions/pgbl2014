/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Javascript que controla la creacion de una nueva  brigada

//Primera parte del javascript controla los datos que deben mostrarse por defecto en los formularios

function setProgSelect(programs){
    //Funcion para agregar la lista de los programas a ambos selects *Programa pincipal y secundario
    var progsList = programs;
    
    var mainProgSelect = document.getElementById("mainProgSelect");
    var minoProgSelect = document.getElementById("minoProgSelect");    
        
    for (var i = 0; i < progsList.length; i++){
        
        var mainProgOption = document.createElement("option");
        var minoProgOption = document.createElement("option");
        
        mainProgOption.id = "mainProgOption"+progsList[i].progID;
        mainProgOption.value = progsList[i].progID;
        mainProgOption.innerHTML = progsList[i].prog;        
        
        minoProgOption.id = "minoProgOption"+progsList[i].progID;
        minoProgOption.value = progsList[i].progID;
        minoProgOption.innerHTML = progsList[i].prog;        
        
        mainProgSelect.appendChild(mainProgOption);
        minoProgSelect.appendChild(minoProgOption);
    }
    

}

function setUnivSelect(universities){
    //Funcion para agregar la lista de universidades al select que le corresponde
    var univs = universities;    
    
    var univSelect = document.getElementById("univSelect");
    
    for (var i = 0; i < univs.length; i++){
        var option = document.createElement("option");

        option.id = "univ" + univs[i].univID;
        option.value = univs[i].univID;
        option.innerHTML = univs[i].univ;

        univSelect.appendChild(option);
    }
}

