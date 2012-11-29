<div class="wrapper_slimbox">
	<div class="overlay"></div>
	<div class="slimbox">
		<div class="slimboxclose"></div>
		
	</div>
</div>

<div class="sbox_container">
	<div class="sbox" id="sbox_login">
		<h3>Login</h3>
		<div class="sbox_content">
			<form class="generalform" id="userlogin" action="forms/login.php" method="POST">
				<ul>
					<li>
						<input class="formfield" id="formfield_username" name="username" type="text" placeholder="username" />
					</li>
					<li>
						<input class="formfield" id="formfield_password" name="password" type="password" placeholder="password" />
					</li>
					<li>
						<input class="formsubmit" value="Login" type="submit" />
					</li>
				</ul>
			</form>
		</div>
	</div>



	<div class="sbox" id="sbox_logout">
		<h3>Logout</h3>
		<div class="sbox_content">
			<form class="generalform" id="userlogout" action="forms/logout.php" method="POST">
				<ul>
					<li>
						Are you sure you want to logout ?
					</li>
					<li>
						<input class="formsubmit" value="Logout" type="submit" />
					</li>
				</ul>
			</form>
		</div>
	</div>
</div>
