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
        
        <h2>User List</h2>

        <?php  
          /* Recupero todos los usuarios */
          $user_set = find_all_users();

          echo "<table class='table table-striped table-bordered table-hover'>\n";
            echo "<thead> \n";
              echo" <tr>\n";
                echo "<th>Username</th>\n";
                echo "<th>First name</th>\n";
                echo "<th>Last name</th>\n";
              echo" </tr>\n";
            echo "</thead> \n";
            echo "<tbody> \n";
              
          

          /* Recorro el set de usuarios */
          while($user = mysqli_fetch_assoc($user_set))
          {

              echo" <tr>\n";
              echo " <td> <a href='user_edit.php?username=". urlencode($user['username']) . "'  > ". htmlentities($user['username']) ." </a> </td>\n";
              echo "<td> ". htmlentities($user['first_name']) ." </td>\n";
              echo "<td> ". htmlspecialchars(utf8_encode($user['last_name'])) ." </td>\n";
              echo" </tr>\n";
          }

            echo "</tbody> \n";
          echo "</table> \n";

          /* Libero memoria de usuarios */
          mysqli_free_result($user_set);
        ?>

        <a href="user_new.php"><button class="btn btn-primary">Add new User</button></a>
        <a href="management.php"><button class="btn btn-warning">Main menu</button></a>

      </div>
    </div><!-- de la columna principal -->

    <!-- Crea otra columna que actua como aside 
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">

      &nbsp;
      
    </div>
    Fin columna aside-->

  </div><!--/row-->

</div><!--Container necesario para Bootstrap -->


<?php require_once(LAYOUTS_PATH . "/html_end.php"); ?>
<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


