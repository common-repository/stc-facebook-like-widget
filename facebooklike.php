<?php
/*
Plugin Name: Facebook Like Widget
Plugin URI: http://mrparagon.me/wordpress-facebook-like-widget/
Description: Facebook Fan Page widget with multiple features 
Author: Kingsley Paragon 
Version: 1.0
Author URI: http://mrparagon.me
license: GPLv2 
*/

class STC_FBlike_Widget extends WP_Widget
{
	
	function __construct()
	{
		$stc_fb_widget_options =array(
      'classname'=>'stc-fbwidget',
      'description'=> 'Facebook like Widget');
      parent::__construct('stc_fbook_widget', 'STC Facebook Like Widget' , $stc_fb_widget_options);
		
		
	}

function widget($args, $instance){
	?>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=463596103727227&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<?php
extract($args);
$title =($instance['title'])? $instance['title']: 'Facebook Fans';
$fbpage_url =($instance['fbpage_url'])? $instance['fbpage_url']: 'http://facebook.com/chessmaster101';

$fb_width =($instance['fb_width'])? $instance['fb_width']: '340';

$fb_layout = isset($instance['fb_layout'])? $instance['fb_layout']: 'standard';

$fb_action =($instance['fb_action'])? $instance['fb_action']: 'like';

$fb_faces =($instance['fb_faces'])? $instance['fb_faces']: 'true';

?>
<?php echo $before_widget; ?>
<?php echo $before_title. $title. $after_title; ?>

<div class="fb-like" data-href="<?php echo $fbpage_url  ?>" data-width="<?php echo $fb_width; ?>" data-layout="<?php echo $fb_layout; ?>" data-action="<?php echo $fb_action; ?>" data-show-faces="<?php echo $fb_faces; ?>" data-share="true">

</div>
 
<?php
echo $after_widget;
}

// function update(){


// }

function form($instance){
	if(is_array($instance)) { 
foreach( $instance as $k => $v ) {
     $$k = esc_attr($v);
 }
}
$title= (!empty($title))? $title: "FB Fan page ";
$fbpage_url= (!empty($fbpage_url))? $fbpage_url: "http://facebook.com/domainhostingpal";

$fb_width= (!empty($fb_width))? $fb_width: "340";
$fb_layout= (!empty($fb_layout))? $fb_layout: "standard";

$fb_action= (!empty($fb_action))? $fb_action: "like";
$fb_faces= (!empty($fb_faces))? $fb_faces: "true";
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"> Title: </label>
<input type ="text"
name ="<?php echo $this->get_field_name('title'); ?>"
id ="<?php echo $this->get_field_id('title'); ?>"
value = "<?php echo $title; ?>"
class = "widefat form-control"/>
</p>

<p>
<label for="<?php echo $this->get_field_id('fbpage_url'); ?>"> FB page url: </label>
<input type ="url"
name ="<?php echo $this->get_field_name('fbpage_url'); ?>"
value = "<?php echo $fbpage_url; ?>"
id ="<?php echo $this->get_field_id('fbpage_url'); ?>"
placeholder ="http://facebook.com/chessmaster101"
class = "widefat form-control"/>
</p>

<p>
<label for="<?php echo $this->get_field_id('fb_width'); ?>"> Set Width: </label>
<input type ="text"
name ="<?php echo $this->get_field_name('fb_width'); ?>"
value = "<?php echo $fb_width; ?>"
id ="<?php echo $this->get_field_id('fb_width'); ?>"
class = "widefat form-control"/>
<span>Default = 340px </span>
</p>


<p>
<label for="<?php echo $this->get_field_id( 'fb_layout' ); ?>">Facebook like layout type </label>
		<select
		id="<?php echo $this->get_field_id( 'fb_layout' ); ?>"
		name="<?php echo $this->get_field_name( 'fb_layout' ); ?>"
		class ="widefat form-control">
		<option value ="">--Select-- </option> 
		<option value ="standard" <?php  if($fb_layout =='standard') echo 'selected' ;?> >Standard (minimum width 225px) </option> 
		<option value ="box_count" <?php  if($fb_layout =='box_count') echo 'selected' ;?>>Box Count (minimum width 55px) </option> 
		<option value ="button_count" <?php  if($fb_layout =='button_count') echo 'selected' ;?>> Button Count (minimum width 90px) </option>

		<option value ="button" <?php  if($fb_layout =='button') echo 'selected' ;?>> Button  (minimum width 47px) </option>
		</select>
</p>


<p>
<label for="<?php echo $this->get_field_id( 'fb_action' ); ?>">Like or Recommend</label>
		<select
		id="<?php echo $this->get_field_id( 'fb_action' ); ?>"
		name="<?php echo $this->get_field_name( 'fb_action' ); ?>"
		class ="widefat form-control">
		<option value ="">--Select-- </option>
		<option value ="like" <?php  if($fb_action =='like') echo 'selected' ;?>>Like </option> 
		<option value ="recommend" <?php  if($fb_layout =='recommend') echo 'selected' ;?>>Recommend </option> 
	
		</select>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'fb_faces' ); ?>">Show Faces</label>
		<select
		id="<?php echo $this->get_field_id( 'fb_faces' ); ?>"
		name="<?php echo $this->get_field_name( 'fb_faces' ); ?>"
		class ="widefat form-control">
		<option value ="">--Select-- </option>
		<option value ="true" <?php  if($fb_faces =='true') echo 'selected' ;?>>Yes </option> 
		<option value ="false" <?php  if($fb_faces =='false') echo 'selected' ;?>>No </option> 
	
		</select>
</p>
<p> </p>
<?php

}

}

function register_fb_like_widget(){
	register_widget('STC_FBlike_Widget');
}
add_action('widgets_init', 'register_fb_like_widget');
?>