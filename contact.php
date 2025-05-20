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
		<title>Somnia - La comodidad que se siente y se escucha </title>
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
          <h1>Contacto</h1>
          <p class="mb-4">Contáctanos para cualquier duda o sugerencia. Estaremos encantados de ayudarte a mejorar tu experiencia con nuestras mantas inteligentes Somnia.</p>
          <p><a href="shop.php" class="btn btn-secondary me-2">Comprar ahora</a><a href="index.php" class="btn btn-white-outline">Explorar</a></p>
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


<!-- Start Contact Form -->
<div class="untree_co-section">
  <div class="container">
    <div class="block">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 pb-4">

          <div class="row mb-5">
            <div class="col-lg-4">
              <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                <div class="service-icon color-1 mb-4">
                  <!-- icono ubicación -->
                </div>
                <div class="service-contents">
                  <p>Calle Recogidas, 24, Planta 3, Oficina 5 - 18002 – Granada, España</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                <div class="service-icon color-1 mb-4">
                  <!-- icono email -->
                </div>
                <div class="service-contents">
                  <p>contacto@somnia.es</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="service no-shadow align-items-center link horizontal d-flex active" data-aos="fade-left" data-aos-delay="0">
                <div class="service-icon color-1 mb-4">
                  <!-- icono teléfono -->
                </div>
                <div class="service-contents">
                  <p>+34 958 123 456</p>
                </div>
              </div>
            </div>
          </div>

          <form>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="fname">Nombre</label>
                  <input type="text" class="form-control" id="fname">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="lname">Apellido</label>
                  <input type="text" class="form-control" id="lname">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="text-black" for="email">Correo electrónico</label>
              <input type="email" class="form-control" id="email">
            </div>

            <div class="form-group mb-5">
              <label class="text-black" for="message">Mensaje</label>
              <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary-hover-outline">Enviar mensaje</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Contact Form -->


		

		<!-- Inicio Footer Section -->
		<?php include 'cards/footer.php'; ?>
		<!-- FIN Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
