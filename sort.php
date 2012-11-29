<?php 
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'SORT | sorting page';
?>
<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php include 'templates/header.php' ?>
<div id="wrapper_middle">
    <div class="wrapper_content">
       <h2 class="pagetitle">Page Name</h2>

       <section id="options">
       		<h3>Sort By: </h3>
	       	<ul id="sort-by">
			  <li><a href="#name">name</a></li>
			  <li><a href="#matches">matches</a></li>
			  <li><a href="#ycards">yellow cards</a></li>
			  <li><a href="#rcards">redcards</a></li>
			  <li><a href="#goals">goals</a></li>
			  <li><a href="#salary">salary</a></li>
			  <li><a href="#founded">founded</a></li>
			</ul>
		</section>

		<section id="options">
       		<h3>Sort By: </h3>
	       	<ul id="order-by">
			  <li><a href="#asc">Asc</a></li>
			  <li><a href="#desc">Desc</a></li>
			</ul>
		</section>

		<section id="options">
       		<h3>Filter By: </h3>
				<ul id="filter-by">
				  <li><a href="#fitRows" data-filter="*">Show All</a></li>
				  <li><a href="#teams" data-filter=".team">Teams</a></li>
				  <li><a href="#players" data-filter=".player">Players</a></li>
				  <li><a href="#managers" data-filter=".manager">Managers</a></li>
				</ul>
		</section>

		<section id="options">
       		<h3>Layout By: </h3>
				<ul id="layout-by">
				  <li><a href="#fitRows">Fit Rows</a></li>
				  <li><a href="#cellsByColumn">Cells By Column</a></li>
				  <li><a href="#cellsByRow">Cells By Row</a></li>
				  <li><a href="#fitColumns">Fit Columns</a></li>
				  <li><a href="#masonry">Masonry</a></li>
				  <li><a href="#masonryHorizontal">Masonry Horizontal</a></li>
				</ul>
		</section>



    	<div id="container">
    		<!-- <div class="item player">
			  	<p class="name" data-matches="123" data-ycard="23" data-rcard="12" data-goals="34" data-salary="200000">Theo Walcott</p>
			  	<figure>
			  		<img src="img/profileimages/players/arsenal/theowalcott.png" alt="theo walcott" />
			  	</figure>
			</div>
    		
    		<div class="item manager">
		  		<p class="name" data-matches="234" data-salary="123000">Arsene Wenger</p>
		  		<figure>
		  			<img src="img/profileimages/managers/arsenewenger.png" alt="arsene wenger" />
		  		</figure>
		  	</div> -->

		  	<?php
		  		$db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    			mysql_select_db(SQL_DB, $db) or die(mysql_error($db));

    			$query = "SELECT 
    						TEAMS.ID AS 'TEAM_ID',
    						TEAMS.NAME AS 'TEAM_NAME', 
    						TEAMS.YRINEXIST AS 'TEAM_FOUNDED', 
    						TEAMS.TEAMBADGE AS 'TEAM_BADGE'
    					FROM 
    						ZAKUMI.TEAMS; ";

    			$result = mysql_query($query, $db) or die(mysql_error($db));
    			$num_rows = mysql_num_rows($result);

			    while($row = mysql_fetch_array($result))
			    {
			        extract($row);

			        $matchquery = "SELECT COUNT(*) AS MATCH_WINS FROM ZAKUMI.MATCHES WHERE WIN = (SELECT ID FROM ZAKUMI.TEAMS WHERE NAME = '" . $TEAM_NAME . "');";
			        $matchresult = mysql_query($matchquery, $db) or die(mysql_error($db));
			        
			        $match = mysql_fetch_array($matchresult);
			        
			        extract($match);

			        echo '<div class="item team" data-teamid="'.$TEAM_ID.'">';
			        echo '<p class="name" data-matches="' . $MATCH_WINS .'" data-founded="'.$TEAM_FOUNDED .'">' . $TEAM_NAME .'</p>';
			        //echo '<p class="name" data-matches="23" data-founded="'. $TEAM_FOUNDED . '">' . $TEAM_NAME . '</p>';
			        echo '<figure>';
			        echo '<img src="img/' . $TEAM_BADGE .'" alt="arsenal" />';
			        echo '</figure>';
			        echo '</div>';
			    }

			    mysql_close($db);
			?>
			
			<!-- <div class="item team">
			  	<p class="name" data-matches="512" data-founded="1998">Arsenal</p>
			  	<figure>
			  		<img src="img/profileimages/teams/arsenalbadge.png" alt="arsenal" />
			  	</figure>
			</div> -->


			<?php
		  		$db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    			mysql_select_db(SQL_DB, $db) or die(mysql_error($db));

    			$query = "SELECT 
    						PLAYERINFO.NAME AS PLAYER_NAME, 
    						PLAYERINFO.SALARY AS 'PLAYER_SALARY',
    						PLAYERINFO.PLAYERPHOTO AS 'PLAYER_PHOTO',
    						PLAYERID AS 'PLAYER_ID', 
    						COUNT(*) AS 'MATCHES_PLAYED',
    						SUM(ROSTER.GOAL) AS 'GOALS_SCORED' , 
    						SUM(ROSTER.YCARDS) AS 'YELLOW_CARDS',
    						SUM(ROSTER.RCARDS) AS 'RED_CARDS'
    					FROM 
    						ZAKUMI.ROSTER ROSTER,
    						(
    							SELECT 
    								NAME, 
    								ID AS 'ID', 
    								SALARY AS 'SALARY',
    								PLAYERPHOTO AS 'PLAYERPHOTO'
    							FROM ZAKUMI.PLAYERS 
    							WHERE 
    								ID 
    							IN 
    								(
    									SELECT PLAYERID FROM ZAKUMI.ROSTER WHERE LEAGUE_ID 
    									IN 
    									(
    										SELECT ID FROM ZAKUMI.LEAGUEROSTER WHERE TEAMID 
    										IN 
    											(
    												SELECT ID FROM ZAKUMI.TEAMS
    											)
    									)
    								)
    						) PLAYERINFO
						WHERE LEAGUE_ID 
							IN (SELECT ID FROM ZAKUMI.LEAGUEROSTER WHERE TEAMID IN (SELECT ID FROM ZAKUMI.TEAMS)) AND ROSTER.PLAYERID = PLAYERINFO.ID
						GROUP BY PLAYERID;";

    			$result = mysql_query($query, $db) or die(mysql_error($db));
    			$num_rows = mysql_num_rows($result);
    
			    while($row = mysql_fetch_array($result))
			    {
			        extract($row);


			        echo '<div class="item player" data-playerid="'.$PLAYER_ID.'">';
			        echo '<p class="name" data-matches="'.$MATCHES_PLAYED.'" data-ycard="'.$YELLOW_CARDS.'" data-rcard="'.$RED_CARDS.'" data-goals="'.$GOALS_SCORED.'" data-salary="'.$PLAYER_SALARY.'">' . $PLAYER_NAME. '</p>';
			        echo '<figure>';
			        echo '<img src="img/' . $PLAYER_PHOTO .'" alt="arsenal" />';
			        echo '</figure>';
			        echo '</div>';
			    }

			    mysql_close($db);
			?>


			<!-- <div class="item player">
			  	<p class="name" data-matches="23" data-ycard="32" data-rcard="1" data-goals="4" data-salary="20000">Gervinho</p>
			  	<figure>
			  		<img src="img/profileimages/players/arsenal/gervinho.png" alt="gervinho" />
			  	</figure>
			</div> -->
    		<div class="item manager">
		  		<p class="name" data-matches="134" data-salary="230000">Alan Pardew</p>
		  		<figure>
		  			<img src="img/profileimages/managers/alanpardew.png" alt="alan pardew" />
		  		</figure>
		  	</div>

		  	<?php
		  		$db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    			mysql_select_db(SQL_DB, $db) or die(mysql_error($db));

    			$query = "SELECT 
    						MANAGERS.NAME AS 'MANAGER_NAME',
    						MANAGERS.SALARY AS 'MANAGER_SALARY',
    						MANAGERS.ID AS 'MANAGER_ID',
    						MATCHINFO1.MATCHES_WON AS 'MATCHES_WON', 
    						MANAGERS.MANAGERPHOTO AS 'MANAGER_PHOTO' 
    					FROM 
    						ZAKUMI.MANAGERS MANAGERS,
    						(
    							SELECT COUNT(WIN) AS 'MATCHES_WON', WIN AS 'WIN' 
    							FROM ZAKUMI.MATCHES WHERE ID IN 
    								(
    									SELECT MATCHID FROM ZAKUMI.ROSTER 
    									WHERE LEAGUE_ID IN 
    									(
    										SELECT ID FROM ZAKUMI.LEAGUEROSTER 
    										WHERE TEAMID IN (SELECT ID FROM ZAKUMI.TEAMS) 
    										AND 
    										TOURNAMENTID = 2
    									)
									)
								GROUP BY 
									WIN
							) MATCHINFO1
						WHERE MANAGERS.ID IN 
							(
								SELECT MANAGERID FROM ZAKUMI.LEAGUEROSTER WHERE TEAMID IN 
								(
									SELECT DISTINCT(WIN) AS 'WINNING_TEAM' FROM ZAKUMI.MATCHES WHERE ID IN 
										(
											SELECT MATCHID FROM ZAKUMI.ROSTER 
											WHERE LEAGUE_ID IN 
												(
													SELECT ID FROM ZAKUMI.LEAGUEROSTER 
													WHERE TEAMID IN (SELECT ID FROM ZAKUMI.TEAMS) AND TOURNAMENTID = 2))) AND TOURNAMENTID = 2 AND MATCHINFO1.WIN = TEAMID);";

    			$result = mysql_query($query, $db) or die(mysql_error($db));
    			$num_rows = mysql_num_rows($result);
    
			    while($row = mysql_fetch_array($result))
			    {
			        extract($row);

			        echo '<div class="item manager" data-managerid="'.$MANAGER_ID.'">';
			        echo '<p class="name" data-matches="'.$MATCHES_WON.'" data-salary="'.$MANAGER_SALARY.'">'.$MANAGER_NAME.'</p>';
			        echo '<figure>';
			        echo '<img src="img/' . $MANAGER_PHOTO .'" alt="arsenal" />';
			        echo '</figure>';
			        echo '</div>';

			    }

			    mysql_close($db);
			?>
		  	
    		
		  	
		  	
		</div>
    </div>
</div>


<?php include 'templates/slimbox.php' ?>
		<div class="container_footer">
			<div class="wrapper_content">
				<p>Final term project by team Aisha, Ashley, Shreyas. Project Resources Available <a href="#">here</a></p>
			</div>
		</div>

        <script src="js/vendor/jquery-1.8.2.min.js"></script>
        <script src="js/vendor/jquery.isotope.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>