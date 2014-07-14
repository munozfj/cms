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

        <!-- Mostrar mensajes las validaciones no cumplidas -->
        <?php echo show_errores(); ?>

        <!--Start Contact form -->                                                    
        <form action="subject_update.php" method="post" class="form-horizontal" role="form" >
          <fieldset> 
            <legend>Edit Subject</legend>
            
            <input type="hidden" name="subject_id" value="<?php echo $current_subject_id['id']; ?>"> 

            <div class="form-group">
              <label for="menu_name" class="col-sm-2 control-label">Menu name</label>
              <div class="col-sm-10">
                <input type="text" name="menu_name" id="menu_name" value="<?php echo $current_subject_id['menu_name']; ?>"  size="45" >
              </div>
            </div>

            <?php
              $maximum=0;
              $subject_set = find_all_subjects();
              while($subject=mysqli_fetch_assoc($subject_set))
              {
                $maximum = ($maximum < (int) $subject['position']) ? (int) $subject['position'] : $maximum;
              }
              mysqli_free_result($subject_set);
            ?>

            <div class="form-group">
              <label for="position" class="col-sm-2 control-label">Position</label>
              <div class="col-sm-10">
                <select name="position" id="position"  >
                  <?php for($count=1;$count <= $maximum ; $count++) {

                    if($current_subject_id['position'] == $count)
                    {
                      echo "<option value='{$count}' selected='selected' >{$count}</option> \n";
                    }
                    else
                    {
                      echo "<option value='{$count}'>{$count}</option> \n";
                    }
                    
                  }
                  ?>
                </select>
              </div>
            </div>

         
            <div class="form-group">
              <label for="visible" class="col-sm-2 control-label">Visible</label>
              <div class="col-sm-10">
                <input type="radio" name="visible" value="0" <?php echo ($current_subject_id['visible'] == 0)?  
                  "checked=''": ""; ?> >No
                <input type="radio" name="visible" value="1" <?php echo ($current_subject_id['visible'] == 1)?  
                "checked=''": "" ; ?> >Yes
              </div>
            </div>
    
            <button name="submit" class="btn btn-primary">Edit Subject</button>

            <button name="cancel"  class="btn btn-danger" formaction="manage_contents.php?subject=<?php echo $current_subject_id['id'] ?>" >Cancel </button>

          </fieldset>
        </form>          
        <!--End Contact form -->  


      </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside -->
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

      <a href="management.php"> &laquo; Manage Contents </a>
      
    </div><!--Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


