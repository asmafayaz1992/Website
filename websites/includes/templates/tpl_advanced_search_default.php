<?php
?>
<div class="centerColumn" id="advSearchDefault">

<?php echo zen_draw_form('advanced_search', zen_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get', 'onsubmit="return check_form(this);"') . zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('main_page', FILENAME_ADVANCED_SEARCH_RESULT); ?>
    
<div class="heading"><h1><?php echo HEADING_TITLE_1; ?></h1></div>
  
<?php if ($messageStack->size('search') > 0) echo $messageStack->output('search'); ?> 
 
<div class="row">
    <div class="col-xs-12 col-xs-6 col-md-6">
        <fieldset>
            <h4><?php echo HEADING_SEARCH_CRITERIA; ?></h4>
            <div class="forward">
                <?php echo '<a href="javascript:popupWindow(\'' . zen_href_link(FILENAME_POPUP_SEARCH_HELP) . '\')">' . TEXT_SEARCH_HELP_LINK . '</a>'; ?>
            </div>
            <br class="clearBoth" />
            <div class="centeredContent">
                <span class="inp1">
                    <?php echo zen_draw_input_field('keyword', $sData['keyword'], 'onfocus="RemoveFormatString(this, \'' . KEYWORD_FORMAT_STRING . '\')"'); ?>
                </span>
                <br><br>
            </div>
                <?php echo zen_draw_checkbox_field('search_in_description', '1', $sData['search_in_description'], 'id="search-in-description"'); ?>
                &nbsp;&nbsp;
                <label class="checkboxLabel" for="search-in-description"><?php echo TEXT_SEARCH_IN_DESCRIPTION; ?></label>
        </fieldset>
    </div>
    <div class="col-xs-12 col-xs-6 col-md-6">
        <fieldset class="floatingBox">
            <h4><?php echo ENTRY_CATEGORIES; ?></h4>
            <div class="floatLeft">
                <?php echo zen_draw_pull_down_menu('categories_id', zen_get_categories(array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES)), '0' ,'', '1'), $sData['categories_id']); ?>
                &nbsp;&nbsp;&nbsp;
                <div><?php echo zen_draw_checkbox_field('inc_subcat', '1', $sData['inc_subcat'], 'id="inc-subcat"'); ?>
                &nbsp;&nbsp;
                <label class="checkboxLabel" for="inc-subcat"><?php echo ENTRY_INCLUDE_SUBCATEGORIES; ?></label></div>
            </div>
        </fieldset>
        <fieldset class="floatingBox">
            <h4><?php echo ENTRY_MANUFACTURERS; ?></h4>
            <?php echo zen_draw_pull_down_menu('manufacturers_id', zen_get_manufacturers(array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS))), $sData['manufacturers_id']); ?>
        </fieldset>
    </div>
    <div class="col-xs-12 col-xs-6 col-md-6">
        <fieldset class="floatingBox">
            <h4><?php echo ENTRY_PRICE_RANGE; ?></h4>
            <fieldset class="floatLeft">
                <h4><?php echo ENTRY_PRICE_FROM; ?></h4>
                <?php echo zen_draw_input_field('pfrom', $sData['pfrom']); ?>
            </fieldset>
            <fieldset class="floatLeft">
                <h4><?php echo ENTRY_PRICE_TO; ?></h4>
                <?php echo zen_draw_input_field('pto', $sData['pto']); ?>
            </fieldset>
        </fieldset>
        <div class="buttonRow forward mr_t"><?php echo zen_image_submit('', BUTTON_SEARCH_ALT); ?></div>
    </div>
    <div class="col-xs-12 col-xs-6 col-md-6">
        <fieldset class="floatingBox"> 
            <h4><?php echo ENTRY_DATE_RANGE; ?></h4>
            <fieldset class="floatLeft">
                <h4><?php echo ENTRY_DATE_FROM; ?></h4>
                <?php echo zen_draw_input_field('dfrom', $sData['dfrom'], 'onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"'); ?>
            </fieldset> 
            <fieldset class="floatLeft">
                <h4><?php echo ENTRY_DATE_TO; ?></h4>
                <?php echo zen_draw_input_field('dto', $sData['dto'], 'onfocus="RemoveFormatString(this, \'' . DOB_FORMAT_STRING . '\')"'); ?>
            </fieldset> 
        </fieldset>
        <div class="btn-default mr_t"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
    </div>
</div>
    
    
</form>
</div>