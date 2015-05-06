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

function setDateInputs(){
    //Funcion para configurar las fechas iniciales y minimas del formulario para cada elemento
    
    var mainProgBgnDate = document.getElementById("mainProgBgnDate");
    var mainProgEndDate = document.getElementById("mainProgEndDate");
    var minoProgBgnDate = document.getElementById("minoProgBgnDate");
    var minoProgEndDate = document.getElementById("minoProgEndDate");
    
    //Configuracion de la fechas minimas
    mainProgBgnDate.min = minoProgBgnDate.min = setMinDate(null,0);
    mainProgEndDate.min = minoProgEndDate.min = setMinDate(null,1);
    
    
    
    //Configuracion de la fecha a mostrar de las fechas por defecto del programa primario
    mainProgBgnDate.value = setMinDate(null,0);
    mainProgEndDate.value = setMinDate(mainProgBgnDate.value,2);
    
    //Configuracion de la fecha a mostrar de las fechas por defecto del programa secundario
    minoProgBgnDate.value = setMinDate(mainProgEndDate.value, 1);
    minoProgEndDate.value = setMinDate(minoProgBgnDate.value, 2);
    
}

function setMinDate(date,type){
    //Funcion para obtener las fechas minimas que pueden ser utilizadas en los elementos    
    var dt;
    var dn;
    
    if(date !== null){
        dt = new Date(date);
    }else{
        dt = new Date();
    }
    
    dn = new Date(dt);
    
    if (type === 1){
        dn.setDate(dt.getUTCDate() + 1);
    }else if(type === 2){
        dn.setDate(dt.getUTCDate() + 6);
    }
    
    var dd = dn.getDate();
    var mm = dn.getMonth()+1;
    var yy = dn.getFullYear();
    
    if (dd < 10){
        dd = "0" + dd;
    }
    if (mm < 10){
        mm = "0" + mm;
    }
    
    return ""+ yy + "-" + mm + "-" + dd + "";
}

//Funciones para realizar validaciones desde el cliente a medida que el usuario va modificando los datos
