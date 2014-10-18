<form   id="logi-mon" action="login.inc.php" method="POST" class="form-horizontal pure-form login-form-main modal" >	
		<div class="login-in-wid" style="
  font-family: 'Open Sans';">

			<fieldset>
			<legend>Login</legend>

			<label for="email" class="">Email</label>
			<input id="email_login" name="email" type="email" placeholder="Email" class="">

			<label for="password" class="">Password</label>
			<input id="password_login" name="pass" type="password" placeholder="Password" class="">

			<a  href="#registration_form" class="non-clickable" style="
  font-family: 'Open Sans';
  font-size:14px;
  padding:10px;">New user? Register Here</a>


			<button type="submit" id="submit_login" class="pure-button pure-button-primary">Sign in</button>
			</fieldset>
		</div>
		
	</form>
	
	<?php var_dump($_SESSION);
	?>