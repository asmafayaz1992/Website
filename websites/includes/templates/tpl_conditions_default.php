<?php
?>
<div class="centerColumn" id="conditions">
<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php if (DEFINE_CONDITIONS_STATUS >= 1 and DEFINE_CONDITIONS_STATUS <= 2) { ?>
<div id="conditionsMainContent" class="content">
<?php
  require($define_page);
?>
</div>
<?php } ?>

<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
</div>
