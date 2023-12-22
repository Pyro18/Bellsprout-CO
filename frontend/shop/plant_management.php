<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../frontend/assets/css/style.css">
        <link rel="stylesheet" href="../../frontend/assets/css/shop_style.css">
        <title>Gestione Piante</title>
</head>

<body class="fadeIn">
    <nav class="navbar">
        <ul class="nav-list">
        <div class="search-container">
            
            <form method="GET" action="/frontend/search/search.php">
                    <label>
                            <input type="text" placeholder="Search..." name="query">
                    </label>
                    <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
            <?php
                $loggedIn = isset($_SESSION['userId']);
                if ($loggedIn){
                    echo '<li><a href="../../frontend/dashboard/dashboard.php">DASHBOARD</a></li>';
                    echo '<li class="dropdown">';
                    echo '<div class="div-dropdown">';
                    echo '<select onchange="location = this.value;">' ;
                    echo '<option selected disabled>User</option>';
                    echo '<option value="../../frontend/dashboard/dashboard.php">Dashboard</option>';
                    echo '<option value="../../frontend/shop/plant_management.php">Gestione Piante</option>';
                    echo '<option value=".\login\logout.php">Logout</option>';
                    echo '</select>';
                    echo '</div>';
                    echo '</li>';
                } else {
                    echo '<div class="login-pre-login"';
                    echo '<li><a href="/frontend/login/login_form.php">Login</a></li>';
                    //echo '<li><a href="./login/register.php">Register</a></li>';
                    echo '</div>';
                }
            ?>
        </ul>
    </nav>
        <h1>Gestione Piante</h1>

<?php

include('../../backend/config/db.php');

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

foreach ($plants as $plant){
        echo '<div class="plant">';
        echo '<p><strong>Plant ID:</strong> ' . $plant['plant_id'] . '</p>';
        echo '<p><strong>Height:</strong> ' . $plant['height'] . '</p>';
        echo '<p><strong>Color:</strong> ' . $plant['color'] . '</p>';
        echo '<p><strong>Price:</strong> ' . $plant['price'] . '</p>';
        echo '<p><strong>Type:</strong> ' . $plant['type'] . '</p>';
        echo '<p><strong>Shop Address:</strong> ' . $plant['shop_address'] . '</p>';
        echo '<p><strong>Nursery Cultivation Type:</strong> ' . $plant['nursery_cultivation_type'] . '</p>';
        echo '<p><strong>Greenhouse Size:</strong> ' . $plant['greenhouse_size'] . '</p>';
        echo '</div>';
}
?>

</body>
</html>
