<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wyszukiwarka miast</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    </head>
        <body>
            <div>
                <header>
                    <img src="baner.jpg" alt="Polska">
                </header>
            </div>
                <main>
                    <section id="left">
                        <section id="left-upper">
                            <h4>Podaj początek nazwy miasta</h4>
                                <form method="post">
                                    <input type="text" name="miasto" id="miasto">

                                    <button type="submit">Szukaj</button>
                                </form>
                        </section>
                            <section id="left-lower">
                                <a>Egzamin INF.03</a></br>
                                <a>Autor: 07262903616</a>
                            </section>           
                    </section>
                        <section id="right">
                            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
                            <?php
                            $conn = mysqli_connect('localhost', 'root','', 'wykaz');
                                if(isset($_POST['miasto'])){
                                    $miasto = $_POST['miasto'];
                                    $query = "SELECT m.nazwa AS miasto, w.nazwa AS wojewodztwo FROM `miasta` m JOIN wojewodztwa w ON m.id_wojewodztwa = w.id WHERE m.nazwa LIKE '$miasto%' ORDER BY m.nazwa DESC;"; //pomoc AI była bo zjeby nie umią polecenia dobrze napisać
                                    $querysum = mysqli_query($conn,$query);

                                    echo "<a class='miasto'>$miasto<a>
                                    <table>
                                    <tr>
                                    <th>Miasto</th>
                                    <th>Województwo</th>
                                    </tr>";
                                }
                                    while($row = $querysum->fetch_assoc()){
                                    echo "<tr>
                                            <td>" . $row['miasto'] ."</td>
                                            <td>" . $row['wojewodztwo'] ."</td>
                                        <tr>";
                                    }
                                    echo "</table>";
                                
                                mysqli_close(mysql: $conn);
                            ?>
                        </section>
                </main>
        </body>
</html>