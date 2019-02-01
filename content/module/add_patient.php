<?php
	include "../../configuration/connection.php"; # reference to database connector
	$module = $_GET['page'];
	if($module == 'patient') {
		$name = $_POST['txt_name'];
		$gender = $_POST['cb_gender'];
		$age = $_POST['txt_age'];
		$height = $_POST['txt_height'];
		$weight = $_POST['txt_weight'];
		$symptom1 = $_POST['cb_symptom1']; # note that the symptom table has a very similar fields
		$symptom2 = $_POST['cb_symptom2']; # it's not redudant, because the system needs to narrow down the exact disease the patient is suffering.
		$symptom3 = $_POST['cb_symptom3']; # although there's only one field required to be filled with data, while the others could be left empty or null.
		$query1 = "INSERT INTO patient_tb (name, gender, age, height, weight) VALUES ('$name', '$gender', '$age', '$height', '$weight')";
		$sql1	= mysqli_query($connection, $query1);
		$fetch = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM patient_tb WHERE name='$name'"));
		$query2 = "INSERT INTO checkup_tb (patient_id, symptom1, symptom2, symptom3) VALUES ('$fetch[patient_id]','$symptom1', '$symptom2', '$symptom3')";
		$sql2	= mysqli_query($connection, $query2);
		$query3 = mysqli_query($connection, "SELECT * FROM disease_tb");
		$rows = mysqli_num_rows($query3);
		$accuracy = 0;
		for($i=0; $i<=$rows; $i++) {
			$case = 0;
			$checkup = mysqli_query($connection,"SELECT * FROM relation_tb WHERE disease_id ='$i' AND (symptom_id='$symptom1' OR symptom_id='$symptom2' OR symptom_id='$symptom3') ");
			$case = mysqli_num_rows($checkup);
			if($case>0) {
				switch ($case) {
					case 1:
						$accuracy = 1;
						break;
					case 2:
						$accuracy = 2;
						break;
					case 3:
							$accuracy = 3;
						break;
				}
				$checkup_result = $i;
				$sql3 = mysqli_query($connection, "INSERT INTO checkup_result_tb (patient_id, disease_id, accuracy) VALUES ('$fetch[patient_id]', '$checkup_result', '$accuracy')");
			}
		}
		header("location:../media.php?page=checkup&id_user=$fetch[patient_id]");
	} else {
		echo "Module not found.";
	}
?>