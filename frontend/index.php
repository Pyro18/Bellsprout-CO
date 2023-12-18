<?php
    session_start();
?>
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
          echo '<select onchange="location = this.value;">' ;
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
  <h1>Welcome to Bellsprout&CO</h1>

  <div class="search-container">
      <form method="GET" action="/frontend/search/search.php">
          <input type="text" placeholder="Search..." name="query">
          <button type="submit"><i class="fas fa-search"></i></button>
      </form>


      <!-- credo di dover usare ajax per far vedere il risultato delle query qua  -->
      <!-- TODO: USARE AJAX PER VEDERE LE QUERY NELL' INDEX -->
  </div>

  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
</body>
</html>

