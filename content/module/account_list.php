<?php
	if (empty($_SESSION['username']) AND empty($_SESSION['password'])) { # to validate session
		echo "<center> <p>You need to be logged in to access this page.</p> <p><a href=\"../index.php\">Please log in.</a></p> </center>";
	} else {
		$action = "module/account_list_action.php"; # reference to the file which modify the data inside the database
		$act = isset($_GET['act']) ? $_GET['act'] : ''; # to solve the undefined variable
		switch ($act) { # cases to display each of the module.
			default:
?>
				<h3 class="page-header text-primary">Daftar Akun</h3>
				<?php
				$query = mysqli_query($connection,"SELECT * FROM account_tb");
				$total = mysqli_num_rows($query);
				$no = 1;
				echo "<p>Jumlah akun yang tersedia saat ini ada $total akun</p>";
				?>
				<button class="btn btn-sm btn-primary" type="button" onclick=window.location.href="?page=account_list&act=add">Tambah Akun</button>	
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" border="1">
						<thead>
							<tr>
								<th width="6%">No</th>
								<th width="36%">Nama</th>
								<th width="40%">Username</th>
								<th width="18%">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							while ($fetch = mysqli_fetch_array($query)) {
						?>
							<tr>
							<?php
								echo "<td>$no</td>";
								echo "<td>$fetch[name]</td>";
								echo "<td>$fetch[username]</td>";
							?>
								<td>
								<?php
									if ($fetch['username'] == "admin") {
									echo "<a href=\"?page=account_list&act=edit&id=$fetch[id]\"><button type=\"button\" class=\"btn btn-xs btn-warning\">Ubah</button></a>";
									} else {
										echo "<a href=\"?page=account_list&act=edit&id=$fetch[id]\"><button type=\"button\" class=\"btn btn-xs btn-warning\">Ubah</button></a> ";
										echo "<a href=\"$action?page=account_list&act=deactivate&id=$fetch[id]\"><button type=\"button\" class=\"btn btn-xs btn-danger\">Deactivate</button></a>";
									}
								?>
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
			case 'add':
			?>
				<div class="row">
				<?php
					echo "<form role=\"form\" action=\"$action?page=account_list&act=add\" method=\"POST\" name=\"form_account\" id=\"form_account\" enctype=\"multipart/form-data\">";
				?>
						<div class="col-sm-6">						
							<h3 class="page-header text-primary">Tambah Akun</h3>		
							<p>* Harap isi data akun dengan benar!</p>
							<table class=\"table table-bordered\">
								<tr>
									<td>Nama Dokter</td>
									<td><input class="form-control" type="text" name="txt_name" id="txt_name" placeholder="Nama Dokter" required></td>
								</tr>
								<tr>
									<td width="30%">Username *</td>
									<td width="70%"><input class="form-control" type="text" name="txt_username" id="txt_username" placeholder="Username" required></td>
								</tr>
								<tr>
									<td>Password *</td>
									<td><input class="form-control" type="password" name="txt_password" id="txt_password" placeholder="Password" required></td>
								</tr>
								<tr>
									<td>Confirm Password *</td>
									<td><input class="form-control" type="password" name="txt_password1" id="txt_password1" placeholder="Confirm Password" required></td>
								</tr>
								<tr>
									<td></td>
									<td><button class="btn btn-sm btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span>Simpan</button></td>
								</tr>
							</table>
						</div>
					</form>
				</div>
			<?php
				break;
			case 'edit':
				$id = $_GET['id'];
				$query = mysqli_query($connection, "SELECT * FROM account_tb WHERE id = '$id'");
				$fetch = mysqli_fetch_array($query);
			?>
				<h3 class="page-header text-primary">Ubah Akun</h3>
				<p>* Harap isi data akun dengan benar!</p>
				<?php
					echo "<form role=\"form\" action=\"$action?page=account_list&act=edit&id=$id\" method=\"POST\" name=\"form_account\" id=\"form_account\" enctype=\"multipart/form-data\">";
				?>
						<table class="table table-bordered">
							<tr>
								<td>Nama Dokter</td>
							<td><input class="form-control" type="text" name="txt_name" id="txt_name" value="<?php echo $fetch['name'];?>"></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><input class="form-control" type="text" name="txt_username" id="txt_username" value="<?php echo $fetch['username'];?>"></td>
							</tr>
							<tr>
								<td>Password *</td>
								<td><input class="form-control" type="password" name="txt_password" id="txt_password"></td>
							</tr>
							<tr>
								<td>Confirm Password *</td>
								<td><input class="form-control" type="password" name="txt_password1" id="txt_password1"></td>
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