<?php
require_once('config.php');
$mysqli = openConnection();
$kodekota = $_POST['kodekota'];
$kota = $_POST['kota'];
$query = "insert into kota_15n10020(kodekota, kota) values ('$kodekota', '$kota')";
if($mysqli->query($query)){
  echo "sukses";
}
else{
  echo "gagal".$mysqli->error;
}
$mysqli->close();
 ?>
