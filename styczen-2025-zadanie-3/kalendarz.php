<!DOCTYPE html>
    <html lang="pl">
        <?php
            $conn = mysqli_connect('localhost', 'root','','kalendarz');
        ?>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Kalendarz</title>
            <link rel="stylesheet" href="styl.css">
        </head>
            <body>
                <header>
                    <h1>Dni, miesiące, lata...</h1>
                </header>
                    <blockquote>
                        <p>
                            <?php
                            //skrypt 1
                                $today_m_d = date("m-d");
                                $today = date("d-m-Y");
                                $query1 = "SELECT imiona FROM `imieniny` WHERE data = '$today_m_d';";
                                $query1sum = mysqli_query($conn, $query1);
                                while($row = $query1sum->fetch_assoc()){
                                echo "Dzisiaj jest $today, imieniny: " . $row['imiona'];
                                }
                            ?>
                        </p>
                    </blockquote>
                        <main>
                            <section id="left">
                                <table>
                                    <tr>
                                        <th>Liczba Dni</th>
                                        <th>Miesiąc</th>
                                    </tr>
                                    <tr>
                                        <td>31</td>
                                        <td>
                                            styczen<br>
                                            marzec<br>
                                            maj<br>
                                            lipiec<br>
                                            sierpień<br>
                                            październik<br>
                                            grudzień<br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>30</td>
                                        <td>
                                            kwiecień<br>
                                            czerwiec<br>
                                            wrzesień<br>
                                            listopad<br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>28 lub 29</td>
                                        <td>luty</td>
                                    </tr>
                                </table>
                            </section>

                            <section id="middle">
                                <h2>Sprawdź kto ma urodziny</h2>
                                    <form method="post">
                                        <input type="date" name="date" id="date" required min="2024-01-01" max="2024-12-31">
                                        <button type="submit">wyślij</button>
                                    </form>
                                    <?php
                                    //skrypt 2
                                        if(isset($_POST['date'])){
                                            $date = $_POST['date'];
                                            $format = date("m-d", strtotime($date));
                                            $query2 = "SELECT imiona FROM `imieniny` WHERE data = '$format';";
                                            $query2sum = mysqli_query($conn, $query1);
                                            while($row = $query2sum->fetch_assoc()){
                                                echo "<a>Dnia $date są imieniny: " . $row['imiona'] ."</a>";
                                            }
                                        }
                                    ?>
                            </section>

                            <section id="right">
                                <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów "><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
                                <h2>Rodzaje kalendarzy</h2>
                                <ol>
                                <li>słoneczny</li>
                                    <ul>
                                        <li>kalendarz Majów</li>
                                        <li>juliański</li>
                                        <li>gregoriański</li>
                                    </ul>
                                    <li>księżycowy</li>
                                    <ul>
                                        <li>starogrecki</li>
                                        <li>babiloński</li>
                                    </ul>
                                </ol>
                            </section>
                        </main>
                    <footer>
                        <p>Stronę opracował(a): 07262903616</p>
                    </footer>
            </body>
    </html>