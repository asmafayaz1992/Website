<?php
?>
<div id="productAttributes">
<?php if ($zv_display_select_option > 0) { ?>
<?php } ?>

<?php
    for($i=0;$i<sizeof($options_name);$i++) {
?>

<?php
  if ($options_comment[$i] != '' and $options_comment_position[$i] == '0') {
?>
<?php
  }
?>

<div class="wrapperAttribsOptions">
<h4 class="optionName back"><?php echo $options_name[$i]; ?></h4>
<?php echo "\n" . $options_menu[$i]; ?>
</div>


<?php if ($options_comment[$i] != '' and $options_comment_position[$i] == '1') { ?>
    <div class="ProductInfoComments"><?php echo $options_comment[$i]; ?></div>
<?php } ?>


<?php
if ($options_attributes_image[$i] != '') {
?>
<?php echo $options_attributes_image[$i]; ?>
<?php
}
?>

<?php
    }
?>


<?php
  if ($show_onetime_charges_description == 'true') {
?>
    <div class="wrapperAttribsOneTime"><?php echo TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION; ?></div>
<?php } ?>


<?php
  if ($show_attributes_qty_prices_description == 'true') {
?>
    <div class="wrapperAttribsQtyPrices"><?php echo zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;' . '<a href="javascript:popupWindowPrice(\'' . zen_href_link(FILENAME_POPUP_ATTRIBUTES_QTY_PRICES, 'products_id=' . $_GET['products_id'] . '&products_tax_class_id=' . $products_tax_class_id) . '\')">' . TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK . '</a>'; ?></div>
<?php } ?>
</div>