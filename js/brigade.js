/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//**************************Basic Data Manipulation*****************************

function setDate(type){
    var dt = new Date();
    var dd = dt.getDate();
    var mm = dt.getMonth()+1;
    var yyyy = dt.getFullYear();
    
    if (type === 1){
        dd += 7;
    }
    
    if (dd < 10){
        dd = "0" + dd;
    }
    if (mm < 10){
        mm = "0" + mm;
    }
    
    return ""+ yyyy + "-" + mm + "-" + dd + "";
}

//used to set up a current or no brigade
function setBrigade(bdeID){
    
    var dtop = setDate(0);
    var dted = setDate(1);
    
    alert(dtop);
    
    if (bdeID === "Ninguno"){
        //For new brigade
        //For the main form
        //sets the button save
        document.getElementById("bde-save-updt").innerHTML = "Save";
        document.getElementById("dtop").min = dtop;
        document.getElementById("dted").min = dted;
        
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


//Functions for universities **************************************************/

function showUniversityList(){
       
    var univContent = document.getElementById("univ-content");
    
    if (univContent.className === "content"){
        univContent.className += " hidden";
    } else {
        univContent.className = "content";
    }
    
    var univSelect = document.getElementById("selectUniversity");
    
    if (univSelect.className === "cs-select"){
        univSelect.className += " selecting";
        univSelect.selectedIndex = 0;
        univSelect.focus();
    } else {
        univSelect.className = "cs-select";
    }
    
    var univButton = document.getElementById("addUniv");
    if (univButton.className === "add-field pointer"){
        univButton.className = "hidden";
    } else {
        univButton.className = "add-field pointer";
    }
}

function addUniversity(){
    var univSelect = document.getElementById("selectUniversity");
    var univList = document.getElementById("universitiesList");    
    var univItem = document.createElement("li");
    var univCancel = document.createElement("span");
    var univName = univSelect.options[univSelect.selectedIndex].innerHTML;
    var univID = univSelect.options[univSelect.selectedIndex].value;
    
    if (univSelect.selectedIndex > 0){
        univItem.id = "univ"+univID;
        univItem.innerHTML = univName;
        univCancel.className = "icon-cancel";
        univCancel.setAttribute("onclick","deleteUniversity("+univID+")");
        univItem.appendChild(univCancel);
        
        if (univList.innerHTML.indexOf("Ninguno") > -1){
            univList.innerHTML = "";
            univList.appendChild(univItem);
            addUniv(univID);
        }else if (univList.innerHTML.indexOf(univName) > -1){
            alert("Esta universidad: "+univName+", ya ha sido agragada.");
        }else {
            univList.appendChild(univItem);
            addUniv(univID);
        }
        
        showUniversityList();
    }    
}

function deleteUniversity(id){
    var univList = document.getElementById("universitiesList");
    var uni = document.getElementById("univ"+id);
    var univCount = document.getElementById("univ-count");
    var frmBas = document.getElementById("bas-frm");
    var univField = document.getElementById("univ-field-"+id);
    
    if(Number(univCount.value) === 1){
        alert("La brigada debe tener al menos una universidad.")
    }else{
        univList.removeChild(uni);
        frmBas.removeChild(univField);
        univCount.value = Number(univCount.value) - 1;
    }
}

function addUniv(id){
    var univCount = document.getElementById("univ-count");
    var frmBas = document.getElementById("bas-frm");
    var univRecord = document.createElement("input");
    
    if (univCount.value === "null"){
        univCount.value = 1;
    } else {
        univCount.value = Number(univCount.value) + 1;
    }
    
    univRecord.type = "hidden";
    univRecord.name = "univ"+id;
    univRecord.id = "univ-field-"+id;
    univRecord.value = id;
    
    frmBas.appendChild(univRecord);
}

//Dates Function

function updateDate(type){
    var dtop = document.getElementById("dtop");
    var dted = document.getElementById("dted");
    var dtopInput = document.getElementById("dtop-input");
    var dtedInput = document.getElementById("dted-input");
    var date = new Date(dtop.value);
    date.setDate(date.getDate() + 7)
    if (type === 0){
        dtopInput.value = dtop.value;
    }else{
        dtedInput.value = dted.value;
    }
}

//Save functions

function saveUpdateBasics(){
    var frmBas = document.getElementById("bas-frm");
    frmBas.submit();
}