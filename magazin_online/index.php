<?php
session_start();


if (isset($_SESSION["autentificat"]) && $_SESSION["autentificat"] === true) {
  $butonText = 'Delogare';
  $butonLink = 'logout.php';
} else {
  $butonText = 'Logare';
  $butonLink = 'login.php';
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechWorld - Magazin Online pentru Gadgets</title>
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
  </style>
</head>

<body>
  <div class="container">
    <header>
      <img src="https://i.imgur.com/i8je4Bp.png" alt="TechWorld Logo">
      <a class="section-title" href="#home">Home</a>
      <a class="section-title" href="recenzii.php">Recenzii</a>
      <a class="section-title" href="cosul_meu.php">Cosul meu</a>
      <a class="section-title" href="<?php echo $butonLink; ?>"><?php echo $butonText; ?></a>
    </header>
    <h1>TechWorld - Magazin Online pentru Gadgets</h1>
    <p>Bine ați venit la TechWorld, magazinul online unde puteți găsi cele mai noi și mai interesante gadget-uri din lume! Avem o gamă largă de produse, de la telefoane mobile și tablete, la smartwatch-uri și dispozitive inteligente pentru casă.</p>
    <p>Indiferent că sunteți un pasionat al tehnologiei sau căutați un cadou special pentru cineva drag, veți găsi cu siguranță ceva pe placul vostru în magazinul nostru online. Toate produsele noastre sunt de cea mai bună calitate și provin de la branduri de încredere.</p>
    <p>Vă invităm să explorați colecția noastră de gadget-uri și să vă bucurați de o experiență de cumpărături plăcută:</p>
    <a class="cta-button" href="produse.php">Explorați Produsele</a>

    <div class="reviews-section" id="reviews">
      <h2>Trimite-ne parerea ta despre noi</h2>
    </div>
    <p>Mulțumim că ați ales TechWorld!</p>
    <div class="contact-section">
      <h2>Contact</h2>
      <p>Pentru mai multe informații, vă rugăm să ne contactați:</p>
      <div class="contact-info">
        <p>Email: TechWorld@gmail.com</p>
        <p>Telefon: 021 9456</p>
    </div>
  </div>
</body>

</html>
