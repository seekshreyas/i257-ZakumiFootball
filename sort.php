<?php 
    session_start();
    include 'config.php'; //including the configuration file

    $pageTitle = 'SORT | team page';
?>
<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php include 'templates/header.php' ?>
<div id="wrapper_middle">
    <div class="wrapper_content">
       <h2 class="pagetitle">Page Name</h2>


       <ul id="sort-by">
		  <li><a href="#name">name</a></li>
		  <li><a href="#matches">matches</a></li>
		  <li><a href="#ycards">yellow cards</a></li>
		  <li><a href="#rcards">redcards</a></li>
		  <li><a href="#goals">goals</a></li>
		  <li><a href="#salary">salary</a></li>
		  <li><a href="#founded">founded</a></li>
		</ul>

		<ul id="layout-by">
		  <li><a href="#fitRows">Fit Rows</a></li>
		  <li><a href="#cellsByColumn">Cells By Column</a></li>
		  <li><a href="#cellsByRow">Cells By Row</a></li>
		  <li><a href="#fitColumns">Fit Columns</a></li>
		  <li><a href="#masonry">Masonry</a></li>
		  <li><a href="#masonryHorizontal">Masonry Horizontal</a></li>
		</ul>

		<ul id="filter-by">
		  <li><a href="#fitRows" data-filter="*">Show All</a></li>
		  <li><a href="#teams" data-filter=".team">Teams</a></li>
		  <li><a href="#players" data-filter=".player">Players</a></li>
		  <li><a href="#managers" data-filter=".manager">Managers</a></li>
		</ul>


    	<div id="container">
    		<div class="item player">
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
		  	</div>

		  	<?php
		  		$db = mysql_connect(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD) or die('Unable to connect');
    			mysql_select_db(SQL_DB, $db) or die(mysql_error($db));

    			$query = "SELECT TEAMS.NAME AS TEAM_NAME, TEAMS.YRINEXIST AS TEAM_FOUNDED, TEAMS.TEAMBADGE AS TEAM_BADGE FROM TEAMS; ";

    			$result = mysql_query($query, $db) or die(mysql_error($db));
    			$num_rows = mysql_num_rows($result);
    
			    while($row = mysql_fetch_array($result))
			    {
			        extract($row);

			        $matchquery = "SELECT COUNT(*) FROM ZAKUMI.MATCHES WHERE WIN = (SELECT ID FROM ZAKUMI.TEAMS WHERE NAME = '" + $TEAM_NAME + "');";
			        $matchresult = mysql_query($matchquery, $db) or die(mysql_error($db));
			        
			        $match = mysql_fetch_array($matchresult);
			        
			        extract($match) ;

			        echo '<div class="item team">';
			        //echo '<p class="name" data-matches="' + $match + '" data-founded="'+ $TEAM_FOUNDED + '">' + $TEAM_NAME + '</p>';
			        echo '<p class="name" data-matches="23" data-founded="'+ $TEAM_FOUNDED + '">' + $TEAM_NAME + '</p>';
			        echo '<figure>';
			        echo '<img src="img/' + $TEAM_BADGE + '" alt="arsenal" />';
			        echo '</figure>';
			        echo '</div>';
			    }
			?>
			
			<!-- <div class="item team">
			  	<p class="name" data-matches="512" data-founded="1998">Arsenal</p>
			  	<figure>
			  		<img src="img/profileimages/teams/arsenalbadge.png" alt="arsenal" />
			  	</figure>
			</div> -->

			<div class="item player">
			  	<p class="name" data-matches="23" data-ycard="32" data-rcard="1" data-goals="4" data-salary="20000">Gervinho</p>
			  	<figure>
			  		<img src="img/profileimages/players/arsenal/gervinho.png" alt="gervinho" />
			  	</figure>
			</div>
    		<div class="item manager">
		  		<p class="name" data-matches="134" data-salary="230000">Alan Pardew</p>
		  		<figure>
		  			<img src="img/profileimages/managers/alanpardew.png" alt="alan pardew" />
		  		</figure>
		  	</div>
		  	<div class="item player">
			  	<p class="name" data-matches="53" data-ycard="45" data-rcard="42" data-goals="67" data-salary="654312">Jack Wilshere</p>
			  	<figure>
			  		<img src="img/profileimages/players/arsenal/jackwilshere.png" alt="jack wilshere" />
			  	</figure>
			</div>
    		<div class="item manager">
		  		<p class="name" data-matches="142" data-salary="115409">Roberto Mancini</p>
		  		<figure>
		  			<img src="img/profileimages/managers/robertomancini.png" alt="roberto mancini" />
		  		</figure>
		  	</div>
		  	
		  	<div class="item player">
			  	<p class="name" data-matches="234" data-ycard="31" data-rcard="0" data-goals="54" data-salary="541238">David Villa</p>
			  	<figure>
			  		<img src="img/profileimages/players/fcbarcelona/davidvilla.png" alt="david villa" />
			  	</figure>
			</div>
    		<div class="item player">
		  		<p class="name" data-matches="145" data-ycard="67" data-rcard="15" data-goals="64" data-salary="128723">Dani Alves</p>
		  		<figure>
		  			<img src="img/profileimages/players/fcbarcelona/danialves.png" alt="dani alves" />
		  		</figure>
		  	</div>  
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