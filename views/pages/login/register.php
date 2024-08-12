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
                    <span class="d-none d-sm-block me-1 flex-shrink-0">Registrarse con</span>Google
                  </a>
                </div>
                <div class="col-6">
                  <a class="btn btn-white text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                    <img src="<?php echo $path ?>views/dist/images/svgs/facebook-icon.svg" alt="" class="img-fluid me-2" width="18" height="18">
                    <span class="d-none d-sm-block me-1 flex-shrink-0">Registrarse con</span>FB
                  </a>
                </div>
              </div>
              <div class="position-relative text-center my-4">
                <p class="mb-0 fs-4 px-3 d-inline-block bg-white z-index-5 position-relative">o registrarse con</p>
                <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
              </div>
              <form>
                <div class="mb-3">
                  <label for="exampleInputtext" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp" placeholder="Introduce tu nombre">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu correo electrónico">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Introduce tu contraseña">
                </div>
                <a  class="btn btn-primary w-100 py-8 mb-4 rounded-2">Registrarse</a>
                <div class="d-flex align-items-center">
                  <p class="fs-4 mb-0 text-dark">¿Ya tienes una cuenta?</p>
                  <a class="text-primary fw-medium ms-2" href="login">Iniciar sesión</a>
                </div>
              </form>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>