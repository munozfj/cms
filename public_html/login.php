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
    redirect_to("index.php");
  }

  /* Obtengo los campos recibidos por POST y escapeo la info*/
  $username    = mysqli_prep($_POST['username']);
  $password    = mysqli_prep($_POST['password']);


  /* Validaciones de los campos */

  /* si todo bien */
  $found_user = attempt_login($username,$password);

  /* Verifico que se haya realizado la insercion */
  if(!empty($found_user))
  { 
    /* Funciono OK */
    $user_info['id']= $found_user['id'];
    $user_info['username']= $found_user['username'];
    $user_info['first_name']= $found_user['first_name'];
    $user_info['last_name']= $found_user['last_name'];
    $_SESSION['user_info'] = $user_info;

    $alert['alert_message'] = "Bienvenido " . ucwords(htmlentities($found_user['first_name']));
    $alert['alert_type'] = "alert-success";
    $_SESSION['alert_attr']=$alert;
    redirect_to("management.php");
  }
  else
  {
    /* NO OK */
    $alert['alert_message'] = "Username/Password are not correct." ;
    $alert['alert_type'] = "alert-danger";
    $_SESSION['alert_attr']=$alert;
    redirect_to("index.php");
  }

?>



<?php require_once(LAYOUTS_PATH . "/php_end.php"); ?>


