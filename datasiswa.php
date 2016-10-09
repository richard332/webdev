<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Input Kota</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css" media="screen" title="no title" charset="utf-8">
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
                <li><a href="datasiswa.php"><i class="fa fa-html5 fa-1x"></i>Data Siswa</a></li>
                <li><a href="#">KRS</a></li>
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
                      <input type="text" class="form-control" value="" name="kodesiswa"placeholder="Kode Siswa">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Nama :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="" name="namasiswa" placeholder="Nama">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Alamat :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="" name="alamat" placeholder="alamat">
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
                          echo "<option value='$row->kodekota'>$row->kodekota</option>";
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
                          echo "<option value='$row->kodeprogdi'>$row->kodeprogdi</option>";
                        }
                        $mysqli->close();
                         ?>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-md-offset-5">
                    <button type="submit" class="btn btn-success">Add</button>
                  </div>
                </div>
              </form>
            </div> <!--akhir kolom 4-->

            <div class="col-md-8" id="hasil">

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
                if(data=="nama tidak boleh kosong"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
                }
                if(data=="Data sudah ada"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
                }
                if(data=="alamat tidak boleh kosong"){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data);
                }
                else{
                  $('#error').removeClass('alert-danger').addClass('show alert alert-success');
                  // $('#error').html(data);
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
