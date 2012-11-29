<?php
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'PLAYER| player page';
    $managerwanted = $_GET['managerid'];
?>



<!-- Add your site or application content here -->

<?php include 'templates/pagetop.php' ?>
		<h2>Manager Details</h2>
        <table class="generaltable">
            <thead>
                <tr>
                    <th>MANAGER_NAME</th>
                    <th>MANAGER_NATIONALITY</th>
                    <th>MANAGER_COUNTRY</th>
                     
            </thead>
            <tbody>
                <?php 
                    $db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
                    mysql_select_db('ZAKUMI', $db) or die(mysql_error($db));

                    //echo "PLAYER WANTED" . $playerwanted;

       
                    $query = "SELECT 
                    			MANAGERS.NAME AS 'MANAGERS_NAME',
                    			MANAGERS.NATIONALITY AS 'MANAGERS_NATIONALITY',
                    			MANAGERS.SALARY AS 'MANAGERS_SALARY'
                    		FROM 
                    			ZAKUMI.MANAGERS
                    		WHERE
                    			MANAGERS.ID=".$managerwanted;

                    $result = mysql_query($query, $db) or die(mysql_error($db));

                    while($row = mysql_fetch_array($result))
                    {
                        extract($row);

                        echo '<tr>';
                        echo '<td>' . $MANAGERS_NAME . '</td>';
                        echo '<td>' . $MANAGERS_NATIONALITY . '</td>';
                        echo '<td>' . $MANAGERS_SALARY . '</td>';
                        echo '</tr>'; 
                    }
                ?>

            </tbody>
		

