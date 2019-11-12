
<?php
include "./logix/db.php";
include "./logix/dbmng.php";

$meno =$_POST["meno"]; 
$priezvisko =$_POST["priezvisko"]; 
$titul=$_POST["titul"]; 
$rc=$_POST["rc"]; 
$nickname=$_POST["nickname"]; 
$passw=$_POST["passw"]; 
// overenie prázdneho nickname
if ($nickname=="") {
    echo "<font color=\"red\"><H3>Bez hesla a username nie je možné sa prihlásiť,";
};

#$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");
$db = new Database();
$db->connect();

//overovanie existencie nickname v DB
$nickname=$_POST["nickname"];  
if($nickname!=""){
 /*   $result = mysql_query("SELECT name FROM users WHERE joined='$username'");
    $row = mysql_fetch_array($result);
    echo $row['name'];  */

    $sql = "SELECT nickname FROM osoba WHERE nickname='$nickname'";
    $res = $db->select($sql);
}

if(empty($res)){
    // local sql query
    $node_id = $db->get_this_id();
    $sql = "INSERT INTO osoba (meno,priezvisko,titul,rc,nickname,heslo,nodeID)
            VALUES ('$meno','$priezvisko','$titul','$rc','$nickname','$passw','$node_id')";
    $res = $db->query($sql);
    // remote sql query
    $id = $db->last_id();
    $remote_sql = "INSERT INTO osoba (meno,priezvisko,titul,rc,nickname,heslo,nodeID,id)
    VALUES ('$meno','$priezvisko','$titul','$rc','$nickname','$passw','$node_id', '$id')";
    push($remote_sql);
    
    echo "<font color=\"black\"><br><strong>Registrácia prebehla úspešne </strong>";
    echo "";
} else {    
    echo "<font color=\"red\"><H3>\t\t\t\t<br><strong>>>>>>> Tento username už existuje! Vráťte sa a vyberte iný nickname! <<<<<<<</strong></H3>";
};

header("Location: index.php?menu=3");
?>


