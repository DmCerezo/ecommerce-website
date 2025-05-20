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
            ¿Cliente frecuente? <a href="#">Haz clic aquí</a> para iniciar sesión.
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black">Detalles de Facturación</h2>
          <div class="p-3 p-lg-5 border bg-white">
            <div class="form-group">
              <label for="c_country" class="text-black">País <span class="text-danger">*</span></label>
              <select id="c_country" class="form-control">
                <option value="1">Selecciona un país</option>
                <option value="2">Bangladesh</option>
                <option value="3">Argelia</option>
                <option value="4">Afganistán</option>
                <option value="5">Ghana</option>
                <option value="6">Albania</option>
                <option value="7">Baréin</option>
                <option value="8">Colombia</option>
                <option value="9">República Dominicana</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="c_fname">
              </div>
              <div class="col-md-6">
                <label for="c_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_lname" name="c_lname">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Empresa</label>
                <input type="text" class="form-control" id="c_companyname" name="c_companyname">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Dirección completa">
              </div>
            </div>

            <div class="form-group mt-3">
              <input type="text" class="form-control" placeholder="Apartamento, piso, unidad, etc. (opcional)">
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <label for="c_state_country" class="text-black">Estado / Provincia <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_state_country" name="c_state_country">
              </div>
              <div class="col-md-6">
                <label for="c_postal_zip" class="text-black">Código Postal <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
              </div>
            </div>

            <div class="form-group row mb-5">
              <div class="col-md-6">
                <label for="c_email_address" class="text-black">Correo electrónico <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
              </div>
              <div class="col-md-6">
                <label for="c_phone" class="text-black">Teléfono <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Número de teléfono">
              </div>
            </div>

            <div class="form-group">
              <label for="c_create_account" class="text-black" data-bs-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> ¿Crear una cuenta?</label>
              <div class="collapse" id="create_an_account">
                <div class="py-2 mb-4">
                  <p class="mb-3">Crea una cuenta ingresando la información a continuación. Si ya tienes cuenta, inicia sesión arriba.</p>
                  <div class="form-group">
                    <label for="c_account_password" class="text-black">Contraseña de la cuenta</label>
                    <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> ¿Enviar a una dirección diferente?</label>
              <div class="collapse" id="ship_different_address">
                <div class="py-2">
                  <div class="form-group">
                    <label for="c_diff_country" class="text-black">País <span class="text-danger">*</span></label>
                    <select id="c_diff_country" class="form-control">
                      <option value="1">Selecciona un país</option>
                      <option value="2">Bangladesh</option>
                      <option value="3">Argelia</option>
                      <option value="4">Afganistán</option>
                      <option value="5">Ghana</option>
                      <option value="6">Albania</option>
                      <option value="7">Baréin</option>
                      <option value="8">Colombia</option>
                      <option value="9">República Dominicana</option>
                    </select>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_diff_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_diff_companyname" class="text-black">Empresa</label>
                      <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <div class="col-md-12">
                      <label for="c_diff_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Dirección completa">
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Apartamento, piso, unidad, etc. (opcional)">
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_diff_state_country" class="text-black">Estado / Provincia <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_postal_zip" class="text-black">Código Postal <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                    </div>
                  </div>

                  <div class="form-group row mb-5">
                    <div class="col-md-6">
                      <label for="c_diff_email_address" class="text-black">Correo electrónico <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                    </div>
                    <div class="col-md-6">
                      <label for="c_diff_phone" class="text-black">Teléfono <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Número de teléfono">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="c_order_notes" class="text-black">Notas del pedido</label>
              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Escribe tus notas aquí..."></textarea>
            </div>
          </div>
        </div>

        <div class="col-md-6">
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
					<button type="submit" class="btn btn-black btn-lg py-3 btn-block">Realizar Pedido</button>
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
</body>
</html>
