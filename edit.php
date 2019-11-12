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

$id = $_POST["id"];
$node_id = $_POST["nodeID"];
// z DB z tabulky osoba vyberieme meno,priezvisko,titul,rc
$sql = "SELECT id,meno,priezvisko,titul,rc FROM osoba WHERE id='$id' AND nodeID='$node_id';";

$result = $db->select($sql);
$row = $result[0];
//nac񘑮ie hodn𴠤o pola

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
  <input type='hidden' id='id' name='id' value=".$id.">
  <input type='hidden' id='nodeID' name='nodeID' value=".$node_id.">
  
  <button type='submit'>Ulozit</button>
  
</form>";
?>
</table>


</body>
</html>
