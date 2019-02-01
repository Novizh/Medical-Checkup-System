<?php
	session_start();
	if(empty($_SESSION['username']) AND empty($_SESSION['password'])) { # to validate the session
		echo "<center> <p>You need to be logged in to access this page.</p> <p><a href=\"../../index.php\">Please log in.</a></p> </center>";
	} else {
		include "../../configuration/connection.php";
		$module	= $_GET['page'];
		$action	= $_GET['act'];
		if($module == "patient_data" AND $action == "edit") {
			$id = $_GET['id'];
			$name = $_POST['txt_name'];
			$gender = $_POST['cb_gender'];
			$age = $_POST['txt_age'];
			$height = $_POST['txt_height'];
			$weight = $_POST['txt_weight'];
			$query = "UPDATE patient_tb SET patient_id='$id', name='$name', gender='$gender', age='$age', height='$height', weight='$weight' WHERE patient_id='$id'";
			$sql = mysqli_query($connection, $query);
			header("location:../media.php?page=".$module);
		} else if($module == "patient_data" AND $action == "delete") {
			$id = $_GET['id'];
			$query1 = "DELETE FROM patient_tb WHERE patient_id=$id";
			$query2 = "DELETE FROM checkup_tb WHERE patient_id=$id";
			$query3 = "DELETE FROM checkup_result_tb WHERE patient_id=$id";
			$sql1	= mysqli_query($connection, $query1);
			$sql2	= mysqli_query($connection, $query2);
			$sql3	= mysqli_query($connection, $query3);
			header("location:../media.php?page=".$module);
		} else {
			echo "Action not found.";
		}
	}
?>