<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Zakumi | add players to the database</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

       
        <div id="container_top">
             <div class="wrapper_content">
                <img id="logo" src="../img/logo.png" alt="logo" title="logo" />
                <!-- <h1>Zakumi</h1> -->
                <p class="tagline">players-managers-teams</p>
                <!-- <p class="logoline">football database</p> -->
                
             </div>
        </div>
        

        <div id="container_middle">
            <div class="wrapper_content">
                <h2>Richest Managers in the city of london</h2>
                <table class="generaltable">
                    <thead>
                        <tr>
                            <th>Manager Name</th>
                            <th>City</th>
                            <th>Salary</th>
                    </thead>
                    <tbody>
                        <?php 
                            $db = mysql_connect('localhost', 'root', 'area32') or die('Unable to connect');
                            mysql_select_db('ZAKUMI', $db) or die(mysql_error($db));

                            $query = "SELECT MANAGERS.NAME, TEAMS.CITY, MANAGERS.SALARY FROM MANAGERS, TEAMS WHERE TEAMS.CITY = MANAGERS.CITY AND TEAMS.CITY='London' GROUP BY MANAGERS.NAME ORDER BY MANAGERS.SALARY DESC";
                            $result = mysql_query($query, $db) or die(mysql_error($db));

                            while($row = mysql_fetch_array($result))
                            {
                                extract($row);
                                $manager_name = $NAME;
                                $teams_city = $CITY;
                                $managers_salary = $SALARY;
                                echo '<tr> <td>' . $manager_name . '</td> <td>' . $teams_city . '</td><td>' . $managers_salary . '</td></tr>'; 
                            }
                        ?>

                    </tbody>
                
                </table>
               
                
            </div>

        </div>

        


        <script src="../js/vendor/jquery-1.8.2.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>

    </body>
</html>
