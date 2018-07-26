<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="w3-container" style="padding:5%;"  ng-app="root" ng-controller="ctrlroot">

<div id="view"  ng-view></div>

</div>

<style>
@media only screen and (min-width:768px) {   
    #view{
        width:700px;
		margin-left:auto;
		margin-right:auto;
		
    }
}






</style>

<script src="controller.js"></script>
</body>
</html>