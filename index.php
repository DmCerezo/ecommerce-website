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

<!-- Sección Hero -->
<div class="hero">
	<div class="container">
	  <div class="row justify-content-between">
		<div class="col-lg-5">
		  <div class="intro-excerpt">
			<h1>Lo más importante <span class="d-block">es tu descanso</span></h1>
			<p class="mb-4">En Somnia nos especializamos en mantas con peso inteligentes, diseñadas para ayudarte a dormir mejor mediante funciones de relajación como vibración, calor, sonido y conectividad móvil.</p>
			<p><a href="" class="btn btn-secondary me-2">Comprar ahora</a><a href="shop.php" class="btn btn-white-outline">Explorar</a></p>
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
  <!-- Fin Sección Hero -->

   <!-- Sección Productos -->
<div class="product-section">
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
<!-- Fin Sección Productos -->
  
  
  <!-- Sección Por Qué Elegirnos -->
  <div class="why-choose-section">
	<div class="container">
	  <div class="row justify-content-between">
		<div class="col-lg-6">
		  <h2 class="section-title">¿Por qué elegir Somnia?</h2>
		  <p>Nuestras mantas combinan diseño, ciencia y tecnología para ofrecer una experiencia única de bienestar y relajación desde casa.</p>
  
		  <div class="row my-5">
			<div class="col-6 col-md-6">
			  <div class="feature">
				<div class="icon">
				  <img src="images/truck.svg" alt="Envío rápido" class="img-fluid">
				</div>
				<h3>Envío rápido y gratuito</h3>
				<p>Entregamos en todo el país sin costo adicional. Recibe tu manta en casa en pocos días.</p>
			  </div>
			</div>
  
			<div class="col-6 col-md-6">
			  <div class="feature">
				<div class="icon">
				  <img src="images/bag.svg" alt="Compra fácil" class="img-fluid">
				</div>
				<h3>Compra sencilla</h3>
				<p>Nuestro sitio está diseñado para una experiencia de compra fácil, segura y rápida.</p>
			  </div>
			</div>
  
			<div class="col-6 col-md-6">
			  <div class="feature">
				<div class="icon">
				  <img src="images/support.svg" alt="Soporte 24/7" class="img-fluid">
				</div>
				<h3>Soporte 24/7</h3>
				<p>Te ayudamos con cualquier duda o necesidad, cuando lo necesites.</p>
			  </div>
			</div>
  
			<div class="col-6 col-md-6">
			  <div class="feature">
				<div class="icon">
				  <img src="images/return.svg" alt="Devoluciones fáciles" class="img-fluid">
				</div>
				<h3>Devoluciones sin complicaciones</h3>
				<p>Si no estás satisfecho, puedes devolver tu producto de forma fácil y rápida.</p>
			  </div>
			</div>
  
		  </div>
		</div>
  
		<div class="col-lg-5">
		  <div class="img-wrap">
			<img src="images/why-choose-us-img.jpg" alt="Imagen Somnia" class="img-fluid">
		  </div>
		</div>
  
	  </div>
	</div>
  </div>
  <!-- Fin Por Qué Elegirnos -->
  
  <!-- Sección Te Ayudamos -->
  <div class="we-help-section">
	<div class="container">
	  <div class="row justify-content-between">
		<div class="col-lg-7 mb-5 mb-lg-0">
		  <div class="imgs-grid">
			<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Somnia"></div>
			<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Somnia"></div>
			<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Somnia"></div>
		  </div>
		</div>
		<div class="col-lg-5 ps-lg-5">
		  <h2 class="section-title mb-4">Te ayudamos a mejorar tu descanso</h2>
		  <p>Las mantas Somnia están diseñadas para transformar tu rutina de sueño. Combinamos el peso terapéutico con funciones como calor regulable, vibración calmante, altavoces integrados y app móvil.</p>
  
		  <ul class="list-unstyled custom-list my-4">
			<li>Función de vibración con niveles ajustables</li>
			<li>Conectividad vía app para personalización</li>
			<li>Altavoces Bluetooth integrados para relajarte</li>
			<li>Calor infrarrojo suave para aliviar el cuerpo</li>
		  </ul>
		  <p><a href="#" class="btn">Conocer más</a></p>
		</div>
	  </div>
	</div>
  </div>
  <!-- Fin Te Ayudamos -->
  
 <!-- Sección Productos Populares -->
