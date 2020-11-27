<?php
?>
<div class="centerColumn" id="customerAuthDefault">

<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<div id="customerAuthDefaultImage"><?php echo zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_CUSTOMERS_AUTHORIZATION, OTHER_CUSTOMERS_AUTHORIZATION_ALT); ?></div>

<div id="customerAuthDefaultMainContent" class="content"><?php echo CUSTOMERS_AUTHORIZATION_TEXT_INFORMATION; ?></div>

<div id="customerAuthDefaultSecondaryContent" class="content"><?php echo CUSTOMERS_AUTHORIZATION_STATUS_TEXT; ?></div>

<div class="buttonRow forward"><?php echo '<a href="' . zen_href_link(CUSTOMERS_AUTHORIZATION_FILENAME) . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?></div>

</div>
