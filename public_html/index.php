<?php require_once("../resources/layouts/html_begin.php"); ?>

    
<div class="container">

  <!-- Bootstrap crea una gran final para mostrar el contenido -->
  <div class="row row-offcanvas row-offcanvas-right">

    <!--Crea una columna principal -->
    <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Welcome to <span class="welcome"> <?php echo APPLICATION_SHORT_TITLE ?> </span></h1>
            <p>Constantes de la aplicación</p>
            <?php echo LAYOUTS_PATH;?>
            <br>
            <?php echo LIBRARIES_PATH;?>
            <br>
            <?php echo var_dump($connection);?>
          </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside -->
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

           <h4>Our Topics</h4>

    </div><!--Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once("../resources/layouts/html_end.php"); ?>


