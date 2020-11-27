<?php
?>
<div class="layer_cart_overlay"></div>
<?php for ($i=0, $n=sizeof($output); $i<$n; $i++) { ?>
  <div <?php echo $output[$i]['params']; ?>><span class="close_msg"></span><?php echo $output[$i]['text']; ?></div>

<?php } ?>