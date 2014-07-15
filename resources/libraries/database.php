<?php

  /* Funcion para abrir una conexión a la BD */
  function db_open_connection()
  {

    global $connection;

    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno())
    {
      die("Database failed ". mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }

  }

  /* Funcion para cerrar la conexión a una BD */
  function db_close_connection()
  {
    global $connection;
    
    if( isset($connection))
    {
      mysqli_close($connection);
    }
  }

  /* Función para escapear los valores que se van a usar para acceder a una BD */
  function mysqli_prep($string)
  {
    global $connection;

    return mysqli_real_escape_string($connection,$string);
  }


  /* Función para verificar si una consulta DML se realizo correctamente */
  function confirm_query($result_set)
  {
    global $connection;
    
    if(!$result_set)
    {
      die("Database query failed ". mysqli_error($connection) );
    }
  }

  /* Validaciones */
  /* Validación de existencia */
  function has_presence($value)
  {
    return (!isset($value) || $value ==="")?false:true;
  }


  /* Validación de longitud */
  function has_length($value, $max, $min=0)
  {
    return (strlen($value)<$min || strlen($value)>$max)?false:true;
  }

  /* Validación tipo */
  function has_type($value)
  {
    return (!is_string($value))?false:true;
  }

  /* Validación de unicidad */

  /* Validación de formato */
  function has_format($value, $regex)
  {
    return (!kpreg_match($regex,$value))?false:true;
  }

  /* Validaciones Subjects */
  function subject_validations($menu_name,$position,$visible)
  {
    /* Declaro array de errores */
    $errors = array();

    /* Validar existencia */
    if (!has_presence($menu_name))
    {
      $errors[]="Menu name cant be null";
    }

    if (!has_presence($position))
    {
      $errors[]="Position cant be null";
    }

    if (!has_presence($visible))
    {
      $errors[]="Visible cant be null";
    }

    /* Devuelvo los errores */
    return $errors;

  }

  /* Obtiene todos los registros de Subjects*/
  function find_all_subjects($solo_visible=false)
  {
    global $connection;

    /* Genero la cadena con el query */

    $query  = "select * ";
    $query .= "from Subjects ";
    $query .= ($solo_visible === true)?"where visible = 1  " : "   ";
    $query .= "order by position asc";

    /* Ejecuto query en la base */
    $subject_set = mysqli_query($connection,$query);

    /* Verifico si hubo retorno del query */
    confirm_query($subject_set);

    /* Devuelvo set de subjects */
    return $subject_set;

  }

  /* Obtiene todos los campos para un determinado subject_id */
  function find_subject_by_id($subject_id)
  {
    global $connection;

    /* Genero la cadena con el query */
    $query  = "select * ";
    $query .= "from Subjects ";
    $query .= "where id= " . mysqli_prep($subject_id) ." ";
    $query .= "limit 1 ";

    /* Ejecuto query en la base */
    $subject_set = mysqli_query($connection,$query);

    /* Verifico si hubo retorno del query */
    confirm_query($subject_set);

    /* Genero un array asociativo con toda la información o null */
    if($subject=mysqli_fetch_assoc($subject_set))
    {
      return $subject;
    }
    return null;

  }

  function find_all_pages_for_subject($subject_id,$solo_visible=false)
  {
    global $connection;

    /* Genero la cadena con el query */
    $query  = "select * ";
    $query .= "from Pages ";
    $query .= "where subject_id = " . mysqli_prep($subject_id) ." ";
    $query .= ($solo_visible === true)?"and visible = 1  " : "   ";
    $query .= "order by position asc";

    /* Ejecuto query en la base */
    $page_set = mysqli_query($connection,$query);

    /* Verifico si hubo retorno del query */
    confirm_query($page_set);

    /* Devuelvo set de subjects */
    return $page_set;

  }

  function find_page_by_id($page_id)
  {
    global $connection;

    /* Genero la cadena con el query */
    $query  = "select * ";
    $query .= "from Pages ";
    $query .= "where id= " . mysqli_prep($page_id) ." ";
    $query .= "limit 1 ";

    /* Ejecuto query en la base */
    $page_set = mysqli_query($connection,$query);

    /* Verifico si hubo retorno del query */
    confirm_query($page_set);

    /* Genero un array asociativo con toda la información o null */
    if($page=mysqli_fetch_assoc($page_set))
    {
      return $page;
    }
    return null;

  }





?>