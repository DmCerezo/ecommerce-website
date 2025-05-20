<?php include 'db_connect.php'; ?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, tienda, somnia" />
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Somnia - Catálogo</title>
</head>
<body>

  <?php include 'cards/nav.php'; ?>

  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Catálogo</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section product-section before-footer-section">
    <div class="container">
      <div class="row">
        <?php
        try {
          $query = "SELECT * FROM productos";
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

          foreach ($products as $product) {
        ?>
          <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-5">
            <form method="POST" action="agregar_al_carrito.php">
              <input type="hidden" name="producto_id" value="<?php echo $product['id']; ?>">
              <input type="hidden" name="precio" value="<?php echo $product['precio']; ?>">
              <button type="submit" class="product-item border-0 bg-transparent p-0">
                <img src="<?php echo htmlspecialchars($product['imagen_url']); ?>" class="img-fluid product-thumbnail" alt="<?php echo htmlspecialchars($product['nombre']); ?>">
                <h3 class="product-title"><?php echo htmlspecialchars($product['nombre']); ?></h3>
                <strong class="product-price">$<?php echo number_format($product['precio'], 2); ?></strong>
                <span class="icon-cross">
                  <img src="images/cross.svg" class="img-fluid">
                </span>
              </button>
            </form>
          </div>
        <?php
          }
        } catch (PDOException $e) {
          echo "Error al cargar productos: " . $e->getMessage();
        }
        ?>
      </div>
    </div>
  </div>

  <?php include 'cards/footer.php'; ?>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
