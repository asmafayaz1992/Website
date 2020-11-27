<?php

?>
<div class="centerColumn" id="unsubDefault">

<?php if (!isset($_GET['action']) || ($_GET['action'] != 'unsubscribe')) { ?>

<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php echo ($unsubscribe_address=='') ? UNSUBSCRIBE_TEXT_NO_ADDRESS_GIVEN : UNSUBSCRIBE_TEXT_INFORMATION; ?>

<div class="buttonRow forward"><?php echo '<a href="' . zen_href_link(FILENAME_UNSUBSCRIBE, 'addr=' . $unsubscribe_address . '&action=unsubscribe', 'NONSSL') . '">' . zen_image_button(BUTTON_IMAGE_UNSUBSCRIBE, BUTTON_UNSUBSCRIBE) . '</a>'; ?></div>

<?php } elseif (isset($_GET['action']) && ($_GET['action'] == 'unsubscribe')) { ?>
<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php echo $status_display; ?>

<div class="buttonRow forward"><?php echo '<a href="' . zen_href_link(FILENAME_DEFAULT, '', 'NONSSL') . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE_SHOPPING, BUTTON_CONTINUE_SHOPPING_ALT) . '</a>'; ?></div>

<?php } else {
        zen_redirect(FILENAME_DEFAULT,'','NONSSL');
   }
?>
</div>