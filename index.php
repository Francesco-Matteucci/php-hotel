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

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Hotel</title>
</head>

<body>
    <h1>Lista Hotels</h1>

    <?php foreach ($hotels as $hotel) { ?>
    <h3>- <?= $hotel['name'] ?> -</h3>
    <p>Descrizione:<?= $hotel['description'] ?></p>
    <p>Parcheggio:<?= $hotel['parking'] ? 'Si' : 'No' ?></p>
    <p>Voto:<?= $hotel['vote'] ?> stelle</p>
    <p>Distanza dal centro:<?= $hotel['distance_to_center'] ?> km</p>
    <?php } ?>
</body>

</html>