<?php

  function db_open_connection()
  {

    global $connection;

    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(mysqli_connect_errno())
    {
      die("Database failed ". mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
    }

  }

  function db_close_connection()
  {
    global $connection;
    
    if( isset($connection))
    {
      mysqli_close($connection);
    }
  }





?>