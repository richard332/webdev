<?php
require_once('config.php');
$mysqli = openConnection();

function showTable(){
  $mysqli = openConnection();
  $sql2 = "SELECT * from krs_n10020";
  $result = $mysqli->query($sql2) or die ("Query Salah");
          $mysqli->close();
          echo "<table class='table table-hover table-bordered table-responsive'>
            <tr>
              <th>No</th>
              <th>Tahun</th>
              <th>Semester</th>
              <th>Kode Siswa</th>
              <th>Kode MK</th>
              <th>Option</th>
            </tr>";
          if($result){
            $i =0;
            while($row = $result->fetch_object()){
              $i++;
              echo "<tr>
                      <td>$i</td>
                      <td>$row->tahun</td>
                      <td>$row->smt</td>
                      <td>$row->kodesiswa</td>
                      <td>$row->kodemk</td>
                      <td><a href='#' class='btn btn-danger' role='button'><i class='fa fa-trash' aria-hidden='true'></i></a>;
                      <a href=krs.php?th=$row->tahun&smt=$row->smt&kdw=$row->kodesiswa&kdmk=$row->kodemk class='btn btn-info' role='button'>Edit</a>
                    </tr>";
            }
          }
}

$mysqli = openConnection();
$tahun = $_POST['tahun'];
$smt = $_POST['smt'];
$kodesiswa = $_POST['kodesiswa'];
$kodemk = $_POST['kodemk'];


if(isset($_POST['key'])){
  $key = $_POST['key'];
  $key2 = $_POST['key2'];
  $key = base64_decode($key);
  $key2 = base64_decode($key2);
  $query = "update krs_n10020 set tahun='$tahun', smt='$smt', kodesiswa='$kodesiswa',kodemk='$kodemk' where kodesiswa='$key' and kodemk='$key2' ";
  $mysqli->query($query) or die("QUERY SALAH".$mysqli->error);
  showTable();

}else{
  $sql_check = "SELECT * from krs_n10020 where kodesiswa=? and tahun=? and kodemk=? and smt=?";
  $stmt = $mysqli->prepare($sql_check);
  $stmt->bind_param("ssss",$kodesiswa, $tahun, $kodemk, $smt);
  $stmt->execute();
  $stmt->store_result();
  $baris = $stmt->affected_rows;
  $errors = array();
  $data = array();

  if($baris > 0){
    echo "Data sudah ada";
  }else if($tahun == ""){
    echo "th";
  }
  else if($smt == ""){
    echo "smt";
  }
  else if($kodesiswa == ""){
    echo "kdsw";
  }
  else if($kodemk == ""){
    echo "kdmk";
  }else{
    $sql = "INSERT INTO krs_n10020(tahun, smt, kodesiswa, kodemk)
            VALUES ('$tahun','$smt','$kodesiswa','$kodemk')";
            $mysqli->query($sql) or die("QUERY SALAH".$mysqli->error);
            // echo "Sukses";
            showTable();
          }
    }
$mysqli->close();
 ?>
