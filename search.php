<?php
// hned na zaciatku pouzijeme prikaz na spustenie session
session_start();

$con=mysqli_connect($config->host,$config->username,$config->password,$config->database) or die ("conect error");
//$search = $_POST["search"];
// z DB z tabulky osoba vyberieme meno,priezvisko,titul,rc

$sql = "SELECT meno, priezvisko, rc FROM osoba GROUP BY meno";
$result = mysqli_query($con, $sql) or die ("chybny dotaz".mysqli_error($con));
//$row = mysqli_fetch_all($result);
//echo var_dump(mysqli_fetch_all($result));

echo '<br /><br /><br /><center>';
echo '<form method = "POST" action = "index.php?menu=10">';

echo '<br><br>';
echo '<select name="meno" style="width:200px;">';
echo '<option>Select name</option>';
while($row = mysqli_fetch_array($result))
{
    //echo var_dump($row['meno']);
    $meno = $row['meno'];

    echo '<option value='.$meno.'>'.$meno.'</option>';
}
echo '</select>';


$sql = "SELECT meno, priezvisko, rc FROM osoba GROUP BY priezvisko";
$result = mysqli_query($con, $sql) or die ("chybny dotaz".mysqli_error($con));

echo '<br><br>';
echo '<select name="priezvisko" style="width:200px;">';
echo '<option>Select surname</option>';
while($row = mysqli_fetch_array($result))
{
    //echo var_dump($row['meno']);
    $priezvisko = $row['priezvisko'];

    echo '<option value='.$priezvisko.'>'.$priezvisko.'</option>';
}
echo '</select>';

$sql = "SELECT meno, priezvisko, rc FROM osoba GROUP BY rc";
$result = mysqli_query($con, $sql) or die ("chybny dotaz".mysqli_error($con));

echo '<br><br>';
echo '<select name="rc" style="width:200px;">';
echo '<option>Select rc</option>';
while($row = mysqli_fetch_array($result))
{
    //echo var_dump($row['meno']);
    $rc = $row['rc'];

    echo '<option value='.$rc.'>'.$rc.'</option>';
}
echo '</select>';

echo '<br><br>';
echo '<input type="submit" style="width:200px;" name="submit" value="Hladat"/>';
echo '</form></center>';
//zobrazime pouzivatelovi prihlasovaci formular
?>
