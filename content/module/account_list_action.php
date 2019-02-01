<?php
	session_start();
	if(empty($_SESSION['username']) AND empty($_SESSION['password'])) { # to validate the session
		echo "<center> <p>You need to be logged in to access this page.</p> <p><a href=\"../../index.php\">Please log in.</a></p> </center>";
	} else {
		include "../../configuration/connection.php";
		$module	= $_GET['page'];
		$action	= $_GET['act'];
		if($module == "account_list" AND $action == "add") {
			$name = $_POST['txt_name'];
			$username = $_POST['txt_username'];
			$password = md5($_POST['txt_password']);
			$query = "INSERT INTO account_tb (name,username,password) VALUES ('$name','$username','$password')";
			$sql = mysqli_query($connection, $query);
			header("location:../media.php?page=".$module);
		} else if ($module == "account_list" AND $action == "edit") {
			$id = $_GET['id'];
			$name = $_POST['txt_name'];
			$username = $_POST['txt_username'];
			$password = md5($_POST['txt_password']);
			$query = "UPDATE account_tb SET id='$id', name='$name', username='$username', password='$password' WHERE id='$id'";
			$sql = mysqli_query($connection, $query);
			header("location:../media.php?page=".$module);
		} else if($module == "account_list" AND $action == "deactivate") {
			$id = $_GET['id'];
			$query = "DELETE FROM account_tb WHERE id='$id'";
			$sql	= mysqli_query($connection, $query);
			header("location:../media.php?page=".$module);
		} else {
			echo "Action not found.";
		}
	}
?>