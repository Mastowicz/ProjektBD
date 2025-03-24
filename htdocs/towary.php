<h1> Towary </h1>

<table class="table table-dark table-hover">
    <thead>
        <tr><th>Lp.</th><th>Nazwa</th><th>Cena</th><th>Ilość</th></tr>
    </thead>
    <tbody>
        <?php
            include 'dbconfig.php';

            $conn = new mysqli($server, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Błąd połączenia z BD: " . $conn->connect_error);
            }

            $zapytanie = "SELECT * FROM towary";

            $result = $conn->query($zapytanie);

            if ($result->num_rows > 0) {
                $licznik=1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$licznik++."</td><td>".$row["nazwa"]."</td><td>".$row["cena"]." zł"."</td><td>".$row["ilość"]."</td></tr>\n";
                }
            }

            $conn->close();

        ?>
    </tbody>
</table>

<h2>Dodawanie klienta</h2>

<div class="center">
    <form action="dodaj_towar.php" method="post">
        <div class="form-group">
            <label for="nazwa">Nazwa:</label>
            <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="Wpisz nazwę" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="cena">Cena:</label>
            <input type="number" class="form-control" id="cena" name="cena" placeholder="Wpisz cene" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="ilosc">Ilość:</label>
            <input type="number" class="form-control" id="ilosc" name="ilosc" placeholder="Wpisz ilość" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
</div>

</body>
</html>
