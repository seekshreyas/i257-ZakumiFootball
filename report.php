<?php
    session_start();

    $pageTitle = 'REPORT | team page';
?>


<!-- Add your site or application content here -->
<?php include 'templates/pagetop.php' ?>
<?php include 'templates/header.php' ?>
	<div id="wrapper_middle">
	    <div class="wrapper_content">
	    	report page
	    	<ul id="sort-by">
			  <li><a href="#name">name</a></li>
			  <li><a href="#matches">matches</a></li>
			</ul>


	    	<div id="container">
	    		<div class="item player">
				  	<p class="name" data-matches="123">Theo Walcott</p>
				  	<figure>
				  		<img src="img/profileimages/players/arsenal/theowalcott.png" alt="theo walcott" />
				  	</figure>
				</div>
	    		<div class="item manager">
			  		<p class="name" data-matches="234">Arsene Wenger</p>
			  		<figure>
			  			<img src="img/profileimages/managers/arsenewenger.png" alt="arsene wenger" />
			  		</figure>
			  	</div>
				<div class="item team">
				  	<p class="name" data-matches="512">Arsenal</p>
				  	<figure>
				  		<img src="img/profileimages/teams/arsenalbadge.png" alt="arsenal" />
				  	</figure>
				</div>

				<div class="item player">
				  	<p class="name" data-matches="23">Gervinho</p>
				  	<figure>
				  		<img src="img/profileimages/players/arsenal/gervinho.png" alt="gervinho" />
				  	</figure>
				</div>
	    		<div class="item manager">
			  		<p class="name" data-matches="12">Alan Pardew</p>
			  		<figure>
			  			<img src="img/profileimages/managers/alanpardew.png" alt="alan pardew" />
			  		</figure>
			  	</div>
			  	<div class="item player">
				  	<p class="name" data-matches="53">Jack Wilshere</p>
				  	<figure>
				  		<img src="img/profileimages/players/arsenal/jackwilshere.png" alt="jack wilshere" />
				  	</figure>
				</div>
	    		<div class="item manager" data-matches="340">
			  		<p class="name">Roberto Mancini</p>
			  		<figure>
			  			<img src="img/profileimages/managers/robertomancini.png" alt="roberto mancini" />
			  		</figure>
			  	</div>
			  	
			  	<div class="item player">
				  	<p class="name" data-matches="234">David Villa</p>
				  	<figure>
				  		<img src="img/profileimages/players/fcbarcelona/davidvilla.png" alt="david villa" />
				  	</figure>
				</div>
	    		<div class="item player">
			  		<p class="name" data-matches="145">Dani Alves</p>
			  		<figure>
			  			<img src="img/profileimages/players/fcbarcelona/danialves.png" alt="dani alves" />
			  		</figure>
			  	</div>
				
				  
				
			</div>
	    </div>
	</div>
		

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

