<?php require_once("../resources/layouts/php_begin.php"); ?>
<?php require_once(LAYOUTS_PATH . "/html_begin.php"); ?>

<?php
  /* Valido autenticacion */
  confirm_logged_in();
?>
    
<div class="container">

  <!-- Bootstrap crea una gran final para mostrar el contenido -->
  <div class="row row-offcanvas row-offcanvas-right">

    <!--Crea una columna principal -->
    <div class="col-xs-12 col-sm-9">

      <div class="jumbotron">

        <!-- Mostrar mensajes flash -->
        <?php echo show_flash(); ?>
        
        <h1>Manage Users </h1>


      </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside -->
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

      <a href="management.php">&laquo; Main Main </a>

    </div><!--Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


