<!DOCTYPE html>
    <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PIEKARNIA</title>
            <link rel="stylesheet" href="style.css">
        </head>
            <body>
                <?php
                    //connect
                    $conn =  mysqli_connect('localhost', 'root','','piekarnia');
                ?>
                    <nav>
                        <a href="kw1">KWERENDA1</a>
                        <a href="kw2">KWERENDA2</a>
                        <a href="kw3">KWERENDA3</a>
                        <a href="kw4">KWERENDA4</a>
                    </nav>
                        <header>
                            <h1>WITAMY</h1>
                                <h4>NA STRONIE PIEKARNI</h4></br>
                                    <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach zgierskim i ozorkowskim.</p>
                        </header>
                            <main>
                                <h4>Wybierz rodzaj wypieków:</h4>
                                    <form method="post">
                                        <select name="rodzaj" id="rodzaj">
                                            <?php
                                            //skrypt 1
                                                $query1 = "SELECT DISTINCT(Rodzaj) AS rodzaj FROM `wyroby` ORDER BY Rodzaj DESC;";
                                                $query1sum = mysqli_query($conn, $query1);

                                                while($row = $query1sum->fetch_assoc()){
                                                    echo "<option value='" . $row['rodzaj'] . "'>" . $row['rodzaj'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                        <button type="submit">Wybierz</button>
                                    </form>
                                        <table>
                                            <tr>
                                                <th>Rodzaj</th>
                                                <th>Nazwa</th>
                                                <th>Gramatura</th>
                                                <th>Cena</th>
                                            </tr>
                                            <?php
                                            //skrypt 2
                                            if(isset($_POST['rodzaj'])){

                                                $rodzaj = $_POST['rodzaj'];

                                                $query2 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM `wyroby` WHERE Rodzaj = '" . $rodzaj . "';";
                                                $query2sum = mysqli_query($conn, $query2);

                                                while($row = $query2sum->fetch_assoc()){
                                                    echo "<tr>";
                                                        echo "<th>" . $row['Rodzaj'] . "</th>";
                                                        echo "<th>" . $row['Nazwa'] . "</th>";
                                                        echo "<th>" . $row['Gramatura'] . "</th>";
                                                        echo "<th>" . $row['Cena'] . "</th>";

                                                    echo "</tr>";
                                                }
                                            }

                                                mysqli_close($conn);
                                            ?>
                                        </table>
                            </main>
                                <footer>
                                    <p>AUTOR: 07262903616</p></br>
                                    <p>Data: 23.04.2025</p>
                                </footer>


                <img src="wypieki.png" alt="Produkty naszej piekarni">
            </body>
    </html>