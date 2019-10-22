<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();
//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");

$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");

$meno = $_POST["meno"];
$priezvisko = $_POST["priezvisko"];
$titul = $_POST["titul"];
$rc = $_POST["rc"];
$id = $_POST["edit"];


function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

console_log($meno);
console_log($priezvisko);
console_log($titul);
console_log($rc);
console_log($id);
$sql = "UPDATE osoba SET meno='$meno',priezvisko='$priezvisko',titul='$titul',rc='$rc' WHERE id='$id'";

$result = mysqli_query($con, $sql) or die ("chybny dotaz");

header("Location: index.php?menu=3");
die();
?>
