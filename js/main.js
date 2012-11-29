var ZAKUMI = ZAKUMI | {}; //defining the global namespace

ZAKUMI = (function(){

	var init = function(){
		console.log("initiated");

		initPageInteractions();
	};

	function initPageInteractions(){
		//get usable page title name
		var pageTitleStr = jQuery('title').text();
		var pageTitleArr = pageTitleStr.split('|');
		var pageTitle = pageTitleArr[0];

		//set page name
		jQuery('.pagetitle').html(pageTitle + ' Page');

		switch(pageTitle){
			//note the I have added an extra blank space in the string matching for switch statement.
			//that is how it is there in the title element
			case 'HOME ':
				initSlimbox();

				break;
			case 'TEAM ':
				initCircleInteractions();
				
				break;
			case 'SORT ':
				initSortInteractions();

				break;
			case 'REPORT ':
				initReport();

				break;
			default:
				console.log("page without a specific javascript code");
		}



	}


	function initReport(){
		console.log("initiate test");
		jQuery.ajax({
			url: 'info.php',
			success : function(data){
				//console.log("response data : ", data);

				cleanResponseData(data);
			}
		});


		function cleanResponseData(response){
			console.log("response data : ", response);

			
			//lets define the structure that we want for clarity
			var teamInfo = [];
			var teamInfoTemp = {};

			var currentTeam = ''; //to control the loop


			for(var i=0; i<response.length; i++)
			{
				//console.log("currentTeam", currentTeam, "data: ", response[i][1]);

				if(currentTeam !== response[i][1]){
					//reset the temporary variable to add new team
					//defined a structure too for easier understanding
					teamInfoTemp = {
						'team' : {
							'name' : '',
							'badge' : '',
							'founded' : 1900,
							'stadium' : {
								'name' : '',
								'capacity' : 0,
								'yrbuilt' : 1900,
								'city' : ''
							},
							'manager':{
								'name' : '',
								'photo' : '',
								'salary' : 0,
								'nationality' : ''
							},
							'players' :[]
						}
					};



					teamInfoTemp.team.name = response[i][1]; //team name
					teamInfoTemp.team.badge = response[i][9]; //team badge
					teamInfoTemp.team.founded = response[i][3]; //team founded
					
					teamInfoTemp.team.stadium.name = response[i][4]; //stadium name
					teamInfoTemp.team.stadium.capacity = response[i][5]; //stadium capacity
					teamInfoTemp.team.stadium.yrbuilt = response[i][8]; //stadium yrbuilt
					teamInfoTemp.team.stadium.city = response[i][7]; //stadium city
					
					teamInfoTemp.team.manager.name = response[i][2]; //manager name
					teamInfoTemp.team.manager.photo = response[i][10]; //manager photo
					teamInfoTemp.team.manager.salary = response[i][11]; //manager salary
					teamInfoTemp.team.manager.nationality = response[i][12]; //manager nationality

					teamInfoTemp.team.players.push(response[i][0]); //player name

					teamInfo.push(teamInfoTemp);

				}else{
					teamInfoTemp.team.players.push(response[i][0]); //player name
				}

				
				currentTeam = response[i][1];
			}

			console.log("team information cleaned:", teamInfo);
		}
	}


	function initSlimbox(){
		console.log("initiate slimbox");

		jQuery('.trigger_slimbox').click(function()
		{
			var btnid = jQuery(this).attr('id');
			btnid = btnid.slice(4);
			

			initSlimboxInteractions(btnid);
		});


		function initSlimboxInteractions(triggerid){
			//swap the sbox content box from content to slimbox
			var sboxcontent = jQuery('#sbox_'+triggerid)[0];
			jQuery('#sbox_'+triggerid).remove();
			jQuery('.slimbox').append(sboxcontent);

			//show slimbox
			jQuery('.wrapper_slimbox').addClass('active');

			//slimbox interactions
			switch(triggerid){
				case 'login':
					userlogin();

					break;
				default:
					console.log("no specific interaction handle");
			}

			jQuery('.slimboxclose').click(function()
			{
				jQuery('.wrapper_slimbox').removeClass('active');

				var removebox = jQuery('.slimbox').find('.sbox');
				var removeboxcontent = removebox[0];
				removebox.remove();

				jQuery('.sbox_container').append(removeboxcontent);

			});
		}
	}


	function userlogin(){
		console.log("login submitted");

		
	}



	function initSortInteractions(){
		//console.log("report interactions");
		
		//initializing isotope
		jQuery('#container').isotope({
			itemSelector : '.item',
			layoutMode : 'cellsByRow',
			sortAscending : false,
			masonry : {
				columnWidth: 250
			},
			cellsByRow: {
				columnWidth: 250,
				rowHeight: 300
			},
			animationOptions: {
				duration : 750,
				easing : 'linear',
				queue : false
			},
			masonryHorizontal: {
				rowHeight: 360
			},
			getSortData : {
				name : function($elem){
					return $elem.find('.name').text();
				},
				matches : function ($elem){
					return parseInt($elem.find('.name').attr('data-matches'), 10);
				},
				ycards : function ($elem){
					var raw = parseInt($elem.find('.name').attr('data-ycard'), 10);

					if(isNaN(raw))
					{
						raw = 0;
					}

					return raw;
				},
				rcards : function ($elem){
					var raw = parseInt($elem.find('.name').attr('data-rcard'), 10);

					if(isNaN(raw))
					{
						raw = 0;
					}

					return raw;
				},
				goals : function ($elem){
					var raw = parseInt($elem.find('.name').attr('data-goals'), 10);

					if(isNaN(raw))
					{
						raw = 0;
					}
					return raw;
					//return parseInt($elem.find('.name').attr('data-goals'), 10);
				},
				salary : function ($elem){
					var raw = parseInt($elem.find('.name').attr('data-salary'), 10);

					if(isNaN(raw))
					{
						raw = 0;
					}
					return raw;
					//return parseInt($elem.find('.name').attr('data-salary'), 10);
				},
				founded : function ($elem){
					var raw = parseInt($elem.find('.name').attr('data-founded'), 10);

					if(isNaN(raw))
					{
						raw = 0;
					}
					return raw;
					//return parseInt($elem.find('.name').attr('data-founded'), 10);
				}

			}
		});

		//sorting buttons
		jQuery('#sort-by a').click(function(){
			
			// get href attribute, minus the '#'
			var sortName = jQuery(this).attr('href').slice(1);

			console.log("sort by button clicked", sortName);

			jQuery('#container').isotope({ sortBy : sortName });
			return false;
		});

		//sorting buttons
		jQuery('#layout-by a').click(function(){
			
			// get href attribute, minus the '#'
			var layoutName = jQuery(this).attr('href').slice(1);

			console.log("sort by button clicked", layoutName);

			jQuery('#container').isotope({ layoutMode : layoutName });
			return false;
		});
	}


	function initCircleInteractions()
	{
		// $('div.circle').mouseover(function() {
		//	var elem = jQuery(this);
		//        elem.find('div.outer-circle').addClass('hover');
		//        elem.find('div.middle-circle').addClass('hover');
		//		});
		//    $('div.circle').mouseout(function() {
		//		var elem = jQuery(this);
		//        elem.find('div.outer-circle').removeClass('hover');
		//        elem.find('div.middle-circle').removeClass('hover');
		//    });



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


		$(".draggableCircles").live('click',function(){
			addCircle($(this),false);
		});



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
	};

})();


jQuery(document).ready(function()
{
	ZAKUMI.init();
});
