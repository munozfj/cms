<?php require_once("../resources/layouts/php_begin.php"); ?>

<?php
  /*Variable de contexto */
  $environment="PRIVATE";

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
  $id = mysqli_prep($_POST['subject_id']);
  $menu_name = mysqli_prep($_POST['menu_name']);
  $position  = mysqli_prep($_POST['position']);
  $visible   = mysqli_prep($_POST['visible']);

  /* Ejecuto las validaciones */
  $errores = subject_validations($menu_name,$position,$visible);
  if(!empty($errores))
  {
    $_SESSION['errors']=$errores;
    redirect_to("subject_edit.php");
  }

  /* Armo el string de inserción */
  $query  = "update Subjects ";
  $query .= "set menu_name='{$menu_name}', position={$position}, visible={$visible} ";
  $query .= "where id={$id} ";

  /* Ejecuto el query de inserción */
  $result = mysqli_query($connection, $query);

  /* Verifico que se haya realizado la insercion */
  if($result && mysqli_affected_rows($connection) == 1)
  { 
    /* Funciono OK */
    $alert['alert_message'] = "The subject has been updated successfully.";
    $alert['alert_type'] = "alert-success";
    $_SESSION['alert_attr']=$alert;
    redirect_to("manage_contents.php");
  }
  else
  {
    /* NO OK */
    $alert['alert_message'] = "Query failed:" . $query . " - " . mysqli_error($connection)  ;
    $alert['alert_type'] = "alert-danger";
    $_SESSION['alert_attr']=$alert;
    redirect_to("subject_edit.php?subject=".$subject_id);
  }

?>



<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


