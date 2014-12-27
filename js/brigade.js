/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var programSelected = false;
var universitySelected = false;

function disableForm(id) {
    var limit = document.forms[id].elements.length;
    for (i=0;i<limit;i++) {
        document.forms[id].elements[i].disabled = true;
    }
}

function enableForm(id) {
    var limit = document.forms[id].elements.length;
    for (i=0;i<limit;i++) {
        document.forms[id].elements[i].disabled = false;
    }
}

function selectRequire(variable){
    if (variable === 0){
        programSelected = true;
    }else{
        universitySelected = true;
    }
    
    if (programSelected && universitySelected){
        enableForm("frmFlights");
        enableForm("frmVolunteers");
    }
}

function loadPrograms(ids,programs){
    var list = document.getElementById("selectProgram");
    var item = [];
    for (var i = 0; i < programs.length; i++){
       item[i] = document.createElement('option');
       item[i].id = "program"+ids[i];
       item[i].value = programs[i];
       item[i].innerHTML = programs[i];
       list.appendChild(item[i]);
    }  
}

function loadUniversities(ids,universities){
    var list = document.getElementById("selectUniversity");
    var item = [];
    for (var i = 0; i < universities.length; i++){
       item[i] = document.createElement('option');
       item[i].id = "university"+ids[i];
       item[i].value = universities[i];
       item[i].innerHTML = universities[i];
       list.appendChild(item[i]);
    }  
}