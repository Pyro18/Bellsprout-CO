<?php
session_start();

var_dump($_SESSION['userId']);

if (!isset($_SESSION['userId'])) {
    echo "User not logged in!";
    header('Location: /frontend/login/login_form.php');
    exit;
}
?>
