<?php
                    $conn = mysqli_connect("localhost", "root", "", "biblioteka");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Małych</h1>
    </header>
        <main>
            <section id="left">
                <h4>Dodaj czytelnika</h4>
                <form action="" method="POST">
        <label for="imie">imię: </label>
        <input type="text" id="imie" name="imie"><br>
        <label for="nazwisko">nazwisko: </label>
        <input type="text" id="nazwisko" name="nazwisko"><br>
        <label for="symbol">symbol: </label>
        <input type="number" id="symbol" name="symbol"><br>
        <button type="submit">AKCEPTUJ</button>
    </form>

    <?php
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $symbol = $_POST['symbol'];

        $query = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('$imie','$nazwisko','$symbol');"; 
        $result = mysqli_query($conn, $query);
        
        echo "<p>Dodano użytkownika $imie $nazwisko</p>";

    ?>
            </section>
            <section id="middle">
                <img src="biblioteka.png" alt="biblioteka">
                <h6>ul. </br> Czytelników 15; </br> Książkowice Małe</h6>
                <a href="mail:biuro@bib.pl">Czy masz jakieś uwagi?</a>
            </section>
            <section id="right">
                <h4>Nasi czytelnicy:</h4>
                <ol>
                    <?php
                        //skrypt 2
                        $query2 = "SELECT imie, nazwisko FROM `czytelnicy` ORDER BY nazwisko ASC;";
                        $result2 = mysqli_query($conn,$query2);
                        while($row = mysqli_fetch_array($result2)){
                            $imie = $row['imie'];
                            $nazwisko = $row['nazwisko'];
                            echo "<li>$imie $nazwisko</li>";
                        }
                    ?>
                </ol>
            </section>
        </main>
        <footer>
            <p>Projekt witryny: 07262903616</p>
        </footer>
</body>
</html>
<?php
    mysqli_close($conn);
?>