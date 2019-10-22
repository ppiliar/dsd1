<?php
echo '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="700">';
$meno = $_POST['meno'];
$priezvisko = $_POST['priezvisko'];
$rc = $_POST['rc'];

// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();
//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database)  or die ("conect error");
// z DB z tabulky osoba vyberieme meno,priezvisko,titul,rc
$sql = "select meno,priezvisko,titul, rc from osoba WHERE meno LIKE '$meno%' AND priezvisko LIKE '$priezvisko%' AND rc LIKE '$rc%' ";

$result = mysqli_query($con,$sql) or die ("chybny dotaz");
//nac�tanie hodn�t do pola
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
			$meno = $row['meno'];
			$priezvisko = $row['priezvisko'];
			$titul = $row['titul'];
            $rc = $row['rc'];

//v�pis hodn�t
echo "<tr>
    <td width='49'bgcolor='#FFaaCC' height='52'></td>
    <td width='184'bgcolor='#FFaaCC' height='52'></td>
    <td width='240'bgcolor='#FFaaCC' height='52'></td>
    <td width='247'bgcolor='#FFaaCC' height='52'></td>
    <td width='6'bgcolor='#FFaaCC' height='52'></td>
    <td width='247'bgcolor='#FFaaCC' height='52'>
  <tr>
    <td width='49'bgcolor='#FFFFCC' height='52'><b> ".$titul."</b></td>
    <td width='184'colspan='2'bgcolor='#FFFFCC' height='52'>meno<b> ".$meno."</b></td>
    <td width='240'bgcolor='#FFFFCC' height='52'>priezvisko <b>".$priezvisko." </b></td>
    <td width='247'bgcolor='#FFFFCC' height='52'>rodné číslo <b>".$rc."</b></td>
    <td width='6'colspan='2'bgcolor='#FFFFCC' height='52'></td>
  </tr>";
  }
  echo '</table>';
?>

