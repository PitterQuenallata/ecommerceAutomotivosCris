    <!-- --------------------------------------------------- -->
    <!-- Favicon -->
    <!-- --------------------------------------------------- -->
    <!-- <link rel="shortcut icon" type="image/png" href="<?php $path ?>views/dist/images/logos/favicon.ico"> -->
    <?php
    // Aquí se define la variable userId para ser utilizada en JavaScript
    if (isset($_SESSION['id_cliente'])) {
        echo '<script>
                var userId = "' . $_SESSION['id_cliente'] . '";
              </script>';
    } else {
        echo '<script>
                var userId = null;
              </script>';
    }
    ?>
    <!-- --------------------------------------------------- -->
    <!-- Owl Carousel -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="<?php $path ?>views/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">

    <!-- --------------------------------------------------- -->
    <!-- Prism Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="<?php $path ?>views/dist/libs/prismjs/themes/prism-okaidia.min.css">
    <link rel="stylesheet" href="<?php $path ?>views/dist/libs/sweetalert2/dist/sweetalert2.min.css">

    <!-- --------------------------------------------------- -->
    <!-- Core Css -->

    <link id="themeColors" rel="stylesheet" href="<?php $path ?>views/dist/css/style.min.css">

    <link href="<?php $path ?>views/dist/libs/jquery-backToTop-master/dist/jquery-backToTop.min.css" type="text/css" rel="stylesheet" media="screen">

    <script src="<?php $path ?>views/dist/libs/jquery/dist/jquery.min.js"></script>
    <!-- Incluir jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <link  id="themeColors"  rel="stylesheet" href="<?php $path ?>views/dist/css/custom.css">
     -->

    <script src="<?php $path ?>views/dist/js/plugins/toastr-init.js"></script>
    <script src="<?php $path ?>views/dist/libs/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?php $path ?>views/dist/js/forms/sweet-alert.init.js"></script>
    <script src="<?php $path ?>views/dist/js/ecommerce/carrito.js"></script>