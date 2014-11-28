/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var temporal = permanente = "";

function set_variables(temp,perm){
    temporal = temp;
    permanente = perm;
}

function get_variables(){
    var select = document.getElementById('rol');
    var opt1 = document.createElement('option');
    var opt2 = document.createElement('option');
    opt1.value = 4;
    opt2.value = 5;
    opt1.innerHTML = permanente;
    opt2.innerHTML = temporal;
    select.appendChild(opt1);
    select.appendChild(opt2);
}


