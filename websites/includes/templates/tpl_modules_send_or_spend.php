<?php

  include(DIR_WS_MODULES . zen_get_module_directory('send_or_spend.php'));
?>
<h2><?php echo BOX_HEADING_GIFT_VOUCHER; ?></h2>
    <p><?php echo TEXT_SEND_OR_SPEND; ?></p>
    <p><?php echo  TEXT_BALANCE_IS . $customer_gv_balance; ?></p>
    <div class="buttonRow forward"><?php echo '<a href="' . zen_href_link(FILENAME_GV_SEND, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_SEND_A_GIFT_CERT , BUTTON_SEND_A_GIFT_CERT_ALT) . '</a>'; ?></div>
<br class="clearBoth" />