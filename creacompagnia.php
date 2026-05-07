<?php

require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $codice = $_POST["codice"];
    $nome = $_POST["nome"];
    $immagine = $_POST["immagine"];
    $capitale_sociale = $_POST["capitale_sociale"];

    $query = "INSERT INTO compagnia_aerea
    (codice, nome, immagine, capitale_sociale)

    VALUES

    ('$codice',
    '$nome',
    '$immagine',
    '$capitale_sociale')";

    $risultato = mysqli_query($conn, $query);

}
?>

<html>

<head>
    <title>Risultato</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<h1>Risultato</h1>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if($risultato)
    {
        echo "<h1>Inserimento avvenuto con successo!</h1>";
    }
    else
    {
        echo "<h1>Errore durante l'inserimento: "
        . mysqli_error($conn) .
        "</h1>";
    }

}
else
{
    echo "<h1>Apri prima creacompagnia.html</h1>";
}

?>

</body>

</html>