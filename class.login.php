<?php

/**
*
*	 Class used to create a custom login setup which avoids wp-login.php
*
*/
class lassoThemeLoginStuff {

	function __construct(){

		add_action('init',					array($this,'redirect_wplogin'));
		add_action( 'wp_login_failed', 		array($this,'login_failed' ));
		add_filter( 'authenticate', 		array($this,'verify_username_password'), 1, 3);
		add_filter( 'login_redirect', 		array($this,'admin_redirect'), 10, 3 );

		//add_action('admin_init', 			array($this,'dashboard_redirect'));
		add_filter( 'show_admin_bar' , 		array($this,'admin_bar_admins_only'));
		add_filter('wp_nav_menu_items', 	array($this,'login_link'), 10, 2 );
	}

	/**
	*
	*	Add a login link to the menu
	*	@since 5.0
	*/
	function login_link( $items, $args ){

		if ( $args->theme_location == 'primary' && is_user_logged_in() ) {

			if ( is_page('dashboard') ) {

	        	$items .= '<li><a href="'.wp_logout_url().'">Logout</a></li>';

			} else {

	        	$items .= '<li><a href="/dashboard">Your Dashboard</a></li>';

			}

	    } else {

	    	$items .= '<li><a href="/login">Login</a></li>';

	    }

    	return $items;

	}
	/**
	*
	*	Hide admin bar for all but administrators
	*	@since pre-5.0
	*/
	function admin_bar_admins_only( $content ) {
	    return ( current_user_can("administrator") ) ? $content : false;
	}

		/**
	*
	*	Redirect any non-administrator to the user dashboard if they visit wp-admin
	*
	*	@since 5.0
	*/
	function dashboard_redirect(){

		if ( !current_user_can( 'manage_options' ) ) {
			wp_redirect( 'dashboard' );
			exit;
		}

	}
	/**
	*
	*	Redirect wp-login.php to our custom login
	*
	*/
	function redirect_wplogin(){

	    $login_page  = network_site_url( '/login' );
	    $page_viewed = basename($_SERVER['REQUEST_URI']);

	    if ( 'wp-login.php' == $page_viewed && 'GET' == $_SERVER['REQUEST_METHOD'] ) {

	        wp_redirect( $login_page );
	        exit;
	    }
	}

	/**
	*
	*	If the user passes incorrect information when tring to login
	*
	*/
	function login_failed() {

	    $login_page  = network_site_url( '/login' );
	    wp_redirect( $login_page.'?login=failed' );
	    exit;
	}

	/**
	*
	*	If the users credentials are wrong
	*
	*/
	function verify_username_password( $user, $username, $password ) {

	    $login_page  = network_site_url( '/login' );

	    if ( '' == $username || '' == $password ) {

	        wp_redirect( $login_page.'?login=empty' );
	        exit;
	    }
	}

	/**
	*
	*	Return a message based on action of login
	*
	*/
	public static function error_message($login){

		$out = '';

		switch ($login) {
			case 'failed':
				$out = '<p class="login-msg"><strong>ERROR:</strong> Invalid username and/or password.</p>';
				break;
			case 'empty':
				$out = '<p class="login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p>';
				break;
			case 'false':
				$out = '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
				break;
			default:
				$out = false;
				break;
		}

		return $out;

	}
	/**
	*
	*	Redirect on login
	*/
	function admin_redirect( $redirect_to, $request, $user  ) {

	  return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? site_url() : 'dashboard';

	} // end soi_login_redirect
}
new lassoThemeLoginStuff;
