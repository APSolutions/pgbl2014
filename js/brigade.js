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

function addUniversity(){
    var select = document.getElementById("selectUniversity");
    var id = select.options[select.selectedIndex].id;
    var name = select.options[select.selectedIndex].innerHTML;
    
    var list = document.getElementById("universitiesList");
    var toDb = document.getElementById("universitiesAdded");
    
    var btnDelete = document.createElement('button');
    var university = document.createElement('li');
    var universityToDB = document.createElement('input');
    
    university.id = "university-" + (list.childElementCount + 1);
    university.innerHTML = name + " ";
    
    btnDelete.name = id;
    btnDelete.innerHTML = "X";
    btnDelete.className = "delete-university";
    btnDelete.setAttribute('onclick','deleteUniversity('+(list.childElementCount + 1)+')');        
    universityToDB.id = "university-item-" + (list.childElementCount + 1);
    universityToDB.name = "university-item-" + (list.childElementCount + 1);
    universityToDB.value = id;
    universityToDB.setAttribute('hidden','');
    
    university.appendChild(btnDelete);
    list.appendChild(university);
    toDb.appendChild(universityToDB);
    
}

function deleteUniversity(id){
    var list = document.getElementById("universitiesList");
    var toDb = document.getElementById("universitiesAdded");
    
    var uni = document.getElementById("university-"+id);
    var uniDb = document.getElementById("university-item-"+id);
    
    list.removeChild(uni);
    toDb.removeChild(uniDb);
}


function programClick(){
    
}

function updateProgram(){
    /**** Visual options *****/
    var program = document.getElementById("program-content");
    if (program.className === "content"){
        program.className += " hidden";
    } else {
        program.className = "content";
    }        
    
    var select = document.getElementById("selectProgram");
    if (select.className === "cs-select"){
        select.className += " selecting";
        select.focus();
    } else {
        select.className = "cs-select";
    }
}