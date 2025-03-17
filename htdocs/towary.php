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
                    echo "<tr><td>".$licznik++."</td><td>".$row["nazwa"]."</td><td>".$row["cena"]."</td><td>".$row["Ilość"]."</td></tr>\n";
                }
            }

            $conn->close();

        ?>
    </tbody>
</table>