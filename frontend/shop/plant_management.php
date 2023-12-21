<?php
global $conn;
session_start();
include('..\..\backend\config\db.php');

$query = "
    SELECT DISTINCT
        p.plant_id,
        p.height,
        p.color,
        p.price,
        c.type,
        s.address AS shop_address,
        n.cultivation_type AS nursery_cultivation_type,
        g.greenhouse_size
    FROM plant p
    JOIN characteristic c ON p.characteristic_id = c.characteristic_id
    RIGHT JOIN shop s ON p.type_id = s.shop_id
    RIGHT JOIN nursery n ON p.type_id = n.shop_id
    RIGHT JOIN greenhouse g ON p.type_id = g.shop_id
    HAVING p.price > 20;
";

$result = $conn->query($query);

if (!$result) {
    die("Errore nella query: " . $conn->errorInfo());
}

$plants = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="/frontend/assets/css/shop_style.css">
    <title>Gestione Piante</title>
</head>
<body>
    <h1>Gestione Piante</h1>

    <ul>
        <?php foreach ($plants as $plant): ?>
            <li>
                <strong>Pianta ID:</strong> <?php echo $plant['plant_id']; ?><br>
                <strong>Altezza:</strong> <?php echo $plant['height']; ?> cm<br>
                <strong>Colore:</strong> <?php echo $plant['color']; ?><br>
                <strong>Prezzo:</strong> <?php echo $plant['price']; ?> Euro<br>
                <strong>Tipo:</strong> <?php echo $plant['type']; ?><br>
                <strong>Negozio Address:</strong> <?php echo $plant['shop_address']; ?><br>
                <strong>Nursery Cultivation Type:</strong> <?php echo $plant['nursery_cultivation_type']; ?><br>
                <strong>Greenhouse Size:</strong> <?php echo $plant['greenhouse_size']; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>


</body>
</html>
