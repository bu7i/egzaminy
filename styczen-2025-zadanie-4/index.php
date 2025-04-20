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
                        <form action="zamow.php" method="post">
                            <label>Model: </label> 
                                <select name="Model" id="Model" class="kontrolki">
                                    <?php
                                    //skrypt 1
                                            $query1 = "SELECT model FROM `produkt`;";
                                            $querysum1 = mysqli_query($conn, $query1);
                                            
                                            while($row = $querysum1->fetch_assoc()){
                                                echo "<option value='" . $row['model'] . "'>" . $row['model'] . "</option>";
                                            }
                                    ?>
                                </select>
                            <label>Rozmiar: </label>
                                <select name="Rozmiar" id="Rozmiar" class="kontrolki">
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                </select>
                            <label>Liczba par: </label>
                                <input type="number" name="liczba_par" id="liczba_par" class="kontrolki">
                            <button type="submit">Zamów</button class="kontrolki">
                        </form>

                            <?php
                            //skrypt 2
                                $query2 = "SELECT b.model AS model, b.nazwa as nazwa, b.cena AS cena, p.nazwa_pliku AS nazwa_pliku FROM `buty` b JOIN produkt p ON b.model = p.model;";
                                $querysum2 = mysqli_query($conn, $query2);

                                while($row = $querysum2->fetch_assoc()){
                                    echo "<div class='buty'>";
                                    echo "<img src='" . $row['nazwa_pliku'] . "' alt='but męski'>";
                                    echo "<h2>" . $row['nazwa'] . "</h2>";
                                    echo "<h5>Model: " . $row['model'] . "</h5>";
                                    echo "<h4>Cena: " . $row['cena'] . "</h4>";
                                    echo "</div>";
                                }
                                mysqli_close($conn);
                            ?>

                    </main>
                    <footer><p>Autor strony: 07262903616</p></footer>
            </body>
    </html>