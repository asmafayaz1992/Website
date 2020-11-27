<?php

  require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORY_ICON_DISPLAY));

?>

<div align="<?php echo $align; ?>" id="categoryIcon" class="categoryIcon">
	<div class="wrapper">
		<div class="fleft aligncenter">
			<?php echo '<a href="' . zen_href_link(FILENAME_DEFAULT, 'cPath=' . $_GET['cPath'], 'NONSSL') . '">' . $category_icon_display_image . '<br />' .$category_icon_display_name .  '</a>'; ?>
		</div>
	</div>
</div>