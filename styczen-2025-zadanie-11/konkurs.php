<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <main>
        <section id="left">
            <h3>Konkursowe nagrody</h3>
            
            <form>
            <button type="submit">Losuj nowe nagrody</button>
            </form>
            
            <table>
                <tr>
                    <th>Nr</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Wartość</th>
                </tr>
                <?php
                //skrypt
                $conn = mysqli_connect('localhost','root', '','konkurs');
                $query = "SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;";
                $querysum = mysqli_query($conn,$query);
                $i = 1;
                    while($row = $querysum->fetch_assoc()){
                        if($i%2==0){
                        echo "<tr class='parzysta'>";
                            echo "<th>" . $i . "</th>";
                            echo "<th>" . $row['nazwa'] . "</th>";
                            echo "<th>" . $row['opis'] . "</th>";
                            echo "<th>" . $row['cena'] . "</th>";
                        echo "</tr>";
                        }else{
                            echo "<tr>";
                            echo "<th>" . $i . "</th>";
                            echo "<th>" . $row['nazwa'] . "</th>";
                            echo "<th>" . $row['opis'] . "</th>";
                            echo "<th>" . $row['cena'] . "</th>";
                        echo "</tr>";
                        }
                        $i++;
                    }
                ?>
            </table>
        </section>
        <section id="right">
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="kw1">Kwerenda 1</a></li>
                <li><a href="kw2">Kwerenda 2</a></li>
                <li><a href="kw3">Kwerenda 3</a></li>
                <li><a href="kw4">Kwerenda 4</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>Numer zdającego: 07262903616</p>
    </footer>
</body>
</html>
