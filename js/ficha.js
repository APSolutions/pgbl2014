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
           item[i].id = "coordinator"+i;
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
           item[i].id = "interpreter"+i;
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
           item[i].id = "driver"+i;
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
           item[i].id = "paramedic"+i;
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
           item[i].id = "tecnician"+i;
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
           item[i].id = "other"+i;
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


