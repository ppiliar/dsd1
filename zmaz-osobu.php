<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();
//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
 
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");

$pressed = $_POST["pressed"];

$sql = "DELETE FROM osoba WHERE rc='$pressed'";

$result = mysqli_query($con, $sql) or die ("chybny dotaz");
header("Location: index.php?menu=3");
die();
?>
