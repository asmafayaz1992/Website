<?php
  $content = "";
  $review_box_counter = 0;
  while (!$random_review_sidebox_product->EOF) {
    $review_box_counter++;
    $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent centeredContent">';
    $content .= '<a class="img" href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $random_review_sidebox_product->fields['products_id'] . '&reviews_id=' . $random_review_sidebox_product->fields['reviews_id']) . '">' . zen_image(DIR_WS_IMAGES . $random_review_sidebox_product->fields['products_image'], $random_review_sidebox_product->fields['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT).'</a><div class="sb-info"><a class="name" href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $random_review_sidebox_product->fields['products_id'] . '&reviews_id=' . $random_review_sidebox_product->fields['reviews_id']) . '">'. zen_trunc_string(nl2br(zen_output_string_protected(stripslashes($random_review_sidebox_product->fields['reviews_text']))), 80).'</a><br /><br />' . zen_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $random_review_sidebox_product->fields['reviews_rating'] . '.gif' , sprintf(BOX_REVIEWS_TEXT_OF_5_STARS, $random_review_sidebox_product->fields['reviews_rating']));
    $content .= '</div>';
	$content .= '</div>';
    $random_review_sidebox_product->MoveNextRandom();
  }
