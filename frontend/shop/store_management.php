<?php

global $conn;
session_start();
include('..\..\backend\config\db.php');

$query = "
    SELECT 
        s.shop_id,
        s.address,
        s.plant_count,
        n.plant_count AS nursery_plant_count,
        g.greenhouse_size
    FROM shop s
    LEFT JOIN nursery n ON s.shop_id = n.shop_id
    LEFT JOIN greenhouse g ON n.shop_id = g.shop_id
    ORDER BY s.shop_id;
";

$result = $conn->query($query);

if (!$result) {
    die("Errore nella query: " . $conn->errorInfo());
}

$shops = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/frontend/assets/css/shop_style.css">
    <title>Gestione Negozi, Nursery e Greenhouse</title>
</head>
<body>
    <h1>Gestione Negozi, Nursery e Greenhouse</h1>

    <ul>
        <?php foreach ($shops as $shop): ?>
            <li>
                <strong>Negozio ID:</strong> <?php echo $shop['shop_id']; ?><br>
                <strong>Indirizzo:</strong> <?php echo $shop['address']; ?><br>
                <strong>Numero di Piante:</strong> <?php echo $shop['plant_count']; ?><br>
                <strong>Numero di Piante Nursery:</strong> <?php echo $shop['nursery_plant_count']; ?><br>
                <strong>Greenhouse Size:</strong> <?php echo $shop['greenhouse_size']; ?><br>

            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
