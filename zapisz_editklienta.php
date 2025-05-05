<meta http-equiv="refresh" content="2;url=index.php"/>

<?php
include 'dbconfig.php';

$nazwa = $_POST['nazwa'];
$adres = $_POST['adres'];
$opis = $_POST['opis'];
$id= $_POST['id'];


$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Błąd połączenia z BD: " . $conn->connect_error);
}

$zapytanie = "UPDATE `klienci` SET `nazwa` = '$nazwa', `adres` = '$adres', `opis` = '$opis' WHERE `klienci`.`id` = $id;";


$result = $conn->query($zapytanie);

$conn->close();
?>