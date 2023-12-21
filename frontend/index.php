<?php
global $conn;
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/b647a6c85b.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="./assets/img/logo.jpeg">
  <link rel="stylesheet" href="./assets/css/style.css">


  <title>Bellsprout&CO | HOME</title>
</head>
<body class="fadeIn">
  <nav class="navbar">
    <ul class="nav-list">
    <div class="search-container">
      
      <form method="GET" action="/frontend/search/search.php">
          <input type="text" placeholder="Search..." name="query">
          <button type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
      <?php
        $loggedIn = isset($_SESSION['userId']);
        if ($loggedIn){
          echo '<li class="dropdown">';
          echo '<div class="div-dropdown">';
          echo '<select onchange="location = this.value;">' ;
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

<?php
include('D:\.Scuola\Informatica\Bellsprout-CO\backend\config\db.php');

$query = "SELECT p.image, t.scientific_name, t.common_name, p.price
          FROM plant p INNER JOIN
          type t ON p.type_id = t.type_id";

try {
    $stmt = $conn->query($query);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

echo '<div class="plant-container">';

foreach ($result as $row) {
    echo '<div class="plant">';
    echo '<img src="'. $row['image']. '" alt="plant" width=auto height=100>';
    echo "<p><strong>Nome Scientifico:</strong> {$row['scientific_name']}</p>";
    echo "<p><strong>Nome Comune:</strong> {$row['common_name']}</p>";
    echo "<p><strong>Prezzo:</strong> {$row['price']} $</p>";
    echo '</div>';
}

echo '</div>';
?>


</body>
</html>