<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechWorld - Recenzii de la clienți mulțumiți</title>
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
<script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
  <div class="container">
    <header>
      <img src="https://i.imgur.com/i8je4Bp.png" alt="TechWorld Logo">
      <a class="section-title" href="index.php">Home</a>
      <a class="section-title" href="recenzii.php">Recenzii</a>
      <a class="section-title" href="produse.php">Produse</a>
      <a class="section-title" href="cosul_meu.php">Cosul meu</a>
    </header>
    <h1>TechWorld - Trimite-ne părerea ta despre noi</h1>
    <p>Vă mulțumim că ați ales să ne lăsați o recenzie! Ne bucurăm să aflăm părerea dvs. despre produsele și serviciile noastre. Vă rugăm să completați formularul de mai jos pentru a ne împărtăși experiența dvs.</p>
    <form class="review-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group">
        <label for="name">Nume:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Adresă de email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="review">Recenzie:</label>
        <textarea id="review" name="review" rows="5" required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Trimite recenzia">
      </div>
    </form>
    <div id="reviews">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "magazin_online";

      $conn = new mysqli("localhost", "root", '',"magazin_online");
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      
      if(isset($_POST['submit'])){
      
        $name = $_POST["name"];
        $email = $_POST["email"];
        $review = $_POST["review"];

        $sql = "INSERT INTO recenzii (nume, email, comentariu) VALUES ('$name', '$email', '$review')";
        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Eroare la adăugarea recenziei: " . $conn->error;
        }
      }

      $sql = "SELECT * FROM recenzii ORDER BY data_publicarii DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<p><strong>Nume:</strong> " . $row["nume"] . "</p>";
          echo "<p><strong>Recenzie:</strong> " . $row["comentariu"] . "</p>";
          echo "<p><strong>Data publicării:</strong> " . $row["data_publicarii"] . "</p>";
          echo "<hr>";
        }
      } else {
        echo "<p>Nu există recenzii disponibile.</p>";
      }

      $conn->close();
      ?>
    </div>
    <p>Mulțumim că ați ales TechWorld!</p>
  </div>
</body>

</html>
