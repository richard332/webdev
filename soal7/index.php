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

  function showTable(){
    $mysqli = openConnection();
    $sql = "SELECT datasiswa_n10020.kodesiswa, datasiswa_n10020.nama, datasiswa_n10020.alamat, kota_15n10020.kota, progdi_n10020.progdi
    FROM datasiswa_n10020, kota_15n10020, progdi_n10020
    WHERE kota_15n10020.kodekota=datasiswa_n10020.kodekota
    AND progdi_n10020.kodeprogdi=datasiswa_n10020.kodeprogdi";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
    echo "
          <tr>
          <td>$row->kodesiswa</td>
          <td>$row->nama</td>
          <td>$row->alamat</td>
          <td>$row->kota</td>
          <td>$row->progdi</td></tr>
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
