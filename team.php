<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'PLAYER| player page';
    $teamwanted = $_GET['teamid'];


    $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    mysql_select_db('ZAKUMI', $db) or die(mysql_error($db));

    //echo "PLAYER WANTED" . $playerwanted;


    $query = "SELECT 
    			TEAMS.NAME AS 'TEAM_NAME',
    			TEAMS.YRINEXIST AS 'TEAM_YRINEXIST',
    			TEAMS.STADIUM AS 'TEAM_STADIUM',
    			TEAMS.CAPACITY AS 'TEAM_CAPACITY',
    			TEAMS.CITY AS 'TEAM_CITY',
    			TEAMS.TEAMBADGE AS 'TEAM_PHOTO'
    		FROM 
    			ZAKUMI.TEAMS
    		WHERE
    			TEAMS.ID=".$teamwanted;

    $result = mysql_query($query, $db) or die(mysql_error($db));
?>



<!-- Add your site or application content here -->

<?php include 'templates/pagetop.php' ?>
<!-- <h2>Team Details</h2> -->


<table class="generaltable">
    <thead>
        <tr>
        	<th>PHOTO</th>
            <th>NAME</th>
            <th>FOUNDED</th>
            <th>STADIUM</th>
            <th>STADIUM CAPACITY</th>
            <th>LOCATED IN</th> 
    </thead>
    <tbody>
        <?php 
            

            while($row = mysql_fetch_array($result))
            {
                extract($row);

                echo '<tr>';
                echo '<td><img class="detailimage" alt="detailimage" width="60" height="60" src="img/'.$TEAM_PHOTO.'" /></td>';
                echo '<td>' . $TEAM_NAME . '</td>';
                echo '<td>' . $TEAM_YRINEXIST . '</td>';
                echo '<td>' . $TEAM_STADIUM . '</td>';
                echo '<td>' . $TEAM_CAPACITY . '</td>';
                echo '<td>' . $TEAM_CITY . '</td>';
                echo '</tr>'; 
            }
        ?>

    </tbody>
		

