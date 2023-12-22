<?php

global $conn;
session_start();
include('../../backend/config/db.php');

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
<script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../frontend/assets/css/style.css">
        <link rel="stylesheet" href="../../frontend/assets/css/shop_style.css">
    <title>Gestione Negozi, Nursery e Greenhouse</title>
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
                    echo '<li><a href="../../frontend/index.php">HOME</a></li>';
                    echo '<li><a href="../../frontend/dashboard/dashboard.php">DASHBOARD</a></li>';
                    echo '<li class="dropdown">';
                    echo '<div class="div-dropdown">';
                    echo '<select onchange="location = this.value;">' ;
                    echo '<option selected disabled>User</option>';
                    echo '<option value="./dashboard/dashboard.php">Dashboard</option>';
                    echo '<option value="../../frontend/shop/store_management.php">Gestione Negozi</option>';
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
    <h1>Gestione Negozi, Nursery e Greenhouse</h1>

    <ul>
        <?php
        foreach ($shops as $shop) {
            echo '<div class="">';
            
            echo '<li>';
            echo '<h2>Negozio ' . $shop['shop_id'] . '</h2>';
            echo '<ul>';
            echo '<li>Indirizzo: ' . $shop['address'] . '</li>';
            echo '<li>Numero piante: ' . $shop['plant_count'] . '</li>';
            echo '<li>Numero piante nursery: ' . $shop['nursery_plant_count'] . '</li>';
            echo '<li>Dimensione greenhouse: ' . $shop['greenhouse_size'] . '</li>';
            echo '</ul>';
            echo '</li>';
            echo '</div>';
        }
        ?>
    </ul>


</body>
</html>
