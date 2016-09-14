var app = angular.module("accountApp", ['ngAnimate']);

app.controller('accountCtrl', function($scope)
{
	$scope.emailFormActive = false;
	$scope.passFormActive = false;
	$scope.telFormActive=false;
	$scope.apiFormActive = false;
})
