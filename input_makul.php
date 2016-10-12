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
    $kdmk = isset($_GET['kdmk']);
    if(!empty($kdmk)){
      $mysqli = openConnection();
      $kdmk = $_GET['kdmk'];
      $status = "2";
      $sql = "select * from matakuliah_n10020 where kodemk='$kdmk'";
      $result = $mysqli->query($sql);
      while($row = $result->fetch_object()){
        $kkmk = $row->kodemk;
        $makul = $row->namamk;
      }

    }
    else{
      $status = "1";
      $kkmk = null;
      $makul = null;
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
            <h1>Proses Input Mata Kuliah</h1>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="alert alert-danger hide" id="error">

              </div>
              <form class="form-horizontal" id="formKota" method="post">
                <div class="form-group">
                  <label class="control-label col-md-4">Kode Makul:</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control" value="<?php echo $kkmk;?>" name="kdmk"placeholder="Kode Makul">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Mata Kuliah :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="<?php echo $makul;?>" name="makul" placeholder="Mata Kuliah">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-offset-5">
                    <?php
                    if($status === "1"){
                      echo "<button type='submit' class='btn btn-success'>Add</button>";
                    }
                    else{
                      echo "<input type='hidden' name='update' value='$kdmk'>";
                      echo "<button type='submit' class='btn btn-success'>Update</button>";
                    }
                     ?>
                    <!-- <button type="submit" class="btn btn-success">Add</button> -->
                  </div>
                </div>
              </form>
            </div> <!--Akhir Dari 4 kolom-->

            <div class="col-md-8">
              <table class='table table-hover table-bordered table-responsive' id='showMakul'>
              <?php
              require_once('config.php');
              $mysqli = openConnection();
              $query = "select * from matakuliah_n10020";
              $result = $mysqli->query($query) or die ("Query Salah");

              echo "
                <tr>
                  <th>No</th>
                  <th>Kode MK</th>
                  <th>Mata Kuliah</th>
                  <th>Option</th>
                </tr>";
              if($result){
                $i =0;
                while($row = $result->fetch_object()){
                  $i++;
                  echo "<tr>
                          <td>$i</td>
                          <td>$row->kodemk</td>
                          <td>$row->namamk</td>
                          <td><a href=deletemakul.php?kdmk=$row->kodemk class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>;
                          <a href=input_makul.php?kdmk=$row->kodemk class='btn btn-info' role='button'>Edit</a></td>
                        </tr>";
                }
                echo "</table>";
              }
               ?>
            </div><!--akhir dari 8 Kolom-->


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
                url : 'prosesmakul.php',
                data : $('#formKota').serialize(),
                dataType : 'json',
                encode : true
              })
              .done(function(data){
                console.log(data);

                if(!data.success){
                  if(data.errors.kodemakul_exist){
                    $('#error').removeClass('hide').addClass('alert alert-danger').html(data.errors.kodemakul_exist);
                  }
                }
                else{
                  if(data.hasil.update){
                    console.log(data.hasil.hasilbaris);
                    $('#error').removeClass('alert-danger').addClass('show alert alert-success');
                    $('#error').html(data.message);
                    var h = "<tr><td>"+data.hasil.hasilbaris+"</td><td>"+data.hasil.kdmk+"</td><td>"+data.hasil.kdmakul+"</td><td><a href=deletemakul.php?kdmk="+data.hasil.kdmk+" class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>"+' '+"<a href=input_makul.php?kdmk="+data.hasil.kdmk+" class='btn btn-info' role='button'>Edit</a></td></tr>"

                    $('#showMakul').append(h);
                    window.location = 'input_makul.php'; // redirect a user to another page
                  }
                  console.log(data.hasil.hasilbaris);
                  $('#error').removeClass('alert-danger').addClass('show alert alert-success');
                  $('#error').html(data.message);
                  var h = "<tr><td>"+data.hasil.hasilbaris+"</td><td>"+data.hasil.kdmk+"</td><td>"+data.hasil.kdmakul+"</td><td><a href=deletemakul.php?kdmk="+data.hasil.kdmk+" class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>"+' '+"<a href=input_makul.php?kdmk="+data.hasil.kdmk+" class='btn btn-info' role='button'>Edit</a></td></tr>"

                  $('#showMakul').append(h);

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
