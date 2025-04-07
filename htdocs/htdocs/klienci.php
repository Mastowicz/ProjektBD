<h1>Klienci</h1>

<table class="table table-dark table-hover">
    <thead>
        <tr><th>Lp.</th><th>Nazwa</th><th>Adres</th><th>Opis</th><th>Usuń</th><th>Edytuj</th></tr>
    </thead>
    <tbody>
        <?php
            include 'dbconfig.php';
            session_start();

            $conn = new mysqli($server, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Błąd połączenia z BD: " . $conn->connect_error);
            }

            $zapytanie = "SELECT * FROM klienci";

            $result = $conn->query($zapytanie);

            if ($result->num_rows > 0) {
                $licznik=1;
                while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$licznik++."</td><td>".$row["nazwa"]."</td><td>".$row["adres"]."</td><td>".$row["opis"]."</td>";
                    if(isset($_SESSION['login'])){
                        echo "<td><a class='del' href='delklient.php?id=".$row["id"]."'>usuń</a></td>";
                        echo "<td><a class='del' href='editklient.php?id=".$row["id"]."'>edytuj</a></td></tr>";
                    } else {
                        echo "<td>[brak uprawnien]</td>";
                        echo "<td>[brak uprawnien]</td></tr>";
                    }
                }
            }

            $conn->close();

        ?>
    </tbody>
</table>

<?php
if(isset($_SESSION['login'])){
?>

<h2>Dodawanie klienta</h2>

<div class="center">
    <form action="dodaj_klienta.php" method="post">
        <div class="form-group">
            <label for="nazwa">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Wpisz nazwę" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="adres">Adres:</label>
            <input type="text" class="form-control" id="adres" name="adres" placeholder="Wpisz adres" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="opis">Opis:</label>
            <textarea type="text" class="form-control" id="opis" name="opis" placeholder="Możesz wpisać opis" autocomplete="off">
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>

<?php
} else {
    echo "<h2>Nie masz uprawnień do dodawania klientów</h2>";
}
?>

</body>
</html>
