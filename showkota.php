<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TAMPIL DATA</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <div class="container-fluid">
      <div class="table-responsive">
      <?php
      require_once('config.php');
      $mysqli = openConnection();
      $query = "select * from kota_15n10020";
      $result = $mysqli->query($query) or die ("Query Salah");
      echo "<table class='table table-hover'>
        <tr>
          <th>No</th>
          <th>Kode kota</th>
          <th>Kota</th>
          <th>Hapus</th>
          <th>Edit</th>
          <th>Input</th>
        </tr>";
      if($result){
        $i =0;
        while($row = $result->fetch_object()){
          $i++;
          echo "<tr>
                  <td>$i</td>
                  <td>$row->kodekota</td>
                  <td>$row->kota</tD>
                  <th><a href=delete.php?kodekota=$row->kodekota class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></th>
                  <th><a href=edit.php?kodekota=$row->kodekota class='btn btn-info' role='button'>Edit</th>
                  <th><a href=input_kota.php class='btn btn-success' role='button'>Input</th>
                </tr>";
        }
      }
       ?>
    </table>
    </div>
    </div>
    <script src="js/jquery.js" charset="utf-8"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
  </body>
</html>
