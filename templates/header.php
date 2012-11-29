<?php
session_start();

?>

<div id="container_top">
	<div class="wrapper_content">
		<div class="wrapper_logo">
			<a href="index.php">
				<img id="logo" src="img/logo.png" alt="logo" title="logo" />
			</a>
      		<p class="tagline">players &bull; managers &bull; teams</p>
      		<form class="miniform" id="globalsearch">
      			<input type="text" placeholder="Search" />
      		</form>

      		<?php
      			if($_SESSION['authuser'] and $_SESSION['authuser'] == 1)
		        {
		            echo '<button id="btn_logout" class="trigger_slimbox userlogin btn btn_large btn_red">Logout</button>';
		        }else {
		        	echo '<button id="btn_login" class="trigger_slimbox userlogin btn btn_large btn_green">Login</button>';
		        }
        	?>
      		
		</div>
		
	</div>
</div>