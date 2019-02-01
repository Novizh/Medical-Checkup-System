<?php
	include "../configuration/connection.php"; # reference to the database connector
	include "../configuration/library.php"; # reference to Datepicker JavaScript library
	# to reference each page according to the user
	if(isset($_GET["page"])) {
		$case = $_GET["page"];
	} else {
		$case = "dashboard";
	}
	switch ($case) {
		case "patient":
			include 'module/form_patient.php';
			break;
		case "doctor":
			include 'module/login.php';
			break;
		case "checkup":
			include 'module/checkup.php';
			break;
		case "dashboard":
			include 'module/dashboard.php';
			$dateformat = date("Y-m-d"); # calling the Datepicker JavaScript
			$date = dateformat_ina($dateformat);
			echo "<p align=\"center\"><b> Selamat datang di Medical Checkup System!</b></p>";
			echo "<p align=\"center\">You are now logged in on $date</p>";
			break;
		case "patient_data":
			include 'module/patient_data.php';
			break;
		case "account_list":
			include 'module/account_list.php';
			break;
		case "disease_list":
			include 'module/disease_list.php';
			break;
		default :
			echo "Module not found.";
			break;
	}
?>