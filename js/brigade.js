/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*Metodo para mostrar los datos relevantes
 * 
 * Si el usuario quiere crear una nueva brigada, solo muestra los campos para
 * llenar, de lo contrario muestra la informacion de la brigda ya guardada.
 * @param cadena bdeID, trae el id de la brigada si existe condiciona

 * 
 */

function setStage(bdeID){
    
    if (bdeID === ""){
        document.getElementById("brigade-information").setAttribute("data-stage","false");
        document.getElementById("brigade-form").setAttribute("data-stage","true"); 
    }else{
        document.getElementById("brigade-information").setAttribute("data-stage","true");
        document.getElementById("brigade-form").setAttribute("data-stage","false");
    }
    
}

/*
 * 
 * @param {type} type
 * @returns {String}
 */

function loadInfo(bdeID, universities, volunteers, flights){
    var univ = universities;
    var vol = volunteers;
    var flt = flights;
    
    if (bdeID !== ""){
        var univList = document.getElementById("loaded-univ-list");
        var volsList = document.getElementById("table-volunteers-content");
        var fltsList = document.getElementById("table-flights-content");
        
        for (var i = 0; i < univ.length; i++){
            var univItem = document.createElement("li");        
            univItem.id = "univ-"+univ[i].univID;
            univItem.innerHTML = univ[i].univName;
            univList.appendChild(univItem);
        }
        
        for (var i = 0; i < vol.length; i++){
            var volsItem = document.createElement("tr");
            var volsID = document.createElement("td");
            var volsName = document.createElement("td");
            var volsLastName = document.createElement("td");
            var volsType = document.createElement("td");
            var volsEarArr = document.createElement("td");
            var volsOwnLve = document.createElement("td");
            var volsAlg = document.createElement("td");
            var volsDiet = document.createElement("td");
            var volsCmts = document.createElement("td");
            
            volsItem.setAttribute("onmouseover","volHover(this, true, this.id)");
            volsItem.setAttribute("onmouseout","volHover(this, false, this.id)");
            volsItem.setAttribute("onclick","volSelect(this, this.id)");
            
            volsItem.id = "vol-"+vol[i].volID;
            volsID.id = "vol-"+vol[i].volID+"-ID";
            volsName.id = "vol-"+vol[i].volID+"-name";
            volsLastName.id = "vol-"+vol[i].volID+"-lastName";
            volsType.id = "vol-"+vol[i].volID+"-type";
            volsEarArr.id = "vol-"+vol[i].volID+"-earArr";
            volsOwnLve.id = "vol-"+vol[i].volID+"-ownLve";
            volsAlg.id = "vol-"+vol[i].volID+"-volAlg";
            volsDiet.id = "vol-"+vol[i].volID+"-volDiet";
            volsCmts.id = "vol-"+vol[i].volID+"-volCmts";
            
            volsID.innerHTML = vol[i].volID;
            volsName.innerHTML = vol[i].volName;
            volsLastName.innerHTML = vol[i].volLastName;
            
            if(vol[i].volType == 0){
                volsType.innerHTML = "Presidente";
            }else if(vol[i].volType == 1){
                volsType.innerHTML = "Co-presidente"
            }else if(vol[i].volType == 2){
                volsType.innerHTML = "Voluntario"
            }else{
                volsType.innerHTML = "Profesor"
            }
            
            if(vol[i].volEarArr === 0){
                volsEarArr.innerHTML = "Si";
            }else{
                volsEarArr.innerHTML = "No";
            }
            
            if(vol[i].volOwnLve === 0){
                volsOwnLve.innerHTML = "Si";
            }else{
                volsOwnLve.innerHTML = "No";
            }

            volsAlg.innerHTML = vol[i].volAlg;
            volsDiet.innerHTML = vol[i].volDiet;
            volsCmts.innerHTML = vol[i].volCmts;
            
            volsItem.appendChild(volsID);
            volsItem.appendChild(volsName);
            volsItem.appendChild(volsLastName);
            volsItem.appendChild(volsType);
            volsItem.appendChild(volsEarArr);
            volsItem.appendChild(volsOwnLve);
            volsItem.appendChild(volsAlg);
            volsItem.appendChild(volsDiet);
            volsItem.appendChild(volsCmts);
            
            volsList.appendChild(volsItem);
            
        }
        
        for (var i = 0; i < flt.length; i++){
            var fltsItem = document.createElement("tr");
            var fltsNmbr = document.createElement("td");
            var fltsType = document.createElement("td");
            var fltsArrTime = document.createElement("td");
            var fltsTotalStud = document.createElement("td");
            
            fltsItem.setAttribute("onmouseover","fltHover(this, true, this.id)");
            fltsItem.setAttribute("onmouseout","fltHover(this, false, this.id)");
            fltsItem.setAttribute("onclick","fltSelect(this, this.id)");
            
            fltsItem.id = "flt-"+flt[i].fltID;
            fltsNmbr.id = "flt-"+flt[i].fltID+"-number";
            fltsType.id = "flt-"+flt[i].fltID+"-type";
            fltsArrTime.id = "flt-"+flt[i].fltID+"-arrTime";
            fltsTotalStud.id = "flt-"+flt[i].fltID+"-totalStud";
            
            fltsNmbr.innerHTML = flt[i].fltID;
            if (flt[i].fltType === 1){
                fltsType.innerHTML = "Llegada";
            }else{
                fltsType.innerHTML = "Llegada";
            }
            fltsArrTime.innerHTML = flt[i].fltArrTime;
            fltsTotalStud.innerHTML = flt[i].fltTotalStud;            
            
            fltsItem.appendChild(fltsNmbr);
            fltsItem.appendChild(fltsType);
            fltsItem.appendChild(fltsArrTime);
            fltsItem.appendChild(fltsTotalStud);
            
            fltsList.appendChild(fltsItem);
        }
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
       
       deleteUniv.className = "univDelete icon-univdelete";
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
