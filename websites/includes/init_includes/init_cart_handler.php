<?php

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}
if (isset($_GET['action'])) {
  /**
   * redirect the customer to a friendly cookie-must-be-enabled page if cookies are disabled
   */
  if ($session_started == false) {
    zen_redirect(zen_href_link(FILENAME_COOKIE_USAGE));
  }
  if (DISPLAY_CART == 'true') {
    $goto =  FILENAME_SHOPPING_CART;
    $parameters = array('action', 'cPath', 'products_id', 'pid', 'main_page');
  } else {
    $goto = $_GET['main_page'];
    if ($_GET['action'] == 'buy_now') {
      if (strpos($goto, 'reviews') > 5) {
        $parameters = array('action');
        $goto = FILENAME_PRODUCT_REVIEWS;
      } else {
        $parameters = array('action', 'products_id');
      }
    } elseif ($_GET['main_page'] == FILENAME_PRODUCT_INFO || $_GET['main_page'] == FILENAME_PRODUCT_REVIEWS || $_GET['main_page'] == FILENAME_PRODUCT_REVIEWS_INFO || $_GET['main_page'] == FILENAME_PRODUCT_REVIEWS_WRITE) {
      $parameters = array('action', 'pid', 'main_page', 'product_id');
    } else {
      $parameters = array('action', 'pid', 'main_page', 'products_id', 'product_id');
    }
  }
  /**
   * require file containing code to handle default cart actions
   */
  require(DIR_WS_INCLUDES . 'main_cart_actions.php');
}
