<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'PLAYER| player page';
    $playerwanted = $_GET['playerid'];
?>



<!-- Add your site or application content here -->

<?php include 'templates/pagetop.php' ?>
		<!-- <h2>Player Details</h2> -->
        <table class="generaltable">
            <thead>
                <tr>
                	<th>PHOTO</th>
                    <th>NAME</th>
                    <th>DOB</th>
                    <th>SALARY</th>
            </thead>
            <tbody>
                <?php 
                    $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
                    mysql_select_db('ZAKUMI', $db) or die(mysql_error($db));

                    //echo "PLAYER WANTED" . $playerwanted;

        //             $query = "SELECT 
					   //  			TEAM.NAME AS 'TEAM_NAME', 
					   //  			ROSTER.NAME AS 'PLAYER_NAME', 
					   //  			ROSTER.GOAL AS 'PLAYER_GOAL', 
					   //  			ROSTER.YCARDS AS 'PLAYER_YELLOWCARDS', 
					   //  			ROSTER.RCARDS AS 'PLAYER_REDCARDS',
					   //  			ROSTER.PLAYERPHOTO AS 'PLAYER_PHOTO'
								// FROM 
								// 	ZAKUMI.TEAMS TEAM, 
								// 	(
								// 		SELECT 
								// 			PLAYER.NAME,
								// 			PLAYER.PLAYERPHOTO, 
								// 			ROSTER.TEAMID, 
								// 			FIRST.GOAL, 
								// 			FIRST.YCARDS, 
								// 			FIRST.RCARDS 
								// 		FROM 
								// 			ZAKUMI.PLAYERS PLAYER, 
								// 			ZAKUMI.LEAGUEROSTER ROSTER, 
								// 		(
								// 			SELECT 
								// 				LEAGUE_ID, 
								// 				PLAYERID, 
								// 				GOAL, 
								// 				YCARDS, 
								// 				RCARDS 
								// 			FROM 
								// 				ZAKUMI.ROSTER
								// 		) FIRST 
								// 		WHERE 
								// 			PLAYER.ID =  FIRST.PLAYERID 
								// 		AND ROSTER.ID=FIRST.LEAGUE_ID
								// 	) ROSTER 
								// WHERE 
								// 	TEAM.ID = ROSTER.TEAMID;";
                    $query = "SELECT 
                    			PLAYERS.NAME AS 'PLAYERS_NAME',
                    			PLAYERS.DOB AS 'PLAYERS_DOB',
                    			PLAYERS.SALARY AS 'PLAYERS_SALARY',
                    			PLAYERS.PLAYERPHOTO AS 'PLAYERS_PHOTO'
                    		FROM 
                    			ZAKUMI.PLAYERS
                    		WHERE
                    			PLAYERS.ID=".$playerwanted;

                    $result = mysql_query($query, $db) or die(mysql_error($db));

                    while($row = mysql_fetch_array($result))
                    {
                        extract($row);

                        echo '<tr>';
                        echo '<td><img class="detailimage" alt="detailimage" width="60" height="60" src="img/'.$PLAYERS_PHOTO.'" /></td>';
                        echo '<td>' . $PLAYERS_NAME . '</td>';
                        echo '<td>' . $PLAYERS_DOB . '</td>';
                        echo '<td>' . $PLAYERS_SALARY . '</td>';
                        echo '</tr>'; 
                    }
                ?>

            </tbody>
		

