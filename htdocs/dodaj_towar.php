<?php

    include 'dbconfig.php';

    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $ilosc = $_POST['ilosc'];


    $conn = new mysqli($server, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Błąd połączenia z BD: " . $conn->connect_error);
    }

    $zapytanie = "INSERT INTO `towary` (`id`, `nazwa`, `cena`, `ilość`) VALUES (NULL, '$nazwa', $cena, $ilosc)";

    $result = $conn->query($zapytanie) or die("". $conn->error);

    $conn->close();

    echo "<tr><td></td><td>$nazwa</td><td>$cena</td><td>$ilosc</td><td></td><td></td></tr>"
?>