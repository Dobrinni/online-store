<?php
session_start();


if (isset($_SESSION['order'])) {
  
  $order = $_SESSION['order'];

  
  $nume = $order['nume'];
  $prenume = $order['prenume'];
  $adresa = $order['adresa'];
  $oras = $order['oras'];
  $telefon = $order['telefon'];
  $plata = $order['plata'];

  
  unset($_SESSION['order']);
} else {
  
  header("Location: cosul_meu.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmare comandă</title>
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
        <img src="https://i.imgur.com/i8je4Bp.png" alt="TechWorld Logo" style="width: 200px;">
      </a>
    </header>

    <h1>Confirmare comandă</h1>

    <p>Comanda dumneavoastră a fost înregistrată cu succes.</p>
    <p>Detalii comandă:</p>
    <ul>
      <li>Nume: <?php echo $nume; ?></li>
      <li>Prenume: <?php echo $prenume; ?></li>
      <li>Adresă: <?php echo $adresa; ?></li>
      <li>Oraș: <?php echo $oras; ?></li>
      <li>Număr de telefon: <?php echo $telefon; ?></li>
      <li>Metoda de plată: <?php echo $plata; ?></li>
    </ul>
  </div>
</body>

</html>
