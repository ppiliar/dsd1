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
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
//otestujeme ci ma pouzivatel priradene userid pomocou funkcie isset()
//ak ano tak ho privitame v systeme
if( isset($_SESSION['username']) ) {
echo '<center>Vitajte v systéme ' . $_SESSION['username'] . 
     '!</center>';
}
//inak mu zobrazime chybove hlasenie
else {
echo '<center>Prepáčte, ale na prácu so systémom nemáte 
      oprávnenie!!!</center>';
}

$sql = "select meno,priezvisko,titul,rc from osoba ";

$result = mysqli_query($con,$sql) or die ("chybny dotaz");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
			$meno = $row['meno'];
			$priezvisko = $row['priezvisko'];
			$titul = $row['titul'];
      $rc = $row['rc'];


echo "<tr>
    <td width='49'bgcolor='#FFaaCC' height='52'></td>
    <td width='184'bgcolor='#FFaaCC' height='52'><b> ".$titul."</b></td>
    <td width='240'bgcolor='#FFaaCC' height='52'></td>
    <td width='247'bgcolor='#FFaaCC' height='52'></td>
    <td width='6'bgcolor='#FFaaCC' height='52'></td>
  </tr>
  <tr>
    <td width='49'bgcolor='#FFFFCC' height='52'></td>
    <td width='184'colspan='2'bgcolor='#FFFFCC' height='52'>meno<b> ".$meno."</b></td>
    <td width='240'bgcolor='#FFFFCC' height='52'>priezvisko <b>".$priezvisko." </b></td>
    <td width='247'bgcolor='#FFFFCC' height='52'>rodné číslo <b>".$rc."</b></td>
    <td width='6'colspan='2'bgcolor='#FFFFCC' height='52'></td>
  </tr>";
  }
?>
</table>


</body>
</html>
