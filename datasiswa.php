<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Input Kota</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <?php
    require_once('config.php');
    if(isset($_GET['kodesiswa'])){
      $mysqli = openConnection();
      $patokan = $_GET['kodesiswa'];
      $sql = "select * from datasiswa_n10020 where kodesiswa='$patokan'";
      $result = $mysqli->query($sql);
      $status = "2";
      while($row = $result->fetch_object()){
        $kodesiswa = $row->kodesiswa;
        $nama = $row->nama;
        $alamat = $row->alamat;
        $alamat = $row->alamat;
        $kodekota = $row->kodekota;
        $kodeprogdi = $row->kodeprogdi;
      }
    }else{
      $status = "1";
      $kodesiswa = null;
      $nama = null;
      $alamat = null;
      $kodekota = null;
      $kodeprogdi = null;
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
            <h1>Proses Input Data Siswa</h1>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="alert alert-danger hide" id="error">

              </div>
              <form class="form-horizontal" id="formKota" method="post">
                <div class="form-group">
                  <label class="control-label col-md-4">Kode Siswa:</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo $kodesiswa;?>" name="kodesiswa"placeholder="Kode Siswa">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Nama :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="<?php echo $nama; ?>" name="namasiswa" placeholder="Nama">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Alamat :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="<?php echo $alamat; ?>" name="alamat" placeholder="alamat">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Kode Kota :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <select class="form-control" name="kodekota">
                        <option selected="" value="">Pilih</option>
                        <?php
                        require_once('config.php');
                        $mysqli = openConnection();
                        $sql = "SELECT * from kota_15n10020";
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_object()){
                          if($kodekota==$row->kodekota){
                            echo "<option value='$row->kodekota' selected>$row->kota</option>";
                          }else{
                            echo "<option value='$row->kodekota'>$row->kota</option>";
                          }
                        }
                        $mysqli->close();
                         ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Kode Progdi :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <select class="form-control" name="kodeprogdi">
                        <option selected="" value="">Pilih</option>
                        <?php
                        // require_once('config.php');
                        $mysqli = openConnection();
                        $sql = "SELECT * from progdi_n10020";
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_object()){
                          if($kodeprogdi==$row->kodeprogdi){
                            echo "<option value='$row->kodeprogdi' selected>$row->progdi</option>";
                          }else{
                            echo "<option value='$row->kodeprogdi'>$row->progdi</option>";
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
                        echo "<input type='hidden' name='key' value='$kodesiswa'>";
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
                $sql2 = "SELECT * from datasiswa_n10020";
                $result = $mysqli->query($sql2) or die ("Query Salah");
                        $mysqli->close();
                        echo "<table class='table table-hover table-bordered table-responsive'>
                          <tr>
                            <th>No</th>
                            <th>Kode Siswa</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode Kota</th>
                            <th>Kode Progdi</th>
                            <th>Option</th>
                          </tr>";
                        if($result){
                          $i =0;
                          while($row = $result->fetch_object()){
                            $i++;
                            echo "<tr>
                                    <td>$i</td>
                                    <td>$row->kodesiswa</td>
                                    <td>$row->nama</td>
                                    <td>$row->alamat</td>
                                    <td>$row->kodekota</td>
                                    <td>$row->kodeprogdi</td>
                                    <td><a href=deletesiswa.php?kodesiswa=$row->kodesiswa class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>
                                    <a href=datasiswa.php?kodesiswa=$row->kodesiswa class='btn btn-info' role='button'>Edit</a>

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
                url : 'pros_daswa.php',
                data : $('#formKota').serialize(),
                dataType : 'html'

              })
              .done(function(data){
                console.log(data);

                if(data=="kodesiswa tidak boleh kosong"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
                }
                else if(data=="nama tidak boleh kosong"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
                }
                else if(data=="Data sudah ada"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
                }
                else if(data=="alamat tidak boleh kosong"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
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
