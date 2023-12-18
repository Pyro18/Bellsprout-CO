<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/frontend/assets/css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .result {
            border: 1px solid #ccc;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result h2 {
            margin-top: 0;
            color: #333;
        }

        .result p {
            margin-bottom: 0;
            color: #666;
        }

        form {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form label {
            font-weight: bold;
            margin-right: 10px;
        }

        form select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>

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
        if ($loggedIn) {
            echo '<li class="dropdown">';
            echo '<div class="div-dropdown">';
            echo '<select onchange="location = this.value;">';
            echo '<option selected disabled><i class="fa-solid fa-user" style="color: #ffffff;"></i>User</option>'; // Added icon here
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

<div class="search-results">
    <?php
    global $conn;

    include('D:\.Scuola\Informatica\Bellsprout-CO\backend\config\db.php');

    if ($_SERVER && isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
        $userInput = $_GET['query'];
        $order = isset($_GET['order']) ? $_GET['order'] : 't.common_name'; // ordina per nome di default

        try {
            $query = $conn->prepare("SELECT p.color, p.price, t.scientific_name, t.common_name, c.fat, c.watering, c.fruit, c.disease_resistance, c.seasonality, c.sunlight_exposure, c.fragrance
                                    FROM plant p
                                    LEFT JOIN type t ON p.type_id = t.type_id
                                    LEFT JOIN characteristic c ON p.characteristic_id = c.characteristic_id
                                    WHERE p.color LIKE :query 
                                    OR t.scientific_name LIKE :query 
                                    OR t.common_name LIKE :query 
                                    OR c.characteristic_id LIKE :query
                                    ORDER BY $order");

            $query->bindValue(':query', '%' . $userInput . '%', PDO::PARAM_STR);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($results);

            // div con risultati
            if ($results) {
                foreach ($results as $result) {
                    echo '<div class="result">';

                    echo '<h2>' . (isset($result['common_name']) ? $result['common_name'] : 'Nome non disponibile') . '</h2>';
                    echo '<p>Color: ' . (isset($result['color']) ? $result['color'] : 'Colore non disponibile') . '</p>';
                    echo '<p>Scientific Name: ' . (isset($result['scientific_name']) ? $result['scientific_name'] : 'Nome scientifico non disponibile') . '</p>';
                    echo '<p>Common Name: ' . (isset($result['common_name']) ? $result['common_name'] : 'Nome comune non disponibile') . '</p>';

                    echo '</div>';
                }
            } else {
                echo '<div class="result">';
                echo '<h2>No results found</h2>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    ?>
</div>

<form method="GET" action="./search.php">
    <input type="hidden" name="query"
           <!-- best practice per la sicurezza di quando si stampa un determinato contenuto in un valore html
           in questo caso mi assicuro che il valore dell'input utente ```($_GET['query'])``` sia correttamente controllato
           prima di essere inserito nell'HTML. (mi evito un XSS) -->
        value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
    <label for="order">Order by:</label>
    <select name="order" id="order" onchange="this.form.submit()">
        <option value="t.common_name" <?php echo (isset($_GET['order']) && $_GET['order'] == 't.common_name') ? 'selected' : ''; ?>>
            Common Name
        </option>
        <option value="t.scientific_name" <?php echo (isset($_GET['order']) && $_GET['order'] == 't.scientific_name') ? 'selected' : ''; ?>>
            Scientific Name
        </option>
        <option value="p.color" <?php echo (isset($_GET['order']) && $_GET['order'] == 'p.color') ? 'selected' : ''; ?>>
            Color
        </option>
    </select>
</form>


</body>
</html>
