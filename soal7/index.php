<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../css/main.css" media="screen" title="no title" charset="utf-8">
    <title>Admin by stelin</title>
  </head>
  <body>
  <!--Navigasi-->
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
              <li><a href="../">HOME</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data utama</a>
              <ul class="dropdown-menu">
                <li><a href="../showkota.php">Kota</a></li>
                <li><a href="../showprogdi.php">Progdi</a></li>
                <li><a href="../input_makul.php">Mata Kuliah</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi</a>
            <ul class="dropdown-menu">
              <li><a href="../datasiswa.php"><i class="fa fa-html5 fa-1x"></i>Data Siswa</a></li>
              <li><a href="../krs.php">KRS</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tampil Data</a>
          <ul class="dropdown-menu">
            <li><a href="../soal6/"><i class="fa fa-html5 fa-1x"></i>Soal 6</a></li>
            <li><a href="../soal7/">Soal 7</a></li>
            <li><a href="#">Soal 8</a></li>
          </ul>
        </li>
            </ul>
          </div>
        </div>
      </nav>

  <div class="container">
    <div class="page-header">
      <h1>SOAL 7</h1>
    </div>
    <table class="table table-bordered table-responsive table-hover">
      <tr><th>Kode Siswa</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>kota</th>
      <th>Progdi</th></tr>

  <?php
  require_once('../config.php');


function getKodesiswa($kdsw_val){
  $mysqli = openConnection();
  $sql = "SELECT * FROM datasiswa_n10020 where kodesiswa='$kdsw_val'";
  $result = $mysqli->query($sql);
  while($row = $result->fetch_object()){
    if($kdsw_val === $row->kodesiswa){
      $hasil = $row->kodesiswa;
      return $hasil;
    }
  }
}
function getNama($kdsw_val){
  $mysqli = openConnection();
  $sql = "SELECT * FROM datasiswa_n10020 where nama='$kdsw_val'";
  $result = $mysqli->query($sql);
  while($row = $result->fetch_object()){
    if($kdsw_val === $row->nama){
      $hasil = $row->nama;
      return $hasil;
    }
  }
}

function getAlamat($kdsw_val){
  $mysqli = openConnection();
  $sql = "SELECT * FROM datasiswa_n10020 where alamat='$kdsw_val'";
  $result = $mysqli->query($sql);
  while($row = $result->fetch_object()){
    if($kdsw_val === $row->alamat){
      $hasil = $row->alamat;
      return $hasil;
    }
  }
}

function getProgdi($kdsw_val){
  $mysqli = openConnection();
  $sql = "SELECT * FROM progdi_n10020 where progdi='$kdsw_val'";
  $result = $mysqli->query($sql);
  while($row = $result->fetch_object()){
    if($kdsw_val === $row->progdi){
      $hasil = $row->progdi;
      return $hasil;
    }
  }
}

function getKota($kdsw_val){
  $mysqli = openConnection();
  $sql = "SELECT * FROM kota_15n10020 where kota='$kdsw_val'";
  $result = $mysqli->query($sql);
  while($row = $result->fetch_object()){
    if($kdsw_val === $row->kota){
      $hasil = $row->kota;
      return $hasil;
    }
  }
}


  function showTable(){
    $mysqli = openConnection();
    $sql = "SELECT datasiswa_n10020.kodesiswa, datasiswa_n10020.nama, datasiswa_n10020.alamat, kota_15n10020.kota, progdi_n10020.progdi
    FROM datasiswa_n10020, kota_15n10020, progdi_n10020
    WHERE kota_15n10020.kodekota=datasiswa_n10020.kodekota
    AND progdi_n10020.kodeprogdi=datasiswa_n10020.kodeprogdi";

    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
    $kodecinta_siswa = getKodesiswa($row->kodesiswa);
    $kodecinta_nama = getNama($row->nama);
    $kodecinta_alamat = getAlamat($row->alamat);
    $kodecinta_kota = getKota($row->kota);
    $kodecinta_progdi = getProgdi($row->progdi);
    echo "
          <tr>
          <td>$kodecinta_siswa</td>
          <td>$kodecinta_nama</td>
          <td>$kodecinta_alamat</td>
          <td>$kodecinta_kota</td>
          <td>$kodecinta_progdi</td></tr>
        ";
      }
    }
  showTable();
   ?>
 </table>
 </div>
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  </body>
</html>
