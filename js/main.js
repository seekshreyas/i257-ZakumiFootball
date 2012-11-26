var ZAKUMI = ZAKUMI | {}; //defining the global namespace

ZAKUMI = (function(){

	var init = function(){
		console.log("initiated");

		initPageInteractions();
		//initCircleInteractions();

	}

	function initPageInteractions(){
		//get usable page title name
		var pageTitleStr = jQuery('title').text();
		var pageTitleArr = pageTitleStr.split('|');
		var pageTitle = pageTitleArr[0];

		switch(pageTitle){
			//note the I have added an extra blank space in the string matching for switch statement.
			//that is how it is there in the title element
			case 'TEAM ':
				initCircleInteractions();
				
				break;
			case 'REPORT ':
				initReportInteractions();

				break;
			default:
				console.log("page without a specific javascript code");
		}

	}


	function initReportInteractions(){
		//console.log("report interactions");
		
		//initializing isotope
		jQuery('#container').isotope({
		  	// options
		  	itemSelector : '.item',
		  	layoutMode : 'fitRows',
		  	getSortData : {
		  		name : function($elem){
		  			return $elem.find('.name').text();
		  		},
		  		matches : function ( $elem ) {
			    	return parseInt( $elem.find('.name').attr('data-matches'));
				}
			}
		});

		//sorting buttons
		jQuery('#sort-by a').click(function(){
			console.log("sort by button clicked");
			// get href attribute, minus the '#'
			var sortName = jQuery(this).attr('href').slice(1);
			jQuery('#container').isotope({ sortBy : sortName });
			return false;
		});
	}


	function initCircleInteractions()
	{
		$('div.circle').mouseover(function() {
			var elem = jQuery(this);
	        elem.find('div.outer-circle').addClass('hover');
	        elem.find('div.middle-circle').addClass('hover');
	    });
	    $('div.circle').mouseout(function() {
	    	var elem = jQuery(this);
	        elem.find('div.outer-circle').removeClass('hover');
	        elem.find('div.middle-circle').removeClass('hover');
	    });




	    $("#mainCircleContainer").mouseover(function(){
	        TweenLite.to($("#outerCircle"), 0.4, 
	        	{
	        		css: {width:146,height:146,marginLeft:-75, marginTop:-75}, 
	        		ease:Power2.easeOut, 
	        		onComplete: function(){
	        			calculatePositions();
	        		}
	        	});
	    });


	    $("#mainCircleContainer").mouseleave(function(){
	    	TweenLite.to($('#outerCircle .resultCircle'),0.3,{css:{autoAlpha:0,scaleX:0.1,scaleY:0.1}});
	        TweenLite.to($("#outerCircle"), 0.5, {css: {width:80,height:80,marginLeft:-42, marginTop:-42}, ease:Expo.easeOut, delay:0.4, overwrite:"all"});
	    });


	    // $(".draggableCircles").live('click',function(){
	    //     addCircle($(this),false);
	    // });



	    $(".draggableCircles").draggable({
	    	cancel: "a.ui-icon",
	    	revert: "invalid",
	    	helper: "clone",
	    	zIndex: 120,
	    	cursor: "move"
		});

		$("#mainCircleContainer").droppable({
		   	accept: ".draggableCircles",
		    activeClass: "ui-state-highlight",
		    drop: function( event, ui ) {
		    	console.log("on drop");
		    	addCircle( ui.draggable,true ); 
		    }

		});



		function addCircle($item){
			var id = $item.attr('class');
        	id = String(id).split(' ');
        	id = id[1];
        	$('#outerCircle').append("<div id='"+id+"' class='resultCircle'></div>");
        	calculatePositions();

		}

		function calculatePositions(){
			var radius  = 40+16; // offset here to add some spacing
		    var num     = $("#outerCircle").children().length;
		    var dividers= 360/num;
		    var center  = 58;
		    var theta   = 0.0;

		    for(var i=0;i<num;i++){
		        var x0 = Math.round(center+radius*Math.cos(theta));
		        var y0 = Math.round(center+radius*Math.sin(theta));
		        $("#outerCircle :nth-child("+(i+1)+")").css({'left':x0,'top':y0});      
		        var radians = dividers * (Math.PI / 180);
		        theta +=  radians;
		    }

		    TweenLite.to($('#outerCircle .resultCircle'),0.2,{css:{autoAlpha:1,scaleX:1,scaleY:1}});
		}
	}

	


	return {
		'init' : init
	}

})();


jQuery(document).ready(function()
{
	ZAKUMI.init();
});
