var comunities;
var compounds;
var staffCoordinator;
var staffInterpreter
var selectedCommunity;
var selectedCompound;
var comunitiesLoaded = false;
var compoundsLoaded = false;
var staffCoordinatorLoaded = false;
var staffInterpreterLoaded = false;
var staffDriversLoaded = false;
var staffParamedicsLoaded = false;
var staffTecniciansLoaded = false;
var staffOthersLoaded = false;
var arrivalHourLoaded = false;
var leaveHourLoaded = false;

function loadData(param_communities, param_compounds, param_staffCoor, param_staffInt, param_staffDriv, param_staffPar, param_staffTec, param_staffOthers) {
    comunities = param_communities;
    compounds = param_compounds;
    staffCoordinator = param_staffCoor;
    staffInterpreter = param_staffInt;
    staffDrivers = param_staffDriv;
    staffParamedics = param_staffPar;
    staffTecnicians = param_staffTec;
    staffOthers = param_staffOthers;   
}

function loadCommunities(param_community){
    if (!comunitiesLoaded) {
        var list = document.getElementById("communityList");
        var item = [];
        for (var i = 0; i < comunities.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "community"+i;
           item[i].value = comunities[i];
           item[i].innerHTML = comunities[i];
           if (comunities[i] === param_community){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        comunitiesLoaded = true;
    }    
}

function loadCompounds(param_compound){
    if (!compoundsLoaded) {
        var list = document.getElementById("compoundList");
        var item = [];
        for (var i = 0; i < compounds.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "compound"+i;
           item[i].value = compounds[i];
           item[i].innerHTML = compounds[i];
           if (compounds[i] === param_compound){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        compoundsLoaded = true;
    }     
}

function loadStaffCoordinator(param_staffCoordinator){

    if (!staffCoordinatorLoaded) {
        var list = document.getElementById("coordinatorList");
        var item = [];
        for (var i = 0; i < staffCoordinator.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "coor"+staffCoordinator[i];
           item[i].value = staffCoordinator[i];
           item[i].innerHTML = staffCoordinator[i];
           if (staffCoordinator[i] === param_staffCoordinator){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        staffCoordinatorLoaded = true;
    }    
}

function loadStaffInterpreter(param_staffInterpreter){
    if (!staffInterpreterLoaded) {
        var list = document.getElementById("interpreterList");
        var item = [];
        for (var i = 0; i < staffInterpreter.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "inter"+staffInterpreter[i];
           item[i].value = staffInterpreter[i];
           item[i].innerHTML = staffInterpreter[i];
           if (staffInterpreter[i] === param_staffInterpreter){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        staffInterpreterLoaded = true;
    }    
}

function loadStaffDrivers(param_staffDrivers){
    if (!staffDriversLoaded) {
        var list = document.getElementById("driverList");
        var item = [];
        for (var i = 0; i < staffDrivers.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "driver"+staffDrivers[i];
           item[i].value = staffDrivers[i];
           item[i].innerHTML = staffDrivers[i];
           if (staffDrivers[i] === param_staffDrivers){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        staffDriversLoaded = true;
    }    
}

function loadStaffParamedics(param_staffParamedics){
    if (!staffParamedicsLoaded) {
        var list = document.getElementById("paramedicList");
        var item = [];
        for (var i = 0; i < staffParamedics.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "paramedic"+staffParamedics[i];
           item[i].value = staffParamedics[i];
           item[i].innerHTML = staffParamedics[i];
           if (staffParamedics[i] === param_staffParamedics){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        staffParamedicsLoaded = true;
    }    
}

function loadStaffTecnicians(param_staffTecnicians){
    if (!staffTecniciansLoaded) {
        var list = document.getElementById("technicianList");
        var item = [];
        for (var i = 0; i < staffTecnicians.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "tec"+staffTecnicians[i];
           item[i].value = staffTecnicians[i];
           item[i].innerHTML = staffTecnicians[i];
           if (staffTecnicians[i] === param_staffTecnicians){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        staffTecniciansLoaded = true;
    }    
}

function loadStaffOthers(param_staffOthers){
    if (!staffOthersLoaded) {
        var list = document.getElementById("otherList");
        var item = [];
        for (var i = 0; i < staffOthers.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "other"+staffOthers[i];
           item[i].value = staffOthers[i];
           item[i].innerHTML = staffOthers[i];
           if (staffOthers[i] === param_staffOthers){
               item[i].selected="selected";
           }
           list.appendChild(item[i]);
        }
        staffOthersLoaded = true;
    }    
}

function loadArrivalHour(param_arrivalHour){
    if (!param_arrivalHour == ""){
        var option = document.getElementById('arrivalhour').childNodes;      
        for (i=0;i<option.length;i++){
            if (option[i].value == param_arrivalHour){
                option[i].selected='selected';
            }
        }
    }
}

function loadLeaveHour (param_leaveHour){   
    if (!param_leaveHour == ""){
        var option = document.getElementById('leavehour').childNodes;
        for (i=0;i<option.length;i++){
            if (option[i].value == param_leaveHour){
                option[i].selected='selected';
            }
        }
    }
}
//******************************************************************************
//Functions for staff **************************************************/
var currentCoordinator = 0;
function addCoordinator(){
    var coordinatorList = document.getElementById("coordinatorList");
    var selectedCoordinatorList = document.getElementById("selectedCoordinatorList");
    var selectedCoordinators = document.getElementById("selectedCoordinator");
    
    if (coordinatorList.selectedIndex != currentCoordinator && coordinatorList.selectedIndex != 0){
       var selectedCoordinator = coordinatorList.options[coordinatorList.selectedIndex];
       selectedCoordinator.disabled = "disabled";
       currentCoordinator = coordinatorList.selectedIndex;       
             
       var coordinatorToList = document.createElement("li");
       var coordinatorToForm = document.createElement("option");
       var deleteCoordinator = document.createElement("a");
       
       coordinatorToList.id = "listCoordinator"+selectedCoordinator.value;
       coordinatorToList.innerHTML = selectedCoordinator.innerHTML;
       coordinatorToList.setAttribute("data-id",selectedCoordinator.value);
       
       coordinatorToForm.id = "selCoordinator"+selectedCoordinator.value;
       coordinatorToForm.value = selectedCoordinator.value;
       coordinatorToForm.selected = "selected";
       
       deleteCoordinator.innerHTML = "Eliminar";
       deleteCoordinator.className = "pointer";
       deleteCoordinator.setAttribute("onclick","deleteCoor("+"'"+selectedCoordinator.value+"'"+")");
       
       coordinatorToList.appendChild(deleteCoordinator);
       selectedCoordinators.appendChild(coordinatorToForm);
       selectedCoordinatorList.appendChild(coordinatorToList);
    }
}

function deleteCoor(id){
    var selectedCoordinators = document.getElementById("selectedCoordinator");
    var selectedCoordinatorList = document.getElementById("selectedCoordinatorList");
        
    if(selectedCoordinators.childElementCount === 1){
        alert("La brigada debe tener al menos un coordinador.")
    }else{
        document.getElementById("coor"+id).disabled = false;
        selectedCoordinators.removeChild(document.getElementById("selCoordinator"+id));
        selectedCoordinatorList.removeChild(document.getElementById("listCoordinator"+id));
    }
}

var currentInterpreter = 0;
function addInterpreter(){
    var interpreterList = document.getElementById("interpreterList");
    var selectedInterpreterList = document.getElementById("selectedInterpreterList");
    var selectedInterpreters = document.getElementById("selectedInterpreter");
    
    if (interpreterList.selectedIndex != currentInterpreter && interpreterList.selectedIndex != 0){
       var selectedInterpreter = interpreterList.options[interpreterList.selectedIndex];
       selectedInterpreter.disabled = "disabled";
       currentInterpreter = interpreterList.selectedIndex;       
             
       var interpreterToList = document.createElement("li");
       var interpreterToForm = document.createElement("option");
       var deleteInterpreter = document.createElement("a");
       
       interpreterToList.id = "listInterpreter"+selectedInterpreter.value;
       interpreterToList.innerHTML = selectedInterpreter.innerHTML;
       interpreterToList.setAttribute("data-id",selectedInterpreter.value);
       
       interpreterToForm.id = "selInterpreter"+selectedInterpreter.value;
       interpreterToForm.value = selectedInterpreter.value;
       interpreterToForm.selected = "selected";
       
       deleteInterpreter.innerHTML = "Eliminar";
       deleteInterpreter.className = "pointer";
       deleteInterpreter.setAttribute("onclick","deleteInt("+"'"+selectedInterpreter.value+"'"+")");
       
       interpreterToList.appendChild(deleteInterpreter);
       selectedInterpreters.appendChild(interpreterToForm);
       selectedInterpreterList.appendChild(interpreterToList);
    }
}

function deleteInt(id){
    var selectedInterpreters = document.getElementById("selectedInterpreter");
    var selectedInterpreterList = document.getElementById("selectedInterpreterList");
        
    if(selectedInterpreters.childElementCount === 1){
        alert("La brigada debe tener al menos un interprete.")
    }else{
        document.getElementById("inter"+id).disabled = false;
        selectedInterpreters.removeChild(document.getElementById("selInterpreter"+id));
        selectedInterpreterList.removeChild(document.getElementById("listInterpreter"+id));
    }
}

var currentDriver = 0;
function addDriver(){
    var driverList = document.getElementById("driverList");
    var selectedDriverList = document.getElementById("selectedDriverList");
    var selectedDrivers = document.getElementById("selectedDrivers");
    
    if (driverList.selectedIndex != currentDriver && driverList.selectedIndex != 0){
       var selectedDriver = driverList.options[driverList.selectedIndex];
       selectedDriver.disabled = "disabled";
       currentDriver = driverList.selectedIndex;       
             
       var driverToList = document.createElement("li");
       var driverToForm = document.createElement("option");
       var deleteDriver = document.createElement("a");
       
       driverToList.id = "listDriver"+selectedDriver.value;
       driverToList.innerHTML = selectedDriver.innerHTML;
       driverToList.setAttribute("data-id",selectedDriver.value);
       
       driverToForm.id = "selDriver"+selectedDriver.value;
       driverToForm.value = selectedDriver.value;
       driverToForm.selected = "selected";
       
       deleteDriver.innerHTML = "Eliminar";
       deleteDriver.className = "pointer";
       deleteDriver.setAttribute("onclick","deleteDriver("+"'"+selectedDriver.value+"'"+")");
       
       driverToList.appendChild(deleteDriver);
       selectedDrivers.appendChild(driverToForm);
       selectedDriverList.appendChild(driverToList);
    }
}

function deleteDriver(id){
    var selectedDriver = document.getElementById("selectedDrivers");
    var selectedDriverList = document.getElementById("selectedDriverList");
        
    if(selectedDriver.childElementCount === 1){
        alert("La brigada debe tener al menos un chofer.");
    }else{
        document.getElementById("driver"+id).disabled = false;
        selectedDriver.removeChild(document.getElementById("selDriver"+id));
        selectedDriverList.removeChild(document.getElementById("listDriver"+id));
    }
}

var currentTec = 0;
function addTec(){
    var tecList = document.getElementById("technicianList");
    var selectedTecList = document.getElementById("selectedTecList");
    var selectedTecs = document.getElementById("selectedTec");
    
    if (tecList.selectedIndex != currentTec && tecList.selectedIndex != 0){
       var selectedTec = tecList.options[tecList.selectedIndex];
       selectedTec.disabled = "disabled";
       currentTec = tecList.selectedIndex;       
             
       var tecToList = document.createElement("li");
       var tecToForm = document.createElement("option");
       var deleteTec = document.createElement("a");
       
       tecToList.id = "listTec"+selectedTec.value;
       tecToList.innerHTML = selectedTec.innerHTML;
       tecToList.setAttribute("data-id",selectedTec.value);
       
       tecToForm.id = "selTec"+selectedTec.value;
       tecToForm.value = selectedTec.value;
       tecToForm.selected = "selected";
       
       deleteTec.innerHTML = "Eliminar";
       deleteTec.className = "pointer";
       deleteTec.setAttribute("onclick","deleteTec("+"'"+selectedTec.value+"'"+")");
       
       tecToList.appendChild(deleteTec);
       selectedTecs.appendChild(tecToForm);
       selectedTecList.appendChild(tecToList);
    }
}

function deleteTec(id){
    var selectedTec = document.getElementById("selectedTec");
    var selectedTecList = document.getElementById("selectedTecList");   
    document.getElementById("tec"+id).disabled = false;
    selectedTec.removeChild(document.getElementById("selTec"+id));
    selectedTecList.removeChild(document.getElementById("listTec"+id));
}

var currentOther = 0;
function addOther(){
    var otherList = document.getElementById("otherList");
    var selectedOtherList = document.getElementById("selectedOtherList");
    var selectedOthers = document.getElementById("selectedOther");
    
    if (otherList.selectedIndex != currentOther && otherList.selectedIndex != 0){
       var selectedOther = otherList.options[otherList.selectedIndex];
       selectedOther.disabled = "disabled";
       currentOther = otherList.selectedIndex;       
             
       var otherToList = document.createElement("li");
       var otherToForm = document.createElement("option");
       var deleteOther = document.createElement("a");
       
       otherToList.id = "listOther"+selectedOther.value;
       otherToList.innerHTML = selectedOther.innerHTML;
       otherToList.setAttribute("data-id",selectedOther.value);
       
       otherToForm.id = "selOther"+selectedOther.value;
       otherToForm.value = selectedOther.value;
       otherToForm.selected = "selected";
       
       deleteOther.innerHTML = "Eliminar";
       deleteOther.className = "pointer";
       deleteOther.setAttribute("onclick","deleteOther("+"'"+selectedOther.value+"'"+")");
       
       otherToList.appendChild(deleteOther);
       selectedOthers.appendChild(otherToForm);
       selectedOtherList.appendChild(otherToList);
    }
}

function deleteOther(id){
    var selectedOther = document.getElementById("selectedOther");
    var selectedOtherList = document.getElementById("selectedOtherList");   
    document.getElementById("other"+id).disabled = false;
    selectedOther.removeChild(document.getElementById("selOther"+id));
    selectedOtherList.removeChild(document.getElementById("listOther"+id));
}