<?php
require_once('config.php');
$mysqli = openConnection();
$id = $_GET['kodeprogdi'];
$query = "DELETE from progdi_n10020 where kodeprogdi='$id'";
if($mysqli->query($query)){
  echo "Sukses";
  header('Location: showprogdi.php');
}else{
  echo "Gagal".$mysqli->error;
}
$mysqli->close();
 ?>
