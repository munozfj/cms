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
        
        <h1>Main Menu </h1>
        <ul>
          <li> <a href="manage_contents.php"> Manage Contents </a> </li>
          <li> <a href="user_index.php"> Manage Users </a> </li>
          <li> <a href="logout.php"> Logout </a> </li>
        </ul>

      </div>
    </div><!-- de la columna principal -->



  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


