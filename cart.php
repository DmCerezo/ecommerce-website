<?php
include 'db_connect.php';
$usuario_id = 1;
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Carrito - Somnia</title>
</head>
<body>

<?php include 'cards/nav.php'; ?>

<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>Carrito</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="untree_co-section before-footer-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $conn->prepare("
                SELECT c.id as carrito_id, p.nombre, p.imagen_url, c.precio_unitario, c.cantidad, c.total
                FROM carrito c
                JOIN productos p ON c.producto_id = p.id
                WHERE c.usuario_id = ?");
              $stmt->execute([$usuario_id]);
              $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

              $subtotal = 0;

              foreach ($items as $item):
                $subtotal += $item['total'];
              ?>
              <tr>
                <td><img src="<?php echo $item['imagen_url']; ?>" alt="Imagen" class="img-fluid" style="max-width: 100px;"></td>
                <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                <td>$<?php echo number_format($item['precio_unitario'], 2); ?></td>
                <td><?php echo $item['cantidad']; ?></td>
                <td>$<?php echo number_format($item['total'], 2); ?></td>
                <td><a href="eliminar_item.php?id=<?php echo $item['carrito_id']; ?>" class="btn btn-black btn-sm">X</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row justify-content-end">
      <div class="col-md-6 text-end">
        <h3>Total: $<?php echo number_format($subtotal, 2); ?></h3>
        <a href="checkout.php" class="btn btn-black btn-lg py-3">Finalizar Compra</a>
      </div>
    </div>
  </div>
</div>

<?php include 'cards/footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
