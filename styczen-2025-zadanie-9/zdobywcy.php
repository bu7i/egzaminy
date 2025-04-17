<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
    <body>
        <?php
            $connect = mysqli_connect('localhost', 'root', '', 'zdobywcy');  
        ?>
        <header>
            <h1>Klub zdobywców gór polskich</h1>
        </header>
            <nav>
                <a href="sql/kw1.png">kwerenda1</a>
                <a href="sql/kw2.png">kwerenda2</a>
                <a href="sql/kw3.png">kwerenda3</a>
                <a href="sql/kw4.png">kwerenda4</a>
            </nav>
                <main>
                    <section id="left">
                        <img src="logo.png" alt="logo zdobywcy">
                        <h3>razem z nami:</h3>
                        <ul>
                            <li>wyjazdy</li>
                            <li>szkolenia</li>
                            <li>rekreacja</li>
                            <li>wypoczynek</li>
                            <li>wyzwania</li>
                        </ul>
                    </section>
                    <section id="right">
                        <h2>Dołącz do naszego zespołu!</h2>
                        <p>WPisz swoje dane do formularza:</p>
                            <form method="post">
                                Nazwisko:
                                    <input type="text" id="nazwisko" name="nazwisko" required>
                                Imię:
                                    <input type="text" id="imie" name="imie" required>
                                Funkcja:
                                    <select id="funkcja" name="funkcja" required>
                                        <option value="uczestnik">uczestnik</option>
                                        <option value="przewodnik">przewodnik</option>
                                        <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
                                        <option value="organizator">organizator</option>
                                        <option value="ratownik">ratownik</option>
                                    </select>
                                Email:
                                    <input type="email" id="email" name="email" required>
                                <button type="submit">Dodaj</button>
                            </form>
                            <?php
                                if (isset($_POST['nazwisko']) && isset($_POST['imie']) && isset($_POST['funkcja']) && isset($_POST['email'])) {
                                    $nazwisko = $_POST['nazwisko'];
                                    $imie = $_POST['imie'];
                                    $funkcja = $_POST['funkcja'];
                                    $email = $_POST['email'];

                                    $query1 = "INSERT INTO `osoby`(`nazwisko`, `imie`, `funkcja`, `email`) VALUES ('$nazwisko','$imie','$funkcja','$email');";
                                    mysqli_query($connect, $query1);

                                } else {
                                    echo "Nie wszystkie dane zostały przesłane.";
                                }
                                ?>

                        <table>
                            <tr>
                                <th>Nazwisko</th> <th>Imię</th> <th>Funkcja</th> <th>Email</th>
                            </tr>
                            <?php
                                $query2 = mysqli_query($connect,'SELECT nazwisko, imie, funkcja, email FROM osoby');
           
                                while($row = $query2->fetch_assoc()){
                                    echo "<tr> 
                                    <td>" . $row['nazwisko'] . "</td> 
                                    <td>" . $row['imie'] . "</td> 
                                    <td>" . $row['funkcja'] . "</td> 
                                    <td>" . $row['email'] . "</td> 
                                  </tr>";
                                }     
                            ?>
                        </table>
                    </section>
                </main>
                    <footer>
                        <p>Stronę wykonał: 07262903616</p>
                    </footer>
    </body>
</html>