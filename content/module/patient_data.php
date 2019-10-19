<?php
	if(empty($_SESSION['username']) AND empty($_SESSION['password'])) { # to validate session
		echo "<center> <p>You need to be logged in to access this page.</p> <p><a href=\"../index.php\">Please log in.</a></p> </center>";
	} else {
		$action = "module/patient_data_action.php"; # reference to the file which modify the data inside the database
		$act = isset($_GET['act']) ? $_GET['act'] : ''; # to solve the undefined variable
		switch($act) { # cases to display each of the module.
			default:
?>
				<h3 class="page-header text-primary">Data Pasien</h3>
				<?php
					$query = mysqli_query($connection,"SELECT * FROM patient_tb"); # script to pick which table in the database is being queried
					$total = mysqli_num_rows($query);
					$no = 1;
					echo "<p>Jumlah keseluruhan pasien saat ini ada $total orang</p>";
				?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" border="1">
						<thead>
							<tr>
								<th width="6%">No</th>
								<th width="24%">Nama</th>
								<th width="12%">Jenis Kelamin</th>
								<th width="6%">Usia</th>
								<th width="6%">Tinggi Badan</th>
								<th width="6%">Berat Badan</th>
								<th width="24%">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($fetch = mysqli_fetch_array($query)) { # script to fetch everything within the sql query
						?>
							<tr>
							<?php
								echo "<td>$no</td>";
								echo "<td>$fetch[name]</td>";
								echo "<td>$fetch[gender]</td>";
								echo "<td>$fetch[age]</td>";
								echo "<td>$fetch[height] cm</td>";
								echo "<td>$fetch[weight] kg</td>";
							?>
								<td>
									<a href="?page=patient_data&act=view&id=<?php echo $fetch['patient_id'];?>"><button type="button" class="btn btn-xs btn-primary">Lihat</button></a>
									<a href="?page=patient_data&act=edit&id=<?php echo $fetch['patient_id'];?>"><button type="button" class="btn btn-xs btn-warning">Ubah</button></a>
									<a href="<?php echo $action;?>?page=patient_data&act=delete&id=<?php echo $fetch['patient_id'];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><button type="button" class="btn btn-xs btn-danger">Hapus</button></a>
								</td>
							</tr>
							<?php
								$no++;
							?>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			<?php
				break;
			case 'view': # Case view patient
				$query = mysqli_query($connection,"SELECT * FROM patient_tb WHERE patient_id='$_GET[id]'");
				$fetch = mysqli_fetch_array($query);
			?>
				<h3 class="page-header text-primary">Lihat Pasien</h3>
				<table class="table table-bordered">
					<tr>
						<td>Nama Pasien</td>
						<td><input class="form-control" type="text" name="txt_name" id="txt_name" value="<?php echo $fetch['name'];?>" readonly="true"></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input class="form-control" type="text" name="txt_gender" id="txt_gender" value="<?php echo $fetch['gender'];?>" readonly="true"></td>
					</tr>
					<tr>
						<td>Usia</td>
						<td><input class="form-control" type="text" name="txt_age" id="txt_age" value="<?php echo $fetch['age'];?>" readonly="true"></td>
					</tr>
					<tr>
						<td>Tinggi Badan</td>
						<td><input class="form-control" type="text" name="txt_height" id="txt_height" value="<?php echo $fetch['height']." cm";?>" readonly="true"></td>
					</tr>
					<tr>
						<td>Berat Badan</td>
						<td><input class="form-control" type="text" name="txt_weight" id="txt_weight" value="<?php echo $fetch['weight']." kg";?>" readonly="true"></td>
					</tr>
				</table>	
			<?php
				include 'module/checkup.php';
				break;
			case 'edit': # Case edit patient
				$id = $_GET['id'];
				$query = mysqli_query($connection, "SELECT * FROM patient_tb WHERE patient_id = '$id'");
				$fetch = mysqli_fetch_array($query);
				$male=""; $female="";
				if($fetch['gender'] == "Pria") { 
					$male="selected";
					$female="";
				} else {
					$female="selected";
					$male="";
				}
			?>
				<h3 class="page-header text-primary">Ubah Data Pasien</h3>
				<form role="form" action="<?php echo $action;?>?page=patient_data&act=edit&id=<?php echo $id;?>" method="POST" name="form_patient" id="form_patient" enctype="multipart/form-data">
					<table class="table table-bordered">
						<tr>
							<td>Nama Pasien</td>
							<td><input class="form-control" type="text" name="txt_name" id="txt_name" value="<?php echo $fetch['name'];?>"></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>
								<select class="form-control" name="cb_gender" id="cb_gender" value="$fetch[gender]" required>
									<option value="">Pilih Jenis Kelamin</option>
									<option value="Pria" <?php echo $male;?>>Pria</option>
									<option value="Wanita" <?php echo $female;?>>Wanita</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Usia</td>
							<td><input class="form-control" type="number" name="txt_age" id="txt_age" value="<?php echo $fetch['age'];?>"></td>
						</tr>
						<tr>
							<td>Tinggi Badan</td>
							<td><input class="form-control" type="number" name="txt_height" id="txt_height" value="<?php echo $fetch['height'];?>"></td>
						</tr>
						<tr>
							<td>Berat Badan</td>
							<td><input class="form-control" type="number" name="txt_weight" id="txt_weight" value="<?php echo $fetch['weight'];?>"></td>
						</tr>
						<tr>
							<td><button class="btn btn-sm btn-primary" type="submit">Simpan</button></td>
						</tr>
					</table>
				</form>
			<?php
				break;
			?>
	<?php
		}
	}
	?>