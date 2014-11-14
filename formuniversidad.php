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
<title>Crear Nueva Universidad</title>
<link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
<link rel="stylesheet" type="text/css" href="css/header.css" media="all">
<!--<script type="text/javascript" src="../js/viewformuniversidad.js"></script>-->
</head>
<body id="main_body" >
        <?php
        require 'header.php';
        ?>
	<div id="form_container">
	
		<h1><a>Crear Nueva Universidad</a></h1>
		<form id="form_928984" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Crear Nueva Universidad</h2>
			<p>Formulario para crear nueva Universidad en el sistema</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Nombre </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Nombre de la Comunidad</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Páis </label>
		<div>
			<input id="element_2" name="element_2" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>País de origen de la Universidad</small></p> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Ciudad/Estado </label>
		<div>
			<input id="element_3" name="element_3" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_3"><small>Ciudad de origen de la universidad o estado si es de Estados Unidos</small></p> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="928984" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	</body>
</html>
