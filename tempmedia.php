 <?php
 /**
 * @package Tempmedia
 * @version 1.2.1
 */ /* Plugin Name: Tempmedia - Placeholder images and Videos
Plugin URI: https://temp.media/wordpress
Description: Add placeholder images to wordpress using the tempmedia api
Author: James Dawson
Version: 1.2
Author URI: http://blog.jmdawson.co.uk*/

//Add link to documentation on plugin page.
function tempmedia_action_links( $links ) {
	$links = array_merge( array(
		"<a href='https://temp.media/wordpress'>How To Use</a>'"
	), $links );
	return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'tempmedia_action_links' );

//create placeholder image using the temp.media API.
function tempmedia_tempimg($query) {
    extract(shortcode_atts(array(
        'width' => '640',
        'height' => '480',
	'category' => '',
        'text' => ''
    ), $query));
	if (!$width || !is_numeric($width) || $width < 0 || $width > 4000) { $width = '500'; }
	if (!$height || !is_numeric($height) || $height < 0 || $height > 4000) { $height = '400'; }
	$img_url = "https://temp.media/?height=".$height.'&width='.$width.'&text='.$text.'&category='.$category.'&ref=jmdawson-tempmedia';
	$img_src = '<img src="'.$img_url.'" />'; 
	return $img_src;
}
add_shortcode('tempimg', 'tempmedia_tempimg');

//create placeholder video using the temp.media API.
function tempmedia_tempvid($query) {
    extract(shortcode_atts(array(
        'width' => '640',
        'height' => '480',
        'length' => '10'
    ), $query));
        if (!$width || !is_numeric($width) || $width < 0 || $width > 4000) { $width = '500'; }
        if (!$height || !is_numeric($height) || $height < 0 || $height > 4000) { $height = '400'; }
        $vid_url = "https://temp.media/video/?height=".$height.'&width='.$width.'&length='.$length.'&ref=jmdawson-tempmedia';
        $vid_src = '<video width="'.$width.'" height="'.$height.'" controls> <source src='.$vid_url.'><type="video/mp4"></video>';
        return $vid_src;
}
add_shortcode('tempvid', 'tempmedia_tempvid');



?>


