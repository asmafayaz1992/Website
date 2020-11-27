<?php
?>
<div class="centerColumn" id="gvRedeemDefault">

<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<div id="gvRedeemDefaultMessage" class="content"><?php echo sprintf($message, $_GET['gv_no']); ?></div>

<div id="gvRedeemDefaultMainContent" class="content"><?php echo TEXT_INFORMATION; ?></div>

<div class="buttonRow forward"><?php echo '<a href="' . ($_GET['goback'] == 'true' ? zen_href_link(FILENAME_GV_FAQ) : zen_href_link(FILENAME_DEFAULT)) . '">' . zen_image_button(BUTTON_IMAGE_CONTINUE, BUTTON_CONTINUE_ALT) . '</a>'; ?></div>

</div>