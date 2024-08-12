<?php
class ControladorClientes
{
  /*=============================================
INGRESO DE CLIENTE
=============================================*/
  static public function ctrIngresoCliente()
  {
    if (isset($_POST["ingClienteUsuario"])) {

      if (
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingClienteUsuario"]) &&
        preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingClientePassword"])
      ) {
        // Encriptar la contraseña
        $crypt = crypt($_POST["ingClientePassword"], '$2a$07$azybxcags23425sdg23sdfhsd$');

        // Tabla en la base de datos
        $tabla = "clientes";
        $item = "user_cliente";
        $valor = $_POST["ingClienteUsuario"];

        // Obtener el cliente desde la base de datos
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        // Verificar credenciales
        if (is_array($respuesta) && isset($respuesta["user_cliente"]) && isset($respuesta["password_cliente"])) {
          if ($respuesta["user_cliente"] == $_POST["ingClienteUsuario"] && $respuesta["password_cliente"] == $crypt) {
            // Verificar si el cliente está activo
            if ($respuesta["estado_cliente"] == 1) {
              // Configurar la zona horaria
              date_default_timezone_set('America/La_Paz');

              // Obtener la fecha y hora actuales
              $fecha = date('Y-m-d');
              $hora = date('H:i:s');
              $fechaActual = $fecha . ' ' . $hora;

              // Actualizar la fecha de último login
              $item1 = "date_updated_cliente";
              $valor1 = $fechaActual;

              $item2 = "id_cliente";
              $valor2 = $respuesta["id_cliente"];

              $ultimoLogin = ModeloClientes::mdlActualizarCliente($tabla, $item1, $valor1, $item2, $valor2);

              if ($ultimoLogin == "ok") {
                // Guardar los datos del cliente en la sesión
                $_SESSION['id_cliente'] = $respuesta["id_cliente"];
                $_SESSION["cliente"] = $respuesta;

                // Verificar si hay una URL de retorno
                if (isset($_SESSION['return_to'])) {
                  $redirect_to = $_SESSION['return_to'];
                  unset($_SESSION['return_to']);  // Limpiar la URL de retorno de la sesión
                  echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "¡Bienvenido!",
                                text: "Inicio de sesión exitoso",
                                confirmButtonText: "Aceptar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "' . $redirect_to . '";
                                }
                            });
                          </script>';
                } else {
                  echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "¡Bienvenido!",
                                text: "Inicio de sesión exitoso",
                                confirmButtonText: "Aceptar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "home";
                                }
                            });
                          </script>';
                }
              }
            } else {
              echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Cuenta inactiva",
                  text: "Este cliente está inactivo.",
                  confirmButtonText: "Aceptar"
                });
              </script>';
            }
          } else {
            echo '<script>
              Swal.fire({
                icon: "error",
                title: "Error de autenticación",
                text: "Usuario o contraseña incorrectos.",
                confirmButtonText: "Aceptar"
              });
            </script>';
          }
        } else {
          echo '<script>
            Swal.fire({
              icon: "error",
              title: "Error de autenticación",
              text: "Usuario o contraseña incorrectos.",
              confirmButtonText: "Aceptar"
            });
            </script>';
        }
      }
    }
  }
}
