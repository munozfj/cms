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


  /* Armo el string de inserción */
  $query  = "delete from Subjects ";
  $query .= "where id={$current_subject_id['id']} ";

  /* Ejecuto el query de inserción */
  $result = mysqli_query($connection, $query);

  /* Verifico que se haya realizado la insercion */
  if($result && mysqli_affected_rows($connection) == 1)
  { 
    /* Funciono OK */
    $alert['alert_message'] = "The subject has been deleted successfully.";
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
    redirect_to("manage_contents.php?subject=".$current_subject_id['id']);
  }

?>



<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


