<script>
    $(document).ready(function(){
        
        $("#myForm").submit(function(){
            event.preventDefault();
            $.ajax({
						url: "dodaj_towar.php",
						type: "POST",
						data: $("#myForm").serialize(),
						cache: false,
						success: function (response) {
							$("#myTable").append(response);
                        }
						});
                        
        });

    });

</script>

<div class="text_title">Towary</div>

<table class="table table-dark table-hover" id="myTable">
    <thead>
        <tr><th>Lp.</th><th>Nazwa</th><th>Cena</th><th>Ilość</th><th>Usuń</th><th>Edytuj</th</tr>
    </thead>
    <tbody>
        <?php
            include 'dbconfig.php';
            session_start();

            $conn = new mysqli($server, $user, $password, $dbname);
            if ($conn->connect_error) {
                die("Błąd połączenia z BD: " . $conn->connect_error);
            }

            $zapytanie = "SELECT * FROM towary";

            $result = $conn->query($zapytanie);

            if ($result->num_rows > 0) {
                $licznik=1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$licznik++."</td><td>".$row["nazwa"]."</td><td>".$row["cena"]." zł"."</td><td>".$row["ilość"]."</td>\n";
                    if(isset($_SESSION['login'])){
                        echo "<td><a class='del' href='deltowary.php?id=".$row["id"]."'>usuń</a></td>";
                        echo "<td><a class='del' href='edittowary.php?id=".$row["id"]."'>edytuj</a></td></tr>";
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

<h2>Dodanie towaru</h2>

<div class="center">
    <form method="post" id="myForm" action="dodaj_towar.php">
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

<?php
} else {
    echo "<h2>Nie masz uprawnień do dodawania klientów</h2>";
}
?>

</body>
</html>
