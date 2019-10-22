<?php
// hned na zaciatku pouzijeme prikaz na spustenie session
session_start();
$meno = $_REQUEST['meno'];
$priezvisko = $_REQUEST['priezvisko'];
//zobrazime pouzivatelovi prihlasovaci formular
echo '<br /><br /><br /><center>';
echo '<form method = "POST" action = "index.php?menu=5">';
echo 'meno: <input name="meno" type="text" /><br /><br />';
echo 'priezvisko: <input name="priezvisko" type="text" /><br />';
echo '<input type="submit" name="submit" value="Hladat"/>';
echo '</form></center>';
?>