/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//**************************Basic Data Manipulation*****************************

function setDate(type){
    var dt = new Date();
    var dn = new Date(dt);
        
    if (type === 1){
        dn.setDate(dt.getDate() + 7);
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


function setMinDate(date){
    var dt = new Date(date);
    var dn = new Date(dt);
    
    dn.setDate(dt.getDate() + 7);
    
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

//used to set the default data into selects
function setData(programs, universities){
    var progs = programs;
    var univs = universities;
    
    var progSelect1 = document.getElementById("progSelect1");
    var progSelect2 = document.getElementById("progSelect2");
    var univSelect = document.getElementById("univSelect");
        
    for (var i = 0; i < progs.length; i++){
        var option1 = document.createElement("option");
        var option2 = document.createElement("option");
        
        option1.id = "prog"+progs[i].progID;
        option1.value = progs[i].progID;
        option1.innerHTML = progs[i].prog;
        
        progSelect1.appendChild(option1);
        
        option2.id = "subProg"+progs[i].progID;
        option2.value = progs[i].progID;
        option2.innerHTML = progs[i].prog;        
        
        progSelect2.appendChild(option2);
    }
    
    for (var i = 0; i < univs.length; i++){
        var option = document.createElement("option");
        
        option.id = "univ" + univs[i].univID;
        option.value = univs[i].univID;
        option.innerHTML = univs[i].univ;
        
        univSelect.appendChild(option);
    }
}


//used to set up a current or no brigade
function setBrigade(bdeID){
    
    var dtop = setDate(0);
    var dted = setDate(1);
    
    document.getElementById("dtop").min = dtop;
    document.getElementById("dted").min = dted;
    
    document.getElementById("priDtop").min = dtop;
    document.getElementById("priDted").min = dtop;
    
    document.getElementById("priDtop").max = dted;
    document.getElementById("priDted").max = dted;
    
    document.getElementById("subDtop").min = dtop;
    document.getElementById("subDted").min = dtop;
    
    document.getElementById("subDtop").max = dted;
    document.getElementById("subDted").max = dted;
        
    if (bdeID === ""){
        //For new brigade
        //For the main form
        //sets the button save
        document.getElementById("btnPriSubmit").innerHTML = "Save";
        document.getElementById("dtop").value = dtop;
        document.getElementById("dted").value = dted;
        
    }else{
        //For existing brigade
        //For the main form
        document.getElementById("btnPriSubmit").innerHTML = "Update";   
    }
}

//******************************************************************************

//Functions for programs********************************************************
var priProg = 0;
var subProg = 0;

function addSubProgram(){
    var elements = document.getElementsByClassName("subProgramField");
    var visibility= "";
    
    if (document.getElementById("subProgramSelected").checked){
        document.getElementById("subProgramSelected").checked = false;
        document.getElementById("btnAddProg").innerHTML = "Agregar Programa Secundario";
        visibility = "subProgramField hidden";
    }else{
        document.getElementById("subProgramSelected").checked = true;
        document.getElementById("btnAddProg").innerHTML = "Eliminar Programa Secundario";
        visibility = "subProgramField visible";
    }
    
    for (var i = 0; i < elements.length; i++){
        elements.item(i).className = visibility;
    }
}

function updateSubProg(){
    var selProg = document.getElementById("progSelect1");
    
    if (selProg.selectedIndex != priProg && selProg.selectedIndex != 0){
        if(priProg != 0){
            var id = selProg.options[priProg].value;
            document.getElementById("subProg" + id).disabled = false;
        }      
        
        priProg = selProg.selectedIndex;
        
        id = selProg.options[selProg.selectedIndex].value;
        document.getElementById("subProg" + id).disabled = true;
    }
}

function updateProg(){
    var selProg = document.getElementById("progSelect2");
    
    if (selProg.selectedIndex != subProg && selProg.selectedIndex != 0){
        if (subProg != 0){
            var id = selProg.options[subProg].value;
            document.getElementById("prog" + id).disabled = false;
        }
        subProg = selProg.selectedIndex;
        
        id = selProg.options[selProg.selectedIndex].value;
        document.getElementById("prog" + id).disabled = true;
    }
}

function setBasicFormProgram(value){
    var progField = document.getElementById("prog-input");
    progField.value = value;
}

//******************************************************************************
//Functions for universities **************************************************/
var currentUniv = 0;


function addUniversity(){
    var univsList = document.getElementById("univSelect");
    var selectedUnivList = document.getElementById("selectedUnivList");
    var selectedUnivs = document.getElementById("selectedUniv");
    
    if (univsList.selectedIndex != currentUniv && univsList.selectedIndex != 0){
       var selectedUniv = univsList.options[univsList.selectedIndex];
       selectedUniv.disabled = "disabled";
       currentUniv = univsList.selectedIndex;       
             
       var univToList = document.createElement("li");
       var univToForm = document.createElement("option");
       var deleteUniv = document.createElement("a");
       
       univToList.id = "listUniv"+selectedUniv.value;
       univToList.innerHTML = selectedUniv.innerHTML;
       univToList.setAttribute("data-id",selectedUniv.value);
       
       univToForm.id = "selUniv"+selectedUniv.value;
       univToForm.value = selectedUniv.value;
       univToForm.selected = "selected";
       
       deleteUniv.innerHTML = "Eliminar";
       deleteUniv.className = "pointer";
       deleteUniv.setAttribute("onclick","deleteUniversity("+selectedUniv.value+")");
       
       univToList.appendChild(deleteUniv);
       selectedUnivs.appendChild(univToForm);
       selectedUnivList.appendChild(univToList);
     
    }
}

function deleteUniversity(id){
    var selectedUnivs = document.getElementById("selectedUniv");
    var selectedUnivList = document.getElementById("selectedUnivList");
        
    if(selectedUnivs.childElementCount === 1){
        alert("La brigada debe tener al menos una universidad.")
    }else{
        document.getElementById("univ"+id).disabled = false;
        selectedUnivs.removeChild(document.getElementById("selUniv"+id));
        selectedUnivList.removeChild(document.getElementById("listUniv"+id));
    }
}
//Dates Function****************************************************************

function updateDate(type){
    var dtop = document.getElementById("dtop");
    var dted = document.getElementById("dted");
    var priDtop = document.getElementById("priDtop");
    var priDted = document.getElementById("priDted");
    var subDtop = document.getElementById("subDtop");
    var subDted = document.getElementById("subDted");
    
    var dn = new Date(setMinDate(dtop.value)).getDate();
    var dc = new Date(dted.value).getDate();
    
    if (type === 0){
        
        
        if (dn > dc){
            dted.value = setMinDate(dtop.value);            
        }
        
        dted.min = setMinDate(dtop.value);
        
        priDtop.value = dtop.value;
        priDtop.min = dtop.value;
        priDtop.max = dted.value;
        
        subDtop.value = dtop.value;
        subDtop.min = dtop.value;
        subDtop.max = dted.value;
        
        priDted.value = dtop.value;
        priDted.min = dtop.value;
        priDted.max = dted.value;
        
        subDted.value = dtop.value;
        subDted.min = dtop.value;
        subDted.max = dted.value;        
    }else if(type === 1){
        priDtop.max = dted.value;
        subDtop.max = dted.value;
        priDted.max = dted.value;
        subDted.max = dted.value;        
    }else if(type === 2){
        
    }else if(type === 3){
        
    }else if(type === 4){
        
    }else if(type === 5){
        
    }
}

//Save functions****************************************************************

function validateBasics(){
    
    var valid = true;
    
    var prog = document.getElementById("prog-input");
    var univ = document.getElementById("univ-count");
    var dtop = document.getElementById("dtop-input");
    var dted = document.getElementById("dted-input");
    
    if (prog.value === "null"){
        document.getElementById("prog-error").innerHTML = "Debe seleccionar un programa";
        valid = false;
    }
    
    if (univ.value === "null"){
        document.getElementById("univ-error").innerHTML = "Debe seleccionar al menos una universidad";
        valid = false;
    }
    
    if (dtop.value === "null"){
        dtop.value = document.getElementById("dtop").value;
    }
    
    if (dted.value === "null"){
        dted.value = document.getElementById("dted").value;
    }
    
    return valid;
}

function saveUpdateBasics(){
    var frmBas = document.getElementById("bas-frm");
    
    if (validateBasics()){
        frmBas.submit();
    }
    
}

/*Validation Methods*/