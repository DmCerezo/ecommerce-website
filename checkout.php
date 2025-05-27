<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Somnia - La comodidad que se siente y se escucha</title>
</head>

<body>

  <!-- Inicio Header/Navigation -->
  <?php include 'cards/nav.php'; ?>
  <!-- Fin Header/Navigation -->

  <script>
  const usuarioLogueado = <?php echo isset($_SESSION['usuario']) ? 'true' : 'false'; ?>;
</script>



  <?php
include 'db_connect.php';
$usuario_id = 1;

$stmt = $conn->prepare("
  SELECT p.nombre, c.cantidad, c.precio_unitario, c.total
  FROM carrito c
  JOIN productos p ON c.producto_id = p.id
  WHERE c.usuario_id = ?
");
$stmt->execute([$usuario_id]);
$carrito = $stmt->fetchAll(PDO::FETCH_ASSOC);

$subtotal = 0;
foreach ($carrito as $item) {
    $subtotal += $item['total'];
}
$usuario = null;

if (isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario'];

    $stmt = $conn->prepare("SELECT direccion_entrega, codigo_postal, direccion_facturacion, telefono FROM usuarios WHERE nombre = ?");
    $stmt->execute([$nombreUsuario]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>


  <!-- Sección Hero -->
  <div class="hero">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="intro-excerpt">
            <h1>Finalizar Compra</h1>
          </div>
        </div>
        <div class="col-lg-7"></div>
      </div>
    </div>
  </div>
  <!-- Fin Hero -->

  <div class="untree_co-section">
    <form action="procesar_checkout.php" method="POST">
  	  <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="border p-4 rounded" role="alert">
            <?php if (isset($_SESSION['usuario'])): ?>
              Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?>. Puede continuar con su compra.
            <?php else: ?>
              Por favor inicie sesión para realizar la compra
              <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Haz clic aquí</a> para iniciar sesión o registrarte.
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- Sección Dirección de Envío -->
    <div class="row mb-5">
      <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Dirección de Envío</h2>
        <div class="p-3 p-lg-5 border bg-white">
<?php if (isset($_SESSION['usuario'])): ?>
  <p><strong>Dirección de Entrega:</strong> <?= htmlspecialchars($usuario['direccion_entrega'] ?? 'No especificada') ?></p>
  <p><strong>Código Postal:</strong> <?= htmlspecialchars($usuario['codigo_postal'] ?? 'No especificado') ?></p>
  <p><strong>Dirección de Facturación:</strong> <?= htmlspecialchars($usuario['direccion_facturacion'] ?? 'No especificada') ?></p>
  <p><strong>Teléfono:</strong> <?= htmlspecialchars($usuario['telefono'] ?? 'No especificado') ?></p>
<?php else: ?>
  <div class="alert alert-warning mb-0" role="alert">
    Por favor <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">inicia sesión</a> para ver tu información de envío.
  </div>
<?php endif; ?>

        </div>
      </div>
    </div>


      <div class="row">
        <div class="col-md-12">
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Código de Cupón</h2>
              <div class="p-3 p-lg-5 border bg-white">
                <label for="c_code" class="text-black mb-3">Ingresa tu código si tienes uno</label>
                <div class="input-group w-75 couponcode-wrap">
                  <input type="text" class="form-control me-2" id="c_code" placeholder="Código de cupón" aria-label="Coupon Code" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-black btn-sm" type="button" id="button-addon2">Aplicar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black">Tu Pedido</h2>
              <div class="p-3 p-lg-5 border bg-white">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Producto</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                    <?php foreach ($carrito as $item): ?>
					<tr>
					<td>
						<?php echo htmlspecialchars($item['nombre']); ?>
						<strong class="mx-2">x</strong>
						<?php echo $item['cantidad']; ?>
					</td>
					<td>$<?php echo number_format($item['total'], 2); ?></td>
					</tr>
					<?php endforeach; ?>

					<tr>
					<td class="text-black font-weight-bold"><strong>Subtotal</strong></td>
					<td class="text-black">$<?php echo number_format($subtotal, 2); ?></td>
					</tr>
					<tr>
					<td class="text-black font-weight-bold"><strong>Total</strong></td>
					<td class="text-black font-weight-bold"><strong>$<?php echo number_format($subtotal, 2); ?></strong></td>
					</tr>

                  </tbody>
                </table>

                <div class="border p-3 mb-3">
                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia Bancaria Directa</a></h3>
                  <div class="collapse" id="collapsebank">
                    <div class="py-2">
                      <p class="mb-0">Realiza el pago directamente en nuestra cuenta bancaria. Usa tu ID de pedido como referencia. No se enviará tu pedido hasta que recibamos el pago.</p>
                    </div>
                  </div>
                </div>

                <div class="border p-3 mb-3">
                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Pago con Cheque</a></h3>
                  <div class="collapse" id="collapsecheque">
                    <div class="py-2">
                      <p class="mb-0">Realiza el pago directamente en nuestra cuenta bancaria. Usa tu ID de pedido como referencia. No se enviará tu pedido hasta que recibamos el pago.</p>
                    </div>
                  </div>
                </div>

                <div class="border p-3 mb-5">
                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                  <div class="collapse" id="collapsepaypal">
                    <div class="py-2">
                      <p class="mb-0">Realiza el pago directamente en nuestra cuenta bancaria. Usa tu ID de pedido como referencia. No se enviará tu pedido hasta que recibamos el pago.</p>
                    </div>
                  </div>
                </div>

                <div class="form-group">
					        <button type="button" class="btn btn-black btn-lg py-3 btn-block" onclick="validarCompra()">Realizar Pedido</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</form>

  <!-- Inicio Footer Section -->
  <?php include 'cards/footer.php'; ?>
  <!-- Fin Footer Section -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>

  <script>
function validarCompra() {
  if (!usuarioLogueado) {
    alert("Debes iniciar sesión para realizar la compra.");
  } else {
    window.location.href = "procesar_checkout.php";
  }
}
</script>
</body>
</html>
