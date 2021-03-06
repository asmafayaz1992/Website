<?php
?>
<div class="centerColumn categoryColumn" id="indexCategories">
<h2 class="centerBoxHeading"><?php echo $breadcrumb->last(); ?></h2>
<div class="content_scene_cat_bg">

  <?php if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS == 'true') {
          // categories_image
            if ($categories_image = zen_get_categories_image($current_category_id)) {
    ?>
        <div id="category-image" class="indexCategories">
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

<div class="content_sortPagiBar">
  <div class="inner">

<?php
  $check_for_alpha = $listing_sql;
  $check_for_alpha = $db->Execute($check_for_alpha);

  if ($do_filter_list || ($check_for_alpha->RecordCount() > 0 && PRODUCT_LIST_ALPHA_SORTER == 'true')) {
  $form = zen_draw_form('filter', zen_href_link(FILENAME_DEFAULT), 'get') . '<label class="inputLabel">' .TEXT_SHOW . '</label>';
?>

<?php
  echo $form;
  echo zen_draw_hidden_field('main_page', FILENAME_DEFAULT);
  echo zen_hide_session_id();
?>


<?php
  // draw cPath if known
  if (!$getoption_set) {
    echo zen_draw_hidden_field('cPath', $cPath);
  } else {
    // draw manufacturers_id
    echo zen_draw_hidden_field($get_option_variable, $_GET[$get_option_variable]);
  }

  // draw typefilter
  if (isset($_GET['typefilter']) && $_GET['typefilter'] != '') echo zen_draw_hidden_field('typefilter', $_GET['typefilter']);

  // draw manufacturers_id if not already done earlier
  if ($get_option_variable != 'manufacturers_id' && isset($_GET['manufacturers_id']) && $_GET['manufacturers_id'] > 0) {
    echo zen_draw_hidden_field('manufacturers_id', $_GET['manufacturers_id']);
  }

  // draw sort
  echo zen_draw_hidden_field('sort', $_GET['sort']);

  // draw filter_id (ie: category/mfg depending on $options)
  if ($do_filter_list) 
  {
    
    $letter_start = $options[0]['text'];
      if(isset($_GET['filter_id'])) {
            foreach($options as $key => $letter){
                if($letter['id'] == $_GET['filter_id'])
                    $letter_start= $letter['text'];
            }
        
      }
    $output = '
        <input type="hidden" name="filter_id" value="" id="filter_id" />
        <div class="dropdown">
          <button class="btn-default-small dropdown-toggle" type="button" id="dropdownMenu11" data-toggle="dropdown">
            '.$letter_start.'
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu alt" role="menu" aria-labelledby="dropdownMenu11">
          ';
          
          foreach($options as $key => $letter)
          {
            if(!isset($_GET['filter_id']))
            {
                 if($key != 0)
                 $output.= '<li><a href="javascript:void(0);" onclick="document.getElementById(\'filter_id\').value= \''.$letter['id'].'\';document.filter.submit();">'.$letter['text'].'</a></li>';
            }
            else
                 $output.= '<li><a href="javascript:void(0);" onclick="document.getElementById(\'filter_id\').value= \''.$letter['id'].'\';document.filter.submit();">'.$letter['text'].'</a></li>';
          }
      $output.= '
          </ul>
        </div>
      ';
    //echo zen_draw_pull_down_menu('filter_id', $options, (isset($_GET['filter_id']) ? $_GET['filter_id'] : ''), 'onchange="this.form.submit()"');
    echo $output;
  }

  // draw alpha sorter
  require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_PRODUCT_LISTING_ALPHA_SORTER));
?>
</form>
<?php
  }
?>
  </div>
</div>
<div class="clearfix"></div>

<?php
/**
 * require the code for listing products
 */
 require($template->get_template_dir('tpl_modules_product_listing.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_product_listing.php');
?>


<?php
//// bof: categories error
if ($error_categories==true) {
  // verify lost category and reset category
  $check_category = $db->Execute("select categories_id from " . TABLE_CATEGORIES . " where categories_id='" . $cPath . "'");
  if ($check_category->RecordCount() == 0) {
    $new_products_category_id = '0';
    $cPath= '';
  }
?>

<?php
$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_MISSING);

while (!$show_display_category->EOF) {
?>

<?php
  if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php
  if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php
  if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php
  if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MISSING_UPCOMING') {
    include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS));
  }
?>
<?php
  $show_display_category->MoveNext();
} // !EOF
?>
<?php } //// eof: categories error ?>

<?php
//// bof: categories
$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_LISTING_BELOW);
if ($error_categories == false and $show_display_category->RecordCount() > 0) {
?>

<?php
  $show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_LISTING_BELOW);
  while (!$show_display_category->EOF) {
?>

<?php
    if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php
    if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php
    if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php
    if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_LISTING_BELOW_UPCOMING') {
      include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS));
    }
?>
<?php
  $show_display_category->MoveNext();
  } // !EOF
?>

<?php
} //// eof: categories
?>

</div>
