<?php
require_once('config.php');
$mysqli = openConnection();
$id = $_GET['kdmk'];
$query = "delete from matakuliah_n10020 where kodemk = '$id'";
if($mysqli->query($query)){
  echo "Sukses";
  header('Location: input_makul.php');
}else{
  echo "Gagal".$mysqli->error;
}
$mysqli->close();
 ?>
