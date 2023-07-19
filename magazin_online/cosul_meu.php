<?php
session_start();

if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
  $productId = $_GET['product_id'];
  $quantity = $_GET['quantity'];

  
  if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId] = $quantity;
  }

  header("Location: cosul_meu.php");
  exit();
}

if (isset($_GET['delete_product_id'])) {
  $productId = $_GET['delete_product_id'];

  
  if (isset($_SESSION['cart'][$productId])) {
    unset($_SESSION['cart'][$productId]);
  }

  header("Location: cosul_meu.php");
  exit();
}

$total = 0;

$servername = "localhost";
$username = "root";
$password = "";
$database = "magazin_online";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
  $productIds = array_keys($_SESSION['cart']);
  $productIdsString = implode(",", $productIds);

  $sql = "SELECT * FROM products WHERE id IN ($productIdsString)";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    ?>

    <!DOCTYPE html>
    <html lang="ro">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cosul meu</title>
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

        .product {
          margin-bottom: 20px;
        }

        .product img {
          max-width: 100%;
          height: auto;
        }

        .quantity-input {
          width: 50px;
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 4px;
        }

        .checkout-button {
          display: block;
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

        .checkout-button:hover {
          background-color: #ff6100;
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

        <h1>Cosul meu</h1>

        <?php
        while ($row = $result->fetch_assoc()) {
          $productId = $row['id'];
          $productName = $row['name'];
          $productPrice = $row['price'];
          $productQuantity = $_SESSION['cart'][$productId];

          $productTotal = $productPrice * $productQuantity;
          $total += $productTotal;
          ?>
          <div id="product-<?php echo $productId; ?>" class="product">
            <h3><?php echo $productName; ?></h3>
            <p>Preț: <?php echo $productPrice; ?> lei</p>
            <p>Cantitate:
              <input type="number" class="quantity-input" id="quantity-<?php echo $productId; ?>" name="quantity-<?php echo $productId; ?>" value="<?php echo $productQuantity; ?>" min="1">
              <button onclick="updateQuantity(<?php echo $productId; ?>)">Actualizează</button>
            </p>
            <p>Total: <?php echo $productTotal; ?> lei</p>
            <button onclick="deleteProduct(<?php echo $productId; ?>);">Șterge</button>
          </div>
        <?php
        }
        ?>
        <p>Total comandă: <?php echo $total; ?> lei</p>
        <a class="checkout-button" href="finalizare_comanda.php">Finalizează comanda</a>

        <script>
          function updateQuantity(productId) {
            const quantityInput = document.getElementById('quantity-' + productId);
            const quantity = parseInt(quantityInput.value);

            window.location.href = 'cosul_meu.php?product_id=' + productId + '&quantity=' + quantity;
          }

          function deleteProduct(productId) {
            window.location.href = 'cosul_meu.php?delete_product_id=' + productId;
          }
        </script>
      </div>
    </body>

    </html>
    <?php
  } else {
    echo "<p>Coșul tău de cumpărături este gol.</p>";
  }
} else {
  echo "<p>Coșul tău de cumpărături este gol.</p>";
}

$conn->close();
?>
