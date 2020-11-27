<?php

// choose box images based on box position
  if ($title_link) {
    $title = '<a href="' . zen_href_link($title_link) . '">' . $title . /*  BOX HEADING_LINKS .   */'</a>';
  }
//
?>
<!--// bof: <?php echo $box_id; ?> //-->
        <div class="module_block" id="module_<?php echo $box_id; ?>">
          <div class="module-heading">
            <h3 class="module-head"><?php echo $title; ?></h3>
          </div>
          <div class="block_content">
            <?php echo $content; ?>
          </div>
        </div>
<!--// eof: <?php echo $box_id; ?> //-->

