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

function loadData(param_communities, param_compounds, param_staffCoor, param_staffInt) {
    comunities = param_communities;
    compounds = param_compounds;
    staffCoordinator = param_staffCoor;
    staffInterpreter = param_staffInt;
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
           item[i].id = "coordinator"+i;
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

