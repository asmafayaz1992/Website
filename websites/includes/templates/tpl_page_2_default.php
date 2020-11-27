<?php
?>
<div class="centerColumn" id="pageTwo">
<div class="heading"><h1><?php echo HEADING_TITLE; ?></h1></div>

<?php if (DEFINE_PAGE_2_STATUS >= 1 and DEFINE_PAGE_2_STATUS <= 2) { ?>
<div id="pageTwoMainContent" class="content">
<?php
/**
 * load the html_define for the page_2 default
 */
  require($define_page);
?>
</div>
<?php } ?>

<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
</div>