<?php
session_start();

if (isset($_GET['product_id'])) {
  $productId = $_GET['product_id'];

  
  if (($key = array_search($productId, $_SESSION['cart'])) !== false) {
    unset($_SESSION['cart'][$key]);
  }
}

header("Location: cosul_meu.php");
exit();
?>
