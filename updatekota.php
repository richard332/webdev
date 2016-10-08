<?php
require_once('config.php');
$mysqli = openConnection();
$kodekota = $_POST['kodekota'];
$kota = $_POST['kota'];
$id = $_POST['id'];
$sql = "update kota_15n10020 set kodekota='$kodekota', kota='$kota' where kodekota='$id'";
if($mysqli->query($sql)){
  echo "Kota Sudah Terupdate";
}else{
  echo "GAGAL UPDATE BOS<br>";
  echo $mysqli->error;
}
$mysqli->close();
 ?>
