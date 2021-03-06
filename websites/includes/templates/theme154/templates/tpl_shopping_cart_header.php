<?php
 
  $content ="";
  $product_amount = 0;
  
  if ($_GET['main_page']) {
	$current_page = $_GET['main_page'];
  } else {
  	$current_page = FILENAME_DEFAULT;
  }

  if ($_SESSION['cart']->count_contents() > 0) {
    $products = $_SESSION['cart']->get_products();
	$content .='<ul class="cart-down">';	
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
		$product_amount = $products[$i]['quantity'] + $product_amount;
		
		$content .= '<li class="cart_item">
						<a class="cart-img" href="' . zen_href_link(zen_get_info_page($products[$i]['id']), 'products_id=' . $products[$i]['id']) . '"><img src="'. DIR_WS_IMAGES. '' . $products[$i]['image'] . '"/></a>
						<div class="center-info">
							<a class="cart-name" href="' . zen_href_link(zen_get_info_page($products[$i]['id']), 'products_id=' . $products[$i]['id']) . '">' . $products[$i]['name'] . '</a>
							<div class="prod-info">
								<span class="model">' . $products[$i]['model'] . '</span>
								<span class="quantity">' . $products[$i]['quantity'] . ' <em class="spr">x</em> </span><span class="cart-price">' . $currencies->format($products[$i]['final_price']) . '</span>
							</div>
						</div>';
        $content .= '<a class="delete" href="' . zen_href_link($current_page, zen_get_all_get_params() . 'action=remove_product&product_id=' . $products[$i]['id']) . '"> </a>';
		$content .= '</li>';
	}
	$content .= '<div class="cart-price-total"><strong>Total:</strong>&nbsp;' .'<span>' . $currencies->format($_SESSION['cart']->show_total()) . '</span></div>';
	$content .= '<div class="cart-bottom">
	<a class="btn btn-success" href="' . zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL') . ' "><span class="cssButton">' . BOX_HEADING_SHOPPING_CART . '</span></a>
	<a class="btn btn-success1" href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_CHECKOUT, BUTTON_CHECKOUT_ALT) . '</a></div>'; 
	$content .= '</ul>';
  }
  else{
  	$content .='<div class="none"> ' . BOX_SHOPPING_CART_EMPTY . '</div>';
  } 
  
  
 /* if ($_SESSION['cart']->count_contents() > 0) {
    $content .= HEADER_CART_SUBTOTAL .'<span>' . $currencies->format($_SESSION['cart']->show_total()) . '</span>';
  }*/
?>
