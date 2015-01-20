function setDataProgram(){
    var eventcontainer = document.getElementsByClassName("fc-event-container");
    var url = document.getElementsByClassName("fc-event");
    var event = document.getElementsByClassName("fc-content");
    var title = document.getElementsByClassName("fc-title");
    var programs = ["Architecture","Business","Dental","Environmental","Human Rights","Medical","Microfinance","Public Health","Water","Professional","Engineering"];
    
    for (var i = 0; i < event.length; i++){
        var x = event.item(i).innerHTML;
        var y = title.item(i).innerHTML.toString();
        for (var j = 0; j < programs.length; j++){
            if (y.indexOf(programs[j]) > -1){
                event.item(i).setAttribute("data-program",programs[j]);
                eventcontainer.item(i).setAttribute("data-program",programs[j]);
                url.item(i).setAttribute("data-program",programs[j]);
                title.item(i).setAttribute("data-program",programs[j]);
            }
        }        
    }
}