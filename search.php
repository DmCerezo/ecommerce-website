<?php
include 'db_connect.php';

// Obtener valores únicos para los filtros
$colores = $conn->query("SELECT DISTINCT color FROM productos WHERE color IS NOT NULL AND color != ''")->fetchAll(PDO::FETCH_COLUMN);
$tamaños = $conn->query("SELECT DISTINCT tamaño FROM productos WHERE tamaño IS NOT NULL AND tamaño != ''")->fetchAll(PDO::FETCH_COLUMN);
$funcs = $conn->query("SELECT DISTINCT funcionalidades FROM productos WHERE funcionalidades IS NOT NULL AND funcionalidades != ''")->fetchAll(PDO::FETCH_COLUMN);

// Capturar filtros
$query = trim($_GET['query'] ?? '');
$color = $_GET['color'] ?? '';
$tamaño = $_GET['tamaño'] ?? '';
$funcionalidades = $_GET['funcionalidades'] ?? '';
$orden_precio = $_GET['orden_precio'] ?? '';

// Construir consulta con múltiples filtros
$sql = "SELECT * FROM productos";
$conditions = [];
$params = [];

if ($query !== '') {
    // Usar parámetros con nombres diferentes para cada LIKE
    $conditions[] = "(nombre LIKE :query_nombre OR descripcion LIKE :query_descripcion)";
    $params['query_nombre'] = "%$query%";
    $params['query_descripcion'] = "%$query%";
}
if ($color !== '') {
    $conditions[] = "color = :color";
    $params['color'] = $color;
}
if ($tamaño !== '') {
    $conditions[] = "tamaño = :tamano";
    $params['tamano'] = $tamaño;
}
if ($funcionalidades !== '') {
    $conditions[] = "funcionalidades LIKE :funcionalidades";
    $params['funcionalidades'] = "%$funcionalidades%";
}

if (count($conditions) > 0) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

if ($orden_precio == 'asc') {
    $sql .= " ORDER BY precio ASC";
} elseif ($orden_precio == 'desc') {
    $sql .= " ORDER BY precio DESC";
}

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Somnia - Búsqueda de Productos</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php include 'cards/nav.php'; ?>

<div class="hero">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 text-center">
        <div class="intro-excerpt">
          <h1 class="mb-4">Resultados de Búsqueda</h1>
        </div>
      </div>
    </div>

    <!-- Filtros en una fila aparte que ocupa todo el ancho -->
    <div class="row">
      <form action="search.php" method="GET" class="row g-3 mb-5" id="filtroForm">
        <div class="col-md-6 col-lg-4">
          <input type="text" name="query" id="query" class="form-control form-control-lg filtro" placeholder="Buscar productos..." value="<?= htmlspecialchars($query); ?>">
        </div>
        <div class="col-md-6 col-lg-2">
            <select name="color" id="color" class="form-select form-select-lg filtro">
            <option value="">Color</option>
            <?php foreach ($colores as $c): ?>
                <option value="<?= htmlspecialchars($c) ?>" <?= $color === $c ? 'selected' : '' ?>><?= ucfirst(htmlspecialchars($c)) ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 col-lg-2">
            <select name="tamaño" id="tamaño" class="form-select form-select-lg filtro">
            <option value="">Tamaño</option>
            <?php foreach ($tamaños as $t): ?>
                <option value="<?= htmlspecialchars($t) ?>" <?= $tamaño === $t ? 'selected' : '' ?>><?= ucfirst(htmlspecialchars($t)) ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 col-lg-2">
            <select name="funcionalidades" id="funcionalidades" class="form-select form-select-lg filtro">
            <option value="">Funcionalidad</option>
            <?php foreach ($funcs as $f): ?>
                <option value="<?= htmlspecialchars($f) ?>" <?= $funcionalidades === $f ? 'selected' : '' ?>><?= ucfirst(htmlspecialchars($f)) ?></option>
            <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6 col-lg-2">
          <select name="orden_precio" id="orden_precio" class="form-select form-select-lg">
            <option value="">Orden precio</option>
            <option value="asc" <?= $orden_precio == 'asc' ? 'selected' : '' ?>>Menor a mayor</option>
            <option value="desc" <?= $orden_precio == 'desc' ? 'selected' : '' ?>>Mayor a menor</option>
          </select>
        </div>
        <div class="col-12 text-end">
          <button class="btn btn-primary btn-lg"><i class="fas fa-search"></i> Buscar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Resultados -->
<div class="product-section">
  <div class="container">
    <div class="row">
      <?php if ($products): ?>
        <?php foreach ($products as $product): ?>
          <div class="col-12 col-md-4 col-lg-3 mb-4">
            <form method="POST" action="agregar_al_carrito.php">
              <input type="hidden" name="producto_id" value="<?= $product['id'] ?>">
              <input type="hidden" name="precio" value="<?= $product['precio'] ?>">
              <button type="submit" class="product-item border-0 bg-transparent p-0">
                <img src="<?= htmlspecialchars($product['imagen_url']) ?>" class="img-fluid product-thumbnail" alt="<?= htmlspecialchars($product['nombre']) ?>">
                <h3 class="product-title text-center"><?= htmlspecialchars($product['nombre']) ?></h3>
                <strong class="product-price d-block text-center">$<?= number_format($product['precio'], 2) ?></strong>
                <span class="icon-cross">
                  <img src="images/cross.svg" class="img-fluid">
                </span>
              </button>
            </form>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <p>No se encontraron productos para tu búsqueda.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>


<?php include 'cards/footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const filtros = document.querySelectorAll('.filtro');

    filtros.forEach(filtro => {
      filtro.addEventListener('change', () => {
        if (filtro.value !== '') {
          filtros.forEach(f => {
            if (f !== filtro) f.disabled = true;
          });
        } else {
          filtros.forEach(f => f.disabled = false);
        }
      });

      // Si uno ya tiene valor al cargar, desactivar los demás
      if (filtro.value !== '') {
        filtros.forEach(f => {
          if (f !== filtro) f.disabled = true;
        });
      }
    });
  });
</script>
</body>
</html>
