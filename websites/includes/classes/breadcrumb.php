<?php
/**
 * breadcrumb Class.
 *
 */
if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

/**

 */
if (!defined('DISABLE_BREADCRUMB_LINKS_ON_LAST_ITEM')) define('DISABLE_BREADCRUMB_LINKS_ON_LAST_ITEM','true');

/**
 * breadcrumb Class.
 * Class to handle page breadcrumbs
 *
 * @package classes
 */
class breadcrumb extends base {
  var $_trail;

  function breadcrumb() {
    $this->reset();
  }

  function reset() {
    $this->_trail = array();
  }

  function add($title, $link = '') {
    $this->_trail[] = array('title' => $title, 'link' => $link);
  }

  function trail($separator = '&nbsp;&nbsp;') {
    $trail_string = '';

    for ($i=0, $n=sizeof($this->_trail); $i<$n; $i++) {
//    echo 'breadcrumb ' . $i . ' of ' . $n . ': ' . $this->_trail[$i]['title'] . '<br />';
      $skip_link = false;
		  if ($i==($n-1) && DISABLE_BREADCRUMB_LINKS_ON_LAST_ITEM =='true') {
        $skip_link = true;
      }
      if (isset($this->_trail[$i]['link']) && zen_not_null($this->_trail[$i]['link']) && !$skip_link ) {
        // this line simply sets the "Home" link to be the domain/url, not main_page=index?blahblah:
        if ($this->_trail[$i]['title'] == HEADER_TITLE_CATALOG) {
          $trail_string .= '  <a class="home" href="' . HTTP_SERVER . DIR_WS_CATALOG . '"></a>';
        } else {
          $trail_string .= '  <a href="' . $this->_trail[$i]['link'] . '">' . $this->_trail[$i]['title'] . '</a>';
        }
      } else {
        $trail_string .= ' <span> ' . $this->_trail[$i]['title'] . '</span>';
      }

      if (($i+1) < $n) $trail_string .= $separator;
      $trail_string .= "\n";
    }

    return $trail_string;
  }

  function last() {
    $trail_size = sizeof($this->_trail);
    return $this->_trail[$trail_size-1]['title'];
  }
}
?>