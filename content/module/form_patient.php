<?php
  include "../configuration/connection.php"; # reference to database connector
  $action = "module/add_patient.php"; # reference to add patient module
?>
<div class="row">
<form role="form" action="<?php echo $action;?>?page=patient" method="POST" name="patient" id="patient" enctype="multipart/form-data">
    <div class="col-sm-6">
      <h1>Biodata Pasien</h1>
      <table class="table table-bordered">
        <tr>
          <td><input class="form-control" type="text" name="txt_name" id="txt_name" placeholder="Nama Lengkap" required></td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="cb_gender" id="cb_gender" required>
              <option value="">Pilih Jenis Kelamin</option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </td>
        </tr>
        <tr>
          <td><input class="form-control" type="number" name="txt_age" id="txt_age" placeholder="Usia" required></td>
        </tr>
        <tr>
          <td><input class="form-control" type="number" name="txt_height" id="txt_height" placeholder="Tinggi Badan (cm)" required></td>
        </tr>
        <tr>
          <td><input class="form-control" type="number" name="txt_weight" id="txt_weight" placeholder="Berat Badan (kg)" required></td>
        </tr>
      </table>
      <h1>Gejala Penyakit</h1>
      <table class="table table-bordered">
        <tr>
          <td>
            <select class="form-control" name="cb_symptom1" id="cb_symptom1" required> <!-- figure out how combo box value inserted (read $action) -->
              <option value="0">Pilih Gejala yang Anda derita</option>
              <?php
                $query = mysqli_query($connection,"SELECT * FROM symptom_tb");
                while($fetch = mysqli_fetch_array($query)) {
              ?>
              <option value="<?php echo $fetch['symptom_id'];?>"><?php echo $fetch['symptom_name'];?></option>
              <?php
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="cb_symptom2" id="cb_symptom2">
              <option value="0">Pilih Gejala yang Anda derita</option>
              <?php
				        $query = mysqli_query($connection,"SELECT * FROM symptom_tb"); 
				        while($fetch = mysqli_fetch_array($query)) {
              ?>
              <option value="<?php echo $fetch['symptom_id'];?>"><?php echo $fetch['symptom_name'];?></option>
              <?php
                }
            ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="cb_symptom3" id="cb_symptom3">
              <option value="0">Pilih Gejala yang Anda derita</option>
              <?php
				        $query = mysqli_query($connection,"SELECT * FROM symptom_tb"); 
				        while($fetch = mysqli_fetch_array($query)) {
              ?>
              <option value="<?php echo $fetch['symptom_id'];?>"><?php echo $fetch['symptom_name'];?></option>
              <?php
                }
              ?>
            </select>
          </td>
        </tr>
      </table>
      <table float="right">
        <tr>
          <td></td>
          <td><button class="btn btn-sm btn-primary" type="submit"><span class="glyphicon glyphicon-save"></span>Periksa</button></td>
        </tr>
      </table>
    </div>
  </form>
</div>