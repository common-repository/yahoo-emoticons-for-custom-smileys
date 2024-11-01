<?php
/*
Plugin Name: Yahoo! Emoticons for Custom Smilies 2.3
Plugin URI: http://www.clarinerd.com/wordpress/yahoo-emoticons/
Description: Implement Yahoo! style smilies into your Wordpress installation using an updated version of Custom Smilies by http://goto8848.net/
Author: shpemu
Author URI: http://www.clarinerd.com/
Version: 2.1
*/

define('CLCSVER', '2.9.1');

// Pre-2.6 compatibility
if (!defined('WP_CONTENT_URL'))
	define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if (!defined('WP_CONTENT_DIR'))
	define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
if (!defined('WP_PLUGIN_URL'))
	define('WP_PLUGIN_URL', WP_CONTENT_URL. '/plugins');
if (!defined('WP_PLUGIN_DIR'))
	define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');

if (!defined('WP_ABSDIR'))
	define('WP_ABSDIR', substr(str_replace('\\', '/', ABSPATH), 0, -1));
define('CLCSABSPATH', str_replace('\\', '/', dirname(__FILE__)) . '/');
define('CLCSABSFILE', str_replace('\\', '/', dirname(__FILE__)) . '/' . basename(__FILE__));
define('CLCSRELDIR', str_replace(WP_ABSDIR . '/', '', CLCSABSPATH));
define('CLCSRELURL', CLCSRELDIR);
define('CLCSINITABSPATH', CLCSABSPATH . 'init.php');
define('CLCSMGRURL', admin_url('edit.php?page=' . plugin_basename(CLCSABSFILE)));
define('CLCSOPTURL', admin_url('options-general.php?page=' . plugin_basename(CLCSABSFILE)));
define('CLCSURL', site_url(CLCSRELDIR));

if (function_exists('load_plugin_textdomain')) {
	load_plugin_textdomain('custom_smilies', PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)) . '/lang');
}

global $wpsmiliestrans;
$wpsmiliestrans = get_option('clcs_smilies');
if ($wpsmiliestrans == false) {
	$wpsmiliestrans = array(
	':)' => '1.gif',
	':(' => '2.gif',
	';)' => '3.gif',
	':D' => '4.gif',
	';;)' => '5.gif',
	'>:D<' => '6.gif',
	':-/' => '7.gif',
	':x' => '8.gif',
	':blush' => '9.gif',
	':P' => '10.gif',
	':-*' => '11.gif',
	'=((' => '12.gif',
	':-O' => '13.gif',
	'X(' => '14.gif',
	':>' => '15.gif',
	'B-)' => '16.gif',
	':-S' => '17.gif',
	'#:-S' => '18.gif',
	'>:)' => '19.gif',
	':((' => '20.gif',
	':))' => '21.gif',
	':|' => '22.gif',
	'/:)' => '23.gif',
	'=))' => '24.gif',
	'O:-)' => '25.gif',
	':-B' => '26.gif',
	'=;' => '27.gif',
	'I-)' => '28.gif',
	'8-|' => '29.gif',
	'L-)' => '30.gif',
	':-&' => '31.gif',
	':-$' => '32.gif',
	'[-(' => '33.gif',
	':O)' => '34.gif',
	'8-}' => '35.gif',
	'<:-P' => '36.gif',
	'(:|' => '37.gif',
	'=P~' => '38.gif',
	':-?' => '39.gif',
	'#-o' => '40.gif',
	'=D>' => '41.gif',
	':-SS' => '42.gif',
	'@-)' => '43.gif',
	':^o' => '44.gif',
	':-w' => '45.gif',
	':-<' => '46.gif',
	'>:P' => '47.gif',
	'<):)' => '48.gif',
	':@)' => '49.gif',
	'3:-O' => '50.gif',
	':(|)' => '51.gif',
	'~:>' => '52.gif',
	'@};-' => '53.gif',
	'%%-' => '54.gif',
	'**==' => '55.gif',
	'(~~)' => '56.gif',
	'~O)' => '57.gif',
	'*-:)' => '58.gif',
	'8-X' => '59.gif',
	'=:)' => '60.gif',
	'>-)' => '61.gif',
	':-L' => '62.gif',
	'[-O<' => '63.gif',
	'$-)' => '64.gif',
	':whistle' => '65.gif',
	'b-(' => '66.gif',
	':)>-' => '67.gif',
	'[-X' => '68.gif',
	':dance' => '69.gif',
	'>:/' => '70.gif',
	';))' => '71.gif',
	'o->' => '72.gif',
	'o=>' => '73.gif',
	'o-+' => '74.gif',
	'(%)' => '75.gif',
	':-@' => '76.gif',
	'^:)^' => '77.gif',
	':-j' => '78.gif',
	'(*)' => '79.gif',
	':)]' => '100.gif',
	':-c' => '101.gif',
	'~X(' => '102.gif',
	':-h' => '103.gif',
	':-t' => '104.gif',
	'8->' => '105.gif',
	':-??' => '106.gif',
	'%-(' => '107.gif',
	':o3' => '108.gif',
	'X_X' => '109.gif',
	':!!' => '110.gif',
	':rock' => '111.gif',
	':-q' => '112.gif',
	':-bd' => '113.gif',
	'^#(^' => '114.gif',
	':bz' => '115.gif',
	':ar!' => '116.gif',
	'[..]' => '117.gif',
	);
}

