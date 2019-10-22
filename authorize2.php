<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
session_start();

//nacitame premenne, ktore sme odoslali v skripte login.php
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
//otvoríme DB
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");

//vyberieme z DB nickname a heslo na porovnanie so zadanými hodnotami 
  $sql = "select nickname,heslo from osoba where nickname=\"$username\"";

$result = mysqli_query($con,$sql) or die ("chybny dotaz");
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
			$_SESSION['username'] = $row['nickname'];
			$_SESSION['passwd'] = $row['heslo'];
		
//porovnáme zadané heslo s heslom v DB			
if( $password == $_SESSION['passwd'] ) {
	
header("location: welcome2.php");}
	

else {
echo "nemáte oprávnenie";
}}
//presmerujeme pouzivatela na uvitaciu stranku welcome2.php

?>

