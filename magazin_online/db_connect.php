<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "magazin_online";

$conn = new mysqli("localhost", "root", '',"magazin_online");

if ($conn->connect_error) {
    die("Conectarea la baza de date a eșuat: " . $conn->connect_error);
}

echo "Conectat la baza de date cu succes!";
?>
