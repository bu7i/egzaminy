<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkloeniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <header><img src="baner.jpg" alt="Szkolenia"></header>
        <menu>
            <ul>
                <li><a href="index.html">Strona główna</a></li>
                <li><a href="szkolenia.php">Szkolenia</a></li>
            </ul>
        </menu>
        <main>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'firma');

            $query = "SELECT Data, Temat FROM `szkolenia` ORDER BY Data ASC;";

            $querysum = mysqli_query($conn, $query);

            while ($row = $querysum->fetch_assoc()) {
                echo $row['Data'] . " " . $row['Temat'] . "<br>";
            }
            ?>
        </main>
        <footer>
            <h2>Firma szkoleniowa ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: 07262903616</p>
        </footer>
    </div>
</body>
</html>