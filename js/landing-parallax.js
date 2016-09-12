


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
app.controller('landCtrl', function ($scope) {
	$scope.formActive = false;

});

