<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'TEAM | team page';
?>

<?php 
    $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    mysql_select_db(SQL_DB, $db) or die(mysql_error($db));

    //$query = 'SELECT PLAYERS.NAME, PLAYERS.SALARY FROM PLAYERS ORDER BY PLAYERS.SALARY DESC';
    $query = 
    		"SELECT 
    			TEAM.NAME AS 'TEAM_NAME', 
    			ROSTER.NAME AS 'PLAYER_NAME', 
    			ROSTER.GOAL AS 'PLAYER_GOAL', 
    			ROSTER.YCARDS AS 'PLAYER_YELLOWCARDS', 
    			ROSTER.RCARDS AS 'PLAYER_REDCARDS',
    			ROSTER.PLAYERPHOTO AS 'PLAYER_PHOTO'
			FROM 
				ZAKUMI.TEAMS TEAM, 
				(
					SELECT 
						PLAYER.NAME,
						PLAYER.PLAYERPHOTO, 
						ROSTER.TEAMID, 
						FIRST.GOAL, 
						FIRST.YCARDS, 
						FIRST.RCARDS 
					FROM 
						ZAKUMI.PLAYERS PLAYER, 
						ZAKUMI.LEAGUEROSTER ROSTER, 
					(
						SELECT 
							LEAGUE_ID, 
							PLAYERID, 
							GOAL, 
							YCARDS, 
							RCARDS 
						FROM 
							ZAKUMI.ROSTER
					) FIRST 
					WHERE 
						PLAYER.ID =  FIRST.PLAYERID 
					AND ROSTER.ID=FIRST.LEAGUE_ID
				) ROSTER 
			WHERE 
				TEAM.ID = ROSTER.TEAMID;";

    $result = mysql_query($query, $db) or die(mysql_error($db));
    $num_rows = mysql_num_rows($result);
    echo $num_rows . ' results';

    while($row = mysql_fetch_array($result))
    {
        extract($row);
        echo $TEAM_NAME, $PLAYER_NAME, $PLAYER_GOAL, $PLAYER_YELLOWCARDS, $PLAYER_REDCARDS, $PLAYER_PHOTO . '<br />'; 
        
    }


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