<!DOCTYPE html>
<html lang="es" class="no-js"  ng-app="miApp">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Inscripcion Fiesta 2014 - Clinica Colombia</title>
        <link rel="shortcut icon" href="<?php echo asset('favicon.ico') ?>">

        <!--<link rel="stylesheet" type="text/css" href="<?php echo asset('t1/css/default.css') ?>" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo asset('t1/css/component.css') ?>" />
        <link href="<?php echo asset('/lib/bt3/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo asset('/lib/bt3/css/sandstone.css') ?>" rel="stylesheet">
        <!--<link href="<?php echo asset('/lib/bt3/css/flatly.css') ?>" rel="stylesheet">-->
        <!--<link href="<?php echo asset('/lib/bt3/css/darkly.css') ?>" rel="stylesheet">-->
        <!--<link href="<?php echo asset('/lib/bt3/css/journal.css') ?>" rel="stylesheet">-->
        <style>
            .content .container{

                padding: 30px;
                background: rgba(255, 255, 255, 0.86);
                border-bottom-left-radius: 8px;
                border-bottom-right-radius: 8px;
                box-shadow: 6px 13px 62px 1px;
            }

            .inscripcion:hover{

                background: black;
            }
        </style>





        <script src="<?php echo asset('t1/js/modernizr.custom.js') ?>"></script>
    </head>
    <body class="cbp-spmenu-push">
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1" ng-controller="activeController">
            <h4><img src="<?php echo asset('css/logoCC.png') ?>" style="width: 100%"></h4>
            <a ng-class="{
                        active: isActive('/inicio')
                    }" href="#/inicio" style="border-top: 1px solid #258ecd"><span class="glyphicon glyphicon-home"></span> Inicio </a>
            <a ng-class="{
                        active: isActive('/')
                    }" href="#/inscripcion"><span class="glyphicon glyphicon-edit"></span> Formulario Inscripcion </a>
            <a ng-class="{
                        active: isActive('/cont')
                    }" href="#/cont"><span class="glyphicon glyphicon-calendar"></span> Total Registrados </a>
            <a ng-class="{
                        active: isActive('/cancelar')
                    }" href="#/cancelar"><span class="glyphicon glyphicon-remove"></span> Cancelar Inscripcion </a>
        </nav>


        <a  id="showLeftPush" title="Ver Menu" style="font-size: 22px;
            position: fixed;
            background-color: #0d77b6;
            cursor: pointer;
            padding: 3px;z-index: 9999999">
            <i  class="glyphicon glyphicon-th-large"></i> MENÚ
        </a>
        <div ng-view="" class="content" >


        </div>
        <footer style="position: relative; float: bottom;color: #D7D7D7">
            <p class="text-center"><small>Desarrollado por: <strong>luisedier.rosero@gmail.com</strong></small><br>Copyright © 2014 Luis Edier Rosero. Todos los derechos reservados.</p>
        </footer>
        <!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
        <script src="<?php echo asset('t1/js/classie.js') ?>"></script>
        <script>
                var menuLeft = document.getElementById('cbp-spmenu-s1'),
                        body = document.body;
                showLeftPush.onclick = function () {
                    classie.toggle(this, 'active');
                    classie.toggle(body, 'cbp-spmenu-push-toright');
                    classie.toggle(menuLeft, 'cbp-spmenu-open');
                    disableOther('showLeftPush');
                };
                function disableOther(button) {

                    if (button !== 'showLeftPush') {
                        classie.toggle(showLeftPush, 'disabled');
                    }

                }
        </script>

        <script>
            var _token = '<?= csrf_token(); ?>';</script>
        <script src="<?php echo asset('lib/jQuery/jquery-1.11.0.js') ?>"></script>
        <script src="<?php echo asset('lib/jQuery/backstretch.js') ?>"></script>
        <script src="<?php echo asset('lib/bt3/js/bootstrap.js') ?>"></script>
        <script src="<?php echo asset('lib/angularjs/angular.js') ?>"></script>
        <script src="<?php echo asset('lib/angularjs/angular-route.js') ?>"></script>
        <script src="<?php echo asset('app/js/main.js') ?>"></script>

        <script>
            $(document).ready(function () {
                $.backstretch("<?php echo asset('css/fondo-c1.jpg') ?>");
            });

        </script>

    </body>
</html>
