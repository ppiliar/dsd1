
<?php
$config = include("config.php");
$meno =$_POST["meno"]; 
$priezvisko =$_POST["priezvisko"]; 
$titul=$_POST["titul"]; 
$rc=$_POST["rc"]; 
$nickname=$_POST["nickname"]; 
$passw=$_POST["passw"]; 
// overenie prázdneho nickname
if ($nickname=="") {echo "<font color=\"red\"><H3>Bez hesla a username nie je možnéa prihlásiť,";
//mysql_connect("localhost","","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("  vráťte sa späť a zadajte iný username!</font></H3>");
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
};

//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
//mysql_select_db ("zaklad") or die ("nepodarilo sa otvorit databazu");
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");

$nickname=$_POST["nickname"];  //overovanie existencie nickname v DB
if ($nickname!="") echo ""; else {$nickname="XxXxXxXxXxXXXXXXXxxxxXXC";}
$username= $nickname;
$sql = "select `nickname` from `osoba` where nickname=\"$username\" ";
//$res = mysql_query($sql) or die ("question error");
$res = mysqli_query($con,$sql) or die ("question error");
//while ($zaznam = mysql_fetch_array($res))
while ($zaznam = mysqli_fetch_array($res,MYSQLI_ASSOC))	
{
    $nick = $zaznam["nickname"];
}
if ($nick==$username) echo "<font color=\"red\"><H3>\t\t\t\t<br><strong>>>>>>> Tento usename už existuje! Vráťte sa a vyberte iný nickname! <<<<<<<</strong></H3>";
else {

//mysql_connect("localhost","root","") or die ("conect error");
//mysql_select_db ("zaklad") or die ("cant open database");
$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");

$sql = "insert into `osoba` (`meno`,`priezvisko`,`titul`,`rc`,`nickname`,`heslo`)
values ('$meno','$priezvisko','$titul','$rc','$nickname','$passw')";

$res = mysqli_query($con,$sql) or die ("registration error");
MySQLi_Close($con);
echo "<font color=\"black\"><br><strong>Registrácia prebehla úspešne </strong>";
echo "";
}
?>


