
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
     
    <!-- Start Hero Section -->
    <div class="hero">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5">
            <div class="intro-excerpt">
              <h1>Servicios</h1>
              <p class="mb-4">Descubre cómo Somnia transforma tu descanso. Envíos rápidos, atención continua y un proceso de compra sencillo pensado para ti.</p>
              <p><a href="#" class="btn btn-secondary me-2">Comprar ahora</a><a href="#" class="btn btn-white-outline">Explorar</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="hero-img-wrap">
              <picture>
                <source srcset="images/couch-small.png" media="(max-width: 991px)">
                <img src="images/couch.png" class="img-fluid" alt="Manta Somnia">
              </picture>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
      <div class="container">
        <div class="row my-5">
          <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
              <div class="icon">
                <img src="images/truck.svg" alt="Envío rápido" class="img-fluid">
              </div>
              <h3>Envío rápido y gratuito</h3>
              <p>Recibe tu manta Somnia en tiempo récord, sin costos adicionales.</p>
            </div>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
              <div class="icon">
                <img src="images/bag.svg" alt="Compra fácil" class="img-fluid">
              </div>
              <h3>Compra sencilla</h3>
              <p>Diseñamos una experiencia de compra intuitiva y sin complicaciones.</p>
            </div>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
              <div class="icon">
                <img src="images/support.svg" alt="Soporte 24/7" class="img-fluid">
              </div>
              <h3>Soporte 24/7</h3>
              <p>Nuestro equipo está disponible para ayudarte en todo momento.</p>
            </div>
          </div>

          <div class="col-6 col-md-6 col-lg-3 mb-4">
            <div class="feature">
              <div class="icon">
                <img src="images/return.svg" alt="Devoluciones sin complicaciones" class="img-fluid">
              </div>
              <h3>Devoluciones fáciles</h3>
              <p>¿No estás satisfecho? Devuelve tu producto sin problemas.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start Product Section -->
    <div class="product-section pt-0">
      <div class="container">
 <div class="row">
            <!-- Columna 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Diseñadas con materiales de alta calidad</h2>
                <p class="mb-4">Nuestras mantas combinan peso terapéutico con funciones innovadoras para brindar una experiencia de descanso única. Tecnología que cuida tu sueño.</p>
                <p><a href="shop.php" class="btn">Explorar</a></p>
            </div> 

            <?php
            include 'db_connect.php';

            try {
                $query = "SELECT * FROM productos LIMIT 3";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($products as $product) {
            ?>
                <!-- Producto dinámico -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <form method="POST" action="agregar_al_carrito.php">
                        <input type="hidden" name="producto_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $product['precio']; ?>">
                        <button type="submit" class="product-item border-0 bg-transparent p-0 text-start">
                            <img src="<?php echo htmlspecialchars($product['imagen_url']); ?>" class="img-fluid product-thumbnail" alt="<?php echo htmlspecialchars($product['nombre']); ?>">
                            <h3 class="product-title text-center mt-3"><?php echo htmlspecialchars($product['nombre']); ?></h3>
                            <strong class="product-price d-block text-center">$<?php echo number_format($product['precio'], 2); ?></strong>
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
    <!-- End Product Section -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section before-footer-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto text-center">
            <h2 class="section-title">Testimonios</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="testimonial-slider-wrap text-center">

              <div id="testimonial-nav">
                <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
              </div>

              <div class="testimonial-slider">
                <div class="item">
                  <div class="row justify-content-center">
                    <div class="col-lg-8 mx-auto">
                      <div class="testimonial-block text-center">
                        <blockquote class="mb-5">
                          <p>&ldquo;La manta Somnia ha cambiado mis noches. Ya no puedo dormir sin ella. Excelente calidad y atención al cliente impecable.&rdquo;</p>
                        </blockquote>
                        <div class="author-info">
                          <div class="author-pic">
                            <img src="images/person-1.png" alt="Maria Jones" class="img-fluid">
                          </div>
                          <h3 class="font-weight-bold">María López</h3>
                          <span class="position d-block mb-3">Clienta satisfecha</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <!-- END item -->

                <!-- Puedes duplicar este bloque para más testimonios -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Testimonial Slider -->


		<!-- Inicio Footer Section -->
		<?php include 'cards/footer.php'; ?>
		<!-- FIN Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
