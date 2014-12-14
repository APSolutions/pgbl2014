var comunities;
var compounds;
var selectedCommunity;
var selectedCompound;
var comunitiesLoaded = false;
var compoundsLoaded = false;

function loadData(param_communities, param_compounds) {
    comunities = param_communities;
    compounds = param_compounds;
}

function loadCommunities(param_community){
    if (!comunitiesLoaded) {
        var list = document.getElementById("communityList");
        var item = [];
        for (var i = 0; i < comunities.length; i++){
           item[i] = document.createElement('option');
           item[i].id = "community"+i;
           item[i].className = "communitiesRecord";
           item[i].setAttribute("onclick", "changeCommunity('community"+i+"')",false); 
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
           item[i].className = "compoundsRecord";
           item[i].setAttribute("onclick", "changeCompound('compound"+i+"')",false); 
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

function changeCommunity(param_community){
   alert(param_community);
}

function changeCompound(param_compound){
   alert(param_compound);
}


