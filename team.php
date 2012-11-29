<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'PLAYER| player page';
    $teamwanted = $_GET['teamid'];
?>



<!-- Add your site or application content here -->

<?php include 'templates/pagetop.php' ?>
<h2>Team Details</h2>
<table class="generaltable">
    <thead>
        <tr>
            <th>TEAM NAME</th>
            <th>TEAM_YRINEXIST</th>
            <th>TEAM_STADIUM</th>
            <th>TEAM_CAPACITY</th>
            <th>TEAM_CITY</th> 
    </thead>
    <tbody>
        <?php 
            $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
            mysql_select_db('ZAKUMI', $db) or die(mysql_error($db));

            //echo "PLAYER WANTED" . $playerwanted;


            $query = "SELECT 
            			TEAMS.NAME AS 'TEAM_NAME',
            			TEAMS.YRINEXIST AS 'TEAM_YRINEXIST',
            			TEAMS.STADIUM AS 'TEAM_STADIUM',
            			TEAMS.CAPACITY AS 'TEAM_CAPACITY',
            			TEAMS.CITY AS 'TEAM_CITY'
            		FROM 
            			ZAKUMI.TEAMS
            		WHERE
            			TEAMS.ID=".$teamwanted;

            $result = mysql_query($query, $db) or die(mysql_error($db));

            while($row = mysql_fetch_array($result))
            {
                extract($row);

                echo '<tr>';
                echo '<td>' . $TEAM_NAME . '</td>';
                echo '<td>' . $TEAM_YRINEXIST . '</td>';
                echo '<td>' . $TEAM_STADIUM . '</td>';
                echo '<td>' . $TEAM_CAPACITY . '</td>';
                echo '<td>' . $TEAM_CITY . '</td>';
                echo '</tr>'; 
            }
        ?>

    </tbody>
		

