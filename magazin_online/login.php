<?php
session_start();

if (isset($_SESSION["autentificat"]) && $_SESSION["autentificat"] === true) {
  header("Location: index.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $servername = "localhost";
  $username = "root";
  $dbpassword = "";
  $database = "magazin_online";

  $conn = new mysqli($servername, $username, $dbpassword, $database);

  if ($conn->connect_error) {
    die("Conectare eșuată: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM utilizatori WHERE email = '$email' AND parola = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION["autentificat"] = true;
    $_SESSION["rol"] = $row["rol"];

    if ($row["rol"] == "admin") {
      header("Location: produse.php");
    } else {
      header("Location: index.php");
    }
    exit;
  } else {
    echo "Email sau parolă incorectă!";
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechWorld - Logare</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #000;
      color: #fff;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #000;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      color: #fff;
    }

    .form-group {
      margin-bottom: 10px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .form-group input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      border: none;
      border-radius: 4px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
    }

    .form-group .create-account {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Logare</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="email">Adresă de email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Parolă:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Logare">
      </div>
      <div class="form-group create-account">
        <a href="creare_cont.php">Creează cont</a>
      </div>
    </form>
  </div>
</body>

</html>
