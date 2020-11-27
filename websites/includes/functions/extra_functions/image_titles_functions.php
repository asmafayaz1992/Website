<?php

function title_image_exists($title, $file, $ext=''){
  $ext = $ext? $ext: IMAGE_TITLES_EXT;
  $title = file_exists(DIR_WS_TEMPLATE . 'buttons/' . $_SESSION['language'] . '/' . $file . $ext)? zen_image(DIR_WS_TEMPLATE . 'buttons/' . $_SESSION['language'] . '/' . $file . $ext, $title): $title;
  return $title;
}
?>