<?php

global $conn;
session_start();
include('../config/db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

try {
    $res = $conn->query($sql);

    if($res->rowCount() > 0){
        $rows = $res->fetchAll();
        $_SESSION['userId'] = $rows[0]['user_id'];
        header('Location: /frontend/index.php');
    } else {
        header('Location: /frontend/login/login_form.php');
    }
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
?>
