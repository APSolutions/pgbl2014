var comunities;
var compounds;
var comunitiesLoaded = false;
var compoundsLoaded = false;

function loadData(param_communities, param_compounds) {
    comunities = param_communities;
    compounds = param_compounds;
}

function loadCommunities(){
    if (!comunitiesLoaded) {
        var list = document.getElementById("communityList");
        var item = [];
        for (var i = 0; i < comunities.length; i++){
           item[i] = document.createElement('li');
           var link = document.createElement('a');
           link.id = "community"+i;
           link.className = "communitiesRecord";
           link.innerHTML = comunities[i];
           item[i].appendChild(link);
           list.appendChild(item[i]);
        }
        comunitiesLoaded = true;
        
        var element= document.getElementsByClassName('communitiesRecord');
        for(var i=0; i < element.length; i++){
            element[i].setAttribute("onclick", "changeCommunity('community"+i+"')",false);   
        }
    }    
}

function loadCompounds(){
    if (!compoundsLoaded) {
        var list = document.getElementById("compoundList");
        var item = [];
        for (var i = 0; i < compounds.length; i++){
           item[i] = document.createElement('li');
           var link = document.createElement('a');
           link.id = "compound"+i;
           link.className = "compoundsRecord";
           link.innerHTML = compounds[i];
           item[i].appendChild(link);
           list.appendChild(item[i]);
        }
        compoundsLoaded = true;
        
        var element= document.getElementsByClassName('compoundsRecord');
        for(var i=0; i < element.length; i++){
            element[i].setAttribute("onclick", "changeCompound('compound"+i+"')",false);   
        }
    }    
}

function changeCommunity(param_community){
   var oldCommunity = document.getElementById("selectedCommunityName");
   var newCommunity = document.getElementById(param_community).innerHTML;
   oldCommunity.innerHTML = newCommunity;
}

function changeCompound(param_compound){
   var oldCompound = document.getElementById("selectedCompoundName");
   var newCompound = document.getElementById(param_compound).innerHTML;
   oldCompound.innerHTML = newCompound;
}


