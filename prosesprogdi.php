<?php
require_once('config.php');
$mysqli = openConnection();
$kodeprogdi = $_POST['kodeprogdi'];
$progdi = $_POST['progdi'];
$sql = "select progdi_n10020.kodeprogdi from progdi_n10020 where kodeprogdi=?";
$stmt = $mysqli->prepare("$sql");
$stmt->bind_param("s",$kodeprogdi);
$stmt->execute();
$stmt->store_result();
$baris = $stmt->num_rows;

$errors = array();
$data = array();

if($baris > 0){
  $errors['kodeprogdi_exist'] = "Kode Progdi sudah terpakai";
}
if($kodeprogdi == ""){
  $errors['empty'] = "Kode Progdi Kosong";
}
if($progdi == ""){
  $errors['progdi_empty'] = "Progdi Kosong";
}

if(!empty($errors)){
  $data['success'] = false;
  $data['errors'] = $errors;
}else{
  $kodeprogdi = $_POST['kodeprogdi'];
  $progdi = $_POST['progdi'];
  $sql = "insert into progdi_n10020(kodeprogdi, progdi) values ('$kodeprogdi','$progdi')";
  $mysqli->query($sql) or die("QUERY SALAH");
  $mysqli->close();
  $data['success'] = true;
  $data['message'] = 'Data telah terinput!';
}
echo json_encode($data);
 ?>
