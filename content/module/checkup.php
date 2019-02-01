<?php
	include "../configuration/connection.php"; # this page is opened from media.php
	if(isset($_GET['id_user'])) {
		$user = $_GET['id_user'];
	} else {
		$user = $_GET['id'];
	}
	$query = mysqli_query($connection,"SELECT * FROM checkup_result_tb WHERE patient_id='$user'"); # script to pick which table in the database is being queried
	$fetch = mysqli_fetch_array($query);
	$patient_query = mysqli_query($connection,"SELECT * FROM patient_tb WHERE patient_id='$fetch[patient_id]'");
	$patient_fetch = mysqli_fetch_array($patient_query);
	echo "<h1>Hasil Analisa</h1>";
	if(!isset($_SESSION['password'])) {
?>
		<table class="table table-bordered">
			<tr>
				<td>Nama Pasien</td>
				<td><input class="form-control" type="text" name="txt_name" id="txt_name" value="<?php echo $patient_fetch['name'];?>" readonly="true"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input class="form-control" type="text" name="txt_gender" id="txt_gender" value="<?php echo $patient_fetch['gender'];?>" readonly="true"></td>
			</tr>
			<tr>
				<td>Usia</td>
				<td><input class="form-control" type="text" name="txt_age" id="txt_age" value="<?php echo $patient_fetch['age'];?>" readonly="true"></td>
			</tr>
			<tr>
				<td>Tinggi Badan</td>
				<td><input class="form-control" type="text" name="txt_height" id="txt_height" value="<?php echo $patient_fetch['height']." cm";?>" readonly="true"></td>
			</tr>
			<tr>
				<td>Berat Badan</td>
				<td><input class="form-control" type="text" name="txt_weight" id="txt_weight" value="<?php echo $patient_fetch['weight']." kg";?>" readonly="true"></td>
			</tr>
		</table>
<?php
	}
	$query1 = mysqli_query($connection,"SELECT * FROM account_tb");
	$total = mysqli_num_rows($query1);
	$no = 1;
?>
	<p>Anda kemungkinan menderita penyakit yang tertera di bawah ini</p>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" border="1">
			<thead>
				<tr>
					<th width="3%">No</th>
					<th width="14%">Nama Penyakit</th>
					<th width="36%">Keterangan</th>
					<th width="6%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query2 = mysqli_query($connection,"SELECT * FROM checkup_result_tb WHERE patient_id='$user'");
				while($fetch2 = mysqli_fetch_array($query2)) {	
					$disease_query = mysqli_query($connection,"SELECT * FROM disease_tb WHERE disease_id='$fetch2[disease_id]'");
					$disease_fetch = mysqli_fetch_array($disease_query);			
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $disease_fetch['disease_name'];?></td>
						<td><?php echo $disease_fetch['description'];?></td>
						<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Lihat</button></button></td>
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title"><?php echo $disease_fetch['disease_name'];?></h1>
								  	</div>
								  	<div class="modal-body">
										<p><?php echo $disease_fetch['description'];?></p>
										<p>Gejalanya antara lain :</p>
										<p><?php
											$i=0;
											$relation_query = mysqli_query($connection, "SELECT * FROM relation_tb WHERE disease_id ='$disease_fetch[disease_id]'");
											while ($fetch2 = mysqli_fetch_array($relation_query)) {
												$query3= mysqli_query($connection, "SELECT * FROM symptom_tb WHERE symptom_id='$fetch2[symptom_id]'");
												$fetch3= mysqli_fetch_array($query3);
												$i++;
												echo "<p>".$i .". ". $fetch3['symptom_name'] ."</p>";
											}
											?>
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
									</div>
								</div>
							</div>
						</div>
					</tr>
				<?php
					$no++;
				}
				?>
			</tbody>
		</table>
		<form method="get" action="module/print_checkup.php">
			<input type="submit" value="Cetak Hasil Analisa"  class="btn btn-primary btn-md"/>
			<input type="hidden" name="id" value="<?php echo $user;?>" />
		</form>	
	</div>