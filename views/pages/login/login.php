<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
          <div class="card mb-0">
            <div class="card-body">
              <a href="./index.html" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                <img src="<?php echo $path ?>views/dist/images/logos/dark-logo.svg" width="180" alt="">
              </a>
              <div class="row">
                <div class="col-6 mb-2 mb-sm-0">
                  <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                    <img src="<?php echo $path ?>views/dist/images/svgs/google-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                    <span class="d-none d-sm-block me-1 flex-shrink-0">Iniciar sesión con</span>Google
                  </a>
                </div>
                <div class="col-6">
                  <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                    <img src="<?php echo $path ?>views/dist/images/svgs/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                    <span class="d-none d-sm-block me-1 flex-shrink-0">Iniciar sesión con</span>FB
                  </a>
                </div>
              </div>
              <div class="position-relative text-center my-4">
                <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">o iniciar sesión con</p>
                <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
              </div>

              <form method="post">
                <div class="mb-3">
                  <label for="clienteUsuario" class="form-label">Usuario</label>
                  <input type="text" class="form-control" id="clienteUsuario" name="ingClienteUsuario" aria-describedby="userHelp" placeholder="Introduce tu usuario" required>
                </div>
                <div class="mb-4">
                  <label for="clientePassword" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="clientePassword" name="ingClientePassword" placeholder="Introduce tu contraseña" required>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <div class="form-check">
                    <input class="form-check-input primary" type="checkbox" value="" id="rememberMe" checked>
                    <label class="form-check-label text-dark" for="rememberMe">
                      Recordar este dispositivo
                    </label>
                  </div>
                  <a class="text-primary fw-medium" href="./authentication-forgot-password.html">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Iniciar sesión</button>
                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-4 mb-0 fw-medium">¿Nuevo en Modernize?</p>
                  <a class="text-primary fw-medium ms-2" href="register">Crea una cuenta</a>
                </div>
              </form>

              <?php
                $login = new ControladorClientes();
                $login->ctrIngresoCliente();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
