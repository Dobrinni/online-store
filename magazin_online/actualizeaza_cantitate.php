<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
  $productId = $_POST['product_id'];
  $quantity = $_POST['quantity'];

  $_SESSION['cart'][$productId] = $quantity;

  $total = 0;
  foreach ($_SESSION['cart'] as $id => $quantity) {
         $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "magazin_online";

        $conn = new mysqli("localhost", "root", '',"magazin_online");

    if ($conn->connect_error) {
      die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $sql = "SELECT price FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $productPrice = $row['price'];
    } else {
      $productPrice = 0; 
    }

    $conn->close();

    $productTotal = $productPrice * $quantity;
    $total += $productTotal;
  }

  echo json_encode([
    'quantity' => $quantity,
    'total' => $total
  ]);
}
?>