global $wp_version;
if (version_compare($wp_version, '2.5', '<')) {
	include('forold.php'); // For 2.3
} else {
	include('common.inc.php');
	if ((version_compare($wp_version, '2.7', '<'))) {
		include('for25.php'); // For 2.5 and 2.6

		add_filter('plugin_action_links', 'add_settings_tab', 10, 4);
		function add_settings_tab($action_links, $plugin_file, $plugin_data, $context) {
			if (strip_tags($plugin_data['Title']) == 'Custom Smilies') {
				$tempstr0 = '<a href="' . wp_nonce_url('edit.php?page=' . $plugin_file) . '" title="' . __('Manage') . '" class="edit">' . __('Manage', 'custom_smilies') . '</a>';
				$tempstr1 = '<a href="' . wp_nonce_url('options-general.php?page=' . $plugin_file) . '" title="' . __('Options') . '" class="edit">' . __('Options', 'custom_smilies') . '</a>';
				array_unshift($action_links, $tempstr0, $tempstr1);
			}
			return $action_links;
		}
	} else {
		if ((version_compare($wp_version, '2.9', '<'))) {
			include('for27.php'); // For 2.7 and 2.8
		} else {
			include('for29.php'); // For 2.9 and above
		}

		add_filter('plugin_action_links', 'add_settings_tab', 10, 4);
		function add_settings_tab($action_links, $plugin_file, $plugin_data, $context) {
			if (strip_tags($plugin_data['Title']) == 'Custom Smilies') {
				//$tempstr0 = '<a href="' . wp_nonce_url('edit.php?page=' . $plugin_file) . '" title="' . __('Manage') . '" class="edit">' . __('Manage', 'custom_smilies') . '</a>';
				$tempstr1 = '<a href="' . wp_nonce_url('options-general.php?page=' . $plugin_file) . '" title="' . __('Options') . '" class="edit">' . __('Options', 'custom_smilies') . '</a>';
				array_unshift($action_links, $tempstr1);
			}
			return $action_links;
		}
	}
}

//$message = '<div class="error"><p>';
//$message .= '</p></div>';
//add_action('admin_notices', create_function('', "echo '$message';"));

register_activation_hook(__FILE__, 'clcs_activate');
function clcs_activate() {
	if (get_option('clcs_smilies') == false) { // Upgrade from older.
		if (file_exists(CLCSINITABSPATH)) {
			include_once(CLCSINITABSPATH);
			if (isset($wpsmiliestrans) && is_array($wpsmiliestrans)) {
				add_option('clcs_smilies', $wpsmiliestrans);
			} else {
				global $wpsmiliestrans;
				$array4db = $wpsmiliestrans;
				update_option('clcs_smilies', $array4db);
			}
			if (is_writeable(CLCSINITABSPATH)) {
				unlink(CLCSINITABSPATH);
			}
		} else {
			$array4db = array();
			update_option('clcs_smilies', $array4db);
		}
	}
	$clcs_options = get_option('clcs_options');
	if ($clcs_options == false) {
		$clcs_options = array(
			'use_action_comment_form' => 0,
			'comment_textarea' => 'comment',
			'smilies_path' => '/wp-includes/images/smilies'
		);
		update_option('clcs_options', $clcs_options);
	} else {
		if (!array_key_exists('comment_textarea', $clcs_options)) {
			$clcs_options['comment_textarea'] = 'comment';
		}
		if (!array_key_exists('use_action_comment_form', $clcs_options)) {
			$clcs_options['use_action_comment_form'] = 0;
		}
		if (!array_key_exists('smilies_path', $clcs_options)) {
			$clcs_options['smilies_path'] = '/wp-includes/images/smilies';
		}
		update_option('clcs_options', $clcs_options);
	}
}
?>