<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Crear Nuevo Vehículo</title>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
<!--<script type="text/javascript" src="../js/viewformuniversidad.js"></script>-->
</head>
<body id="main_body" >
        <?php
        require 'header.php';
        ?>
	<div id="form_container">
	
		<h1><a>Crear Vehículo</a></h1>
		<form id="form_930114" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Crear Vehículo</h2>
			<p>Formulario para registrar Vehículo en el sistema</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Nombre </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Modelo, Apodo, Marca, que identifique el vehículo</small></p> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9">Tipo de Contrato </label>
		<span>
			<input id="element_9_1" name="element_9" class="element radio" type="radio" value="1" />
<label class="choice" for="element_9_1">Propio</label>
<input id="element_9_2" name="element_9" class="element radio" type="radio" value="2" />
<label class="choice" for="element_9_2">Arrendadora</label>
<input id="element_9_3" name="element_9" class="element radio" type="radio" value="3" />
<label class="choice" for="element_9_3">Contrato</label>

		</span> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Capacidad </label>
		<div>
			<input id="element_2" name="element_2" class="element text small" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>Cantidad de puestos que tiene el vehículo</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Año  </label>
		<div>
			<input id="element_3" name="element_3" class="element text small" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_3"><small>Año del vehículo</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Placa </label>
		<div>
			<input id="element_4" name="element_4" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Arrendatario </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_5"><small>Nombre de la compañía o persona dueña del vehículo</small></p> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Telefono del arrendatario </label>
		<div>
			<input id="element_6" name="element_6" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Aseguradora </label>
		<div>
			<input id="element_7" name="element_7" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8">Poliza </label>
		<div>
			<input id="element_8" name="element_8" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10">Tipo de Seguro </label>
		<span>
			<input id="element_10_1" name="element_10" class="element radio" type="radio" value="1" />
<label class="choice" for="element_10_1">Completo</label>
<input id="element_10_2" name="element_10" class="element radio" type="radio" value="2" />
<label class="choice" for="element_10_2">Terceros</label>

		</span> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="930114" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>