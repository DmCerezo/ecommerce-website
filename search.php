<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="Somnia - Tienda de mantas con peso inteligentes">
    <meta name="keywords" content="mantas, peso terapéutico, tecnología, descanso">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Somnia - Búsqueda de Productos</title>
</head>
<body>
    <!-- Start Header/Navigation -->
    <?php include 'cards/nav.php'; ?>
    <!-- End Header/Navigation -->

    <!-- Start Search Results Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1 class="mb-4">Resultados de Búsqueda</h1>

<form action="search.php" method="GET" class="mb-5">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Buscar productos..." required value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-section">
        <div class="container">
            <div class="row">
                <?php
                include 'db_connect.php';

                try {
                    $query = isset($_GET['query']) ? filter_var($_GET['query'], FILTER_SANITIZE_STRING) : '';
                    if ($query) {
                        // Buscar en nombre y descripción
                        $sql = "SELECT * FROM productos WHERE nombre LIKE :query OR descripcion LIKE :query";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(['query' => '%' . $query . '%']);
                        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($products) {
                            foreach ($products as $product) {
                ?>
                            <!-- Producto dinámico -->
                            <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                                <a class="product-item" href="cart.php?id=<?php echo $product['id']; ?>">
                                    <img src="<?php echo htmlspecialchars($product['imagen_url']); ?>" class="img-fluid product-thumbnail" alt="<?php echo htmlspecialchars($product['nombre']); ?>">
                                    <h3 class="product-title"><?php echo htmlspecialchars($product['nombre']); ?></h3>
                                    <strong class="product-price">$<?php echo number_format($product['precio'], 2); ?></strong>
                                    <span class="icon-cross">
                                        <img src="images/cross.svg" class="img-fluid">
                                    </span>
                                </a>
                            </div>
                <?php
                            }
                        } else {
                            echo '<div class="col-12"><p>No se encontraron productos para "' . htmlspecialchars($query) . '".</p></div>';
                        }
                    } else {
                        echo '<div class="col-12"><p>Por favor, ingrese un término de búsqueda.</p></div>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="col-12"><p>Error al buscar productos: ' . $e->getMessage() . '</p></div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- End Search Results Section -->

    <!-- Start Footer Section -->
    <?php include 'cards/footer.php'; ?>
    <!-- End Footer Section -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>