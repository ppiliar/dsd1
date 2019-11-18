

<?php
echo '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="700">';
$meno = $_POST['meno'];
$priezvisko = $_POST['priezvisko'];

// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();

$sql = "select meno,priezvisko,titul, rc from osoba WHERE meno LIKE '$meno%' AND priezvisko LIKE '$priezvisko%' ";

$result = $db->select($sql);

//nac�tanie hodn�t do pola
foreach($result as &$row){
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

