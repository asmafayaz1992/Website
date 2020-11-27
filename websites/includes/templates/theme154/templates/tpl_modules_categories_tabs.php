<?php

  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_CATEGORIES_TABS));
?>
<?php if (CATEGORIES_TABS_STATUS == '1' && sizeof($links_list) >= 1) { ?>
<div id="navCatTabsWrapper">
<div id="navCatTabs">
<ul>
<?php for ($i=0, $n=sizeof($links_list); $i<$n; $i++) { ?>
  <li><?php echo $links_list[$i];?></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>