<?php

/**
*
*	Template Name: Login
*
*/


get_header(); ?>

	<div id="main" class="site-main">
		<div id="primary" class="content-area">
			<div id="content" class="site-content container post-text market-theme-page" role="main">

			<?php

			 	if( is_user_logged_in() ) {

			 		echo 'You are logged in.';

			 	} else {

					$login  = (isset($_GET['login']) ) ? $_GET['login'] : false;

					echo aesopMarketThemeLoginStuff::error_message( $login );

			 		$args = array(
				        'redirect'       => 'dashboard',
				        'remember'		=> false
			 		);

					wp_login_form( $args );

					echo '<a href="'.wp_lostpassword_url().'">Forgot Password?</a>';
				}
			?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
