	  <!--  Modal Bootstrap de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form action="login.php" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Correo o Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-secondary">Entrar</button>
          </div>
        </form>
        <p class="mt-3 text-center">
          ¿No tienes cuenta?   <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Regístrate</a>
        </p>
      </div>
    </div>
  </div>
</div>


<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form action="register.php" method="POST">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
          </div>
          <div class="mb-3">
            <label for="direccion_facturacion" class="form-label">Dirección de facturación</label>
            <input type="text" class="form-control" id="direccion_facturacion" name="direccion_facturacion">
          </div>
          <div class="mb-3">
            <label for="direccion_entrega" class="form-label">Dirección de entrega</label>
            <input type="text" class="form-control" id="direccion_entrega" name="direccion_entrega">
          </div>
          <div class="mb-3">
            <label for="codigo_postal" class="form-label">Código postal</label>
            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?php if (isset($_SESSION['usuario'])): ?>
<!-- Modal de logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="modal-title w-100" id="logoutModalLabel">Sesión Cerrada</h5>
      </div>
      <div class="modal-body">
        <p>Sesión cerrada del usuario <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>.</p>
        <p>¡Hasta pronto!</p>
      </div>
    </div>
  </div>
</div>

<!-- Script para cerrar sesión automáticamente al cerrar el modal -->
<script>
  const logoutModal = document.getElementById('logoutModal');
  logoutModal.addEventListener('hidden.bs.modal', () => {
    window.location.href = 'logout.php';
  });
</script>
<?php endif; ?>
