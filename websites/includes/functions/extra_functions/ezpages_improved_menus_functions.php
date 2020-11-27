<?php

//call as active_page_class($var_linksList[$i]['id'],$var_linksList[$i]['altURL']);
function active_page_class($ezpid,$alturl) {
  global $this_is_home_page;
  $active = '';
  if($_GET['main_page'] == 'page') {
    $active = ($_GET['id'] == $ezpid)? ' class="activeEZPage"': '';
  }elseif($alturl) {
    $alturl = htmlspecialchars_decode(str_replace(HTTP_SERVER . DIR_WS_CATALOG,'/',$alturl));
    $active = ((strstr($_SERVER['REQUEST_URI'],$alturl) and !strstr('/index.php?main_page=index',$alturl)) or ($this_is_home_page and strstr('/index.php?main_page=index',$alturl)))?' class="activeILPage"': '';
  }
  return $active;
}
?>