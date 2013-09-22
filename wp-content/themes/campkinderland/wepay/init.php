<?php

function wepay_id($page_id=false) {
	global $id;
	$page_id = $page_id ? $page_id : $id;
	$url = get_field('wepay_donate_page_url', $page_id);
	$components = explode('/',$url);
	if( !isset($components[4]) || ! is_numeric($components[4]) ) return false;
	return $components[4];
}

function wepay_donate_button($wepay_id=false) {
	if( ! $wepay_id ) $wepay_id = wepay_id();
	if( ! $wepay_id ) return false;

	$date = new DateTime();
	$timestamp = $date->getTimestamp();

	$button = <<<EOF
<a class="wepay-widget-button wepay-green" id="wepay_widget_anchor_$timestamp" href="https://www.wepay.com/donations/$wepay_id">Donate</a><script type="text/javascript">var WePay = WePay || {};WePay.load_widgets = WePay.load_widgets || function() { };WePay.widgets = WePay.widgets || [];WePay.widgets.push( {object_id: $wepay_id,widget_type: "donation_campaign",anchor_id: "wepay_widget_anchor_$timestamp",widget_options: {donor_chooses: true,allow_cover_fee: true,enable_recurring: true,allow_anonymous: true,reference_id: ""}});if (!WePay.script) {WePay.script = document.createElement('script');WePay.script.type = 'text/javascript';WePay.script.async = true;WePay.script.src = 'https://static.wepay.com/min/js/widgets.v2.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(WePay.script, s);} else if (WePay.load_widgets) {WePay.load_widgets();}</script>
EOF;
	echo $button;
}

function wepay_progress_bar($wepay_id=false) {
	if( ! $wepay_id ) $wepay_id = wepay_id();
	if( ! $wepay_id ) return false;

	$date = new DateTime();
	$timestamp = $date->getTimestamp();

	$progressbar = <<<EOF
<a class="wepay-widget-button wepay-green" id="wepay_widget_anchor_$timestamp" href="https://www.wepay.com/donations/$wepay_id">View Progress</a><script type="text/javascript">var WePay = WePay || {};WePay.load_widgets = WePay.load_widgets || function() { };WePay.widgets = WePay.widgets || [];WePay.widgets.push( {object_id: $wepay_id,widget_type: "donation_campaign_progress",anchor_id: "wepay_widget_anchor_$timestamp",widget_options: {no_dialog: "true",reference_id: ""}});if (!WePay.script) {WePay.script = document.createElement('script');WePay.script.type = 'text/javascript';WePay.script.async = true;WePay.script.src = 'https://static.wepay.com/min/js/widgets.v2.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(WePay.script, s);} else if (WePay.load_widgets) {WePay.load_widgets();}</script>
EOF;
	echo $progressbar;
}

// run before ACF saves the $_POST['fields'] data

add_action('acf/save_post', 'wepay_fix_url', 1);

function wepay_fix_url($post_id) {

	if( isset($_POST['fields']['field_523e3366c1978']) ) {
		$url = $_POST['fields']['field_523e3366c1978'];
		$components = explode('/',$url);
		$errors = false;

		// Expected input
		// https://www.wepay.com/donations/manage/1020168127
		// https://www.wepay.com/donations/kinderland-test-2

		if( count($components) < 5 || $components[2] != "www.wepay.com" ) {
			$errors .= 'That\'s not a WePay URL';
			update_option('my_admin_errors', $errors);
			return false;
		}

		if( count($components) == 5 && ! is_numeric( $components[4] ) ) {

			// In this case we're assuming they used the full url, not the admin
			// So we're going to scrape the page and find the actual cannonical url, and update things
			try {
				require_once('simple_html_dom.php');
				$html = file_get_html($url);
				$meta = $html->find('meta[property=og:title]');
				$_POST['fields']['field_523e3366c1978'] = $meta[0]->content;
			} catch (Exception $e) {
				$errors .= 'We encountered an error, please uses the admin url for that WePay page - i.e https://www.wepay.com/donations/manage/1020168127';
				update_option('my_admin_errors', $errors);
				return false;
			}
		}
		if( count($components) == 6 ) {

			// In this case they're using the admin url, that's fine as we can get the ID from it without any problems
			$_POST['fields']['field_523e3366c1978'] = 'https://www.wepay.com/donations/'.$components[5];
		}
		return false;
	}
}


// Display any errors
function wepay_error_notice_handler() {

    $errors = get_option('my_admin_errors');

    if( strlen($errors) > 0 ) {

        echo '<div class="error"><p>' . $errors . '</p></div>';

    }

}
add_action( 'admin_notices', 'wepay_error_notice_handler' );


// Clear any errors
function wepay_error_clear() {
    update_option('my_admin_errors', '' );
}
add_action( 'admin_footer', 'wepay_error_clear' );

?>