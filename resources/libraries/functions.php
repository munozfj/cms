<?php
  /****************************************************************************
  Funciones Generales
  *****************************************************************************/
  /* Funcion para redireccionar a otra pagina */
  function redirect_to($new_location)
  {
    header("Location: ". $new_location);
    exit;
  }

  /* Muestra mensajes de operaciones SQL*/
  function show_flash()
  {
    /* Mensaje de la session */
    $alert_attr = alert_message();
    if(empty($alert_attr))
    {
      return null;
    }

    $output  = "\n <div class='alert ". htmlentities($alert_attr['alert_type']) ."' role='alert'>\n";
    $output .= htmlentities($alert_attr['alert_message']);
    $output .=  "\n</div>\n";

    return $output;
  }

  /* Muestro los mensajes de error */
  function show_errores()
  {
    /* Mensaje de la session */
    $errors = errors();
    if(empty($errors))
    {
      return null;
    }

    /* Armo div para errores */
    $output  = "<div class='error alert-danger' >\n";
    $output .= "Please solve the following errores:\n";
    $output .= "<ul>\n";
    foreach ($errors as $string) {
      $output .= "<li> {$string} </li>";
    }
    $output .= "</ul>\n";
    $output .= "</div> \n";

    return $output;
  }

  /* Muestra nombre de campos */
  function fieldname_as_text($field_name)
  {
    return ucword(replace("_"," ",$field_name));
  }

  /* Devuelve un boolean indicando si la variable de session username tiene 
  un valor asignado*/
  function logged_in()
  {
    return isset($_SESSION['user_info']);
  }

  /* Verifica que el usuario esté conectado */
  function confirm_logged_in()
  {
    if(!logged_in())
    {
      $alert['alert_message'] = "You have to log in to access to the Administration Section." ;
      $alert['alert_type'] = "alert-danger";
      $_SESSION['alert_attr']=$alert;
      redirect_to("index.php");
    }
  }

  /* Realiza el log out */
  function do_log_out()
  {
    log_out();
    $alert['alert_message'] = "Return soon." ;
    $alert['alert_type'] = "alert-success";
    $_SESSION['alert_attr']=$alert;
    redirect_to("index.php");
  }
  

  /* Funcion para encriptar password 
  a partir de PHP 5 se usa password_hash*/
  function password_encrypt($plain_password)
  {
    /* donde 2y indica que usará blowfish y 10 indica la cantidad de veces 
    que deberá ejecutar blowfish para generar la clave encriptada 
    - eso lo hace lento */
    $format_string="$2y$10$"; 
    /* como minimo se recomienda 22, con valores menores pueden aparecen 
    inconvenientes no deseados */
    $salt_length=22; 
    $salt=generate_salt($salt_length);
    $format_and_salt = $format_string.$salt;
    $hash=crypt($plain_password,$format_and_salt);
    return $hash;
  }

  /* Funcion para genera salta */
  function generate_salt($salt_length)
  {
    $unique_random_string=md5(uniqid(nt_rand(),true));
    $base64_string=base64_encode($unique_random_string);
    $modified_base64_string=str_replace("+", ".", $base64_string);
    $salt=substr($modified_base64_string,0,$salt_length);
    return $salt;
  }

  /* Funcion para valida password ingresada
  a partir de PHP5 se usa password_verify*/
  function password_check($plain_password,$hashed_password)
  {
    $hash=crypt($plain_password,$hashed_password);
    if($hass === $hashed_password)
    {
      return true;
    }
    return false;
  }



  /*****************************************************************************
  Funciones propias de la aplicación
  *****************************************************************************/
  function navigation_aside($page_invoked, 
                            $current_subject_id, 
                            $current_page_id,
                            $session_idw=null)
  {
    /* lista de Subjets */
    $output  = '<ul>';

    /* Verifico si las opciones tienen que ser visibles */
    $solo_visible = (!empty($session_idw))?false:true;

    /* Obtengo el conjunto de todos los subjects */
    $subject_set = find_all_subjects($solo_visible);

    /* Recorro el conjunto de subjects */
    while( $subject = mysqli_fetch_assoc($subject_set))
    {
      $output .= "<li ";
      $output .= ($subject['id'] == $current_subject_id['id']) ? "class='selected-item' ": null;
      $output .= "> <a href='".$page_invoked."?subject=" . 
                        urlencode($subject['id']) .
                        "'> ". htmlentities($subject['menu_name'])." </a> </li> \n";

      /* Sublista de Paginas*/
      $output .=   "<div id='page-list'> <ul> \n";

      /* Obtengo el conjunto de paginas para el subjet */
      $page_set = find_all_pages_for_subject($subject['id'], $solo_visible);

      /* Recorro el conjunto de paginas */
      while($page = mysqli_fetch_assoc($page_set))
      {
        $output .= "<li ";
        $output .= ($page['id'] == $current_page_id['id']) ? "class='selected-item' ": null;
        $output .= "> <a href='".$page_invoked."?page=" . 
                        urlencode($page['id']) .
                        "'> ". htmlentities($page['menu_name'])." </a> </li> \n";

      }
      $output .=   "</ul> </div>\n";

    }

    /* Fin lista de subjects */
    $output .=  '</ul>';

    /* Al finalizar la lectura del conjunto de subjects
    libero la memoria del conjunto*/
    mysqli_free_result($subject_set);

    return $output;
  }

?>