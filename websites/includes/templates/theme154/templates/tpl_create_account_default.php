<?php
?>
<div class="centerColumn" id="createAcctDefault">

<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php echo zen_draw_form('create_account', zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'), 'post', 'onsubmit="return check_form(create_account);"') . zen_draw_hidden_field('action', 'process') . zen_draw_hidden_field('email_pref_html', 'email_format'); ?>
<h4 id="createAcctDefaultLoginLink"><?php echo sprintf(TEXT_ORIGIN_LOGIN, zen_href_link(FILENAME_LOGIN, zen_get_all_get_params(array('action')), 'SSL')); ?></h4>

<fieldset>
<legend><?php echo CATEGORY_PERSONAL; ?></legend>

<?php require($template->get_template_dir('tpl_modules_create_account.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_create_account.php'); ?>

</fieldset>
<br>
<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?></div>
</form>
</div>