<?php 

  session_start(); 

  /* Devuelve un array con el alert a mostrar */
  function alert_message()
  {
    /* Verifico que no haya errores */
    if(! isset($_SESSION['alert_attr']))
    {
      return null;
    }

    /* Si hay errores*/
    $alert_attr = $_SESSION['alert_attr'];
    $_SESSION['alert_attr']=null;
    return $alert_attr;
  }

  /* Devuelve un array con los errores de las operaciones SQL */
  function errors()
  {
    /* Verifico que no haya errores */
    if(! isset($_SESSION['errors']))
    {
      return null;
    }

    /* Si hay errores*/
    $errors = $_SESSION['errors'];
    $_SESSION['errors']=null;
    return $errors;
  }

  /* Log out */
  function log_out()
  {
    if(isset($_SESSION['user_info']))
    {
      $_SESSION['user_info']=null;
    }
  }


?>