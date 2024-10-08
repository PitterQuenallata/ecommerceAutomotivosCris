$(document).ready(function () {

  // Inicializar los filtros con valores del localStorage
  initFilters();

  // Capturar el idCategoria de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const idCategoria = urlParams.get('idCategoria');

  // Cargar modelos cuando se selecciona una marca
  $("#filtroMarca").change(function () {
    var idMarca = $(this).val();
    localStorage.setItem("filtroMarca", idMarca); // Guardar en localStorage
    cargarModelos(idMarca); // Cargar modelos
    updateListaFiltros(); // Actualizar la lista de filtros
  });

  // Cargar motores cuando se selecciona un modelo
  $("#filtroModelo").change(function () {
    var idModelo = $(this).val();
    localStorage.setItem("filtroModelo", idModelo); // Guardar en localStorage
    cargarMotores(idModelo); // Cargar motores
    updateListaFiltros(); // Actualizar la lista de filtros
  });

  // Actualizar la lista de filtros cuando se selecciona un motor
  $("#filtroMotor").change(function () {
    var idMotor = $(this).val();
    localStorage.setItem("filtroMotor", idMotor); // Guardar en localStorage
    updateListaFiltros(); // Actualizar la lista de filtros
  });

  // Guardar filtros y realizar la búsqueda cuando se hace clic en "Buscar"
  $("#formFiltrosRepuestosIndependiente").submit(function (e) {
    e.preventDefault(); // Prevenir la acción por defecto del formulario
    updateListaFiltros(); // Guardar los filtros en localStorage
    enviarFiltrosPorGet(idCategoria); // Enviar los filtros a través de GET
  });

  // Botón de Resetear Filtros
  $("#btnResetearFiltros").click(function () {
    $("#filtroMarca").val("");
    $("#filtroModelo").html('<option value="" selected disabled>Seleccione un Modelo</option>');
    $("#filtroMotor").html('<option value="" selected disabled>Seleccione un Motor</option>');

    localStorage.removeItem("filtroMarca");
    localStorage.removeItem("filtroModelo");
    localStorage.removeItem("filtroMotor");

    updateListaFiltros(); // Actualizar la lista de filtros después de resetear
    window.location.href = "repuestos?idCategoria=" + idCategoria; // Redirigir a la página sin filtros pero con idCategoria
  });

  // Función para inicializar los filtros con valores del localStorage
  function initFilters() {
    const savedMarca = localStorage.getItem("filtroMarca");
    const savedModelo = localStorage.getItem("filtroModelo");
    const savedMotor = localStorage.getItem("filtroMotor");

    if (savedMarca) {
      $("#filtroMarca").val(savedMarca);
      cargarModelos(savedMarca, savedModelo);
    }

    if (savedModelo && savedMarca) {
      $("#filtroModelo").val(savedModelo);
      cargarMotores(savedModelo, savedMotor);
    }

    if (savedMotor && savedModelo) {
      $("#filtroMotor").val(savedMotor);
    }

    // Cargar repuestos con los filtros actuales si los hay
    if (savedMarca || savedModelo || savedMotor) {
      $("#listaFiltros").val(
        JSON.stringify({
          idMarca: savedMarca,
          idModelo: savedModelo,
          idMotor: savedMotor,
        })
      );
    }
  }

  // Función para actualizar el input hidden con los filtros seleccionados
  function updateListaFiltros() {
    const idMarca = $("#filtroMarca").val();
    const idModelo = $("#filtroModelo").val();
    const idMotor = $("#filtroMotor").val();

    let filtros = {
      idMarca: idMarca,
      idModelo: idModelo,
      idMotor: idMotor,
    };

    // Guardar en localStorage
    if (idMarca) localStorage.setItem("filtroMarca", idMarca);
    if (idModelo) localStorage.setItem("filtroModelo", idModelo);
    if (idMotor) localStorage.setItem("filtroMotor", idMotor);

    $("#listaFiltros").val(JSON.stringify(filtros));
  }

  // Función para cargar modelos y restaurar la selección si hay
  function cargarModelos(idMarca, selectedModelo = null) {
    $.ajax({
      url: "ajax/actualiFormsRepuesto.ajax.php",
      method: "POST",
      data: { idMarca: idMarca, action: "cargarModelos" },
      success: function (respuesta) {
        $("#filtroModelo").html(respuesta);
        $("#filtroMotor").html('<option value="" selected disabled>Seleccione un Motor</option>');

        if (selectedModelo) {
          $("#filtroModelo").val(selectedModelo);
          cargarMotores(selectedModelo, localStorage.getItem("filtroMotor"));
        }
      },
    });
  }

  // Función para cargar motores y restaurar la selección si hay
  function cargarMotores(idModelo, selectedMotor = null) {
    $.ajax({
      url: "ajax/actualiFormsRepuesto.ajax.php",
      method: "POST",
      data: { idModelo: idModelo, action: "cargarMotores" },
      success: function (respuesta) {
        $("#filtroMotor").html(respuesta);

        if (selectedMotor) {
          $("#filtroMotor").val(selectedMotor);
        }
        updateListaFiltros(); // Actualizar la lista de filtros después de cargar motores
      },
    });
  }

  // Función para enviar los filtros a través de GET
  function enviarFiltrosPorGet(idCategoria) {
    const idMarca = $("#filtroMarca").val();
    const idModelo = $("#filtroModelo").val();
    const idMotor = $("#filtroMotor").val();

    let queryParams = [];

    if (idMarca) queryParams.push("idMarca=" + encodeURIComponent(idMarca));
    if (idModelo) queryParams.push("idModelo=" + encodeURIComponent(idModelo));
    if (idMotor) queryParams.push("idMotor=" + encodeURIComponent(idMotor));
    if (idCategoria) queryParams.push("idCategoria=" + encodeURIComponent(idCategoria));

    const queryString = queryParams.join("&");
    const url = "repuestos?" + queryString;

    window.location.href = url; // Redirigir a la página con los filtros en la URL
  }
});
