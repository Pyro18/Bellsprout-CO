<?php
session_start();

global $conn;
include('..\..\backend\config\db.php');

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
    <link rel="stylesheet" href="/frontend/assets/css/dashboard_style.css">
    <script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.jpeg">



    <title>Bellsprout&CO | DASHBOARD</title>
</head>
<body class="fadeIn-dashboard">
<nav class="navbar">
    <ul class="nav-list">

        <li><a href="/frontend/index.php">HOME</a></li>
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
        if ($loggedIn) {
            echo '<li class="dropdown">';
            echo '<div class="div-dropdown">';
            echo '<select onchange="location = this.value;">';
            echo '<option selected disabled><i class="fa-solid fa-user" style="color: #ffffff;"></i>User</option>';
            echo '<option value="./dashboard/dashboard.php">Dashboard</option>';
            echo '<option value="#">Profile</option>';
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
<h1 style="padding: 20px margin: 20px">Dashboard</h1>
<div class="dashboard">

    <h2>Informazioni generali</h2>
    <p>Negozi di piante: <?php echo $row_shop_count['total_shops']; ?></p>
    <p>Piante disponibili: <?php echo $row_plant_count['total_plants']; ?></p>
    <p>Nurseries: <?php echo $row_nursery_count['total_nurseries']; ?></p>
</div>

</body>
</html>