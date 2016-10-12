<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Input KRS</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php
    require_once('config.php');
    if(isset($_GET['th']) && isset($_GET['smt']) && isset($_GET['kdw']) && isset($_GET['kdmk'])){
      $mysqli = openConnection();
      $patokan = $_GET['th'];
      $smt = $_GET['smt'];
      $kdw = $_GET['kdw'];
      $kdmk = $_GET['kdmk'];
      $sql = "select * from krs_n10020 where tahun='$patokan' and smt='$smt' and kodesiswa='$kdw' and kodemk='$kdmk'";
      $result = $mysqli->query($sql);
      $status = "2";
      while($row = $result->fetch_object()){
        $th = $row->tahun;
        $smt = $row->smt;
        $kdsw = $row->kodesiswa;
        $kdmk = $row->kodemk;
      }
    }else{
      $status = "1";
      $th = null;
      $kdsw = null;
      $smt = null;
      $kdmk = null;
    }
     ?>
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
                  <li><a href="showkota.php">Kota</a></li>
                  <li><a href="showprogdi.php">Progdi</a></li>
                  <li><a href="input_makul.php">Mata Kuliah</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi</a>
              <ul class="dropdown-menu">
                <li><a href="datasiswa.php"><i class="fa fa-html5 fa-1x"></i>Data Siswa</a></li>
                <li><a href="krs.php">KRS</a></li>
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

        <div class="container">
          <div class="page-header">
            <h1>Proses Input Data KRS</h1>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="alert alert-danger hide" id="error">

              </div>
              <form class="form-horizontal" id="formKota" method="post">
                <div class="form-group">
                  <label class="control-label col-md-4">Tahun:</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control date-picker-year" value="<?php echo $th;?>" name="tahun" placeholder="Tahun">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Semester :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo $smt;?>" name="smt" placeholder="Semester">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Kode Siswa :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="<?php echo $kdsw;?>" name="kodesiswa" placeholder="Kode Siswa">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Kode MK :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <select class="form-control" name="kodemk">
                        <option selected="" value="">Pilih</option>
                        <?php
                        require_once('config.php');
                        $mysqli = openConnection();
                        $sql = "SELECT * from matakuliah_n10020";
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_object()){
                          if($kdmk==$row->kodemk){
                            echo "<option value='$row->kodemk' selected>$row->kodemk</option>";
                          }else{
                            echo "<option value='$row->kodemk'>$row->kodemk</option>";
                          }
                        }
                        $mysqli->close();
                         ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-offset-5">
                    <?php
                      if($status=="1"){
                        echo "<button type='submit' class='btn btn-success'>Add</button>";
                      }else{
                        $kdsw =base64_encode($kdsw);
                        $kdmk = base64_encode($kdmk);
                        echo "<input type='hidden' name='key' value='$kdsw'>";
                        echo "<input type='hidden' name='key2' value='$kdmk'>";
                        echo "<button type='submit' class='btn btn-success'>Update</button>";
                      }
                     ?>

                  </div>
                </div>
              </form>
            </div> <!--akhir kolom 4-->

            <div class="col-md-8" id="hasil">
              <?php
                require_once('config.php');
                $mysqli = openConnection();
                $sql2 = "SELECT * from krs_n10020";
                $result = $mysqli->query($sql2) or die ("Query Salah");
                        $mysqli->close();
                        echo "<table class='table table-hover table-bordered table-responsive'>
                          <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Semester</th>
                            <th>Kode Siswa</th>
                            <th>Kode MK</th>
                            <th>Option</th>
                          </tr>";
                        if($result){
                          $i =0;
                          while($row = $result->fetch_object()){
                            $i++;
                            echo "<tr>
                                    <td>$i</td>
                                    <td>$row->tahun</td>
                                    <td>$row->smt</td>
                                    <td>$row->kodesiswa</td>
                                    <td>$row->kodemk</td>
                                    <td><a href='#' class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>
                                    <a href=krs.php?th=$row->tahun&smt=$row->smt&kdw=$row->kodesiswa&kdmk=$row->kodemk class='btn btn-info' role='button'>Edit</a>

                                  </tr>";
                          }
                        }
               ?>
            </div>
          </div>
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script>
          $(document).ready(function() {
            $('#error').removeClass('alert danger').removeClass('alert-success');

            $('#formKota').submit(function(event){
              $.ajax({
                type : 'POST',
                url : 'pros_krs.php',
                data : $('#formKota').serialize(),
                dataType : 'html'

              })
              .done(function(data){
                console.log(data);

                if(data=="th"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html("Tahun kosong");
                }
                else if(data=="smt"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html("Semester Kosong");
                }
                else if(data=="kdsw"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html("KDSW Kkosong");
                }
                else if(data=="kdmk"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html("KDMK Kosong");
                }
                else if(data=="2"){
                  $('#error').removeClass('hide').addClass('alert alert-danger').html("Kode Kota Tidak Boleh Kosong");
                }
                else if(data=="3"){
                  $('#error').removeClass('hide').addClass('alert alert-danger').html("Kode Progdi tidak boleh kosong");
                }
                else{
                  $('#error').removeClass('alert-danger').addClass('show alert alert-success');
                  $('#error').html("Selamat Ya..!");
                  $('#hasil').html(data);
                }
              })

              .fail(function(data){
                console.log(data);
              });
              event.preventDefault();
            })
          })
        </script>
  </body>
</html>
