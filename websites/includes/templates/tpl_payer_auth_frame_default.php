<?php
?>
<div>
  <div class="bold"><p><?php echo TEXT_3DS_PAYER_AUTH_FRAME_TITLE_MESSAGE; ?></p></div>
  <div class="forward"><?php echo zen_image(DIR_WS_IMAGES.'3ds/vbv.gif');?></div>
  <div class="forward"><?php echo zen_image(DIR_WS_IMAGES.'3ds/mcsc.gif');?></div>
</div>

<iframe name="auth_frame" id="authFrame" class="authFrame" src="<?php echo $_SESSION['3Dsecure_auth_url'] ?>" frameborder="0" width="500" height="500" scrolling="no" style="align: center;"></iframe>
