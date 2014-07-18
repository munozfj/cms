<?php require_once("../resources/layouts/php_begin.php"); ?>

<?php
  /* Valido autenticacion */
  confirm_logged_in();
?>

<?php

  /* Recuperar los valores recibidos por GET  y 
  obtengo toda la información de cada uno de ellos*/
  $current_subject_id = (isset($_GET['subject'])) ? find_subject_by_id($_GET['subject']) : null;
  $current_page_id = (isset($_GET['page'])) ? find_page_by_id($_GET['page']) : null;

?>
    
<?php
  /* Verifico si se llamo el form desde el boton submit*/
  if(!isset($_POST['submit']))
  {
    redirect_to("subject_new.php");
  }

  /* Obtengo los campos recibidos por POST y escapeo la info*/
  $menu_name = mysqli_prep($_POST['menu_name']);
  $position  = mysqli_prep($_POST['position']);
  $visible   = mysqli_prep($_POST['visible']);

  /* Ejecuto las validaciones */
  $errores = subject_validations($menu_name,$position,$visible);
  if(!empty($errores))
  {
    $_SESSION['errors']=$errores;
    redirect_to("subject_new.php");
  }

  /* Armo el string de inserción */
  $query  = "insert into Subjects (menu_name, position, visible) values ( ";
  $query .= "'{$menu_name}', {$position}, {$visible} ) ";

  /* Ejecuto el query de inserción */
  $result = mysqli_query($connection, $query);

  /* Verifico que se haya realizado la insercion */
  if($result)
  { 
    /* Funciono OK */
    $alert['alert_message'] = "A new subject has been created successfully.";
    $alert['alert_type'] = "alert-success";
    $_SESSION['alert_attr']=$alert;
    redirect_to("manage_contents.php");
  }
  else
  {
    /* NO OK */
    $alert['alert_message'] = "Query failed:" . $query . " - " .mysqli_error($connection) ;
    $alert['alert_type'] = "alert-danger";
    $_SESSION['alert_attr']=$alert;
    redirect_to("subject_new.php");
  }

?>



<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


