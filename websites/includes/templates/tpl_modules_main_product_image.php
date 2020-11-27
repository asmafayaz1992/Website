<?php
?>
<?php require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE)); ?> 


<div id="productMainImage" class="pull-left image-block">
	<span class="image"><a href="<?php echo $products_image_large; ?>"><?php echo zen_image($products_image_medium, addslashes($products_name), MEDIUM_IMAGE_WIDTH, MEDIUM_IMAGE_HEIGHT); ?><span class="zoom"></span></a></span>
	<?php /*
	<a href="<?php echo $products_image_large; ?>"><span class="imgLink"><?php echo TEXT_CLICK_TO_ENLARGE; ?></span></a>
	*/?>

</div>