<?php
include("./logix/db.php");
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
session_start();

//nacitame premenne, ktore sme odoslali v skripte login.php
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
//otvoríme DB
$db = new Database();
$db->connect();

//vyberieme z DB nickname a heslo na porovnanie so zadanými hodnotami 
$sql = "SELECT nickname,heslo FROM osoba WHERE nickname='$username'";
$result = $db->select($sql);

foreach($result as &$row)
{ 
	$_SESSION['username'] = $row['nickname'];
	$_SESSION['passwd'] = $row['heslo'];

	//porovnáme zadané heslo s heslom v DB			
	if( $password == $_SESSION['passwd'] ) {
		header("location: index.php?menu=11");
	} else {
		echo "nemáte oprávnenie";
	}
}
?>