<?php
require 'src/login/usuario.php';
session_name('Global');
session_id('pgbl');
session_start();
?>
<?php
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crear Nuevo Personal</title>
    <link rel="stylesheet" type="text/css" href="css/forms.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/header.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/logistic_menu/default.css" />
    <!--<script type="text/javascript" src="../js/viewformcampamento.js"></script> -->
    <script type="text/javascript" src="js/calendar.js"></script>
    </head>	           
    <body id="main_body" >
            <?php
                require 'header.php';
            ?>
            <div id="form_container">
                    <form id="form_930028" class="appnitro"  method="post" action="">
                                            <div class="form_description">
                            <h1>Formulario de personal</h1>
                    </div>						
                            <ul >

                                            <li id="li_7" >
                    <label class="description" for="element_7">Tipo de Personal </label>
                    <span>
                            <input id="element_7_1" name="element_7" class="element radio" type="radio" value="1" />
    <label class="choice" for="element_7_1">Permanente</label>
    <input id="element_7_2" name="element_7" class="element radio" type="radio" value="2" />
    <label class="choice" for="element_7_2">Temporal</label>

                    </span><p class="guidelines" id="guide_7"><small>Permanentes para contratos indefinidos o de mas de 6 meses
    Temporal para contratos de menos de 6 meses</small></p> 
                    </li>		<li id="li_29" >
                    <label class="description" for="element_29">Fecha de Contratación </label>
                    <span>
                            <input id="element_29_1" name="element_29_1" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_29_1">DD</label>
                    </span>
                    <span>
                            <input id="element_29_2" name="element_29_2" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_29_2">MM</label>
                    </span>
                    <span>
                            <input id="element_29_3" name="element_29_3" class="element text" size="4" maxlength="4" value="" type="text">
                            <label for="element_29_3">YYYY</label>
                    </span>

                    <span id="calendar_29">
                            <img id="cal_img_29" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
                    </span>
                    <script type="text/javascript">
                            Calendar.setup({
                            inputField	 : "element_29_3",
                            baseField    : "element_29",
                            displayArea  : "calendar_29",
                            button		 : "cal_img_29",
                            ifFormat	 : "%B %e, %Y",
                            onSelect	 : selectEuropeDate
                            });
                    </script>

                    </li>		<li id="li_30" >
                    <label class="description" for="element_30">Fecha de Entrevista </label>
                    <span>
                            <input id="element_30_1" name="element_30_1" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_30_1">DD</label>
                    </span>
                    <span>
                            <input id="element_30_2" name="element_30_2" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_30_2">MM</label>
                    </span>
                    <span>
                            <input id="element_30_3" name="element_30_3" class="element text" size="4" maxlength="4" value="" type="text">
                            <label for="element_30_3">YYYY</label>
                    </span>

                    <span id="calendar_30">
                            <img id="cal_img_30" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
                    </span>
                    <script type="text/javascript">
                            Calendar.setup({
                            inputField	 : "element_30_3",
                            baseField    : "element_30",
                            displayArea  : "calendar_30",
                            button		 : "cal_img_30",
                            ifFormat	 : "%B %e, %Y",
                            onSelect	 : selectEuropeDate
                            });
                    </script>

                    </li>		<li id="li_32" >
                    <label class="description" for="element_32">Rol </label>
                    <div>
                    <select class="element select medium" id="element_32" name="element_32"> 
                            <option value="" selected="selected"></option>
    <option value="1" >Rol 1</option>
    <option value="2" >Rol 2</option>
    <option value="3" >Rol 3</option>

                    </select>
                    </div><p class="guidelines" id="guide_32"><small>Cargo del personal</small></p> 
                    </li>		<li id="li_37" >
                    <label class="description" for="element_37">Programas </label>
                    <span>
                            <input id="element_37_1" name="element_37_1" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_1">Ambiental</label>
    <input id="element_37_2" name="element_37_2" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_2">Derechos Humanos</label>
    <input id="element_37_3" name="element_37_3" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_3">Medical</label>
    <input id="element_37_4" name="element_37_4" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_4">Microfinanzas</label>
    <input id="element_37_5" name="element_37_5" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_5">Negocios</label>
    <input id="element_37_6" name="element_37_6" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_6">Salud Publica</label>
    <input id="element_37_7" name="element_37_7" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_37_7">Profesional</label>

                    </span><p class="guidelines" id="guide_37"><small>Programas en los que esta involucrado</small></p>
                    </li>		<li id="li_8" >
                    <label class="description" for="element_8">Nombre </label>
                    <div>
                            <input id="element_8" name="element_8" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_9" >
                    <label class="description" for="element_9">Apellido </label>
                    <div>
                            <input id="element_9" name="element_9" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_10" >
                    <label class="description" for="element_10">Cédula/Pasaporte </label>
                    <div>
                            <input id="element_10" name="element_10" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_11" >
                    <label class="description" for="element_11">Tipo de Sangre </label>
                    <div>
                            <input id="element_11" name="element_11" class="element text small" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_13" >
                    <label class="description" for="element_13">Fecha de Nacimiento </label>
                    <span>
                            <input id="element_13_1" name="element_13_1" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_13_1">DD</label>
                    </span>
                    <span>
                            <input id="element_13_2" name="element_13_2" class="element text" size="2" maxlength="2" value="" type="text"> /
                            <label for="element_13_2">MM</label>
                    </span>
                    <span>
                            <input id="element_13_3" name="element_13_3" class="element text" size="4" maxlength="4" value="" type="text">
                            <label for="element_13_3">YYYY</label>
                    </span>

                    <span id="calendar_13">
                            <img id="cal_img_13" class="datepicker" src="img/calendar.gif" alt="Pick a date.">	
                    </span>
                    <script type="text/javascript">
                            Calendar.setup({
                            inputField	 : "element_13_3",
                            baseField    : "element_13",
                            displayArea  : "calendar_13",
                            button		 : "cal_img_13",
                            ifFormat	 : "%B %e, %Y",
                            onSelect	 : selectEuropeDate
                            });
                    </script>

                    </li>		<li id="li_12" >
                    <label class="description" for="element_12">Edad </label>
                    <div>
                            <input id="element_12" name="element_12" class="element text small" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_14" >
                    <label class="description" for="element_14">Nacionalidad </label>
                    <div>
                            <input id="element_14" name="element_14" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_34" >
                    <label class="description" for="element_34">Género </label>
                    <div>
                    <select class="element select medium" id="element_34" name="element_34"> 
                            <option value="" selected="selected"></option>
    <option value="1" >Masculino</option>
    <option value="2" >Femenino</option>

                    </select>
                    </div> 
                    </li>		<li id="li_33" >
                    <label class="description" for="element_33">Estado Civil </label>
                    <span>
                            <input id="element_33_1" name="element_33" class="element radio" type="radio" value="1" />
    <label class="choice" for="element_33_1">Soltero(a)</label>
    <input id="element_33_2" name="element_33" class="element radio" type="radio" value="2" />
    <label class="choice" for="element_33_2">Casado(a)</label>
    <input id="element_33_3" name="element_33" class="element radio" type="radio" value="3" />
    <label class="choice" for="element_33_3">Separado(a)</label>
    <input id="element_33_4" name="element_33" class="element radio" type="radio" value="4" />
    <label class="choice" for="element_33_4">Viudo(a)</label>
    <input id="element_33_5" name="element_33" class="element radio" type="radio" value="5" />
    <label class="choice" for="element_33_5">Divorciado(a)</label>

                    </span> 
                    </li>		<li id="li_15" >
                    <label class="description" for="element_15">Dirección </label>
                    <div>
                            <input id="element_15" name="element_15" class="element text large" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_16" >
                    <label class="description" for="element_16">No. de Celular </label>
                    <div>
                            <input id="element_16" name="element_16" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_17" >
                    <label class="description" for="element_17">Email </label>
                    <div>
                            <input id="element_17" name="element_17" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Contacto de Emergencia</h3>
                            <p></p>
                    </li>		<li id="li_19" >
                    <label class="description" for="element_19">Nombre </label>
                    <div>
                            <input id="element_19" name="element_19" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_20" >
                    <label class="description" for="element_20">Telefono </label>
                    <div>
                            <input id="element_20" name="element_20" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_21" >
                    <label class="description" for="element_21">Dirección </label>
                    <div>
                            <input id="element_21" name="element_21" class="element text large" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Salud</h3>
                            <p></p>
                    </li>		<li id="li_35" >
                    <label class="description" for="element_35">Condición Médica </label>
                    <span>
                            <input id="element_35_1" name="element_35_1" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_1">Diabetes</label>
    <input id="element_35_2" name="element_35_2" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_2">Hipertensión</label>
    <input id="element_35_3" name="element_35_3" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_3">Asma</label>
    <input id="element_35_4" name="element_35_4" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_4">Problemas Cardiacos</label>
    <input id="element_35_5" name="element_35_5" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_5">Epilepsia</label>
    <input id="element_35_6" name="element_35_6" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_6">Ninguna de las anteriores</label>
    <input id="element_35_7" name="element_35_7" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_35_7">Otro</label>

                    </span> 
                    </li>		<li id="li_23" >
                    <label class="description" for="element_23">Otro: </label>
                    <div>
                            <input id="element_23" name="element_23" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_36" >
                    <label class="description" for="element_36">Alergias </label>
                    <span>
                            <input id="element_36_1" name="element_36" class="element radio" type="radio" value="1" />
    <label class="choice" for="element_36_1">Si</label>
    <input id="element_36_2" name="element_36" class="element radio" type="radio" value="2" />
    <label class="choice" for="element_36_2">No</label>

                    </span> 
                    </li>		<li id="li_24" >
                    <label class="description" for="element_24">¿Cual? </label>
                    <div>
                            <input id="element_24" name="element_24" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Conocimiento de Idiomas</h3>
                            <p></p>
                    </li>		<li id="li_38" >
                    <label class="description" for="element_38">Idiomas </label>
                    <span>
                            <input id="element_38_1" name="element_38_1" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_38_1">Ingles</label>
    <input id="element_38_2" name="element_38_2" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_38_2">Frances</label>
    <input id="element_38_3" name="element_38_3" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_38_3">Portugues</label>
    <input id="element_38_4" name="element_38_4" class="element checkbox" type="checkbox" value="1" />
    <label class="choice" for="element_38_4">Otro</label>

                    </span> 
                    </li>		<li id="li_31" >
                    <label class="description" for="element_31">Otro: </label>
                    <div>
                            <input id="element_31" name="element_31" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li class="section_break">
                            <h3>Educación</h3>
                            <p></p>
                    </li>		<li id="li_27" >
                    <label class="description" for="element_27">Universidad </label>
                    <div>
                            <input id="element_27" name="element_27" class="element text large" type="text" maxlength="255" value=""/> 
                    </div> 
                    </li>		<li id="li_28" >
                    <label class="description" for="element_28">Carrera </label>
                    <div>
                            <input id="element_28" name="element_28" class="element text large" type="text" maxlength="255" value=""/> 
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