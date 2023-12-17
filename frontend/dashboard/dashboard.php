<?php

global $conn;
include('D:\.Scuola\Informatica\Bellsprout&CO\backend\config\db.php');

$query_shop_count = "SELECT COUNT(*) as total_shops FROM shop";
$query_plant_count = "SELECT COUNT(*) as total_plants FROM plant";
$query_nursery_count = "SELECT COUNT(*) as total_nurseries FROM nursery";

try {

    $result_shop_count = $conn->query($query_shop_count);
    $result_plant_count = $conn->query($query_plant_count);
    $result_nursery_count = $conn->query($query_nursery_count);


    if (!$result_shop_count || !$result_plant_count || !$result_nursery_count) {
        die("Errore nella query: " . $conn->errorInfo());
    }

    $row_shop_count = $result_shop_count->fetch(PDO::FETCH_ASSOC);
    $row_plant_count = $result_plant_count->fetch(PDO::FETCH_ASSOC);
    $row_nursery_count = $result_nursery_count->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Errore nella query: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/frontend/assets/css/style.css">
    <script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
    <title>Bellsprout&CO | DASHBOARD</title>
</head>
<body class="fadeIn-dashboard">
<nav>
     <ul>
        <li><a href="/frontend/index.php">Home Page</a></li>
        <li><i class="fa-solid fa-user" href="/frontend/login/login_form.php"></i></li>
    </ul>
</nav>
<h1>Dashboard</h1>

<div>
    <h2>Informazioni generali</h2>
    <p>Negozi di piante: <?php echo $row_shop_count['total_shops']; ?></p>
    <p>Piante disponibili: <?php echo $row_plant_count['total_plants']; ?></p>
    <p>Nurseries: <?php echo $row_nursery_count['total_nurseries']; ?></p>
</div>

</body>
</html>

