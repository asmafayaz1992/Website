<?php
// the following IF statement can be duplicated/modified as needed to set additional flags
  if (in_array($current_page_base,explode(",",'list_pages_to_skip_all_right_sideboxes_on_here,separated_by_commas,and_no_spaces')) ) {
    $flag_disable_right = true;
  }
  $header_template = 'tpl_header.php';
  $footer_template = 'tpl_footer.php';
  $left_column_file = 'column_left.php';
  $right_column_file = 'column_right.php';
  $body_id = ($this_is_home_page) ? 'indexHome' : str_replace('_', '', $_GET['main_page']);
  
?>

<body id="<?php echo $body_id . 'Body'; ?>"<?php if($zv_onload !='') echo ' onload="'.$zv_onload.'"'; ?>>
  
  <?php if ($messageStack->size('contact') > 0) echo $messageStack->output('contact'); ?>

 <div id="page">
<!-- ========== IMAGE BORDER TOP ========== --> 

<!-- BOF- BANNER TOP display -->

    <?php
      if (SHOW_BANNERS_GROUP_SET1 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET1)) {
        if ($banner->RecordCount() > 0) {
          ?>
        <div id="bannerTop" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
        <?php
      }
    }
    ?>
<!-- EOF- BANNER TOP display -->
    
    <!-- ====================================== --> 

    <!-- ========== HEADER ========== -->
      <?php
	    /* prepares and displays header output */
	     if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_HEADER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
		    $flag_disable_header = true;
	     }
	     require($template->get_template_dir('tpl_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_header.php');
	    ?>
    <!-- ============================ -->

  <section>
      <?php if (DEFINE_BREADCRUMB_STATUS == '1' || (DEFINE_BREADCRUMB_STATUS == '2' && !$this_is_home_page) ) 
                { ?>
      <div id="navBreadCrumb" class="breadcrumb"><?php echo $breadcrumb->trail(""); ?></div>
      <?php } ?>
      <?php
    		if($this_is_home_page){
    	?>
      <div class="container">
        <div class="slider"> 
          <!-- begin edit for ZX Slideshow -->
          <?php if(ZX_SLIDESHOW_STATUS == 'true') { ?>
          <?php require($template->get_template_dir('zx_slideshow.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/zx_slideshow.php'); ?>
          <?php } ?>
          <!-- end edit for ZX Slideshow --> 
        </div>
      </div>
      <div class="container">
        <div class="banners1">
          <div class="row">
          <?php
            $new_banner_search = zen_build_banners_group(SHOW_BANNERS_GROUP_SET3);
    
              // secure pages
              switch ($request_type) {
                case ('SSL'):
                  $my_banner_filter=" and banners_on_ssl= " . "1";
                  break;
                case ('NONSSL'):
                  $my_banner_filter='';
                  break;
              }
            
              $sql = "select banners_id from " . TABLE_BANNERS . " where status = 1 " . $new_banner_search . $my_banner_filter . " order by banners_sort_order";
              $banners_all = $db->Execute($sql);
    
            // if no active banner in the specified banner group then the box will not show
              $banner_cnt = 0;
              while (!$banners_all->EOF) {
                $banner_cnt++;
                $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET3);
                echo '<div class="col-sm-4 col-xs-4 item item_'.$banner_cnt.'">'.tm_zen_display_banner('static', $banners_all->fields['banners_id']).'</div>';
            // add spacing between banners
                if ($banner_cnt < $banners_all->RecordCount()) {
                  
                }
                $banners_all->MoveNext();
              }
            ?>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="banners2">
          <?php
              $new_banner_search = zen_build_banners_group(SHOW_BANNERS_GROUP_SET4);
                // secure pages
                switch ($request_type) {
                  case ('SSL'):
                    $my_banner_filter=" and banners_on_ssl= " . "1";
                    break;
                  case ('NONSSL'):
                    $my_banner_filter='';
                    break;
                }         
                $sql = "select banners_id from " . TABLE_BANNERS . " where status = 1 " . $new_banner_search . $my_banner_filter . " order by banners_sort_order";
                $banners_all = $db->Execute($sql);
              // if no active banner in the specified banner group then the box will not show
                $banner_cnt = 0;
                while (!$banners_all->EOF) {
                  $banner_cnt++;
                  $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET4);
                  echo '<div class="item_'.$banner_cnt.'">'.tm_zen_display_banner('static', $banners_all->fields['banners_id']).'</div>';
              // add spacing between banners
                  if ($banner_cnt < $banners_all->RecordCount()) {              
                  }
                  $banners_all->MoveNext();
                }
          ?>
        </div>
      </div>
      <?php
    		}
    	?>
    <div class="container">
    <div class="row">
      <div class="main-col 
	  <?php if ((COLUMN_LEFT_STATUS == 1 && $body_id !== 'productinfo') || (COLUMN_RIGHT_STATUS == 1 && $body_id !== 'productinfo')) { ?>col-sm-9 <?php }?>
	  <?php if (COLUMN_LEFT_STATUS == 1 ) {?> left_column<?php }?><?php if (COLUMN_RIGHT_STATUS == 1 ) {?> right_column<?php }?>
      <?php if ((COLUMN_LEFT_STATUS == 0 && $body_id !== 'productinfo') || (COLUMN_RIGHT_STATUS == 0 && $body_id !== 'productinfo')) { ?>col-sm-12 <?php }?>">

		 <div class="row">

        <div class="center_column col-xs-12
				<?php 
					if (COLUMN_LEFT_STATUS == 1 && COLUMN_RIGHT_STATUS == 1 && $body_id !== 'productinfo') { 
						echo 'col-sm-8 two_columns';
					} elseif ((COLUMN_LEFT_STATUS == 1 && $body_id !== 'productinfo') || (COLUMN_RIGHT_STATUS == 1 && $body_id !== 'productinfo')) { 
						echo 'col-sm-12 with_col';
					} else {
						echo 'col-sm-12';
					} 
					
    			?> ">
          <?php 
                      if ($messageStack->size('upload') > 0) echo $messageStack->output('upload');
    								require($body_code);
    			?>
        </div>
      
      <?php
	  if($body_id !== 'productinfo'){
    				if (COLUMN_RIGHT_STATUS == 0 or (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '')) {
    				  // global disable of column_right
    				  $flag_disable_right = true;
    				}
    				if (!isset($flag_disable_right) || !$flag_disable_right) {
    			?>
        <div class="column right_column col-xs-12 col-sm-4">
          <?php
    						 /* ----- prepares and displays left column sideboxes ----- */
    						?>
          <?php require(DIR_WS_MODULES . zen_get_module_directory('column_right.php')); ?>
        </div> 
        <?php
    				}
	  		}
    			?>
                </div>
                </div>
            <?php
		if($body_id !== 'productinfo'){
			if (COLUMN_LEFT_STATUS == 0 or (CUSTOMERS_APPROVAL == '1' and $_SESSION['customer_id'] == '')) {
			  // global disable of column_left
			  $flag_disable_left = true;
			}
			if (!isset($flag_disable_left) || !$flag_disable_left) {
		?>
        <aside class="column left_column col-xs-12 col-sm-3">
	       <?php
           /* ----- prepares and displays left column sideboxes ----- */
        ?>
        <?php require(DIR_WS_MODULES . zen_get_module_directory('column_left.php')); ?>
        </aside>
        <?php
			 }
			}
		?>
        </div>  
      </div>
        <div class="clearfix"></div>
        <!--bof-custom block display-->
			<?php require($template->get_template_dir('tpl_customblock.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_customblock.php');?> 
        <!--eof-custom block display--> 
   
  </section>
</div>  
<!-- ========== FOOTER ========== -->
  <footer>
    <div class="footer-container">
        <?php
        	 /* prepares and displays footer output */
        	  if (CUSTOMERS_APPROVAL_AUTHORIZATION == 1 && CUSTOMERS_AUTHORIZATION_FOOTER_OFF == 'true' and ($_SESSION['customers_authorization'] != 0 or $_SESSION['customer_id'] == '')) {
        		$flag_disable_footer = true;
        	  }
        	  require($template->get_template_dir('tpl_footer.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_footer.php');
        	?>
    </div>
  </footer>
<!-- ============================ --> 


<!-- ========================================= -->
</body>
