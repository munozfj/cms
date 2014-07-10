<?php require_once("../resources/layouts/html_begin.php"); ?>

    
  <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

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
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/span-->

      </div><!--/row-->

  </div><!--Container -->


<?php require_once("../resources/layouts/html_end.php"); ?>


