<?php require_once("../resources/layouts/php_begin.php"); ?>

<?php
  /*Variable de contexto */
  $environment="PRIVATE";

  /* Recuperar los valores recibidos por GET  y 
  obtengo toda la información de cada uno de ellos */
  $current_user = (isset($_GET['username'])) ? find_user_by_username($_GET['username']) : null;

?>
    
<?php
  /* Verifico si se llamo el form desde el boton submit*/
  if(!isset($_POST['submit']))
  {
    redirect_to("user_new.php");
  }

  /* Obtengo los campos recibidos por POST y escapeo la info*/
  $username    = mysqli_prep($_POST['username']);
  $password    = mysqli_prep($_POST['password']);
  $first_name  = mysqli_prep($_POST['first_name']);
  $last_name   = mysqli_prep($_POST['last_name']);

  /* Ejecuto las validaciones */
  $errores = user_validations($username,$password,$first_name,$last_name);
  if(!empty($errores))
  {
    $_SESSION['errors']=$errores;
    redirect_to("user_new.php");
  }


  /* Encripto password */
  $hashed_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 10]);

  /* Armo el string de inserción */
  $query  = "insert into Users (username, hashed_password, first_name, last_name) values ( ";
  $query .= "'{$username}' , '{$hashed_password}','{$first_name}','{$last_name}') ";

  /* Ejecuto el query de inserción */
  $result = mysqli_query($connection, $query);

  /* Verifico que se haya realizado la insercion */
  if($result)
  { 
    /* Funciono OK */
    $alert['alert_message'] = "A new user has been created successfully.";
    $alert['alert_type'] = "alert-success";
    $_SESSION['alert_attr']=$alert;
    redirect_to("user_index.php");
  }
  else
  {
    /* NO OK */
    $alert['alert_message'] = "Query failed:" . $query . " - " .mysqli_error($connection) ;
    $alert['alert_type'] = "alert-danger";
    $_SESSION['alert_attr']=$alert;
    redirect_to("user_new.php");
  }

?>



<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


