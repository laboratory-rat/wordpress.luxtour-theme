


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

angular.module('landing',[])
    .controller('landCtrl',function($window, $scope){
        $scope.scrollPos = 0;

        console.log("123");

        $window.onscroll = function(){
            $scope.scrollPos = document.body.scrollTop || document.documentElement.scrollTop || 0;

            console.log($scope.scrollPos);

            $scope.$apply();
        };
    });
