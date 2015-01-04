<?php
    require 'src/login/usuario.php';
    session_name('Global');
    session_id('pgbl');
    session_start();
    $_SESSION["position"] = "Calendario de Brigadas";
    $_SESSION["action"] = "";
    $_SESSION["program"] = "";
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Global Brigades Panama | Calendario de Brigadas</title>
        <meta name="description" content="Global Brigades Panama: Main Menu" />
        <meta name="keywords" content="global brigades, panama, main, menu" />
        <meta name="author" content="APSolution" />
        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link href='css/calendars/fullcalendar.css' rel='stylesheet' />
        <link href='css/calendars/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src="js/logistic_menu/modernizr.custom.js"></script>     
        <script src='js/calendars/lib/moment.min.js'></script>
        <script src='js/calendars/lib/jquery.min.js'></script>
        <script src='js/calendars/fullcalendar.min.js'></script>
        <script>

                $(document).ready(function() {

                        $('#calendar').fullCalendar({
                                eventLimit: true, // allow "more" link when too many events
                                events: {
                                        url: 'src/calendars/get-events.php',
                                        error: function() {
                                                $('#script-warning').show();
                                        }
                                },
                                loading: function(bool) {
                                        $('#loading').toggle(bool);
                                }
                        });

                });

        </script>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }

            #script-warning {
                display: none;
                background: #eee;
                border-bottom: 1px solid #ddd;
                padding: 0 10px;
                line-height: 40px;
                text-align: center;
                font-weight: bold;
                font-size: 12px;
                color: red;
            }

            #loading {
                display: none;
                position: absolute;
                top: 10px;
                right: 10px;
            }

            #calendar {
                max-width: 900px;
                margin: 40px auto;
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php
            require 'header.php';
            ?>
        <div id='script-warning'>
            <code>src/calendars/get-events.php</code> must be running.
	</div>
	<div id='loading'>loading...</div>
	<div id='calendar'></div>
        </div>
    </body>
</html>