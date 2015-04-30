/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var vol = voli = flt = flti = "";

function volHover(tableRow, highLight){
    changeColor(vol, tableRow, highLight);
}

function fltHover(tableRow, highLight){
    changeColor(flt, tableRow, highLight);
}

function changeColor(prev, current, highLight){
    if (current !== prev){
        if (highLight){
            current.style.backgroundColor = '#e6EEEE';
        }else{
            current.style.backgroundColor = 'ghostwhite';
        }
    }
}

function volSelect(tableRow, index){
    if (tableRow !== vol){
        updateSelect(vol,tableRow);
        vol = tableRow;
    }
}

function fltSelect(tableRow, index){
    if (tableRow !== flt){
        updateSelect(flt,tableRow);
        flt = tableRow;
    }
}

function updateSelect(prevRow, currentRow){
    if (prevRow !== ""){
        prevRow.style.backgroundColor = 'ghostwhite';
        prevRow = currentRow;
        prevRow.style.backgroundColor = '#D9EFC2';                                                        
    }else{
        prevRow = currentRow;                    
        prevRow.style.background = '#D9EFC2';
    }
}

function botonViewhover(resaltar){
    var botonview = document.getElementById('bver');              
    if (pos != ""){
        if (resaltar){
            botonview.style.background = '#2980B9';                     
        } else{
            botonview.style.background = '#3498DB';                     
        }
    }                           
}

function botonEdithover(resaltar){
    var botonedit = document.getElementById('bedit');              
    if (pos != ""){
        if (resaltar){
            botonedit.style.background = '#2980B9';                     
        } else{
            botonedit.style.background = '#3498DB';                     
        }
    }                           
}
