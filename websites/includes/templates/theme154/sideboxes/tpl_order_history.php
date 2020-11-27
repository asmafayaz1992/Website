<?php

  $content = "";
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">' . "\n";
  $content .= '<ul class="orderHistList">' . "\n" ;

  for ($i=1; $i<=sizeof($customer_orders); $i++) {

        $content .= '<li>
        <a class="icon1" href="' . zen_href_link(basename($PHP_SELF), zen_get_all_get_params(array('action')) . 'action=cust_order&pid=' . $customer_orders[$i]['id']) . '">' . zen_image($template->get_template_dir(ICON_IMAGE_TINYCART, DIR_WS_TEMPLATE, $current_page_base,'images/icons'). '/' . ICON_IMAGE_TINYCART, ICON_TINYCART_ALT) . '</a>&nbsp;&nbsp;
        <a  class="no-bg" href="' . zen_href_link(zen_get_info_page($customer_orders[$i]['id']), 'products_id=' . $customer_orders[$i]['id']) . '">' . $customer_orders[$i]['name'] . '</a>
        </li>' . "\n" ;
  }
  $content .= '</ul>' . "\n" ;
  $content .= '</div>';
?>