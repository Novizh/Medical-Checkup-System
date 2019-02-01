<?php
  session_start(); # to create the session
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/style.css"/>
    <title>Medical Checkup System</title>
  </head>
  <body background="../image/background.jpg" width="1920px" height="1080px">
    <div id="container">
      <nav class="navbar navbar-light bg-primary">
      <?php # the index.php will reference the media.php file, each feature will be called here, and controlled by content.php file.
        if(empty($_SESSION['username']) AND empty($_SESSION['password'])) { 
      ?>
		  <span class="navbar-brand mb-0 h1"><a href="../index.php" style="color:#fff; text-decoration:none;">Medical Checkup System</a></span>
      <?php
        } else if($_SESSION['username'] == "admin") { # Admin's features
      ?>
      <span class="navbar-brand mb-0 h1"><a href="media.php" style="color:#fff; text-decoration:none;">Medical Checkup System</a></span>
        <div>
          <a href="?page=dashboard" class="btn btn-primary">Home</a>
          <a href="?page=account_list" class="btn btn-primary">Daftar Akun</a>
          <a href="?page=patient_data" class="btn btn-primary">Data Pasien</a>
          <a href="module/logout.php" class="btn btn-danger">Log Out</a>
        </div>
      <?php
        } else { # Doctor's features
      ?>
      <span class="navbar-brand mb-0 h1"><a href="media.php" style="color:#fff; text-decoration:none;">Medical Checkup System</a></span>
        <div>
          <a href="?page=dashboard" class="btn btn-primary">Home</a>
          <a href="?page=patient_data" class="btn btn-primary">Data Pasien</a>
          <a href="?page=disease_list" class="btn btn-primary">Data Penyakit</a>
          <a href="module/logout.php" class="btn btn-danger">Log out</a>
        </div>
      <?php
        }
      ?>
      </nav>
      <div id="content">
        <div class="jumbotron">
        <?php
          include "content.php";
        ?>          
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- Datepicker JavaScript -->
    <script type="text/javascript">
      $(document).ready(function(){
        $("#txt_tanggal_lahir").datepicker({
          dateFormat: "dd MM yy",
          showButtonPanel: true,
          changeMonth: true,
          changeYear: true
        });
      });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>