<?php require_once("../resources/layouts/php_begin.php"); ?>
<?php require_once(LAYOUTS_PATH . "/html_begin.php"); ?>

<?php
  /*Variable de contexto */
  $environment="PRIVATE";
?>
    
<div class="container">

  <!-- Bootstrap crea una gran final para mostrar el contenido -->
  <div class="row row-offcanvas row-offcanvas-right">

    <!--Crea una columna principal -->
    <div class="col-xs-12 col-sm-9">

      <div class="jumbotron">

        <h1>Main Menu </h1>
        <ul>
          <li> <a href="#"> Manage Contents </a> </li>
          <li> <a href="#"> Manage Users </a> </li>
          <li> <a href="#"> Logout </a> </li>
        </ul>

      </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside -->
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

      &nbsp;

    </div><!--Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


