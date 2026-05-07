<?php

require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET"
    && isset($_GET['codice']))
{

    $codice = $_GET['codice'];

    $sql = "DELETE FROM compagnia_aerea
    WHERE codice ='$codice'";

    $ok = mysqli_query($conn, $sql);

    $righe = mysqli_affected_rows($conn);
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

if(isset($_GET['codice']))
{

    if ($ok)
    {
        if($righe > 0)
            echo "<h1>Eliminazione avvenuta con successo!</h1>";
        else
            echo "<h1>Compagnia non trovata...</h1>";
    }
    else
    {
        echo "<h1>Errore durante l'eliminazione: "
        . mysqli_error($conn) .
        "</h1>";
    }

}
else
{
    echo "<h1>Apri prima eliminacompagnia.html</h1>";
}

?>

</body>

</html>