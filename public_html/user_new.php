<?php require_once("../resources/layouts/php_begin.php"); ?>
<?php require_once(LAYOUTS_PATH . "/html_begin.php"); ?>

<?php
  /* Valido autenticacion */
  confirm_logged_in();
?>

<?php

  /* Recuperar los valores recibidos por GET  y 
  obtengo toda la información de cada uno de ellos */
  $current_user = (isset($_GET['username'])) ? find_user_by_username($_GET['username']) : null;

?>
    
<div class="container">

  <!-- Bootstrap crea una gran final para mostrar el contenido -->
  <div class="row row-offcanvas row-offcanvas-right">

    <!--Crea una columna principal -->
    <div class="col-xs-12 col-sm-9">

      <div class="jumbotron">

        <!-- Mostrar mensajes flash -->
        <?php echo show_flash(); ?>

        <!-- Mostrar mensajes las validaciones no cumplidas -->
        <?php echo show_errores(); ?>

        <!--Start Contact form -->                                                    
        <form action="user_create.php" method="post" class="form-horizontal" role="form" >
          <fieldset> 
            <legend>New user</legend>
            
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" id="username" value=""  size="45" >
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password" id="password" value=""  size="45" >
              </div>
            </div>

            <div class="form-group">
              <label for="first_name" class="col-sm-2 control-label">First name</label>
              <div class="col-sm-10">
                <input type="text" name="first_name" id="first_name" value=""  size="45" >
              </div>
            </div>

            <div class="form-group">
              <label for="last_name" class="col-sm-2 control-label">Last name</label>
              <div class="col-sm-10">
                <input type="text" name="last_name" id="last_name" value=""  size="45" >
              </div>
            </div>

         

    
            <button name="submit" class="btn btn-primary">Create new Subject</button>

            <button name="cancel"  class="btn btn-danger" formaction="user_index.php" >Cancel </button>


          </fieldset>
        </form>          
        <!--End Contact form -->  


      </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside 
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

      <a href="management.php"> &laquo; Manage Contents </a>
      
    </div>Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


