<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nume = $_POST['nume'];
  $prenume = $_POST['prenume'];
  $adresa = $_POST['adresa'];
  $oras = $_POST['oras'];
  $telefon = $_POST['telefon'];
  $plata = $_POST['plata'];

  

  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "magazin_online";

  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
  }

  
  $sql = "INSERT INTO comenzi (nume, prenume, adresa, oras, telefon, plata) VALUES ('$nume', '$prenume', '$adresa', '$oras', '$telefon', '$plata')";

  if ($conn->query($sql) === TRUE) {
    

    
    unset($_SESSION['cart']);

    
    header("Location: confirmare_comanda.php");
    exit();
  } else {
    echo "Eroare la salvarea comenzii în baza de date: " . $conn->error;
  }

  $conn->close();
}
?>
