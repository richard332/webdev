<?php
require_once('config.php');
$mysqli = openConnection();
$kodekota = $_POST['kodekota'];
$kota = $_POST['kota'];
$sql = "select kota_15n10020.kodekota from kota_15n10020 where kodekota=?";
$stmt = $mysqli->prepare("$sql");
$stmt->bind_param("s",$kodekota);
$stmt->execute();
$stmt->store_result();
$baris = $stmt->num_rows;

$errors = array();
$data = array();

if($baris > 0){
  $errors['kodekota_exist'] = "Kode Kota sudah terpakai";
}
if($kodekota == ""){
  $errors['kodeprogdi_empty'] = "Kode Progdi Kosong";
}
if($kota == ""){
  $errors['progdi_empty'] = "Progdi Kosong";
}

if(!empty($errors)){
  $data['success'] = false;
  $data['errors'] = $errors;
}else{
  $kodekota = $_POST['kodekota'];
  $kota = $_POST['kota'];
  $query = "insert into kota_15n10020(kodekota, kota) values ('$kodekota', '$kota')";
  $mysqli->query($query) or die("QUERY SALAH".$mysqli->error);
  $mysqli->close();
  $data['success'] = true;
  $data['message'] = 'Data telah terinput!';
}
echo json_encode($data);
 ?>
