<?php

add_action('wp_enqueue_scripts', 'goonj_enqueue_scripts');
function goonj_enqueue_scripts() {
    wp_enqueue_style(
        'goonj-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
}


add_action('after_setup_theme', 'goonj_theme_setup');
function goonj_theme_setup() {
    add_editor_style('style.css');
}



add_action('template_redirect', 'goonj_redirect_logged_in_user_to_civi_dashboard');
function goonj_redirect_logged_in_user_to_civi_dashboard() {
    if (is_user_logged_in() && is_front_page()) {
        wp_redirect(home_url('/wp-admin/admin.php?page=CiviCRM'));
        exit();
    }
}

add_action( 'wp_login_failed', 'goonj_custom_login_failed_redirect' );
function goonj_custom_login_failed_redirect( $username ) {
    // Change the URL to your desired page
    $redirect_url = home_url( ); // Change '/login' to your custom login page slug

    // Add a query variable to indicate a login error
    $redirect_url = add_query_arg( 'login', 'failed', $redirect_url );

    wp_redirect( $redirect_url );
    exit;
}

add_filter( 'authenticate', 'goonj_check_empty_login_fields', 30, 3 );
function goonj_check_empty_login_fields( $user, $username, $password ) {
    if ( empty( $username ) || empty( $password ) ) {
        // Change the URL to your desired page
        $redirect_url = home_url(); // Change '/login' to your custom login page slug

        // Add a query variable to indicate empty fields
        $redirect_url = add_query_arg( 'login', 'failed', $redirect_url );

        wp_redirect( $redirect_url );
        exit;
    }
    return $user;
}

add_filter( 'login_form_top', 'goonj_login_form_validation_errors' );
function goonj_login_form_validation_errors( $string ) {
    if ( isset( $_REQUEST['login'] ) && $_REQUEST['login'] === 'failed'  ) {
        return '<p class="error">Login failed: Invalid username or password.</p>';
    }

    if ( isset( $_REQUEST['password-reset'] ) && $_REQUEST['password-reset'] === 'success'  ) {
        return 
        '<p class="fw-600 fz-16 mb-6">Your password has been set successful</p>
        <p class="fw-400 fz-16 mt-0 mb-24">You can now login to your account using your new password</p>';
    }

    return $string;
}

add_action('login_form_rp', 'goonj_custom_reset_password_form');
function goonj_custom_reset_password_form() {
    get_template_part('templates/password-reset');
}

add_action( 'validate_password_reset', 'goonj_custom_password_reset_redirection', 10, 2 );
function goonj_custom_password_reset_redirection( $errors, $user ) {
    if ( $errors->has_errors() ) {
        return;
    }

    if ( isset( $_POST['pass1'] ) && ! empty( $_POST['pass1'] ) ) {
        reset_password( $user, $_POST['pass1'] );
        $rp_cookie = 'wp-resetpass-' . COOKIEHASH;
        list( $rp_path ) = explode( '?', wp_unslash( $_SERVER['REQUEST_URI'] ) );
        setcookie( $rp_cookie, ' ', time() - YEAR_IN_SECONDS, $rp_path, COOKIE_DOMAIN, is_ssl(), true );
        wp_redirect( add_query_arg( 'password-reset', 'success', home_url() ) );
        exit;
    }
}

add_action('template_redirect', 'goonj_user_identification');
function goonj_user_identification(){
    if (is_page('user-identification-form')) {
        get_template_part('templates/user-identification');
    }
}

add_action('wp', 'goonj_handle_user_identification_form');
function goonj_handle_user_identification_form() {
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'user-identification') {
		// Retrieve the email and phone number from the POST data
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone_number = isset($_POST['phone-number']) ? $_POST['phone-number'] : '';
    
        try {
            // Find the contact ID based on email and phone number
            $contactResult = civicrm_api3('Contact', 'get', [
                'sequential' => 1,
                'return' => ['id'],
                'email' => $email,
                'phone' => $phone_number,
                'is_deleted' => 0,
                'contact_type' => 'Individual',
            ]);
    
            if (!empty($contactResult['values'])) {
                $contactId = $contactResult['values'][0]['id'];
    
                // Check if the contact has a completed "Induction" activity
                $activityResult = civicrm_api3('Activity', 'get', [
                    'sequential' => 1,
                    'return' => ['id'],
                    'contact_id' => $contactId,
                    'activity_type_id' => ['IN' => [57]],
                    'status_id' => ['IN' => [2]],
                ]);
    
                if (!empty($activityResult['values'])) {
                    // Redirect user to the collection camp URL with user ID.
                    wp_redirect(get_home_url() . "/civicrm/collection-camp/?user_id=" . $contactId);
                    exit;
                } else {
                    echo 'No, the user has not completed the Volunteer induction activity.';
                }
            } else {
                echo 'No, the user not found or does not exist.';
            }
        } catch (CiviCRM_API3_Exception $e) {
            $error = $e->getMessage();
            echo "API error: $error";
        }
	}
}
