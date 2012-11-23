var ZAKUMI = {}; //defining the global namespace

ZAKUMI = (function(){

	var init = function(){
		console.log("initiated");

		initCircleInteractions();
	}


	function initCircleInteractions()
	{
		$('div.circle').mouseover(function() {
	        $('div.outer-circle').addClass('hover');
	        $('div.middle-circle').addClass('hover');
	    });
	    $('div.circle').mouseout(function() {
	        $('div.outer-circle').removeClass('hover');
	        $('div.middle-circle').removeClass('hover');
	    });
	}

	return {
		'init' : init
	}

})();


jQuery(document).ready(function()
{
	ZAKUMI.init();
});




$(function() {
    
});
