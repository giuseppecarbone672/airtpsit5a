<?php
require_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero l'ID e mi assicuro che sia un numero intero
    $id_volo = intval($_POST['id_volo']);

    $sql = "DELETE FROM voli WHERE id = $id_volo";

    if ($conn->query($sql) === TRUE) {
        // Verifichiamo se è stato effettivamente eliminato qualcosa
        if ($conn->affected_rows > 0) {
            echo "Volo con ID $id_volo eliminato correttamente.";
        } else {
            echo "Nessun volo trovato con questo ID.";
        }
        echo "<br><a href='cancella.html'>Torna alla pagina elimina</a>";
    } else {
        echo "Errore durante l'eliminazione: " . $conn->error;
    }
}

$conn->close();
?>