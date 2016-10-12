<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TAMPIL DATA</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  <style>
 .m-r-1em{ margin-right:1em; }
 .m-b-1em{ margin-bottom:1em !important; }
 .m-l-1em{ margin-left:1em; }
 </style>
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

    <div class="container">

      <div class="page-header">
        <h1>Data KOTA</h1>
      </div>
      <a href="input_kota.php" class='btn btn-warning pull-right m-b-1em'>
             <span class='glyphicon glyphicon-plus'></span>Input Kota
         </a>
      <?php
      require_once('config.php');
      $mysqli = openConnection();
      $query = "select * from kota_15n10020";
      $result = $mysqli->query($query) or die ("Query Salah");

      echo "<table class='table table-hover table-bordered table-responsive'>
        <tr>
          <th>No</th>
          <th>Kode kota</th>
          <th>Kota</th>
          <th>Option</th>
        </tr>";
      if($result){
        $i =0;
        while($row = $result->fetch_object()){
          $i++;
          echo "<tr>
                  <td>$i</td>
                  <td>$row->kodekota</td>
                  <td>$row->kota</td>
                  <td><a href=delete.php?kodekota=$row->kodekota class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>;
                  <a href=edit.php?kodekota=$row->kodekota class='btn btn-info' role='button'>Edit</a>

                </tr>";
        }
      }
       ?>
    </table>
    </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </body>
</html>
