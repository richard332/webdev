<?php
require_once('config.php');
$mysqli = openConnection();
$id = $_GET['kodesiswa'];
$query = "DELETE from datasiswa_n10020 where kodesiswa='$id'";
if($mysqli->query($query)){
  echo "Sukses";
  header('Location: datasiswa.php');
}else{
  echo "Gagal".$mysqli->error;
}
$mysqli->close();
 ?>
