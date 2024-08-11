// $(document).ready(function() {

//   // Inicializar los filtros con valores guardados en localStorage
//   initFilters();

//   // Guardar en localStorage y cargar modelos cuando se selecciona una marca
//   $("#filtroMarca").change(function() {
//       localStorage.setItem('filtroMarca', $(this).val());
//       cargarModelos($(this).val());
//   });

//   // Guardar en localStorage y cargar motores cuando se selecciona un modelo
//   $("#filtroModelo").change(function() {
//       localStorage.setItem('filtroModelo', $(this).val());
//       cargarMotores($(this).val());
//   });

//   // Guardar en localStorage y cargar repuestos cuando se selecciona una categoría
//   $("#filtroCategoria").change(function() {
//       localStorage.setItem('filtroCategoria', $(this).val());
//       cargarRepuestos();
//   });

//   // Guardar en localStorage y cargar repuestos cuando se selecciona un motor
//   $("#filtroMotor").change(function() {
//       localStorage.setItem('filtroMotor', $(this).val());
//       cargarRepuestos();
//   });

//   // Función para resetear los filtros
//   $("#btnResetearFiltros").click(function() {
//       // Limpiar los selectores
//       $("#filtroCategoria").val('');
//       $("#filtroMarca").val('');
//       $("#filtroModelo").html('<option selected disabled>Elige un Modelo</option>');
//       $("#filtroMotor").html('<option selected disabled>Elige un Motor</option>');

//       // Limpiar el localStorage
//       localStorage.removeItem('filtroCategoria');
//       localStorage.removeItem('filtroMarca');
//       localStorage.removeItem('filtroModelo');
//       localStorage.removeItem('filtroMotor');

//       // Cargar todos los repuestos sin filtros
//       cargarRepuestos();

//       // Mostrar en consola
//       console.log('Filtros reseteados y todos los repuestos cargados');
//   });

//   // Función para inicializar los filtros con valores del localStorage
//   function initFilters() {
//       const savedCategoria = localStorage.getItem('filtroCategoria');
//       const savedMarca = localStorage.getItem('filtroMarca');
//       const savedModelo = localStorage.getItem('filtroModelo');
//       const savedMotor = localStorage.getItem('filtroMotor');

//       if (savedCategoria) {
//           $("#filtroCategoria").val(savedCategoria);
//       }

//       if (savedMarca) {
//           $("#filtroMarca").val(savedMarca);
//           cargarModelos(savedMarca, savedModelo); // Cargar modelos y restaurar selección
//       }

//       if (savedModelo) {
//           $("#filtroModelo").val(savedModelo);
//           cargarMotores(savedModelo, savedMotor); // Cargar motores y restaurar selección
//       }

//       if (savedMotor) {
//           $("#filtroMotor").val(savedMotor);
//       }

//       // Mostrar en consola los valores restaurados
//       console.log('Categoría restaurada: ', savedCategoria);
//       console.log('Marca restaurada: ', savedMarca);
//       console.log('Modelo restaurado: ', savedModelo);
//       console.log('Motor restaurado: ', savedMotor);
//   }

//   // Función para cargar los modelos basados en la marca seleccionada
//   function cargarModelos(idMarca, selectedModelo = null) {
//       $.ajax({
//           url: "ajax/eRepuestosCards.ajax.php",
//           method: "POST",
//           data: { idMarca: idMarca, action: 'cargarModelos' },
//           success: function(respuesta) {
//               $("#filtroModelo").html(respuesta);
//               $("#filtroMotor").html('<option selected disabled>Elige un Motor</option>');
              
//               // Si hay un modelo seleccionado previamente, restaurarlo
//               if (selectedModelo) {
//                   $("#filtroModelo").val(selectedModelo);
//                   cargarMotores(selectedModelo, localStorage.getItem('filtroMotor'));
//               }

//               console.log('Modelos cargados para la marca:', idMarca);
//           }
//       });
//   }

//   // Función para cargar los motores basados en el modelo seleccionado
//   function cargarMotores(idModelo, selectedMotor = null) {
//       $.ajax({
//           url: "ajax/eRepuestosCards.ajax.php",
//           method: "POST",
//           data: { idModelo: idModelo, action: 'cargarMotores' },
//           success: function(respuesta) {
//               $("#filtroMotor").html(respuesta);

//               // Si hay un motor seleccionado previamente, restaurarlo
//               if (selectedMotor) {
//                   $("#filtroMotor").val(selectedMotor);
//               }

//               console.log('Motores cargados para el modelo:', idModelo);
//           }
//       });
//   }

//   // Función para manejar la carga de repuestos basada en categoría y motor
//   function cargarRepuestos() {
//       var filtros = {
//           idCategoria: $("#filtroCategoria").val(),
//           idMotor: $("#filtroMotor").val(),
//           action: 'cargarRepuestos'
//       };

//       $.ajax({
//           url: "ajax/cargarRepuestos.ajax.php",
//           method: "POST",
//           data: filtros,
//           success: function(respuesta) {
//               $("#contenedorRepuestos").html(respuesta);
//               console.log('Repuestos cargados con filtros:', filtros);
//           }
//       });
//   }

//   // Cargar todos los repuestos inicialmente o basados en filtros
//   cargarRepuestos();
// });
