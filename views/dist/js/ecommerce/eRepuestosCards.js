$(document).ready(function () {
  // Función principal para inicializar filtros y cargar repuestos
  function initPage() {
    const savedCategoria = localStorage.getItem("filtroCategoria");
    const savedMotor = localStorage.getItem("filtroMotor");

    if (savedCategoria || savedMotor) {
      if (savedCategoria) {
        $("#filtroCategoria").val(savedCategoria);
        actualizarUrl();
        cargarRepuestos();
      }
      if (savedMotor) {
        $("#filtroMotor").val(savedMotor);
        actualizarUrl();
        cargarRepuestos();
      }
    } else {
      cargarCategorias(); // Cargar categorías si no hay filtros seleccionados
    }
  }

  // Función para limpiar filtros, localStorage y URL
  function limpiarFiltrosYUrl() {
    $("#filtroCategoria").val("");
    $("#filtroMarca").val("");
    $("#filtroMarca").html(
      '<option value="" selected disabled>Seleccione una Marca</option>'
    );
    $("#filtroCategoria").html(
      '<option value="" selected disabled>Seleccione una Categoria</option>'
    );
    $("#filtroModelo").html(
      '<option value="" selected disabled>Seleccione un modelo</option>'
    );
    $("#filtroMotor").html(
      '<option value="" selected disabled>Seleccione un motor</option>'
    );

    localStorage.clear();
    window.history.replaceState({}, document.title, window.location.pathname);

    console.log("Filtros reseteados y URL limpiada");
  }

  // Guardar en localStorage y cargar modelos cuando se selecciona una marca
  $("#filtroCategoria").change(function () {
    localStorage.setItem("filtroCategoria", $(this).val());
    actualizarUrl();
    cargarRepuestos();
  });

  // Guardar en localStorage y cargar motores cuando se selecciona un modelo
  $("#filtroModelo").change(function () {
    localStorage.setItem("filtroModelo", $(this).val());
    cargarMotores($(this).val());
  });

  // Guardar en localStorage y cargar repuestos cuando se selecciona una categoría
  $("#filtroCategoria").change(function () {
    localStorage.setItem("filtroCategoria", $(this).val());
    actualizarUrl();
    cargarRepuestos();
  });

  // Guardar en localStorage y cargar repuestos cuando se selecciona un motor
  $("#filtroMotor").change(function () {
    localStorage.setItem("filtroMotor", $(this).val());
    actualizarUrl();
    cargarRepuestos();
  });

  // Función para resetear los filtros y limpiar la URL
  $("#btnResetearFiltros").click(function (e) {
    e.preventDefault(); // Evitar cualquier comportamiento por defecto del botón
    limpiarFiltrosYUrl();
    $("#contenedorRepuestos").html(""); // Limpiar los resultados de repuestos
    cargarCategorias(); // Cargar categorías por defecto
  });

  // Función para actualizar la URL con los filtros
  function actualizarUrl() {
    const idCategoria = localStorage.getItem("filtroCategoria");
    const idMarca = localStorage.getItem("filtroMarca");
    const idModelo = localStorage.getItem("filtroModelo");
    const idMotor = localStorage.getItem("filtroMotor");

    let queryString = "?";

    if (idCategoria) {
      queryString += `idCategoria=${idCategoria}`;
    }
    if (idMotor) {
      if (queryString !== "?") queryString += "&";
      queryString += `idMarca=${idMarca}&idModelo=${idModelo}&idMotor=${idMotor}`;
    }

    if (queryString === "?") {
      // Si no hay filtros, limpiar la URL
      window.history.replaceState({}, document.title, window.location.pathname);
    } else {
      window.history.replaceState({}, "", queryString);
    }
  }

  // Función para manejar la carga de repuestos basada en categoría y motor
  function cargarRepuestos() {
    var idCategoria = localStorage.getItem("filtroCategoria");
    var idMotor = localStorage.getItem("filtroMotor");

    // Verificar si al menos un filtro está seleccionado
    if (!idCategoria && !idMotor) {
      console.log("No hay filtros seleccionados.");
      return; // No hacer nada si no hay filtros
    }

    $.ajax({
      url: "ajax/cargarRepuestos.ajax.php",
      method: "GET",
      dataType: "json",
      data: {
        idCategoria: idCategoria,
        idMotor: idMotor,
        action: "cargarRepuestos",
      },
      success: function (respuesta) {
        $("#contenedorRepuestos").html('');
        respuesta.forEach(repuesto => {
          const repuestoHTML = `
            <div class="col-sm-6 col-xl-4">
              <div class="card hover-img overflow-hidden rounded-2">
                <div class="position-relative">
                  <a href="javascript:void(0)"><img src="${repuesto.img_repuesto}" class="card-img-top rounded-0" alt="${repuesto.nombre_repuesto}"></a>
                  <a class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Ver Repuestos"><i class="ti ti-eye fs-4"></i></a>
                </div>
                <div class="card-body pt-3 p-4">
                  <h6 class="fw-semibold fs-4">${repuesto.nombre_repuesto}</h6>
                  <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-semibold fs-4 mb-0">$${repuesto.precio_repuesto}</h6>
                  </div>
                </div>
              </div>
            </div>
          `;
          $("#contenedorRepuestos").append(repuestoHTML);
        });
        console.log("Repuestos cargados");
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar repuestos:", status, error);
      },
    });
  }

  // Función para cargar los modelos basados en la marca seleccionada
  function cargarModelos(idMarca) {
    $.ajax({
      url: "ajax/eRepuestosCards.ajax.php",
      method: "GET",
      data: { idMarca: idMarca, action: "cargarModelos" },
      success: function (respuesta) {
        $("#filtroModelo").html(respuesta);
        $("#filtroMotor").html('<option value="" selected disabled>Seleccione un motor</option>');
        console.log("Modelos cargados para la marca:", idMarca);
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar modelos:", status, error);
      },
    });
  }

  // Función para cargar los motores basados en el modelo seleccionado
  function cargarMotores(idModelo) {
    $.ajax({
      url: "ajax/eRepuestosCards.ajax.php",
      method: "GET",
      data: { idModelo: idModelo, action: "cargarMotores" },
      success: function (respuesta) {
        $("#filtroMotor").html(respuesta);
        console.log("Motores cargados para el modelo:", idModelo);
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar motores:", status, error);
      },
    });
  }

  // Función para cargar las categorías si no hay filtros seleccionados
  function cargarCategorias() {
    $.ajax({
      url: "ajax/cargarCategorias.ajax.php", // Debes crear este archivo y lógica en el backend
      method: "GET",
      success: function (respuesta) {
        $("#contenedorRepuestos").html(respuesta);
        console.log("Categorías cargadas");
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar categorías:", status, error);
      },
    });
  }

  // Manejar el clic en las tarjetas de categorías
  $(document).on("click", ".card-categoria", function () {
    var idCategoria = $(this).data("id");
    localStorage.setItem("filtroCategoria", idCategoria);
    $("#filtroCategoria").val(idCategoria);
    actualizarUrl();
    cargarRepuestos();
  });

  // Iniciar la página
  initPage();
});
