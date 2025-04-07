<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link rel="stylesheet" href="/css/style.css">
        <script type="text/javascript" src="../js/app.js" defer></script>
    <title>Sklep "Enter"</title>
</head>
<body>

        <div class="jumbotron text-center">
        Sklep kołki i gwoździe
        <br>Projekt na zaliczenie BD
        </div>

        <div class="row" id="menu">
            <div class="col-md-12">

            <button type="button" link="home.php" class="link btn btn-primary">HOME</button>
            <button type="button" link="klienci.php" class="link btn btn-primary">KLIENCI</button>
            <button type="button" link="towary.php" class="link btn btn-primary">TOWARY</button>
            <button type="button" link="operacje.php" class="link btn btn-primary">OPERACJE</button> 
            <?php
                session_start();
                if(isset($_SESSION['login'])){
            ?>
                    <button type="button" link="logout.php" class="link btn btn-primary">WYLOGUJ</button>
            <?php
                } 
                else{
            ?>
                    <button type="button" link="logowanie.php" class="link btn btn-primary">ZALOGUJ</button>
            <?php
                } ;
            ?>



            </div>
        </div>

        <div class="row" id="main">
            <div class="col-md-12">Witaj w sklepie z ......</div>
        </div>

        <div class="row" id="footer">
            <div class="col-md-6">(c) Patryk Wilk 2025</div>
            <div class="col-md-6">All Right Reserved.</div>
        </div>
    
</body>
</html>