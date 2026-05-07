<?php

$conn = new mysqli("localhost", "root", "", "airtpsit");

if($conn->connect_error){
    die("Connessione fallita: " . $conn->connect_error);
}

$query = "SELECT * FROM aeroporto ORDER BY nome ASC";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air TPSIT - Flight Finder</title>

    <link rel="stylesheet" href="css/homepage.css">
</head>

<body>

<header>

    <div class="logo">
        ✈ Air TPSIT
    </div>

    <nav>
        <a href="#">Assistenza</a>
        <a href="#">Accedi</a>
    </nav>

</header>

<section class="hero">

    <div class="overlay"></div>

    <div class="hero-content">

        <h1>Trova voli low cost in pochi secondi</h1>

        <p>
            Confronta centinaia di destinazioni e prenota il tuo prossimo viaggio.
        </p>

        <div class="search-box">

            <div class="trip-type">

                <label>Tipo di viaggio</label>

                <select>
                    <option>Andata e ritorno</option>
                    <option>Solo andata</option>
                </select>

            </div>

            <div class="form-row">

                <!-- PARTENZA -->
                <div class="input-group">

                    <label>Da dove parti?</label>

                    <select name="from">

                        <option disabled selected>
                            ✈ Seleziona aeroporto
                        </option>

                        <?php
                        mysqli_data_seek($result, 0);

                        while($row = $result->fetch_assoc()){
                        ?>

                            <option value="<?php echo $row['codice']; ?>">

                                <?php echo $row['nome']; ?>
                                (<?php echo $row['codice']; ?>)

                            </option>

                        <?php } ?>

                    </select>

                </div>

                <!-- DESTINAZIONE -->
                <div class="input-group">

                    <label>Dove vai?</label>

                    <select name="to">

                        <option disabled selected>
                            ✈ Seleziona destinazione
                        </option>

                        <?php
                        mysqli_data_seek($result, 0);

                        while($row = $result->fetch_assoc()){
                        ?>

                            <option value="<?php echo $row['codice']; ?>">

                                <?php echo $row['nome']; ?>
                                (<?php echo $row['codice']; ?>)

                            </option>

                        <?php } ?>

                    </select>

                </div>

            </div>

            <div class="form-row">

                <div class="input-group">

                    <label>Partenza</label>

                    <input type="date">

                </div>

                <div class="input-group">

                    <label>Ritorno</label>

                    <input type="date">

                </div>

                <div class="input-group btn-container">

                    <button>
                        Cerca volo
                    </button>

                </div>

            </div>

            <div class="options">

                <label>
                    <input type="checkbox">
                    Voli diretti
                </label>

                <label>
                    <input type="checkbox">
                    Aeroporti vicini
                </label>

            </div>

        </div>

        <br>
        <br>

        <!-- COMPANY BOX -->
        <div class="company-box">

            <label class="company">
                Zona Compagnie
            </label>

            <a href="#" class="btn green">
                + Crea Compagnia
            </a>

            <a href="#" class="btn red">
                × Elimina Compagnia
            </a>

        </div>

    </div>

</section>

</body>
</html>