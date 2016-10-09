<?php
require_once('config.php');
$mysqli = openConnection();
$id = $_GET['kodekota'];
$query = "delete from kota_15n10020 where kodekota = $id";
if($mysqli->query($query)){
  echo "Sukses";
  header('Location: showkota.php');
}else{
  echo "Gagal";
}
$mysqli->close();
 ?>
