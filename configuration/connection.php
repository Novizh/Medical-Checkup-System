<?php
	$connection = mysqli_connect("localhost", "root", "", "medicalcheckup_db"); # script to connect the system to the database
	if($connection) {
		# echo "Connection successful!";
	} else {
		echo "Connection failed!";
	}
?>