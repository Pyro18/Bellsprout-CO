<?php

$host = "localhost";
$dbname = "bellsprout&co";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connessione al database avvenuta con successo!";
} catch(PDOException $e) {
    echo "Errore nella connessione al database: " . $e->getMessage();
}
?>
