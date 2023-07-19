<?php
session_start();

if (isset($_GET['product_id'])) {
  $_SESSION['cart'][] = $_GET['product_id'];

  header("Location: produse.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechWorld - Produse</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #000;
      color: #fff;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #000;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
    }

    header {
      text-align: center;
      padding-bottom: 20px;
      border-bottom: 1px solid #333;
    }

    header img {
      width: 200px;
    }

    h1 {
      color: #ff4500;
      margin-top: 20px;
    }

    p {
      line-height: 1.6;
    }

    .section-title {
      color: #ff4500;
      margin-top: 40px;
    }

    .active {
      background-color: #ff6100;
    }

    .cta-button {
      display: inline-block;
      width: 200px;
      margin: 20px auto;
      padding: 10px;
      background-color: #ff4500;
      color: #fff;
      text-align: center;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }

    .cta-button:hover {
      background-color: #ff6100;
    }

    .review-form {
      margin-top: 40px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    .form-group input[type="submit"] {
      background-color: #ff4500;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <a href="index.php">
        <img src="https://i.imgur.com/i8je4Bp.png" alt="TechWorld Logo" style="width: 200px;">
      </a>
      <a class="section-title" href="index.php">Home</a>
      <a class="section-title" href="produse.php">Produse</a>
      <a class="section-title" href="recenzii.php">Recenzii</a>
      <a class="section-title" href="cosul_meu.php">Cosul meu</a>
    </header>
    <h1>TechWorld - Produse</h1>
    <div class="products-section">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "magazin_online";

      $conn = new mysqli("localhost", "root", '',"magazin_online");


      if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="product">';
          echo '<img src="image/' . $row["image"] . '" alt="' . $row["name"] . '">';
          echo '<h3>' . $row["name"] . '</h3>';
          echo '<p>' . $row["description"] . '</p>';
          echo '<p>Preț: ' . $row["price"] . ' lei</p>';
          echo '<a class="cta-button" href="produse.php?product_id=' . $row["id"] . '">Adaugă în coș</a>';
          echo '</div>';
        }
      } else {
        echo "Nu s-au găsit produse.";
      }

      $conn->close();
      ?>
    </div>
    <div class="contact-section">
      <h2>Contact</h2>
      <p>Pentru mai multe informații, vă rugăm să ne contactați:</p>
      <div class="contact-info">
        <p>Email: TechWorld@gmail.com</p>
        <p>Telefon: 021 9456</p>
      </div>
      <a class="cta-button" href="index.php">Înapoi la Pagina Principală</a>
    </div>
  </div>
</body>

</html>
