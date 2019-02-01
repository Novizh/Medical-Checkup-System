<?php
	include "../configuration/connection.php"; # reference to configuration folder outside the content directory
	function anti_injection($data) { # to avoid SQL injection
		$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter;
	}
	$username = anti_injection($_POST['txt_user']); # to record username and password
	$password = anti_injection(md5($_POST['txt_pass']));
	$username_injection = mysqli_real_escape_string($connection, $username); # to avoid SQL injection
	$password_injection = mysqli_real_escape_string($connection, $password);
	if(!ctype_alnum($username_injection) OR !ctype_alnum($password_injection)) {
		echo "<script>alert('Log in injection failed.'); window.location = 'media.php?page=doctor'</script>";
	} else {
		$query	= "SELECT * FROM account_tb WHERE username='$username' AND password='$password'";
		$login	= mysqli_query($connection, $query);
		$found	= mysqli_num_rows($login);
		$fetch	= mysqli_fetch_array($login);
		if($found > 0) { # to validate log in
			session_start(); # to create session
			$_SESSION['username'] = $fetch['username'];
			$_SESSION['password'] = $fetch['password'];
			header("location:media.php?page=dashboard"); # to redirect users after the session is validated
		} else {
			echo"<center>";
			echo "<script>alert('Log in failed.'); window.location = 'media.php?page=doctor'</script>";
			echo"</center>";
		}
	}
?>