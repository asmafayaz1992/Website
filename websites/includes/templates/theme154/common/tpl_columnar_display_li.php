<?php

?>
<?php
  if ($title) {
  ?>
<?php echo $title; ?>
<ul class="prod-list1 w<?php echo $col_width; ?>">
<?php
 }
 ?>
<?php
if (is_array($list_box_contents) > 0 ) {
 for($row=0;$row<sizeof($list_box_contents);$row++) {
    $params = "";
    //if (isset($list_box_contents[$row]['params'])) $params .= ' ' . $list_box_contents[$row]['params'];
?>

<?php
    for($col=0;$col<sizeof($list_box_contents[$row]);$col++) {
      $r_params = "";
      if (isset($list_box_contents[$row][$col]['params'])) $r_params .= ' ' . (string)$list_box_contents[$row][$col]['params'];
     if (isset($list_box_contents[$row][$col]['text'])) {
?>
    <?php echo '<li' . $r_params . '>' . $list_box_contents[$row][$col]['text'] .  '</li>'; ?>
<?php
      }
    }
?>

<?php
  }
}
?> 
</ul>