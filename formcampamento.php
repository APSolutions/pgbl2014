<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crear Nuevo Campamento</title>
    <link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
<!--<script type="text/javascript" src="../js/viewformcampamento.js"></script> -->
    </head>	           
    <body id="main_body" >
            <?php
                require 'header.php';
            ?>
	<div id="form_container">
		<form id="form_930028" class="appnitro"  method="post" action="">
                    <div class="form_description">
			<h1>Formulario de campamento</h1>
                    </div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Capacidad </label>
		<div>
			<input id="element_1" name="element_1" class="element text large" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Nombre del Campamento</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Provincia </label>
		<div>
		<select class="element select medium" id="element_3" name="element_3"> 
			<option value="" selected="selected"></option>
                        <option value="1" >Daríen</option>
                        <option value="2" >Panamá Este</option>
                        <option value="3" >Panamá Oeste</option>

		</select>
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Comunidad </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>Pueblo o Comunidad donde esta ubicado el campamento</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Capacidad </label>
		<div>
			<input id="element_4" name="element_4" class="element text small" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_4"><small>Cantidad de personas que puede recibir el campamento</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Habitaciones </label>
		<div>
			<input id="element_6" name="element_6" class="element text small" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_6"><small>Cantidad de habitaciones que tiene el campamento</small></p> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Electricidad </label>
		<span>
			<input id="element_7_1" name="element_7" class="element radio" type="radio" value="1" />
                <label class="choice" for="element_7_1">Si</label>
                <input id="element_7_2" name="element_7" class="element radio" type="radio" value="2" />
                <label class="choice" for="element_7_2">No</label>

		</span><p class="guidelines" id="guide_7"><small>¿El campamento tiene electricidad?</small></p> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Wifi </label>
		<span>
			<input id="element_8_1" name="element_8" class="element radio" type="radio" value="1" />
                <label class="choice" for="element_8_1">Si</label>
                <input id="element_8_2" name="element_8" class="element radio" type="radio" value="2" />
                <label class="choice" for="element_8_2">No</label>

		</span><p class="guidelines" id="guide_8"><small>¿El campamento tiene acceso a Internet?</small></p> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Señal de Celular </label>
		<span>
			<input id="element_9_1" name="element_9" class="element radio" type="radio" value="1" />
                <label class="choice" for="element_9_1">Si</label>
                <input id="element_9_2" name="element_9" class="element radio" type="radio" value="2" />
                <label class="choice" for="element_9_2">No</label>

		</span> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Ventilación </label>
		<span>
			<input id="element_10_1" name="element_10" class="element radio" type="radio" value="1" />
                <label class="choice" for="element_10_1">Aire Acondicionado</label>
                <input id="element_10_2" name="element_10" class="element radio" type="radio" value="2" />
                <label class="choice" for="element_10_2">Abanico</label>
                <input id="element_10_3" name="element_10" class="element radio" type="radio" value="3" />
                <label class="choice" for="element_10_3">Ninguno</label>

		</span> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11">Agua Potable </label>
		<span>
			<input id="element_11_1" name="element_11" class="element radio" type="radio" value="1" />
                <label class="choice" for="element_11_1">Si</label>
                <input id="element_11_2" name="element_11" class="element radio" type="radio" value="2" />
                <label class="choice" for="element_11_2">No</label>

		</span> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12">Tipo de Baño </label>
		<span>
			<input id="element_12_1" name="element_12_1" class="element checkbox" type="checkbox" value="1" />
                <label class="choice" for="element_12_1">Letrina</label>
                <input id="element_12_2" name="element_12_2" class="element checkbox" type="checkbox" value="1" />
                <label class="choice" for="element_12_2">Baño Comunal</label>
                <input id="element_12_3" name="element_12_3" class="element checkbox" type="checkbox" value="1" />
                <label class="choice" for="element_12_3">Baño Individual</label>

		</span><p class="guidelines" id="guide_12"><small>Tipos de baño que tiene el campamento</small></p> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Cantidad de baños </label>
		<div>
			<input id="element_5" name="element_5" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="930028" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>