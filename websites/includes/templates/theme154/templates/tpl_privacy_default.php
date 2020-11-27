<?php

?>
<div class="centerColumn" id="privacy">
<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php if (DEFINE_PRIVACY_STATUS >= 1 and DEFINE_PRIVACY_STATUS <= 2) { ?>
<div id="privacyDefaultMainContent" class="content">
<?php
/**
 * require the html_define for the privacy page
 */
  require($define_page);
?>
</div>
<?php } ?>

<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
</div>