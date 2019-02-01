<h1>Selamat datang, Dok!</h1>
<form role="form" action="check_login.php" method="POST" name="login" id="login">
	<fieldset>
		<div class="form-group">
			<input type="text" name="txt_user" id="txt_user" class="form-control" placeholder="Username" required autofocus>
		</div>
		<div class="form-group">
			<input type="password" name="txt_pass" id="txt_pass" class="form-control" placeholder="Password" required>
		</div>
		<div class="checkbox">
			<label><input type="checkbox" name="cb_remember" id="cb_remember" value="remember-me">Remember me</label>
		</div>
		<button class="btn btn-md btn-default btn-block" type="submit">Log In</button>
	</fieldset>
</form>