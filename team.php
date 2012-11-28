<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'PLAYER | team page';
?>


<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php include 'templates/header.php' ?>


<?php 
    $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    mysql_select_db(SQL_DB, $db) or die(mysql_error($db));

    //$query = 'SELECT PLAYERS.NAME, PLAYERS.SALARY FROM PLAYERS ORDER BY PLAYERS.SALARY DESC';
    $query = 
    		"SELECT TEAM.NAME  AS 'TEAM_NAME', MANAGER.NAME AS 'MANAGER_NAME', TEAM.YRINEXIST AS 'FOUNDED', TEAM.STADIUM AS 'STADIUM', TEAM.CAPACITY AS 'CAPACITY', TEAM.SIZE AS 'DIMENSIONS', TEAM.CITY AS 'LOCATION', TEAM.YRBUILT AS 'STADIUM_CONSTRUCTED', TEAM.TEAMBADGE AS 'TEAM_CREST', MANAGER.MANAGERPHOTO AS 'MANAGER_PHOTO'
FROM ZAKUMI.TEAMS TEAM, ZAKUMI.MANAGERS MANAGER, 
(SELECT TEAMID, MANAGERID FROM ZAKUMI.LEAGUEROSTER WHERE TOURNAMENTID = 3 and TEAMID = 4) LEAGUEROSTER
WHERE TEAM.ID = LEAGUEROSTER.TEAMID AND MANAGER.ID = LEAGUEROSTER.MANAGERID;";

    $result = mysql_query($query, $db) or die(mysql_error($db));
    $num_rows = mysql_num_rows($result);
    echo $num_rows . ' results';

    while($row = mysql_fetch_array($result))
    {
        extract($row);
        echo $TEAM_NAME, $MANAGER_NAME, $FOUNDED, $STADIUM, $CAPACITY, $DIMENSIONS, $LOCATION,$STADIUM_CONSTRUCTED,$TEAM_CREST, $MANAGER_PHOTO . '<br />'; 
        
    }


?>


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
		        <label id="circleLabel">Arsenal</label>
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