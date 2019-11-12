<?php
// hned na zaciatku pouzijeme prikaz na pokracovanie v session
//session_start();

$pressed = $_POST["id"];
$node_id = $_POST["nodeID"];

$db->query("DELETE FROM osoba WHERE id='$pressed' AND nodeID='$node_id';");
push("DELETE FROM osoba WHERE id='$pressed' AND nodeID='$node_id';");

header("Location: index.php?menu=3");
die();
?>
