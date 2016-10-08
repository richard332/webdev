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
                  <li><a href="input_kota.php">Input Kota</a></li>
                  <li><a href="inputprodgi.php">Input Progdi</a></li>
                  <li><a href="#">Mata Kuliah</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi</a>
              <ul class="dropdown-menu">
                <li><a href="input_kota.php"><i class="fa fa-html5 fa-1x"></i>Data Siswa</a></li>
                <li><a href="inputprodgi.php">KRS</a></li>
              </ul>
            </li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <form class="form-horizontal" action="proseskota.php" method="post">
                <div class="form-group">
                  <label class="control-label col-md-4">Kode Kota:</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control" value="" name="kodekota"placeholder="Kode Kota">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Kota :</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="text" class="form-control has-error" value="" name="kota" placeholder="Kota:">
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

  </body>
</html>
