<?php require_once("../resources/layouts/php_begin.php"); ?>
<?php require_once(LAYOUTS_PATH . "/html_begin.php"); ?>

<?php
  /*Variable de contexto */
  $environment="PRIVATE";

  /* Recuperar los valores recibidos por GET  y 
  obtengo toda la información de cada uno de ellos*/
  $current_subject_id = (isset($_GET['subject'])) ? find_subject_by_id($_GET['subject']) : null;
  $current_page_id = (isset($_GET['page'])) ? find_page_by_id($_GET['page']) : null;

?>
    
<div class="container">

  <!-- Bootstrap crea una gran final para mostrar el contenido -->
  <div class="row row-offcanvas row-offcanvas-right">

    <!--Crea una columna principal -->
    <div class="col-xs-12 col-sm-9">

      <div class="jumbotron">

        <!-- Mostrar mensajes flash -->
        <?php echo show_flash(); ?>
        
        <h2>Manage Contents</h2>
        <?php  

        if(isset($current_subject_id))
        {
          echo "<h4> Subject: " . htmlentities($current_subject_id['menu_name']) . "  </h4>";
        } 
        elseif (isset($current_page_id))
        {
          echo "<h4> Page: " . htmlentities($current_page_id['menu_name']) . "  </h4>";
        } 
        else
        {
          echo "<h4> Please choose an option from the menue </h4>";
        }

        ?>

      </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside -->
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

      <a href="management.php"> &laquo; Main Main </a>
      <h3> Our Topics </h3>
      <?php echo navigation_subjects_pages($current_subject_id,$current_page_id); ?>
      <br>
      <a href="subject_new.php"> + Add a new subject </a>
      
    </div><!--Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


