<?php
include 'db_connect.php';

// Supongamos que usuario_id es fijo
$usuario_id = 1;

// Obtener productos del carrito
$stmt = $conn->prepare("
    SELECT p.nombre, p.imagen_url, c.cantidad, c.precio_unitario, c.total
    FROM carrito c
    JOIN productos p ON c.producto_id = p.id
    WHERE c.usuario_id = ?
");
$stmt->execute([$usuario_id]);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vaciar carrito
$conn->prepare("DELETE FROM carrito WHERE usuario_id = ?")->execute([$usuario_id]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Procesando pedido...</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Somnia">
  <meta http-equiv="refresh" content="5;url=thankyou.php">
  <link rel="shortcut icon" href="favicon.png">

  <!-- Estilos de Bootstrap y plantilla -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <!-- Inicio Header/Navigation -->
  <?php include 'cards/nav.php'; ?>
  <!-- Fin Header/Navigation -->

  <div class="untree_co-section">
    <div class="container mt-5">
      <h2 class="mb-4">Gracias por tu pedido</h2>
      <p>Este es un resumen de los productos que compraste:</p>

      <table class="table table-bordered align-middle">
        <thead class="table-dark">
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($items as $item): ?>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="<?php echo htmlspecialchars($item['imagen_url']); ?>" alt="" width="50" class="me-3">
                  <span><?php echo htmlspecialchars($item['nombre']); ?></span>
                </div>
              </td>
              <td><?php echo $item['cantidad']; ?></td>
              <td>$<?php echo number_format($item['precio_unitario'], 2); ?></td>
              <td>$<?php echo number_format($item['total'], 2); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="mt-4">
        <p class="text-success">Serás redirigido automáticamente en unos segundos...</p>
        <a href="thankyou.php" class="btn btn-black">Ir ahora</a>
      </div>
    </div>
  </div>

  <!-- Inicio Footer -->
  <?php include 'cards/footer.php'; ?>
  <!-- Fin Footer -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
