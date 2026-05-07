<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $codice = $conn->real_escape_string($_POST['codice']);
    $origine = $conn->real_escape_string($_POST['origine']);
    $destinazione = $conn->real_escape_string($_POST['destinazione']);
    $data_ora = $_POST['data_ora'];

    $sql = "INSERT INTO voli (codice, origine, destinazione, data_ora) 
            VALUES ('$codice', '$origine', '$destinazione', '$data_ora')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuovo volo inserito con successo!";
        echo "<br><a href='crea.html'>Inserisci un altro volo</a>";
    } else {
        echo "Errore durante l'inserimento: " . $conn->error;
    }
}

$conn->close();
?>