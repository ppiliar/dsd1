<?php
// hned na zaciatku pouzijeme prikaz na spustenie session
session_start();
unset($_SESSION['username']);
	unset($_SESSION['password']);
//zobrazime pouzivatelovi prihlasovaci formular
echo '<br /><br /><br /><center>';
echo '<form method = "POST" action = "authorize2.php">';
echo 'username: <input name="username" type="text" /><br /><br />';
echo 'password: <input name="password" type="password" /><br />';
echo '<input type="submit" name="submit" value="Odoslat"/>';
echo '</form></center>';
?>
