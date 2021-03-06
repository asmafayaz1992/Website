<?php
?>
<div class="centerColumn" id="accountPassword">
<?php echo zen_draw_form('account_password', zen_href_link(FILENAME_ACCOUNT_PASSWORD, '', 'SSL'), 'post', 'onsubmit="return check_form(account_password);"') . zen_draw_hidden_field('action', 'process'); ?>

<fieldset>
<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>
</fieldset>

<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />


<?php if ($messageStack->size('account_password') > 0) echo $messageStack->output('account_password'); ?>
<div class="form-group">
	<label class="inputLabel" for="password-current"><?php echo ENTRY_PASSWORD_CURRENT; ?></label>
	<?php echo zen_draw_password_field('password_current','','id="password-current" autocomplete="off"') . (zen_not_null(ENTRY_PASSWORD_CURRENT_TEXT) ? '<span class="alert">' . ENTRY_PASSWORD_CURRENT_TEXT . '</span>': ''); ?>
</div>
<div class="form-group">
<label class="inputLabel" for="password-new"><?php echo ENTRY_PASSWORD_NEW; ?></label>
<?php echo zen_draw_password_field('password_new','','id="password-new" autocomplete="off"') . (zen_not_null(ENTRY_PASSWORD_NEW_TEXT) ? '<span class="alert">' . ENTRY_PASSWORD_NEW_TEXT . '</span>': ''); ?>
</div>
<div class="form-group">
<label class="inputLabel" for="password-confirm"><?php echo ENTRY_PASSWORD_CONFIRMATION; ?></label>
<?php echo zen_draw_password_field('password_confirmation','','id="password-confirm" autocomplete="off"') . (zen_not_null(ENTRY_PASSWORD_CONFIRMATION_TEXT) ? '<span class="alert">' . ENTRY_PASSWORD_CONFIRMATION_TEXT . '</span>': ''); ?>
</div>


 <div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?></div>
 <div class="buttonRow back"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

</form>
</div>
