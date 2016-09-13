


/*
$(document).ready(function()
{
    $('section[data-type="move"]').each(function(){
		var $bgobj = $(this); // assigning the object

        $(window).scroll(function() {
	    	var yPos = -($(window).scrollTop() / $bgobj.data('speed'));
	    	var coords =  yPos + 'px';
	    	$bgobj.css({ 'margin-top': coords });
	    });
	});
});
*/

$(document).ready(function() {
    $('#fullpage').fullpage();
});

/*
$('#fullpage').fullpage({
    afterLoad: function(anchorLink, index){
        console.log("123");
    }
});
*/
// angular scroll

var app = angular.module('landing', ['ngAnimate']);
app.controller('landCtrl', function ($scope, $http) {
	$scope.formActive = false;
	$scope.formActiveSecond = false;
	$scope.formActiveThird = false;

	$scope.letter = {};
	$scope.phone = {};

	$scope.writeUS = function()
	{
		if($scope.letter.fullname != null && $scope.letter.email != null && $scope.letter.message != null)
		{
			$http.put('http://wp-test.in/wp-json/luxtour_api/v1/post_message/', angular.toJson($scope.letter))
			.success(function(response)
			{
				alert("success");

				$scope.formActiveSecond = false;
			},
			function(response)
			{
				alert('error');
			});
		}
	}

	$scope.phone = function()
	{
		if($scope.fullname != null && $scope.tel != null)
		{
			$http.put('http://wp-test.in/wp-json/luxtour_api/v1/tel/', angular.toJson($scope.phone))
			.success(function(response)
			{
				alert("success");
			},
			function(response)
			{
				alert('error');
			});
		}
	}

});

