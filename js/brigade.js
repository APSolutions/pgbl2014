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

function hideiTem(id){
    var element = document.getElementById(id);
    element.setAttribute("hidden","");
}