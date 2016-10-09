<?php
require_once('config.php');
$mysqli = openConnection();
$kodesiswa = $_POST['kodesiswa'];
$nama = $_POST['namasiswa'];
$alamat = $_POST['alamat'];
$kodekota = $_POST['kodekota'];
$kodeprogdi = $_POST['kodeprogdi'];
$sql_check = "SELECT datasiswa_n10020.kodesiswa from datasiswa_n10020 where kodesiswa=?";
$stmt = $mysqli->prepare($sql_check);
$stmt->bind_param("s",$kodesiswa);
$stmt->execute();
$stmt->store_result();
$baris = $stmt->num_rows;

$errors = array();
$data = array();

if($baris > 0){
  echo "Data sudah ada";
}
else if($kodesiswa == ""){
  echo "kodesiswa tidak boleh kosong";
}
else if($nama == ""){
  echo "nama tidak boleh kosong";
}
else if($alamat == ""){
  echo "alamat tidak boleh kosong";
}else{
  $sql = "INSERT INTO datasiswa_n10020(kodesiswa, nama, alamat, kodekota, kodeprogdi)
          VALUES ('$kodesiswa','$nama','$alamat','$kodekota','$kodeprogdi')";
          $mysqli->query($sql) or die("QUERY SALAH".$mysqli->error);
          // echo "Sukses";
  $sql2 = "SELECT * from datasiswa_n10020";
  $result = $mysqli->query($sql2) or die ("Query Salah");
          $mysqli->close();
          echo "<table class='table table-hover table-bordered table-responsive'>
            <tr>
              <th>No</th>
              <th>Kode Siswa</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Kode Kota</th>
              <th>Kode Progdi</th>
              <th>Option</th>
            </tr>";
          if($result){
            $i =0;
            while($row = $result->fetch_object()){
              $i++;
              echo "<tr>
                      <td>$i</td>
                      <td>$row->kodesiswa</td>
                      <td>$row->nama</td>
                      <td>$row->alamat</td>
                      <td>$row->kodekota</td>
                      <td>$row->kodeprogdi</td>
                      <td><a href=delete.php?kodekota=$row->kodesiswa class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>;
                      <a href=edit.php?kodekota=$row->kodesiswa class='btn btn-info' role='button'>Edit</a>

                    </tr>";
            }
          }
}

 ?>
