<?php
  $content = "";$content .="\n";for ($i=1, $n=sizeof($var_linksList); $i<=$n; $i++) {$content .= '          <li><a href="' . $var_linksList[$i]['link'] . '">' . $var_linksList[$i]['name'] . '</a></li>' . "\n" ;} // end FOR loop
?>