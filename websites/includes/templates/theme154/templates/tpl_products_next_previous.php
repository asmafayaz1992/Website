<?php

?>
<?php
    // only display when more than 1
    if ($products_found_count > 1) {
?>
    <div class="product-info">
        <?php echo (PREV_NEXT_PRODUCT); ?><?php echo ($position+1 . "/" . $counter); ?>
    </div>
    <div class="btn-group">
      <a class="btn-default-small" href="<?php echo zen_href_link(zen_get_info_page($previous), "cPath=$cPath&products_id=$previous"); ?>"><?php echo $previous_image . $previous_button; ?></a>
      <a class="btn-default-small" href="<?php echo zen_href_link(FILENAME_DEFAULT, "cPath=$cPath"); ?>"><?php echo zen_image_button(BUTTON_IMAGE_RETURN_TO_PROD_LIST, BUTTON_RETURN_TO_PROD_LIST_ALT); ?></a>
      <a class="btn-default-small" href="<?php echo zen_href_link(zen_get_info_page($next_item), "cPath=$cPath&products_id=$next_item"); ?>"><?php echo  $next_item_button . $next_item_image; ?></a>
<?php
    } 
?>