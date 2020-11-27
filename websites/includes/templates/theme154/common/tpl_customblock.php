<!-- bof tm custom block -->
<?php if(TM_CUSTOMBLOCK_STATUS == 'true') {
	if($this_is_home_page){ ?> 
<div class="tm_custom_block container">
    <ul class="row">
        <li class="col-xs-12 col-sm-4 item1"><div class="inner"><?php echo TM_CUSTOMBLOCK_TEXT1; ?></div></li>
        <li class="col-xs-12 col-sm-4 item2"><div class="inner"><?php echo TM_CUSTOMBLOCK_TEXT2; ?></div></li>
        <li class="col-xs-12 col-sm-4 item3"><div class="inner"><?php echo TM_CUSTOMBLOCK_TEXT3; ?></div></li>
    </ul>
</div>
<?php 
	}
	 } 
?>
<!-- eof tm custom block -->
