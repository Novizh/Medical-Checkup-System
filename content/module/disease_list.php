<?php
	if (empty($_SESSION['username']) AND empty($_SESSION['password'])) { # to validate session
		echo "<center> <p>You need to be logged in to access this page.</p> <p><a href=\"../index.php\">Please log in.</a></p> </center>";
	} else {
		$action = "module/disease_list_action.php"; # reference to the file which modify the data inside the database
		$act = isset($_GET['act']) ? $_GET['act'] : ''; # to solve the undefined variable
		switch ($act) { # cases to display each of the module.
			default:
?>
				<h3 class="page-header text-primary">Daftar Penyakit</h3>
				<?php
					$query = mysqli_query($connection,"SELECT * FROM disease_tb");
					$total = mysqli_num_rows($query);
					$no = 1;
				?>
				<p>Jumlah penyakit yang terdaftar sebanyak <?php echo $total;?> penyakit</p>
				<!-- upcoming feature: add disease -->
				<!-- <button class="btn btn-sm btn-primary" type="button" onclick=window.location.href="?page=disease_list&act=add">Tambah Penyakit</button> -->
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" border="1">
						<thead>
							<tr>
								<th width="2%">No</th>
								<th width="18%">Nama Penyakit</th>
								<th width="54%">Keterangan</th>
								<th width="4%">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($fetch = mysqli_fetch_array($query)) {
						?>
							<tr>
							<?php
								echo "<td>$no</td>";
								echo "<td>$fetch[disease_name]</td>";
								echo "<td>$fetch[description]</td>";
								$no++;
							?>
								<td>
									<a href="?page=disease_list&act=view&id=<?php echo $fetch['disease_id']; ?>"><button type="button" class="btn btn-xs btn-primary">Lihat</button></a>
								</td>
							</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			<?php
				break;
			case 'view':
				$id = $_GET['id'];
				$query = mysqli_query($connection, "SELECT * FROM disease_tb WHERE disease_id = '$id'");
				$query2 = mysqli_query($connection, "SELECT * FROM relation_tb WHERE disease_id = '$id'");
				$fetch = mysqli_fetch_array($query);
			?>
				<h3 class="page-header text-primary">Detail Penyakit</h3>
				<table class="table table-bordered">
					<tr>
						<td width="15%">Nama Penyakit</td>
						<td><input class="form-control" type="text" value="<?php echo $fetch['disease_name'];?>" readonly="true"></td>
					</tr>
					<tr>
						<td>Gejala</td>
						<?php
							$i=0;
							while ($fetch2 = mysqli_fetch_array($query2)) {
								$query3= mysqli_query($connection, "SELECT * FROM symptom_tb WHERE symptom_id='$fetch2[symptom_id]'");
								$fetch3= mysqli_fetch_array($query3);
								$i++;
								if($i!=1){
									echo "<td></td>";
								}
						?>
						<td><input class="form-control" type="text" value="<?php echo $fetch3['symptom_name'];?>" readonly="true"></td>
					</tr>
						<?php
							}
						?>			
				</table>
			<?php
				break;
			?>
	<?php
		}
	}
	?>