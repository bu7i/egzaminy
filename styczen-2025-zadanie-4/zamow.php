<!DOCTYPE html>
    <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Obuwie</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'obuwie');
        ?>
            <body>
                <header>
                    <h1>Obuwie męskie</h1>
                </header>
                    <main>
                        <h2>Zamówienie</h2>
                            <?php
                            //skrypt 3
                            if(isset($_POST['Model']) && isset($_POST['Rozmiar']) && isset($_POST['liczba_par'])){
                                $model = $_POST['Model'];
                                $rozmiar = $_POST['Rozmiar'];
                                $liczba_par = $_POST['liczba_par'];
                            }

                            $query3 = "SELECT b.nazwa AS nazwa, b.cena AS cena, p.kolor AS kolor, p.kod_produktu AS kod_produktu, p.material AS material, p.nazwa_pliku AS nazwa_pliku FROM `buty` b JOIN produkt p ON b.model = p.model WHERE p.model = '$model';";
                            $querysum3 = mysqli_query($conn, $query3);


                            while($row = $querysum3->fetch_assoc()){

                                $row['cena'] *= $liczba_par;

                                echo "<img src='" . $row['nazwa_pliku'] . "' alt='but męski'>";
                                echo "<h2>" . $row['nazwa'] . "</h2>";
                                echo "<p>cena za " . $liczba_par . " par: " . $row['cena'] . " zł</p>";
                                echo "<p>Szczegóły produktu: " . $row['kolor'] . ", " . $row['material'] . "</p>";
                                echo "<p>Rozmiar: " . $rozmiar;
                            }
                                mysqli_close($conn);
                            ?>
                            </br><a href="index.php">Strona główna</a>
                    </main>
                    <footer><p>Autor strony: 07262903616</p></footer>
            </body>
    </html>