<div class="popular-product">
    <div class="container">
        <div class="row">
            <?php
            include 'db_connect.php';

            try {
                $query = "SELECT * FROM productos LIMIT 3"; // Limitar a 3 productos
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($products as $product) {
            ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="<?php echo htmlspecialchars($product['imagen_url']); ?>" alt="<?php echo htmlspecialchars($product['nombre']); ?>" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3><?php echo htmlspecialchars($product['nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($product['descripcion']); ?></p>
                            <p><a href="#">Ver más</a></p>
                        </div>
                    </div>
                </div>
            <?php
                }
            } catch (PDOException $e) {
                echo "Error al cargar productos populares: " . $e->getMessage();
            }
            ?>
        </div>
    </div>
</div>
<!-- Fin Productos Populares -->

<!-- Inicio Sección de Testimonios -->
<div class="testimonial-section">
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
						<p>&ldquo;Desde que uso la manta con peso de Somnia, duermo más profundamente y me despierto con más energía. ¡La función de calor es maravillosa en invierno!&rdquo;</p>
					  </blockquote>
  
					  <div class="author-info">
						<div class="author-pic">
						  <img src="images/person_2.jpg" alt="Juan Antonio Cruz" class="img-fluid">
						</div>
						<h3 class="font-weight-bold">Juan Antonio Cruz</h3>
						<span class="position d-block mb-3">Cliente Feliz</span>
					  </div>
					</div>
  
				  </div>
				</div>
			  </div>
  
			  <div class="item">
				<div class="row justify-content-center">
				  <div class="col-lg-8 mx-auto">
  
					<div class="testimonial-block text-center">
					  <blockquote class="mb-5">
						<p>&ldquo;Me encanta poder controlar la manta desde mi celular. La integración con altavoces me permite relajarme escuchando música suave antes de dormir.&rdquo;</p>
					  </blockquote>
  
					  <div class="author-info">
						<div class="author-pic">
						  <img src="images/person-1.png" alt="Carlos Méndez" class="img-fluid">
						</div>
						<h3 class="font-weight-bold">Carlos Méndez</h3>
						<span class="position d-block mb-3">Usuario de Somnia App</span>
					  </div>
					</div>
  
				  </div>
				</div>
			  </div>
  
			  <div class="item">
				<div class="row justify-content-center">
				  <div class="col-lg-8 mx-auto">
  
					<div class="testimonial-block text-center">
					  <blockquote class="mb-5">
						<p>&ldquo;La manta Somnia me ayudó a reducir mi ansiedad. La vibración y el peso me hacen sentir como en un abrazo constante. Muy recomendada.&rdquo;</p>
					  </blockquote>
  
					  <div class="author-info">
						<div class="author-pic">
						  <img src="images/person-1.png" alt="María López" class="img-fluid">
						</div>
						<h3 class="font-weight-bold">María López</h3>
						<span class="position d-block mb-3">Cliente recurrente</span>
					  </div>
					</div>
  
				  </div>
				</div>
			  </div>
  
			</div>
  
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Fin Sección de Testimonios -->
  
  <!-- Inicio Sección de Blog -->
  <div class="blog-section">
	<div class="container">
	  <div class="row mb-5">
		<div class="col-md-6">
		  <h2 class="section-title">Últimas Publicaciones</h2>
		</div>
		<div class="col-md-6 text-start text-md-end">
		  <a href="#" class="more">Ver todos los artículos</a>
		</div>
	  </div>
  
	  <div class="row">
  
		<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
		  <div class="post-entry">
			<a href="#" class="post-thumbnail"><img src="images/post-1.jpg" alt="Image" class="img-fluid"></a>
			<div class="post-content-entry">
			  <h3><a href="#">Beneficios de Dormir con una Manta con Peso</a></h3>
			  <div class="meta">
				<span>por <a href="#">Equipo Somnia</a></span> <span>el <a href="#">05 May, 2025</a></span>
			  </div>
			</div>
		  </div>
		</div>
  
		<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
		  <div class="post-entry">
			<a href="#" class="post-thumbnail"><img src="images/post-2.jpg" alt="Image" class="img-fluid"></a>
			<div class="post-content-entry">
			  <h3><a href="#">Tecnología y Relajación: ¿Cómo Funciona Somnia?</a></h3>
			  <div class="meta">
				<span>por <a href="#">Ana Torres</a></span> <span>el <a href="#">28 Abr, 2025</a></span>
			  </div>
			</div>
		  </div>
		</div>
  
		<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
		  <div class="post-entry">
			<a href="#" class="post-thumbnail"><img src="images/post-3.jpg" alt="Image" class="img-fluid"></a>
			<div class="post-content-entry">
			  <h3><a href="#">Consejos para Crear una Rutina de Sueño Saludable</a></h3>
			  <div class="meta">
				<span>por <a href="#">Psicología Somnia</a></span> <span>el <a href="#">22 Abr, 2025</a></span>
			  </div>
			</div>
		  </div>
		</div>
  
	  </div>
	</div>
  </div>
  <!-- Fin Sección de Blog -->
  

		<!-- Inicio Footer Section -->
		<?php include 'cards/footer.php'; ?>
		<!-- FIN Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
