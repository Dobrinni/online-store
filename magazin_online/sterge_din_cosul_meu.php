<?php
session_start();

if (isset($_POST['product_id'])) {
  $productId = $_POST['product_id'];

  if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$productId])) {
    unset($_SESSION['cart'][$productId]);
    $_SESSION['success_message'] = 'Produsul a fost eliminat din coșul de cumpărături.';
  }
}

?>
<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redirectare...</title>
  <script>
    window.onload = function() {
      window.location.href = 'cosul_meu.php';
    };
  </script>
</head>

<body>
  <p>Se realizează redirectarea către pagina "cosul meu"...</p>
</body>

</html>
