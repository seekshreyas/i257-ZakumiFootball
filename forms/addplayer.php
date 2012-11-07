<?php
//connect to mysql
$db = mysql_connect('localhost', 'root', 'area32') or die('Unable to connect. check ur connection parameters'); 
mysql_select_db('zakumi', $db) or die(mysql_error($db));
$query = 'SELECT * FROM PLAYERS';
$result = mysql_query($query, $db) or die(mysql_error($db));

while($row = mysql_fetch_array($result))
{
	extract($row);
	echo($NAME);
}

?>

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

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <h1>Add Players</h1>

        <form class="generalform" action="#">
            <ul>
                <li>
                    <label for="formfield-playername">Player Name</label>
                    <input type="text" id="formfield-playername" />
                </li>
                <li>
                    <label for="formfield-playerdob">Date of Birth</label>
                    <input type="date" id="formfield-playerdob" />
                </li>
                <li>
                    <label for="formfield-playerheight">Height</label>
                    <input type="text" id="formfield-playerheight" />
                </li>
                <li>
                    <label for="formfield-playerweight">Weight</label>
                    <input type="text" id="formfield-playerweight" />
                </li>
                <li>
                    <label for="formfield-playernationality">Nationality</label>
                    <input type="text" id="formfield-playernationality" />
                </li>
                <li>
                    <label for="formfield-playerssn">SSN</label>
                    <input type="text" id="formfield-playerssn" />
                </li>
                <li>
                    <label for="formfield-playersalary">Salary</label>
                    <input type="text" id="formfield-playersalary" />
                </li>
                <li>
                    <label for="formfield-playerstreet">Street</label>
                    <input type="text" id="formfield-playerstreet" />
                </li>
                <li>
                    <label for="formfield-playercity">City</label>
                    <input type="text" id="formfield-playercity" />
                </li>
                <li>
                    <label for="formfield-playercountry">Country</label>
                    <input type="text" id="formfield-playercountry" />
                </li>
            </ul>
        </form>


        <script src="js/vendor/jquery-1.8.2.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
