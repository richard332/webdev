<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Input Progdi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
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
                  <li><a href="showkota.php">Kota</a></li>
                  <li><a href="showprogdi.php">Progdi</a></li>
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
      <div class="row">
        <div class="col-md-4">
          <div class="alert alert-danger hide" id="error">

          </div>
          <form class="form-horizontal" id="formProgdi" method="post">
            <div class="form-group">
              <label class="control-label col-md-4">Kode Progdi:</label>
                <div class="col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control" value="" name="kodeprogdi"placeholder="Kode Progdi">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4">Progdi:</label>
                <div class="col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control has-error" value="" name="progdi"placeholder="Program Studi">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-5">
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script>
      $(document).ready(function() {
        $('#formProgdi').submit(function(event){
          $.ajax({
            type : 'POST',
            url : 'prosesprogdi.php',
            data : $('#formProgdi').serialize(),
            dataType : 'json',
            encode : true
          })
          .done(function(data){
            console.log(data);

            if(!data.success){
              if(data.errors.kodeprogdi_exist){
                $('#error').removeClass('hide').html(data.errors.kodeprogdi_exist);
              }
            }
            else{
              $('#error').addClass('show alert-success');
              $('#error').html(data.message);
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
