<?php
session_start();

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
  $productId = $_POST['product_id'];
  $quantity = $_POST['quantity'];

  if (is_numeric($quantity) && $quantity > 0 && $quantity <= 10) {
    if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$productId])) {
      $_SESSION['cart'][$productId] = $quantity;
      $_SESSION['success_message'] = 'Cantitatea produsului a fost actualizată.';
    }
  }
}

header('Location: cosul_meu.php');
exit();
?>
