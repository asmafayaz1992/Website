<?php

?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
  echo htmlspecialchars(urldecode($_GET['error_message']), ENT_COMPAT, CHARSET, TRUE);
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo htmlspecialchars($_GET['info_message'], ENT_COMPAT, CHARSET, TRUE);
} else {

}
?>


<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>

    <header>
        <div class="nav">
                <div class="container">
                    <div class="row">
                        <nav>
                        	<div id="currencies-block-top" class="top_dropdown_menu">
                                <!-- ========== CURRENCIES ========= -->
                                <form name="currencies" id="currencies_form" action="<?php echo zen_href_link(basename(ereg_replace('.php','', $PHP_SELF)), '', $request_type, false) ?>" method="get" >
                                    <input type="hidden" name="currency" id="currency_value" value="" />
                                    <?php
                                        if (isset($currencies) && is_object($currencies)) 
                                        {
                                            $hidden_get_variables = '';
                                            reset($_GET);
                                            while (list($key, $value) = each($_GET)) 
                                            {
                                                if ( ($key != 'currency') && ($key != zen_session_name()) && ($key != 'x') && ($key != 'y') ) {
                                                    echo zen_draw_hidden_field($key, $value);
                                                }
                                            } 
                                        }
                                    ?>                   
                                    <div class="btn-group">
                                      <span type="button" class="trigger_down dropdown-toggle" data-toggle="dropdown">
                                        <?php 
                                            $tmp_str = '';
                                            if(isset($_SESSION['currency']))
                                                $tmp_str.= '<span class="lbl">'.$_SESSION['currency'].' </span>';
                                            echo $tmp_str;
                                        ?> 
                                      </span>
                                      <ul class="dropdown-menu" role="menu">
                                        <?php
                                            if (isset($currencies) && is_object($currencies)) 
                                            {
                                                reset($currencies->currencies);
                                                $output = '';
                                                while (list($key, $value) = each($currencies->currencies)) 
                                                {
                                                    if($_SESSION['currency'] == $key)
                                                        $output.= "<li selected='selected' class='current_cur'><a href=\"javascript:void(0);\" onclick='document.getElementById(\"currency_value\").value=\"".$key."\";'>".$value['title']."</a></li>";
                                                    else
                                                        $output.= "<li><a href='javascript:void(0);' onclick='document.getElementById(\"currency_value\").value=\"".$key."\";document.getElementById(\"currencies_form\").submit();'>".$value['title']."</a></li>";
                                                } 
                                                echo $output;
                                            }
                                        ?>
                                      </ul>
                                    </div>
                                </form>
                                <!-- ====================================== -->
                            </div>
                            <?php /*?><div id="langs_block" class="top_dropdown_menu">
                                <!-- ========== LANGUAGES ========== -->        
                                <?php 
                                    if (!isset($lng) || (isset($lng) && !is_object($lng))) {
                                        $lng = new language;
                                    }
                                    reset($lng->catalog_languages);
                                ?>
                                <div class="btn-group">
                                      <span type="button" class="trigger_down dropdown-toggle" data-toggle="dropdown">
                                        <?php 
                                            echo '<span class="lbl">'.$_SESSION['language'].' </span>';
                                        ?> 
                                      </span>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php
                                            $output = '';
                                            while (list($key, $value) = each($lng->catalog_languages)) 
                                            {
                                                if($_SESSION['languages_id'] == $value['id'])
                                                    $output.= '<li selected="selected" class="current_cur"><a class="lang_link" href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . $value['name'] . '</a></li>';
                                                else
                                                    $output.= '<li><a class="lang_link" href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . $value['name'] . '</a></li>';
                                            } 
                                            echo $output;
                                        ?>
                                      </ul>
                                </div>
                                <!-- =============================== -->
                            </div><?php */?>
                            <div class="header_user_info customer_links">
                                <!-- ========== NAVIGATION LINKS ========== -->  
									<?php if ($_SESSION['customer_id']) { ?>
                                        <a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a>
                                    <?php
                                        } else {
                                        if (STORE_STATUS == '0') {
                                    ?>
                                    <a class="<?php if($body_id == 'account'){?>home<?php } ?>" href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a> 
                                    <a class="<?php if($body_id == 'login'){?>home<?php } ?>" href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a>  
                                    <?php } } ?>  
                                    <?php if ($_SESSION['cart']->count_contents() != 0) { ?>
                                        <a class="<?php if($body_id == 'shoppingcart'){?>home<?php } ?>" href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a>
                                        <a class="<?php if($body_id == 'checkoutshipping' || $body_id == 'checkoutpayment' || $body_id == 'checkoutconfirmation'){?>home<?php } ?>" href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a>
                                    <?php } ?>
                                <!-- ====================================== -->
                            </div>
                            <!--div class="phone">
								<//?php echo STORE_TELEPHONE_CUSTSERVICE ?>
                            </div-->
                        </nav>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="container">
                    <div class="row clearfix">
                        <div id="header_logo" class="col-xs-12 col-sm-3">
                            <!-- ========== LOGO ========== -->
                                <a href="<?php echo zen_href_link(FILENAME_DEFAULT);?>"><?php echo zen_image(DIR_WS_TEMPLATE.'images/logo.png'); ?></a>
                            <!-- ========================== -->
                        </div>

                        	<!--div id="ezpages" class="clearfix">
                                <//?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
                                    <//?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
                                <//?php } ?>
                            </div-->
                                <div class="shopping_cart col-xs-6 col-sm-4 col-md-3 " id="shopping_cart">
                                    <!-- ========== SHOPPING CART ========== -->
                                         <?php 
                                            if ($_SESSION['cart']->count_contents() >= 1){
                                                $cart_text = '<span class="st3"> ' . $_SESSION['cart']->count_contents();
                                                if ( $_SESSION['cart']->count_contents() < 2 )
                                                    $cart_text .= ' Product</span>';
                                                else    
                                                    $cart_text .= ' Products</span>';
                                            } else {
                                                $cart_text = '<span class="st3"> (empty) </span></a>';
                                            }
                                            
                                        ?>
                                        <div class="shop-box-wrap">
                                            <a href="#" class="cart_title" ><?php echo BOX_HEADING_SHOPPING_CART;?></a><?php echo $cart_text ?>
                                        </div>
                                        <div class="shopping_cart_content" id="shopping_cart_content" >
                                            <?php require($template->get_template_dir('tpl_shopping_cart_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_shopping_cart_header.php'); 
                                            echo $content;?>
                                        </div> 
                                    </div>
                            <!-- =================================== -->	
                         
                             <div id="search_block" class="col-xs-6 col-sm-4 clearfix">
                                <!-- ========== SEARCH ========== -->
                                <form name="quick_find_header" action="<?php zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false) ?>" method="get" class="form-inline form-search pull-right">
                                        <?php 
                                            echo zen_draw_hidden_field('main_page',FILENAME_ADVANCED_SEARCH_RESULT);
                                            echo zen_draw_hidden_field('search_in_description', '1') . zen_hide_session_id();
                                        ?>
                                        <label class="sr-only" for="searchInput">Search</label>
                                        <input class="form-control" id="searchInput" type="text" name="keyword" />
                                        <button type="submit" class="button-search"><i class="fa fa-search"></i><b><?php echo BOX_HEADING_SEARCH ?></b></button>
                                </form>
                                <!-- ============================ -->
                            </div> 
  
                        
						   
                         </div>
                   <?php if(TM_MEGAMENU_STATUS == 'true') { ?> 
                           <div class="top_menu container">
                           		<div class="cat-title"><?php echo BOX_HEADING_MENU; ?></div>
                                <!--bof-mega menu display-->
                                <?php require($template->get_template_dir('tpl_mega_menu.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_mega_menu.php');?> 
                                <!--eof-mega menu display--> 
                                <div class="clearBoth"></div> 
                            </div>
                            <?php } ?>
              </div>
        </div>
	</header>
	

	<?php 
		if (HEADER_SALES_TEXT != '' || (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2))) {
			if (HEADER_SALES_TEXT != '') {
	?>
        		<div id="tagline"><?php echo HEADER_SALES_TEXT;?></div>
	<?php
    		}
		}
	?>
   




	<!-- ========== CATEGORIES TABS ========= -->
		<?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
	<!-- ==================================== -->
                
    
<?php } ?>