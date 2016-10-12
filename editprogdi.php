<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- <a class="navbar-brand" href="#">Logo</a> -->
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="./">HOME</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data utama</a>
                <ul class="dropdown-menu">
                  <li><a href="showkota.php">Input Kota</a></li>
                  <li><a href="showprogdi.php">Input Progdi</a></li>
                  <li><a href="input_makul.php">Mata Kuliah</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi</a>
              <ul class="dropdown-menu">
                <li><a href="input_kota.php"><i class="fa fa-html5 fa-1x"></i>Data Siswa</a></li>
                <li><a href="inputprodgi.php">KRS</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tampil</a>
            <ul class="dropdown-menu">
              <li><a href="soal6/"><i class="fa fa-html5 fa-1x"></i>Soal 6</a></li>
              <li><a href="soal7/">Soal 7</a></li>
              <li><a href="soal8/">Soal 8</a></li>
            </ul>
          </li>
              </ul>
            </div>
          </div>
        </nav>
    <?php
    require_once('config.php');
    $mysqli = openConnection();
    $kodeprogdi = $_GET['kodeprogdi'];
    $sql = "select * from progdi_n10020 where kodeprogdi='$kodeprogdi'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      $kprogdi = $row->kodeprogdi;
      $progdi = $row->progdi;
    }
     ?>

    <div class="container"><div class="container">
      <div class="page-header">
        <h1>Proses Edit Progdi</h1>
      </div>
      <div class="row">
        <div class="col-md-4">

          <form class="form-horizontal" id="formKota" method="post">
            <div class="form-group">
              <label class="control-label col-md-4">Kode Kota:</label>
                <div class="col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control" value="<?php echo $kprogdi;?>" name="kodeprogdi"placeholder="Kode Kota">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4">Kota :</label>
                <div class="col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control has-error" value="<?php echo $progdi;?>" name="progdi" placeholder="Kota:">
                </div>
              </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $kprogdi;?>">
            <div class="form-group">
              <div class="col-md-offset-5">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <!-- <i class="fa fa-refresh fa-3x" aria-hidden="true"></i> -->
          <div class="content" id="kontent">

          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script>
      $(document).ready(function() {
        $('#formKota').submit(function(event){
          $.ajax({
            type : 'POST',
            url : 'updateprogdi.php',
            data : $('#formKota').serialize(),
            dataType : 'html'

          })
          .done(function(data){

            $('#kontent').html(data);
          })
          .fail(function(data){
            console.log(data);
          })
          event.preventDefault();
        })
      })
    </script>
  </body>
</html>
