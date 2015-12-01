<?php

header('Content-type: text/css');

require '../../../../wp-load.php';

/* Get Theme Options here and echo custom CSS */
// 
// for example: 
// $topmenu_visible = ot_get_option( 'topmenu_visible', 1);

echo ot_get_option('custom_css','');

$body_font = ot_get_option('body_font',''); // for example, Playfair+Display:900
if($body_font){
	$font_name = get_google_font_name($body_font);
?>
body{font-family: "<?php echo $font_name;?>"}
<?php
}