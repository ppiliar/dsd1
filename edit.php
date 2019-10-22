<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>vyhladaj</title>
        <link href="style.css" rel=stylesheet type=text/css>
</head>
<body>
<p align = "left">

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="700">
<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();
//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");

$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");

$edit = $_POST["edit"];
// z DB z tabulky osoba vyberieme meno,priezvisko,titul,rc
$sql = "select id,meno,priezvisko,titul,rc from osoba WHERE rc='".$edit."' ";

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

$result = mysqli_query($con, $sql) or die ("chybny dotaz");
//nac񘑮ie hodn𴠤o pola
$row = mysqli_fetch_array($result);

$id = $row['id'];
$meno = utf8_encode($row['meno']);
$priezvisko = utf8_encode($row['priezvisko']);
$titul = utf8_encode($row['titul']);
$rc = $row['rc'];

 echo "<form method = 'POST' action = 'index.php?menu=8'>
  meno:<br>
  <input type='text' name='meno' value='$meno'>
  <br>
  priezvisko:<br>
  <input type='text' name='priezvisko' value='$priezvisko'>
  <br>
  titul:<br>
  <input type='text' name='titul' value='$titul'>
  <br>
  rodné číslo:<br>
  <input type='text' name='rc' value='$rc'>
  <br>
  
  <button type='submit' name='edit' value='$id'>Ulozit</button>
  
</form>";
?>
</table>


</body>
</html>
