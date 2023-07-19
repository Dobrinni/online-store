<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  
  if (!empty($email) && !empty($password)) {
    
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $database = "magazin_online";

    $conn = new mysqli("localhost", "root", '',"magazin_online");

    if ($conn->connect_error) {
      die("Conectare eșuată: " . $conn->connect_error);
    }

    
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    
    $sql = "INSERT INTO utilizatori (email, parola) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
      
      header("Location: login.php");
      exit;
    } else {
      echo "Eroare la inserarea datelor: " . $conn->error;
    }

    $conn->close();
  } else {
    $error_message = "Vă rugăm să completați adresa de email și parola.";
  }
}
?>

<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechWorld - Creare cont</title>
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

    .error-message {
      color: #ff0000;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Crează cont</h2>
    <?php
    if (isset($error_message)) {
      echo '<p class="error-message">' . $error_message . '</p>';
    }
    ?>
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
        <input type="submit" value="Crează cont">
      </div>
    </form>
    <p>Ai deja un cont? <a href="login.php">Loghează-te</a></p>
  </div>
</body>

</html>
