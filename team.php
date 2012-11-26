<?php
    session_start();

    $pageTitle = 'TEAM | team page';
?>


<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php include 'templates/header.php' ?>





<div id="wrapper_middle">
	<div class="wrapper_content">


		<div id="circlesArray">

	        <div class="draggableCircles red" ></div>

	        <div class="draggableCircles purple" ></div>

	        <div class="draggableCircles green" ></div>

	        <div class="draggableCircles black" ></div>

	        <div class="draggableCircles yellow" ></div>

	        <div class="draggableCircles pink" ></div>

		</div>


		<div id="mainCircleContainer">
		    <div id="dragWindow"></div>
		    <div id="smallCircle">
		        <label id="circleLabel">Contacts</label>
		    </div>
		    <div id="outerCircle"></div>
		</div>


		<div class="circle">
		    <div class="outer-circle"></div>
		    <div class="middle-circle"></div>
		    <div class="inner-circle">Team1</div>
		</div>

		<!-- <div class="circle">
		    <div class="outer-circle"></div>
		    <div class="middle-circle"></div>
		    <div class="inner-circle">Team2</div>
		</div>

		<div class="circle">
		    <div class="outer-circle"></div>
		    <div class="middle-circle"></div>
		    <div class="inner-circle">Team3</div>
		</div>

		<div class="circle">
		    <div class="outer-circle"></div>
		    <div class="middle-circle"></div>
		    <div class="inner-circle">Team4</div>
		</div> -->
	</div>
</div>

	<script src="js/vendor/jquery-1.8.2.min.js"></script>
	<script src="js/vendor/jquery-ui-1.9.1.custom.min.js"></script>
	<script src="js/vendor/timelinelite.js"></script>
	<script src="js/vendor/easypack.js"></script>
	<script src="js/vendor/timelinemax.js"></script>
	<script src="js/vendor/tweenmax.js"></script>
	<script src="js/vendor/animationcircle.js"></script>
 
	<script src="js/main.js"></script>

</body>
</html>