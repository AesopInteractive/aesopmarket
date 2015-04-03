<?php 

/**
*
*	Template Name: User Dashboard
*
*/


get_header();?>

<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<div id="content" class="site-content container" role="main">

			<?php if ( is_user_logged_in() ): ?>

				<main class="market-theme-page">

					<?php

					echo '<h2 id="purchase-history">' . __( 'Purchase History', 'edd_customer_dashboard' ) . '</h2>';
					echo do_shortcode( '[purchase_history]' );

					echo '<h2 id="download-history">' . __( 'Download History', 'edd_customer_dashboard' ) . '</h2>';
					echo do_shortcode( '[download_history]' );

					echo '<h2 id="docs">' . __( 'Documentation', 'edd_customer_dashboard' ) . '</h2>';
					echo '<p>View our <a href="/help">help page</a> with links to available documentation for both developers and non-developers.</p>';

					echo '<h2 id="profile-edit">' . __( 'Profile','edd_customer_dashboard') . '</h2>';
					echo do_shortcode( '[edd_profile_editor]' );

					?>

				</main>

			<?php else: ?>

				<main class="market-theme-page">

					<?php

						$login  = (isset($_GET['login']) ) ? $_GET['login'] : false;

						echo aesopMarketThemeLoginStuff::error_message( $login );

				 		$args = array(
					        'redirect'       => 'dashboard',
					        'remember'		=> false
				 		);

						wp_login_form( $args );

						echo '<a href="'.wp_lostpassword_url().'">Forgot Password?</a>';

					?>

				</main>

			<?php endif; ?>


		</div>
	</div>
</div>

<?php get_footer();
