<?php
 //require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>

<div class="centerColumn" id="productGeneral">
  <?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORY_ICON_DISPLAY)); ?>
  <div class="wrapper bot-border"> 
    <!--bof Prev/Next bottom position -->
    <?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
    <?php
    /**
     * display the product previous/next helper
     */
     require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
    <?php } ?>
  </div>
  <div class="tie">
    <div class="tie-indent">
      <div class="page-content"> 
      <!--bof Form start--> 
        <?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product'), 'post', 'enctype="multipart/form-data"') . "\n"; ?> 
        <!--eof Form start-->
          
        <?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>
          
        <!--bof Category Icon -->
          
        <?php /*
<?php if ($module_show_categories != 0) {?>
<?php

 // display the category icons
require($template->get_template_dir('/tpl_modules_category_icon_display.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_icon_display.php'); } 
<!--eof Category Icon -->
   */ ?>
          
        
          <div class="row">
        <div class="main-image col-xs-6 col-sm-6"> 
          <!--bof Main Product Image -->
          <?php
			  if (zen_not_null($products_image)) {
			?>
          <?php
			/**
			 * display the main product image
			 */
   require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
          <?php
  }
?>
            
          <!--eof Main Product Image--> 
          <!--bof Additional Product Images -->
          <?php

			  require(DIR_WS_MODULES . zen_get_module_directory('additional_images.php'));
			 ?>
          <?php
		   if ($flag_show_product_info_additional_images != 0 && $num_images > 0) {
		  ?>
          <ul id="productAdditionalImages">
            <?php
  require($template->get_template_dir('tpl_columnar_display_li.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display_li.php'); ?>
          </ul>
          <?php 
			  }
			?>
		<!--eof Additional Product Images -->
		</div>
          <div class="pb-center-column col-xs-6 col-sm-6"> 
            <!--bof free ship icon  -->
            <?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
            <div id="freeShippingIcon"><?php echo TEXT_PRODUCT_FREE_SHIPPING_ICON; ?></div>
            <?php } ?>
            <!--eof free ship icon  -->
            <h2 class="title_product"><?php echo $products_name; ?></h2>
            <h3 class="sub_title"><?php echo $products_model; ?> </h3>
            <!--bof Product description -->
            <?php if ($products_description != '') { ?>
            <div id="shortDescription" class="description"><?php echo substr(strip_tags($products_description), 0, 300) . '...' .''; ?></div>
            <?php } ?>
            <!--eof Product description -->
            <!--bof Product details list  -->
			<?php if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
            <ul class="instock">
              <?php echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li>' . '<strong>'.TEXT_PRODUCT_WEIGHT.'</strong>' .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?> <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li>' . '<strong>'.TEXT_PRODUCT_MANUFACTURER.'</strong>' . $manufacturers_name . '</li>' : '') . "\n"; ?>
            </ul>
            <?php
              }
            ?>
            <!--eof Product details list  --> 
            <div class="wrapper atrib"> <span class="quantity_label"><?php echo $products_quantity.TEXT_PRODUCT_QUANTITY; ?></span>
              <div class="reviews_button"> <?php echo '<a class="btn-default-small" href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>&nbsp; &nbsp;'; ?> <?php echo '<a class="btn-add-small" href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?> </div>
            </div>
            <div class="wrapper atrib2"> 
              <!--bof Attributes Module -->
              <?php
  if ($pr_attr->fields['total'] > 0) {
?>
              <?php
/**
 * display the product atributes
 */
  require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
              <?php
  }
