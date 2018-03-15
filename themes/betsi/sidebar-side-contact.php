<?php
// The contact form sidebar

if ( ! is_active_sidebar( 'side-form' ) ) {
	return;
}
?>
<div class="side-title-form">
    <h4>Φόρμα ιστορικού ασθενή</h4>
</div>
<!--<span class="close-x">X</span>adfgafdg-->
<div id="patient-form-wrapper" class="animated widget-area clear" role="complementary">
    <span class="close-x">X</span>
    <?php dynamic_sidebar( 'side-form' ); ?>
</div>
