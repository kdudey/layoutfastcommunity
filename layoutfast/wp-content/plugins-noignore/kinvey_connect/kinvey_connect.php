<?php
/**
 * @package KinveyConnect
 * @version 0.1
 */
/*
Plugin Name: KinveyConnect
Plugin URI: https://www.schneider-electric.com
Description: Runs javascript if not logged in to try to auth with Kinvey
Author: Mike DeBoer
Version: 0.1
Author URI: https://www.schneider-electric.com
*/

function provide_js_logout() {
    // If the user is logged in on wp site but had logged out of kinvey elsewhere, want to make sure
    // user is logged out here.  We can check that from js and use this method to log out.
    if (is_user_logged_in())
    {
        wp_add_inline_script('kinvey_connect_script', 'function wp_logout_addr() { return "' .
            htmlspecialchars_decode(wp_logout_url()) . '"; }
            function wp_logout_from_js() { window.location.replace(wp_logout_addr()); }');
    }
}

function onload_kinvey_check() {
    if (is_user_logged_in()) {
        $metadata = get_user_meta(get_current_user_id(), "kinvey_id", false); // false means it will return an array
        if (empty($metadata)) {
            wp_add_inline_script('kinvey_connect_script', '$j(document).ready(function() { onLoadAdminUserLoggedIn() });');
        } else {
            // auto logout wp user if kinvey user logged out elsewhere
            $kinveyid = $metadata[0];
            wp_add_inline_script('kinvey_connect_script', '$j(document).ready(function() { onLoadUserLoggedIn("' . $kinveyid . '") });');
        }
    }
    else {
        if (isset($_POST['kinvey_token'])) {
            wp_add_inline_script('kinvey_connect_script', '$j(document).ready(onLoadBackendLoginFailed);');
        } else {
            wp_add_inline_script('kinvey_connect_script', '$j(document).ready(onLoadUserNotLoggedIn);');
        }
    }
}

function kinvey_connect_plugin_enqueue_script() {
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script('jquery-effects-core');
    wp_enqueue_script('jquery-effects-fade');
    wp_enqueue_script('kinvey_js', "https://da189i1jfloii.cloudfront.net/js/kinvey-html5-sdk-3.4.4.min.js", array(), '3.4.4', true);
    wp_enqueue_script('kinvey_connect_script', plugin_dir_url(__FILE__) . 'scripts/kinvey_connect.js', array('jquery', 'kinvey_js'), '0.1', true);
    wp_enqueue_style('layoutfast', plugin_dir_url(__FILE__) . 'styles/layoutfast.css');
}

add_action('wp_enqueue_scripts', 'kinvey_connect_plugin_enqueue_script');
add_action('wp_enqueue_scripts', 'provide_js_logout');
add_action('wp_enqueue_scripts', 'onload_kinvey_check');

function get_user_info_from_token( $token ) {
    $requestaddr = "https://se-baas.kinvey.com/user/kid_eVFNDfuo-O/_me";
    $opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Authorization: Kinvey " . $token . "\r\n" .
                        "Accept-language: en\r\n"
                    )
                );
    $context = stream_context_create($opts);
    $file = file_get_contents($requestaddr, false, $context);
    $jf = json_decode($file);
    return $jf;
}

function kinvey_connect_logon_user($authtoken) {
    if (!$authtoken) { return; }
    $userinfo = get_user_info_from_token($authtoken);
    $args = array(
        'meta_key' => 'kinvey_id',
        'meta_value' => $userinfo->_id,
        'orderby' => 'ID',
        'order' => 'ASC'
    );
    $user_query = new WP_User_Query($args);
    $query_res = $user_query->get_results();
    if (empty($query_res)) {
        error_log("creating a user");
        kinvey_connect_create_user($userinfo);
    }
    else if (count($query_res) == 1) {
        $user = $query_res[0];
        if ($user) {
            $user = new WP_User($user->ID);
            wp_set_current_user($user->ID, $user->user_login);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);
        }
    } else {
        error_log("duplicate kinvey id perhaps? " . $userinfo->_id);
    }
}

function modal_dialogs() {
    include_once(plugin_dir_path(__FILE__) . 'modal-login.php');
    include_once(plugin_dir_path(__FILE__) . 'modal-signup.php');
    include_once(plugin_dir_path(__FILE__) . 'modal-forgotpassword.php');
}

add_action('wp_footer', 'modal_dialogs');

function kinvey_connect_create_user( $user_info ) {
    $userdata = array(
        'user_login' => $user_info->username,
        'user_email' => $user_info->email,
        'first_name' => $user_info->first_name,
        'last_name' => $user_info->last_name,
        'user_pass' => wp_generate_password()
    );
    $user_id = wp_insert_user( $userdata );
    if (!is_wp_error($user_id)) {
        add_user_meta($user_id, 'kinvey_id', $user_info->_id, true); // 4th arg keeps key unique in metadata

        $user = new WP_User($user_id);
        if ($user) {
            wp_set_current_user($user->ID, $user->user_login);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);
        } else {
            error_log("problem getting user right after creating it!");
        }
    } else {
        error_log("user creation results in an error? message:" . $user_id->get_error_message());
    }
}

function get_post_token() {
    if (isset($_POST['kinvey_token'])) {
        return $_POST['kinvey_token'];
    }
    return false;
}

function init_hook_login() {
    if (!is_user_logged_in()) {
        kinvey_connect_logon_user(get_post_token());
    }
}
add_action('init', 'init_hook_login');

function logout_kinvey_redirect() {
    wp_redirect(home_url("logout.html"));
    exit();
}
add_action('wp_logout', 'logout_kinvey_redirect');

?>