?>
              <!--eof Attributes Module --> 
              
            <div class="add_to_cart_block"> 
              <!--bof Add to Cart Box -->
              <?php
	if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
	  // do nothing
	} else {
	?>
              <?php
				$display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
				if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
				  // hide the quantity box and default to 1
				  $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . '<span class="fright">'.zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT).'</span>';
				} else {
				  // show the quantity box
		$the_button = '<div class="add_to_cart_row"><strong class="fleft text2"><input type="text" class="form-control" name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="8" />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . zen_draw_hidden_field('products_id', (int)$_GET['products_id']).'</strong>' . '<span class="buttonRow">'.zen_image_submit('', BUTTON_IN_CART_ALT).'</span></div>';
				}
		$display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
	  ?>
              <?php if ($display_qty != '' or $display_button != '') { ?>
              <div id="prod-price">
                <?php
        	// base price
        	  if ($show_onetime_charges_description == 'true') {
        		$one_time = '<span >' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span>';
        	  } else {
        		$one_time = '';
        	  }
        	  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? '<span class="price-text">'.TEXT_BASE_PRICE.'</span>' : '') . zen_get_products_display_price((int)$_GET['products_id']);
		      ?>
              </div>
              <div class="clearfix"></div>
              
              <?php } // display qty and button ?>
              <?php } // CUSTOMERS_APPROVAL == 3 ?>
              <!--eof Add to Cart Box--> 
            </div>
            </div>
            <div id="button_product">
                <?php 
			  echo $display_button;
		      echo $display_qty;
			  ?>
              </div>
            <!-- bof Social Media Icons -->
            <?php if(TM_SOCIAL_BLOCK_STATUS == 'true') { ?>
            <ul id="social">
              <?php if(TM_SOCIAL_BLOCK_STATUS_FB == 'true') { ?>
              <li class="facebook">
                <fb:like send="false" layout="button_count" width="150" show_faces="false"></fb:like>
              </li>
              <?php } ?>
              <?php if(TM_SOCIAL_BLOCK_STATUS_PN == 'true') { ?>
              <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url='.  urlencode(zen_href_link(zen_get_info_page($_GET['products_id']), 'cPath=' . $_GET['cPath'] . '&products_id=' . $_GET['products_id']) ).'&media=' .  urlencode(HTTP_SERVER . DIR_WS_CATALOG . $products_img) . '&description=' .  rawurlencode($products_name) . '" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></li>
              <?php } ?>
              <?php if(TM_SOCIAL_BLOCK_STATUS_GO == 'true') { ?>
              <li class="google">
                <div class="g-plusone" data-size="medium"></div>
              </li>
              <?php } ?>
              <?php if(TM_SOCIAL_BLOCK_STATUS_TW == 'true') { ?>
              <li class="twitter"><a href="https://twitter.com/share" class="twitter-share-button fleft">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
              <?php } ?>
            </ul>
            <?php } ?>
            <!-- eof Social Media Icons --> 
          </div>
        </div>
        <div class="video_desc">
            <div class="row">
            <!--bof  -->
                <?php echo (($flag_show_product_info_youtube == 1 && $products_youtube !='') ? 
                '<div id="productYouTube" class="col-xs-12 col-sm-6">
                <iframe width="100%" height="264px" src="http://www.youtube-nocookie.com/embed/' . $products_youtube . '?rel=0&showinfo=0&fs=0"  frameborder="0" allowfullscreen></iframe></div>' : '') . "\n"; ?>
            <!--eof YouTube -->
            <!--bof Product description -->
            <?php if ($products_description != '') { ?>
            <div id="productDescription" class="description biggerText col-sm-6 col-xs-12<?php if ($flag_show_product_info_youtube == 1 && $products_youtube !=''){?> col-sm-7 <?php } ?>"><?php echo stripslashes($products_description); ?></div>
            <?php } ?>
            <!--eof Product description --> 
            </div>
       </div>
        <!--bof Quantity Discounts table -->
        <?php
  if ($products_discount_type != 0) { ?>
        <?php
/**
 * display the products quantity discount
 */
 require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
        <?php
  }
?>
        <!--eof Quantity Discounts table --> 
        
        <!--bof also related products module-->
        
        <?php require($template->get_template_dir('tpl_modules_related_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_related_products.php');?>
        
        <!--eof also related products module--> 

        <div class="text2">
          <p class="reviewCount"><strong><?php echo ($flag_show_product_info_reviews_count == 1 ? TEXT_CURRENT_REVIEWS . ' ' . $reviews->fields['count'] : ''); ?></strong></p>
          
          <!--bof Product date added/available-->
          <?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
          <p id="productDateAvailable" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?></p>
          <?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
          <p id="productDateAdded" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?></p>
          <?php
    } // $flag_show_product_info_date_added
  }
?>
          <!--eof Product date added/available --> 
          
          <!--bof Product URL -->
          <?php
  if (zen_not_null($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
          <p id="productInfoLink" class="productGeneral centeredContent"><?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($products_url), 'NONSSL', true, false)); ?></p>
          <?php
    } // $flag_show_product_info_url
  }
?>
          <!--eof Product URL --> 
          
        </div>
        

        
        
        
        <!--bof also purchased products module-->
        <?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>
        <!--eof also purchased products module--> 
        
        <!--bof Form close-->
        </form>
        <!--bof Form close--> 
        
      </div>
    </div>
  </div>
</div>
