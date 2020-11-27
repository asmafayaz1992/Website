<?php
  $content = "";
  $whats_new_box_counter = 0;
  while (!$random_whats_new_sidebox_product->EOF) {
    $whats_new_box_counter++;
    $whats_new_price = zen_get_products_display_price($random_whats_new_sidebox_product->fields['products_id']);
    $content .= '<div class="sideBoxContent centeredContent">';
	$content .= '<div class="img">';
    $content .= '<a href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']) . '&products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">' . zen_image(DIR_WS_IMAGES . $random_whats_new_sidebox_product->fields['products_image'], $random_whats_new_sidebox_product->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_WIDTH) . '</a>';
	$content .= '</div>';
	$content .= '<div class="sb-info">';
    $content .= '<a class="name" href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']) . '&products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">' . $random_whats_new_sidebox_product->fields['products_name'] . '</a>';
	$content .= '<div class="text">';
	$content .= substr(strip_tags($random_whats_new_sidebox_product->fields['products_description']), 0, 70) ;
	$content .= '</div>';
    $content .= '<div class="price">' . $whats_new_price . '</div>';
    $content .= '</div>';
	$content .= '</div>';
    $random_whats_new_sidebox_product->MoveNextRandom();
  }
?>
