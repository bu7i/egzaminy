<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOŁO SZACHOWE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h2><i>Koło szachowe gambit piona</i></h2>
    </header>
    <main>
        <section id="left">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1">kwerenda1</a></li>
                <li><a href="kw2">kwerenda2</a></li>
                <li><a href="kw3">kwerenda3</a></li>
                <li><a href="kw4">kwerenda4</a></li>
            </ul>
            <img src="logo.png" alt="Logo koła">
        </section>
        <section id="right">
            <h3>Najlepsi gracze naszego koła</h3></br>
            <table>
                <tr>
                    <th>Pozycja</th>
                    <th>Pseudonim</th>
                    <th>Tytuł</th>
                    <th>Ranking</th>
                    <th>Klasa</th>
                </tr>
                <?php
                //skrypt 1
                    $conn = mysqli_connect('localhost', 'root', '', 'szachy');
                    $query1 = "SELECT pseudonim, tytul, ranking, klasa FROM `zawodnicy` WHERE ranking > 2789 ORDER BY ranking DESC;";
                    $query1sum = mysqli_query($conn, $query1);

                    $i = 1;
                    while($row = $query1sum->fetch_assoc()){
                        echo "<tr>";
                            echo "<td>" . $i . "</td>";
                            echo "<td>" . $row['pseudonim'] . "</td>";
                            echo "<td>" . $row['tytul'] . "</td>";
                            echo "<td>" . $row['ranking'] . "</td>";
                            echo "<td>" . $row['klasa'] . "</td>";
                        echo "</tr>";
                        $i++;
                    }
                ?>
            </table>
            <form>
                <button type="submit">Losuj nową parę graczy</button>
            </form></br>
            <?php
            //skrypt 2
                $query2 = "SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;";
                $query2sum = mysqli_query($conn, $query2); 

                echo "<h4>";
                while($row = $query2sum->fetch_assoc()){
                    echo $row['pseudonim'] . " " . $row['klasa'] . " ";
                }
                echo "</h4>";
                mysqli_close($conn);
            ?>
            </br><p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 07262903616</p>
    </footer>
</body>
</html>