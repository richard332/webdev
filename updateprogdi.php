<?php
require_once('config.php');
$mysqli = openConnection();
$kodeprogdi = $_POST['kodeprogdi'];
$progdi = $_POST['progdi'];
$id = $_POST['id'];
$sql = "update progdi_n10020 set kodeprogdi='$kodeprogdi', progdi='$progdi' where kodeprogdi='$id'";
if($mysqli->query($sql)){
  $query = "select * from progdi_n10020";
  $result = $mysqli->query($query) or die ("Query Salah");
  echo "<h1>Hasil Update</h1>";
  echo "<table class='table table-hover table-bordered table-responsive'>
    <tr>
      <th>No</th>
      <th>Kode Progdi</th>
      <th>Program Studi</th>
    </tr>";
  if($result){
    $i =0;
    while($row = $result->fetch_object()){
      $i++;
      echo "<tr>
              <td>$i</td>
              <td>$row->kodeprogdi</td>
              <td>$row->progdi</td>
            </tr>";
    }
  }
}else{
  echo "GAGAL UPDATE BOS<br>";
  echo $mysqli->error;
}
$mysqli->close();
 ?>
