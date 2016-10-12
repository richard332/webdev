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
            <li><a href="../soal8/">Soal 8</a></li>
          </ul>
        </li>
            </ul>
          </div>
        </div>
      </nav>

  <div class="container">
    <div class="page-header">
      <h1>SOAL 8</h1>
    </div>
    <table class="table table-bordered table-responsive table-hover">
      <tr><th>Kode Siswa</th>
      <th>Nama</th>
      <th>Tahun</th>
      <th>Semester</th>
      <th>Kode MK</th>
      <th>Nama MK</th></tr>

  <?php
  require_once('../config.php');

  function getKodeSiswa($val){
    $mysqli = openConnection();
    $sql = "SELECT * FROM datasiswa_n10020 where kodesiswa='$val'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      if($val === $row->kodesiswa){
        $hasil = $row->kodesiswa;
        return $hasil;
      }
    }
  }
  function getNama($val){
    $mysqli = openConnection();
    $sql = "SELECT * FROM datasiswa_n10020 where nama='$val'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      if($val === $row->nama){
        $hasil = $row->nama;
        return $hasil;
      }
    }
  }
  function getTahun($val){
    $mysqli = openConnection();
    $sql = "SELECT * FROM krs_n10020 where tahun='$val'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      if($val === $row->tahun){
        $hasil = $row->tahun;
        return $hasil;
      }
    }
  }
  function getSmt($val){
    $mysqli = openConnection();
    $sql = "SELECT * FROM krs_n10020 where smt='$val'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      if($val === $row->smt){
        $hasil = $row->smt;
        return $hasil;
      }
    }
  }
  function getKodeMK($val){
    $mysqli = openConnection();
    $sql = "SELECT * FROM matakuliah_n10020 where kodemk='$val'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      if($val === $row->kodemk){
        $hasil = $row->kodemk;
        return $hasil;
      }
    }
  }
  function getNamaMK($val){
    $mysqli = openConnection();
    $sql = "SELECT * FROM matakuliah_n10020 where namamk='$val'";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      if($val === $row->namamk){
        $hasil = $row->namamk;
        return $hasil;
      }
    }
  }

  function showTable(){
    $mysqli = openConnection();
    $sql = "SELECT datasiswa_n10020.kodesiswa, datasiswa_n10020.nama, krs_n10020.tahun, krs_n10020.smt,matakuliah_n10020.kodemk, matakuliah_n10020.namamk
    FROM datasiswa_n10020, krs_n10020, matakuliah_n10020
    WHERE datasiswa_n10020.kodesiswa=krs_n10020.kodesiswa
    AND matakuliah_n10020.kodemk=krs_n10020.kodemk ";

    $result = $mysqli->query($sql);
    while($row = $result->fetch_object()){
      $kodesiswa = getKodeSiswa($row->kodesiswa);
      $nama = getNama($row->nama);
      $tahun = getTahun($row->tahun);
      $smt = getSmt($row->smt);
      $kdmk = getKodeMK($row->kodemk);
      $mk = getNamaMK($row->namamk);
    echo "
          <tr>
          <td>$kodesiswa</td>
          <td>$nama</td>
          <td>$tahun</td>
          <td>$smt</td>
          <td>$kdmk</td>
          <td>$mk</td></tr>
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
