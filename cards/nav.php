<?php
// Inicia sesión SOLO si es necesario (no da errores si ya fue iniciada)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Start Header/Navigation -->
<?php include 'cards/modales.php'; ?>

<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Somnia navigation bar">
  <div class="container">
    <a class="navbar-brand" href="index.php">Somnia<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
      <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'shop.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="shop.php">Tienda</a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="about.php">Conócenos</a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="services.php">Servicios</a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'blog.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
          <a class="nav-link" href="contact.php">Contacto</a>
        </li>
      </ul>

      <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
        <?php if (isset($_SESSION['usuario'])): ?>
          <!-- Usuario logueado: icono de logout -->
          <li>
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
              <img src="images/logout.svg" alt="Logout" />
            </a>
          </li>
        <?php else: ?>
          <!-- Usuario no logueado: icono de login -->
          <li>
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
              <img src="images/user.svg" alt="Login" />
            </a>
          </li>
        <?php endif; ?>

        <li><a class="nav-link" href="cart.php"><img src="images/cart.svg" alt="Cart"></a></li>
        <li><a class="nav-link" href="search.php"><img src="images/lupa.svg" alt="Buscar"></a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Header/Navigation -->
