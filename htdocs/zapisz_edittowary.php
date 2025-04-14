<meta http-equiv="refresh" content="2;url=index.php"/>

<?php
include 'dbconfig.php';

$nazwa = $_POST['nazwa'];
$cena = $_POST['cena'];
$ilosc = $_POST['ilosc'];
$id= $_POST['id'];


$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z BD: " . $conn->connect_error);
}

$zapytanie = "UPDATE `towary` SET `nazwa` = '$nazwa', `cena` = '$cena', `ilość` = '$ilosc' WHERE `towary`.`id` = $id;";


$result = $conn->query($zapytanie);

$conn->close();
?>