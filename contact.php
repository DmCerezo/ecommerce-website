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

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path>
                      </svg>
                    
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

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                      </svg>
                    
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
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                      </svg>
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
