<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();

$meno = $_POST["meno"];
$priezvisko = $_POST["priezvisko"];
$titul = $_POST["titul"];
$rc = $_POST["rc"];
$id = $_POST["id"];
$node_id = $_POST["nodeID"];


console_log($meno);
console_log($priezvisko);
console_log($titul);
console_log($rc);
console_log($id);
$sql = "UPDATE osoba SET meno='$meno',priezvisko='$priezvisko',titul='$titul',rc='$rc' WHERE id='$id' AND nodeID='$node_id';";

$result = $db->query($sql);
push($sql);

header("Location: index.php?menu=3");
die();
?>
