<?php
?>
<div class="centerColumn categoryColumn" id="indexCategories">
<?php if ($show_welcome == true) { ?>
<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php } ?>

<!-- deprecated - to use - uncomment
<?php if (TEXT_MAIN) { ?>
<div id="" class="content"><?php echo TEXT_MAIN; ?></div>
<?php } ?>-->

<!-- deprecated - to use - uncomment
<?php if (TEXT_INFORMATION) { ?>
<div id="" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php } ?>-->

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<div id="indexCategoriesMainContent" class="content"><?php
/**
 * require the html_define for the index/categories page
 */
  include($define_page);
?></div>
<?php } ?>

<?php } else { ?>

   <h2 class="centerBoxHeading"><?php echo $breadcrumb->last(); ?></h2> 
<div class="content_scene_cat_bg">

    <?php if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS == 'true') {
  		    // categories_image
            if ($categories_image = zen_get_categories_image($current_category_id)) {
    ?>
  		    <div id="category-image" class="categoryImg">
              <?php echo zen_image(DIR_WS_IMAGES . $categories_image, '', CATEGORY_ICON_IMAGE_WIDTH, CATEGORY_ICON_IMAGE_HEIGHT); ?>
              <div class="cat_desc">
					<?php if ($current_categories_description != '') { ?>
                        <div class="catDescContent">
                            <?php echo $current_categories_description;  ?>
                        </div>
                    <?php } ?>	
                </div>
            </div>
    <?php   }
  		} // categories_image ?>
        
    

</div>

<?php

      if (PRODUCT_LIST_CATEGORY_ROW_STATUS == 0) {
        // do nothing
      } else {
        
        echo '<div id="subcategories">
        <p class="subcategory-heading">' . SUBCATEGORY_TITLE . '</p>
        <ul class="row">';
            require($template->get_template_dir('tpl_modules_category_row.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_row.php');
        echo '</ul></div>';
      }
?>
        
<?php } ?>




<div class="tie">
	<div class="tie-indent">
	

<!-- EOF: Display grid of available sub-categories -->
<?php
$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_CATEGORY);

while (!$show_display_category->EOF) {
  // //  echo 'I found ' . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS);

?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING') { ?>
<?php include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS)); ?><?php } ?>
<?php
  $show_display_category->MoveNext();
} // !EOF
?>
	<div class="clear"></div>
	</div>
</div>

</div>
