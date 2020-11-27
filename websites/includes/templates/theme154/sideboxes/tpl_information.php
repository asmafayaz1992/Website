<?php
  $content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  $content .= "\n" . '<ul style="margin: 0; padding: 0; list-style-type: none;">' . "\n";
  for ($i=0; $i<sizeof($information); $i++) {
    $content .= '<li>' . $information[$i] . '</li>' . "\n";
  }
  $content .= '</ul>' .  "\n";
  $content .= '</div>';
?>