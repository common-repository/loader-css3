<?php
/*
Plugin Name: Loader CSS3
Plugin URI: http://www.info-d-74.com
Description: Display a beautiful CSS3 loader during loading your website
Version: 1.04
Author: InfoD74
Author URI: http://www.info-d-74.com/en/shop
*/

register_activation_hook( __FILE__, 'loader_css3_install' );
register_uninstall_hook(__FILE__, 'loader_css3_desinstall');

function loader_css3_install() {
	//option for settings
	add_option( 'loader_css3_text', 'Loading...' );
	add_option( 'loader_css3_type', 'bars' );
	add_option( 'loader_css3_color', '#fff' );
	add_option( 'loader_css3_bg_color', '#000' );
}

function loader_css3_desinstall() {
	delete_option( 'loader_css3_text' );
	delete_option( 'loader_css3_type' );
	delete_option( 'loader_css3_color' );
	delete_option( 'loader_css3_bg_color' );
}

add_action( 'admin_menu', 'register_loader_css3_menu' );
function register_loader_css3_menu() {

	if(is_admin())
		add_submenu_page( 'options-general.php', 'Loader CSS3', 'Loader CSS3', 'edit_pages', 'loader_css3_settings', 'loader_css3_settings', plugins_url( 'images/icon.png', __FILE__ ), 27);
}

add_action('admin_print_styles', 'loader_css3_css' );
   
function loader_css3_css() {
    wp_enqueue_style( 'LoaderCSS3Stylesheet', plugins_url('css/style.css', __FILE__) );
}

add_action( 'admin_enqueue_scripts', 'loader_css3_script' );
function loader_css3_script() {
	wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_script( 'jquery');
}

function loader_css3_settings() {

	echo '<h1>Lodaer CSS3 settings</h1>';

	if(is_admin() && current_user_can('manage_options'))
	{

		//on traite les données sousmises
		if(sizeof($_POST) > 0 && check_admin_referer( 'loader_css3_settings' ))
		{
			$text = sanitize_text_field($_POST['loader_css3_text']);
			$type = sanitize_text_field($_POST['loader_css3_type']);
			$color = sanitize_text_field($_POST['loader_css3_color']);
			$bg_color = sanitize_text_field($_POST['loader_css3_bg_color']);
			update_option('loader_css3_text', $text);
			update_option('loader_css3_type', $type);
			update_option('loader_css3_color', $color);
			update_option('loader_css3_bg_color', $bg_color);
		}
		else
		{
			$text = get_option('loader_css3_text');
			$type = get_option('loader_css3_type');
			$color = get_option('loader_css3_color');
			$bg_color = get_option('loader_css3_bg_color');
		}

		echo '<script>
		jQuery(document).ready(function(){
			jQuery("#loader_css3_color, #loader_css3_bg_color").wpColorPicker();
		});
		</script>
		<form action="" method="post" id="loader_css3_settings">';
		wp_nonce_field( 'loader_css3_settings' );
		echo '<h2>Loader CSS3 settings</h2>
		<label for="loader_css3_type">Loader type:</label> 
		<select id="loader_css3_type" name="loader_css3_type">
			<option value="">Disabled</option>
			<option value="bars" '.($type == 'bars' ? 'selected' : '').'>Bars</option>
			<option value="circle" '.($type == 'circle' ? 'selected' : '').'>Circle</option>
			<option value="square" '.($type == 'square' ? 'selected' : '').'>Square</option>
		</select>
		<br />
		<label for="loader_css3_text">Text:</label> <input type="text" name="loader_css3_text" id="loader_css3_text" value="'.$text.'" /><br />
		<label for="loader_css3_color">Color:</label> <input type="text" name="loader_css3_color" id="loader_css3_color" value="'.$color.'" /><br />
		<label for="loader_css3_bg_color">Background color:</label> <input type="text" name="loader_css3_bg_color" id="loader_css3_bg_color" value="'.$bg_color.'" /><br />
		<input type="submit" value="Save settings" />
		</form>
		<h3><br />Need help? <a href="http://www.info-d-74.com" target="_blank">Click for support</a> <br/>
and like InfoD74 to discover my new plugins: <a href="https://www.facebook.com/infod74/" target="_blank"><img src="'.plugins_url( 'images/fb.png', __FILE__).'" alt="" /></a></h3>';
	}
	else
		echo 'Denied ! You must be admin.';

}

add_action( 'wp_head', 'loader_css3_head' );
function loader_css3_head()
{
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'loader_css3_js', plugins_url( 'js/front.js', __FILE__ ) );
}

add_action('wp_footer', 'add_loader_css3_footer');
function add_loader_css3_footer() {

    //loader css3 enabled ?
	$type = get_option('loader_css3_type');

	if(!empty($type))
	{
		$text = get_option('loader_css3_text');
		$color = get_option('loader_css3_color');
		$bg_color = get_option('loader_css3_bg_color');

		//charge le template du loader
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'templates/'.$type.'.tpl.php' );
		$tpl_loader = ob_get_clean();

        echo $tpl_loader;
    }
}

?>