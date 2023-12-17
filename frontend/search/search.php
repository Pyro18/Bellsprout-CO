<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/frontend/assets/css/style.css">
    <title>Bellsprout&CO | HOME</title>
</head>
<body class="fadeIn">
<nav class="navbar">
    <ul class="nav-list">
        <li><a href="#">Query</a></li>
        <li><a href="#">Join</a></li>
        <li><a href="#">Group By</a></li>

        <?php
        $loggedIn = isset($_SESSION['userId']);
        if ($loggedIn){
            echo '<li class="dropdown">';
            echo '<div class="div-dropdown">';
            echo '<select onchange="location = this.value;">';
            echo '<option value="#" selected>User Menu</option>';
            echo '<option value="./dashboard/dashboard.php">Dashboard</option>';
            echo '<option value="#">Profile</option>';
            echo '<option value="./login/logout.php">Logout</option>';
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
</body>
</html>

<?php
global $conn;


include('D:\.Scuola\Informatica\Bellsprout&CO\backend\config\db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $query = $_GET['query'];

    try {
        // QUERY CON WHERE E SUBQUERY :)
        $stmt = $conn->prepare("SELECT * FROM plant WHERE color LIKE :query OR type_id IN 
                                               (SELECT type_id FROM type WHERE scientific_name LIKE :query OR common_name LIKE :query)");
        $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        echo '<pre>';
        print_r($results);
        echo '</pre>';
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>



