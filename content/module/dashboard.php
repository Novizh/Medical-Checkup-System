<?php
	if(empty($_SESSION['username']) AND empty($_SESSION['password'])) { # to validate the session
		echo "<center> <p>You need to be logged in to access this page.</p> <p><a href=\"../index.php\">Please log in.</a></p> </center>";
	} else {
		if($_SESSION['username'] == "admin"){
			echo "<h1>";
			echo "<a class=\"navbar-brand\" href=\"#\">Dashboard Admin</a>";
			echo "</h1>";
		} else {
			echo "<h1>";
			echo "<a class=\"navbar-brand\" href=\"#\">Dashboard Dokter</a>";
			echo "</h1>";
		}
	}
?>