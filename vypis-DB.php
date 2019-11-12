  <!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>vyhladaj</title>
        <link href="style.css" rel=stylesheet type=text/css>
</head>
<body>
<p align = "left">
<form method="POST" action="index.php?menu=3">
    <button type="submit" value="1" name="reset">Reset db</button>
</form>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="700">
<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();
//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
//$config=$config[0];
//$con=mysqli_connect($config->db1['host'],$config->username,$config->password,$config->database) or die ("conect error");
// z DB z tabulky osoba vyberieme meno,priezvisko,titul,rc
//$sql = "select meno,priezvisko,titul,rc from osoba ";
if(isset($_POST['reset'])){
  $db->reset_db();
}

//$result = $db->get_all_persons();
//console_log($result);
//console_log("1");
$dbManager.pull($db);
//console_log("2");
$result = $db->select("SELECT meno,priezvisko,titul,rc,id,nodeID FROM osoba;");
//$result = mysqli_query($con,$sql) or die ("chybny dotaz");
//naítanie hodnôt do pola
/*while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
			$meno = $row['meno'];
			$priezvisko = $row['priezvisko'];
			$titul = $row['titul'];
      $rc = $row['rc'];
      $id = $row['id'];*/
foreach($result as &$row){
  $meno = $row['meno'];
	$priezvisko = $row['priezvisko'];
	$titul = $row['titul'];
  $rc = $row['rc'];
  $id = $row['id'];
  $node_id = $row['nodeID'];
//výpis hodnôt
echo "
  <tr>
    <td width='49'bgcolor='#FFaaCC' height='52'></td>
    <td width='184'bgcolor='#FFaaCC' height='52'><b> ".$titul."</b></td>
    <td width='240'bgcolor='#FFaaCC' height='52'></td>
    <td width='247'bgcolor='#FFaaCC' height='52'>
      <span>
        <form action='index.php?menu=6' method='POST'>
          <input type='hidden' id='id' name='id' value=".$id.">
          <input type='hidden' id='nodeID' name='nodeID' value=".$node_id.">
          <button type='submit' name='pressed'>Odstranit</button>
        </form>
        <form action='index.php?menu=7' method='POST'>
          <input type='hidden' id='id' name='id' value=".$id.">
          <input type='hidden' id='nodeID' name='nodeID' value=".$node_id.">
          <button type='submit' name='edit'>Upravit</button>
        </form>
      </span>  
    </td>
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
