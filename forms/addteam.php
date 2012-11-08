

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
                <h1>Zakumi</h1>
                <p class="tagline">players-managers-teams</p>
                <p class="logoline">football database</p>
                
             </div>
        </div>
        

        <div id="container_middle">
            <div class="wrapper_content">
                <h2>Add Teams</h2>

                <form class="generalform" action="#">
                    <ul>
                        <li>
                            <label for="formfield-teamname">Team Name</label>
                            <input type="text" id="formfield-managername" />
                        </li>
                        <li>
                            <label for="formfield-teamyrinexist">Existed Since</label>
                            <input type="text" id="formfield-managernationality" />
                        </li>
                        <li>
                            <label for="formfield-teamstadium">Team Stadium</label>
                            <input type="text" id="formfield-teamstadium" />
                        </li>
                        <li>
                            <label for="formfield-teamstadiumcapacity">Capacity</label>
                            <input type="text" id="formfield-teamstadiumcapacity" />
                        </li>
                        <li>
                            <label for="formfield-teamcity">City</label>
                            <input type="text" id="formfield-teamcity" />
                        </li>
                        <li>
                            <label for="formfield-teamyrbuilt">Stadium built in</label>
                            <input type="text" id="formfield-teamyrbuilt" />
                        </li>
                        <li>
                           <!--  <label for="formfield-playercountry">Country</label> -->
                            <input type="submit" id="formfield-submit" value="Submit" />
                        </li>
                    </ul>
                </form>
            </div>

        </div>

        


        <script src="../js/vendor/jquery-1.8.2.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>

    </body>
</html>
