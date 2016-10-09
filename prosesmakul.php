<?php
require_once('config.php');
$mysqli = openConnection();


$errors = array();
$data = array();

//Untuk Update
if( isset($_POST['update'])){
  $kod = $_POST['update'];
  $kkmk=$_POST['kdmk'];
  $mk = $_POST['makul'];
  $sql = "update matakuliah_n10020 set kodemk='$kkmk', namamk='$mk' where kodemk='$kod'";
  $mysqli->query($sql) or die("QUERY SALAH".$mysqli->error);


  $data['success'] = true;
  $data['message'] = 'Data telah terinput!';

  $query3 = "select * from matakuliah_n10020";
  $result = $mysqli->query($query3);
  $hh = $result->num_rows;


  $query2 = "select * from matakuliah_n10020 where kodemk='$kkmk'";
  $result = $mysqli->query($query2) or die ("Query Salah".$mysqli->error);

  if($result){
    $i =0;
    $table = array();
    while($row = $result->fetch_object()){
      $i++;
      $table['kdmk']=$row->kodemk;
      $table['kdmakul']=$row->namamk;
    }
    $table['update'] = true;
    $table['hasilbaris'] = $hh;
    $data['hasil'] = $table;
  }

}else{
  $kmakul = $_POST['kdmk'];
  $makul = $_POST['makul'];
  $sql = "select matakuliah_n10020.kodemk from matakuliah_n10020 where kodemk=?";
  $stmt = $mysqli->prepare("$sql");
  $stmt->bind_param("s",$kmakul);
  $stmt->execute();
  $stmt->store_result();
  $baris = $stmt->num_rows;

  if($baris > 0){
    $errors['kodemakul_exist'] = "Kode Makul sudah terpakai";
  }
  if($kmakul == ""){
    $errors['kodemakul_empty'] = "Kode Makul Kosong";
  }
  if($makul == ""){
    $errors['makul_empty'] = "Makul Kosong";
  }
  if(!empty($errors)){
    $data['success'] = false;
    $data['errors'] = $errors;
  }else{
    //Tidak ada Error lanjut ke sini
    $kmakul = $_POST['kdmk'];
    $makul = $_POST['makul'];
    $query = "insert into matakuliah_n10020(kodemk, namamk) values ('$kmakul', '$makul')";
    $mysqli->query($query) or die("QUERY SALAH".$mysqli->error);

    $data['success'] = true;
    $data['message'] = 'Data telah terinput!';

    $query3 = "select * from matakuliah_n10020";
    $result = $mysqli->query($query3);
    $hh = $result->num_rows;


    $query2 = "select * from matakuliah_n10020 where kodemk='$kmakul'";
    $result = $mysqli->query($query2) or die ("Query Salah".$mysqli->error);

    if($result){
      $i =0;
      $table = array();
      while($row = $result->fetch_object()){
        $i++;
        $table['kdmk']=$row->kodemk;
        $table['kdmakul']=$row->namamk;
      }
      $table['hasilbaris'] = $hh;
      $data['hasil'] = $table;
    }
  }
}

$mysqli->close();
echo json_encode($data);
 ?>
