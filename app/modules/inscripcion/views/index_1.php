<!DOCTYPE html>
<html lang="en" ng-app="miApp">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo asset('/lib/bt3/css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>

    <body ng-controller="homeController">


        <div ng-view="" >
        </div>


        <script src="<?php echo asset('lib/jQuery/jquery-1.11.0.js') ?>"></script>
        <script src="<?php echo asset('lib/bt3/bootstrap.js') ?>"></script>
        <script src="<?php echo asset('lib/angularjs/angular.js') ?>"></script>
        <script src="<?php echo asset('lib/angularjs/angular-route.js') ?>"></script>
        <script src="<?php echo asset('app/js/main.js') ?>"></script>
        <!-- Custom Theme JavaScript -->




    </body>

</html>
