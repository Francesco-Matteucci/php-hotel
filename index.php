<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Eseguo un controllo per vedere se è stata fatta o meno una richiesta GET per il parcheggio
$isParking = isset($_GET['parking']);

// Verifico se è stato inserito un voto
if (isset($_GET['vote'])) {
    $hotelRating = (int)$_GET['vote'];

    // Imposto il voto minimo ad 1, nel caso l'utente inserisca 0 o un numero negativo
    if ($hotelRating < 1) {
        $hotelRating = 1;
    }
} else {
    // Se l'utente non inserisce voti, imposto il minimo ad 1
    $hotelRating = 1;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Hotel</title>
    <!-- Bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1 class="my-4 text-center">Lista Hotel</h1>

        <form method="GET" class="mb-4">
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="parking" name="parking" value="1"
                    <?php if ($isParking) echo 'checked'; ?>>
                <label class="form-check-label" for="parking">
                    Mostra solo gli hotel con il parcheggio
                </label>
            </div>
            <div class="mb-3">
                <label for="vote" class="form-label">Stelle minime:</label>
                <input type="number" class="form-control" id="vote" name="vote" min="0" max="5"
                    value="<?= $hotelRating ?>">
            </div>
            <button type="submit" class="btn btn-primary">Filtra secondi i criteri di ricerca</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro (km)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) { if ((!$isParking || $hotel['parking']) && $hotel['vote'] >= $hotelRating) { ?>
                <tr>
                    <td class="fw-bold"><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>
                    <td><?= $hotel['parking'] ? 'Si' : 'No' ?></td>
                    <td><?= $hotel['vote'] ?> stelle</td>
                    <td><?= $hotel['distance_to_center'] ?> km</td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>

</body>

</html>