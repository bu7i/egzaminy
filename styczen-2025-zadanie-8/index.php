<!DOCTYPE html>
    <html lang="pl">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mieszalnia farb</title>
            <link rel="shortcut icon" href="fav.png" type="image/x-icon">
            <link rel="stylesheet" href="style.css">
        </head>
            <body>
                <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'mieszalnia');
                ?>
                <header>
                    <img src="baner.jpg" alt="Mieszalnia farb">
                </header>
                    <form method="post">
                        Data odbioru od:
                            <input type="date" name="date_start" id="date_start">
                        do:
                            <input type="date" name="date_end" id="date_end">
                        <button type="submit">Wyszukaj</button>
                            <?php
                                if(isset($_POST['date_start']) && isset($_POST['date_end'])){
                                    $date_start = $_POST['date_start'];
                                    $date_end = $_POST['date_end'];
                                }
                            ?>

                    </form>
                        <main>
                            <table>
                                <tr>
                                    <th>Nr zamówienia</th>
                                    <th>Nazwisko</th>
                                    <th>Imie</th>
                                    <th>Kolor</th>
                                    <th>Pojemność [ml]</th>
                                    <th>Data odbioru</th>
                                </tr>
                                <?php
                                if(!isset($_POST['date_start']) && !isset($_POST['date_end'])){
                                    $query = "SELECT k.Nazwisko, k.Imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM `klienci` k JOIN zamowienia z ON z.id = k.id ORDER BY z.data_odbioru ASC;";

                                    $querysum = mysqli_query($connect, $query);

                                    while($row = $querysum->fetch_assoc()){
                                        echo "<tr>
                                            <td>" . $row['id'] . "</td>
                                            <td>" . $row['Nazwisko'] . "</td>
                                            <td>" . $row['Imie'] . "</td>
                                            <td style='background-color: #" . $row['kod_koloru'] . ";'>" . $row['kod_koloru'] . "</td>
                                            <td>" . $row['pojemnosc'] . "</td>
                                            <td>" . $row['data_odbioru'] . "</td>
                                            </tr>";
                                    }                                       
                                }else{
                                        $query2 = "SELECT k.Nazwisko, k.Imie, z.id, z.kod_koloru, z.pojemnosc, z.data_odbioru FROM `klienci` k JOIN zamowienia z ON z.id = k.id WHERE z.data_odbioru BETWEEN '$date_start' AND '$date_end' ORDER BY `z`.`data_odbioru` ASC;";
                                            $querysum2 = mysqli_query($connect, $query2);

                                            while($row = $querysum2->fetch_assoc()){
                                                echo "<tr>
                                                    <td>" . $row['id'] . "</td>
                                                    <td>" . $row['Nazwisko'] . "</td>
                                                    <td>" . $row['Imie'] . "</td>
                                            <td style='background-color: #" . $row['kod_koloru'] . ";'>" . $row['kod_koloru'] . "</td>
                                                    <td>" . $row['pojemnosc'] . "</td>
                                                    <td>" . $row['data_odbioru'] . "</td>
                                                    </tr>";
                                            }
                                    }   
                                ?>
                            </table>    
                        </main>
                            <footer>
                                <h3>Egzamin INF.03</h3>
                                <a>Autor: 07262903616</a>
                            </footer>
            </body>
    </html>