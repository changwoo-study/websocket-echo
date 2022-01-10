<?php
/**
 * Plugin Name: Websocket Echo Plugin
 * Description: Websocket study plugin.
 * Author:      changwoo
 * Author URI:  https://blog.changwoo.pe.kr
 * Plugin URI:  https://github.com/changwoo-study/websocket-echo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	return;
}

$wsecho_hook = '';

add_action( 'admin_menu', 'wsecho_menu' );

function wsecho_menu() {
	global $wsecho_hook;

	$wsecho_hook = add_menu_page( 'WS Echo', 'WS Echo', 'administrator', 'wsecho', 'wsecho_output_page' );
}

function wsecho_output_page() {
	?>
    <div class="wrap">
        <h1>Echo Server</h1>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="echo-input">Input</label>
                </th>
                <td>
                    <input id="echo-input" class="text" type="text">
                    <input id="echo-send" type="button" class="button" value="Send">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="echo-output">Output</label>
                </th>
                <td>
                    <textarea id="echo-output" readonly="readonly" rows="8" cols="40"></textarea>
                </td>
            </tr>
        </table>
    </div>
	<?php
}

add_action( 'admin_enqueue_scripts', 'wsecho_scripts' );
function wsecho_scripts( string $hook ) {
	global $wsecho_hook;

	if ( $wsecho_hook === $hook ) {
		wp_enqueue_script( 'wsecho', plugins_url( 'script.js', __FILE__ ), [], false, true );
	}
}
