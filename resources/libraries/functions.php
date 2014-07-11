<?php

  function navigation_subjects_pages($current_subject_id, $current_page_id)
  {
    /* lista de Subjets */
    $output  = '<ul>';

    /* Obtengo el conjunto de todos los subjects */
    $subject_set = find_all_subjects();

    /* Recorro el conjunto de subjects */
    while( $subject = mysqli_fetch_assoc($subject_set))
    {
      $output .= "<li ";
      $output .= ($subject['id'] == $current_subject_id['id']) ? "class='selected-item' ": null;
      $output .= "> <a href='manage_contents.php?subject=" . 
                        urlencode($subject['id']) .
                        "'> ". htmlentities($subject['menu_name'])." </a> </li> \n";

      /* Sublista de Paginas*/
      $output .=   "<ul> \n";

      /* Obtengo el conjunto de paginas para el subjet */
      $page_set = find_all_pages_for_subject($subject['id']);

      /* Recorro el conjunto de paginas */
      while($page = mysqli_fetch_assoc($page_set))
      {
        $output .= "<li ";
        $output .= ($page['id'] == $current_page_id['id']) ? "class='selected-item' ": null;
        $output .= "> <a href='manage_contents.php?page=" . 
                        urlencode($page['id']) .
                        "'> ". htmlentities($page['menu_name'])." </a> </li> \n";

      }
      $output .=   "</ul> \n";

    }

    /* Fin lista de subjects */
    $output .=  '</ul>';

    /* Al finalizar la lectura del conjunto de subjects
    libero la memoria del conjunto*/
    mysqli_free_result($subject_set);

    return $output;
  }

?>