<?php
?>
<div class="centerColumn" id="acctNewslettersDefault">
<?php echo zen_draw_form('account_newsletter', zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL')) . zen_draw_hidden_field('action', 'process'); ?>

<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<fieldset>
<legend><?php echo MY_NEWSLETTERS_GENERAL_NEWSLETTER; ?></legend>
<?php echo zen_draw_checkbox_field('newsletter_general', '1', (($newsletter->fields['customers_newsletter'] == '1') ? true : false), 'id="newsletter"'); ?>
<label class="checkboxLabel" for="newsletter"><?php echo MY_NEWSLETTERS_GENERAL_NEWSLETTER_DESCRIPTION; ?></label>
<br class="clearBoth" />
</fieldset>


<div class="buttonRow forward"><?php echo zen_image_submit('', BUTTON_UPDATE_ALT); ?></div> 
<div class="buttonRow back"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

</form>
</div>