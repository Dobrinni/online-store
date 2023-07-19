<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['finalizare_comanda'])) {
    
    if (
      isset($_POST['nume']) &&
      isset($_POST['prenume']) &&
      isset($_POST['adresa']) &&
      isset($_POST['oras']) &&
      isset($_POST['telefon']) &&
      isset($_POST['plata']) &&
      isset($_POST['email'])
    ) {
      
      $nume = $_POST['nume'];
      $prenume = $_POST['prenume'];
      $adresa = $_POST['adresa'];
      $oras = $_POST['oras'];
      $telefon = $_POST['telefon'];
      $plata = $_POST['plata'];
      $email = $_POST['email'];
      $cvv = $_POST['cvv'];

      
      $_SESSION['order'] = [
        'nume' => $nume,
        'prenume' => $prenume,
        'adresa' => $adresa,
        'oras' => $oras,
        'telefon' => $telefon,
        'plata' => $plata,
        'email' => $email,
        'cvv' => $cvv,
      ];

      // Redirecționare către pagina de confirmare comandă
      header("Location: confirmare_comanda.php");
      exit();
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finalizare comandă</title>
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

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
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
      </a>
    </header>

    <h1>Finalizare comandă</h1>

    <form action="finalizare_comanda.php" method="POST">
      <div class="form-group">
        <label for="nume">Nume</label>
        <input type="text" id="nume" name="nume" required>
      </div>
      <div class="form-group">
        <label for="prenume">Prenume</label>
        <input type="text" id="prenume" name="prenume" required>
      </div>
      <div class="form-group">
        <label for="adresa">Adresa</label>
        <input type="text" id="adresa" name="adresa" required>
      </div>
      <div class="form-group">
        <label for="oras">Oraș</label>
        <input type="text" id="oras" name="oras" required>
      </div>
      <div class="form-group">
        <label for="telefon">Număr de telefon</label>
        <input type="tel" id="telefon" name="telefon" required>
      </div>
      <div class="form-group">
        <label for="email">Adresă de email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="plata">Metoda de plată</label>
        <select id="plata" name="plata" required>
          <option value="ramburs">Ramburs</option>
          <option value="card">Card</option>
        </select>
      </div>

      <!-- Adăugați câmpurile suplimentare pentru plata cu cardul -->
      <div id="card-fields" style="display: none;">
        <div class="form-group">
          <label for="nume_posesor">Numele posesorului cardului</label>
          <input type="text" id="nume_posesor" name="nume_posesor">
        </div>
        <div class="form-group">
          <label for="numar_card">Numărul cardului</label>
          <input type="text" id="numar_card" name="numar_card">
        </div>
        <div class="form-group">
          <label for="data_expirare">Data expirării</label>
          <select id="luna_expirare" name="luna_expirare">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">Aprilie</option>
            <option value="05">Mai</option>
            <option value="06">Iunie</option>
            <option value="07">Iulie</option>
            <option value="08">August</option>
            <option value="09">Septembrie</option>
            <option value="10">Octombrie</option>
            <option value="11">Noiembrie</option>
            <option value="12">Decembrie</option>
          </select>
          <select id="an_expirare" name="an_expirare">
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            <option value="2031">2031</option>
            <option value="2032">2032</option>
            <option value="2033">2033</option>
            <option value="2034">2034</option>
            <option value="2035">2035</option>
          </select>
        </div>

        <!-- Adăugați câmpul pentru CVV -->
        <div class="form-group">
          <label for="cvv">CVV</label>
          <input type="text" id="cvv" name="cvv">
        </div>
      </div>

      <input type="submit" name="finalizare_comanda" value="Finalizează comanda">
    </form>

    <script>
      // Obțineți elementul select pentru metoda de plată
      const plataSelect = document.getElementById('plata');

      // Obțineți div-ul cu câmpurile pentru plata cu cardul
      const cardFieldsDiv = document.getElementById('card-fields');

      // Adăugați un eveniment pentru schimbarea metodei de plată
      plataSelect.addEventListener('change', function() {
        if (plataSelect.value === 'card') {
          cardFieldsDiv.style.display = 'block';
        } else {
          cardFieldsDiv.style.display = 'none';
        }
      });
    </script>
  </div>
</body>

</html>
