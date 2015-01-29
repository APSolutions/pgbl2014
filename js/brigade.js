/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//**************************Basic Data Manipulation*****************************

//used to set up a current or no brigade
function setBrigade(bdeID){
    
    if (bdeID === "Ninguno"){
        //For new brigade
        //For the main form
        //sets the button save
        document.getElementById("bde-save-updt").innerHTML = "Save";        
    }else{
        //For existing brigade
        //For the main form
        document.getElementById("bde-save-updt").innerHTML = "Update";
        //sets the program update button
        document.getElementById("updateProgram").className += " hidden";
        //set the program in the form
        var prog = document.getElementById("program-content").getAttribute("data-value");
        document.getElementById("prog-input").value = prog;
    }
}

//******************************************************************************

//Functions for programs*******************************************************
function updateProgram(){
    //Change classes to show and hide items
    var program = document.getElementById("program-content");
    if (program.className === "content"){
        program.className += " hidden";
    } else {
        program.className = "content";
    }        
    
    var select = document.getElementById("selectProgram");
    if (select.className === "cs-select"){
        select.className += " selecting";
        select.selectedIndex = 0;
        select.focus();
    } else {
        select.className = "cs-select";
    }
    
    var update = document.getElementById("updateProgram");
    if (update.className === "update-field pointer"){
        update.className = "hidden";
    } else {
        update.className = "update-field pointer";
    }  
}


//Function after selecting a new program
function programClick(){
    var select = document.getElementById("selectProgram");
    var program = document.getElementById("program-content");
    
    //Sets the program to show
    program.innerHTML = select.options[select.selectedIndex].innerHTML;
    if (select.selectedIndex > 0){
        //Hides the select box
        updateProgram();
        //Sets the value for further save
        setBasicFormProgram(select.options[select.selectedIndex].value);
    }    
}

function setBasicFormProgram(value){
    var progField = document.getElementById("prog-input");
    progField.value = value;
}

//******************************************************************************


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