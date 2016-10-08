<?php
function openConnection(){
  $dbhost = "localhost";
  $username = "root";
  $pass = "";
  $dbname = "15n10020";
  $mysqli = new mysqli($dbhost, $username, $pass, $dbname);
  if($mysqli->connect_errno)
  {
    echo "Failed to connect to MySQL (".$mysqli->connect_errno .")".$mysqli->connect_error;
  }
  else {
    //echo "SUKSES KONEK";
    $mysqli->select_db($dbname);
    return $mysqli;
  }
}
 ?>
