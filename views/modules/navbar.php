<?php
if (isset($_SESSION["cliente"]) || isset($_SESSION["usuario"])) {
  $cliente = $_SESSION['cliente'];
  $nombreCliente = $cliente['nombre_cliente'] . ' ' . $cliente['apellido_cliente'];
  $emailCliente = $cliente['email_cliente'];
  // Aquí podrías obtener otros datos como la imagen de perfil, si los tienes almacenados
  $imagenPerfil = !empty($cliente['imagen_cliente']) ? $cliente['imagen_cliente'] : $path . 'views/dist/images/profile/user-1.jpg';
}

?>


<header class="app-header">
  <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">

    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
      <li class="nav-item d-none d-xl-block">
        <a href="index.html" class="text-nowrap nav-link">
          <img src="<?php $path ?>views/dist/images/tiendaCris/icon/logoHoriz.png" class="dark-logo" width="180" alt="" />
          <!-- <img src="<?php $path ?>views/dist/images/logos/light-logo.svg" class="light-logo" width="180" alt="" /> -->
        </a>
      </li>

    </ul>


    <div class="d-block d-xl-none">
      <a href="index.html" class="text-nowrap nav-link">
        <img src="<?php $path ?>views/dist/images/logos/dark-logo.svg" width="180" alt="" />
      </a>
    </div>

    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="p-2">
        <i class="ti ti-dots fs-7"></i>
      </span>
    </button>


    <?php if (isset($_SESSION["cliente"])) { ?>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
          <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
            <i class="ti ti-align-justified fs-7"></i>
          </a>
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

            <li class="nav-item">
              <a class="nav-link notify-badge nav-icon-hover" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <i class="ti ti-basket"></i>
                <span class="badge rounded-pill bg-danger fs-2">2</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-flex align-items-center">
                  <div class="user-profile-img">
                    <img src="<?php echo $imagenPerfil; ?>" class="rounded-circle" width="35" height="35" alt="" />
                  </div>
                </div>
              </a>
              <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                  <div class="py-3 px-7 pb-0">
                    <h5 class="mb-0 fs-5 fw-semibold">Perfil de Usuario</h5>
                  </div>
                  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <img src="<?php echo $imagenPerfil; ?>" class="rounded-circle" width="80" height="80" alt="" />
                    <div class="ms-3">
                      <h5 class="mb-1 fs-3"><?php echo $nombreCliente; ?></h5>
                      <span class="mb-1 d-block text-dark">Cliente</span>
                      <p class="mb-0 d-flex text-dark align-items-center gap-2">
                        <i class="ti ti-mail fs-4"></i> <?php echo $emailCliente; ?>
                      </p>
                    </div>
                  </div>
                  <div class="message-body">
                    <a href="mi-perfil" class="py-8 px-7 mt-8 d-flex align-items-center">
                      <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                        <img src="<?php echo $path ?>views/dist/images/svgs/icon-account.svg" alt="" width="24" height="24">
                      </span>
                      <div class="w-75 d-inline-block v-middle ps-3">
                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Mi Perfil </h6>
                        <span class="d-block text-dark">Configuración de Cuenta</span>
                      </div>
                    </a>
                    <a href="mi-inbox" class="py-8 px-7 d-flex align-items-center">
                      <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                        <img src="<?php echo $path ?>views/dist/images/svgs/icon-inbox.svg" alt="" width="24" height="24">
                      </span>
                      <div class="w-75 d-inline-block v-middle ps-3">
                        <h6 class="mb-1 bg-hover-primary fw-semibold">Mi Inbox</h6>
                        <span class="d-block text-dark">Mensajes y Emails</span>
                      </div>
                    </a>
                    <a href="mi-tareas" class="py-8 px-7 d-flex align-items-center">
                      <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                        <img src="<?php echo $path ?>views/dist/images/svgs/icon-tasks.svg" alt="" width="24" height="24">
                      </span>
                      <div class="w-75 d-inline-block v-middle ps-3">
                        <h6 class="mb-1 bg-hover-primary fw-semibold">Mis Tareas</h6>
                        <span class="d-block text-dark">Tareas Diarias</span>
                      </div>
                    </a>
                  </div>
                  <div class="d-grid py-4 px-7 pt-8">
                    <a href="salir" class="btn btn-outline-primary">Cerrar Sesión</a>
                  </div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    <?php } ?>
    <?php if (!isset($_SESSION["cliente"])) { ?>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav quick-links d-none d-xl-flex ms-auto">
          <li class="nav-item dropdown-hover d-none d-xl-block">
            <a class="nav-link" href="login">Ingresar</a>
          </li>
        </ul>
      </div>
    <?php } ?>

  </nav>
</header>