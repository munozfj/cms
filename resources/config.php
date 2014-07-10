<?php

  /* Declaración de constantes de la aplicación */
  define("APPLICATION_TITLE", "Metis CMS Project");
  define("APPLICATION_SHORT_TITLE", "Metis");

  /* Declaración de constantes de directorios de la aplicación */
  define("LIBRARIES_PATH", realpath(dirname(__FILE__) . "/libraries"));
  define("LAYOUTS_PATH",   realpath(dirname(__FILE__) . "/layouts"));
  define("RESOURCES_PATH", realpath(dirname(__FILE__)));

  /* Declaración de constantes de la base de datos */
  define("DB_HOST",     "localhost");
  define("DB_NAME",     "cms_db");
  define("DB_USERNAME", "cms_sys");
  define("DB_PASSWORD", "secret");


?>

