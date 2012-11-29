<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'PLAYER| player page';
    $managerwanted = $_GET['managerid'];
?>



<!-- Add your site or application content here -->

<?php include 'templates/pagetop.php' ?>
		<!-- <h2>Manager Details</h2> -->
        <table class="generaltable">
            <thead>
                <tr>
                	<th>PHOTO</th>
                    <th>NAME</th>
                    <th>NATIONALITY</th>
                    <th>SALARY</th>
                     
            </thead>
            <tbody>
                <?php 
                    $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
                    mysql_select_db('ZAKUMI', $db) or die(mysql_error($db));

                    //echo "PLAYER WANTED" . $playerwanted;

       
                    $query = "SELECT 
                    			MANAGERS.NAME AS 'MANAGERS_NAME',
                    			MANAGERS.NATIONALITY AS 'MANAGERS_NATIONALITY',
                    			MANAGERS.SALARY AS 'MANAGERS_SALARY',
                    			MANAGERS.MANAGERPHOTO AS 'MANAGERS_PHOTO'
                    		FROM 
                    			ZAKUMI.MANAGERS
                    		WHERE
                    			MANAGERS.ID=".$managerwanted;

                    $result = mysql_query($query, $db) or die(mysql_error($db));

                    while($row = mysql_fetch_array($result))
                    {
                        extract($row);

                        echo '<tr>';
                        echo '<td><img class="detailimage" alt="detailimage" width="60" height="60" src="img/'.$MANAGERS_PHOTO.'" /></td>';
                        echo '<td>' . $MANAGERS_NAME . '</td>';
                        echo '<td>' . $MANAGERS_NATIONALITY . '</td>';
                        echo '<td>' . $MANAGERS_SALARY . '</td>';
                        echo '</tr>'; 
                    }
                ?>

            </tbody>
		

