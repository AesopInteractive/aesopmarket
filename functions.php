<?php

add_action('checkout_below_page_titles','ase_add_help_title');
function ase_add_help_title(){

	// Title for help archive
	if ( is_post_type_archive( 'ase_docs' ) ) :

		?><h2>Help Center</h2><?php

	endif;
}

add_action('after_setup_theme','setup_marketplace');
function setup_marketplace(){
	require('market-options.php');
}

define('EDD_SLUG', 'library');

add_action('pre_get_posts', 'exclude_donation');
function exclude_donation($query) {

	if ( ! is_admin() && $query->is_main_query() ) {
	    if ( is_post_type_archive( 'download' ) ) {
			// donation and library card products

	    	$ids = get_theme_mod('ase_excluded_items');
			$idclean = array_map('intval', explode(',', $ids));
	      	$query->set('post__not_in', $idclean );
	    }
	}
}

function ase_check_user_role( $role, $user_id = null ) {

    if ( is_numeric( $user_id ) )
	$user = get_userdata( $user_id );
    else
        $user = wp_get_current_user();

    if ( empty( $user ) )
	return false;

    return in_array( $role, (array) $user->roles );
}

function ase_login_modal(){

	ob_start();
	do_action( 'ase_before_login_modal' );
	?>
	<div class="modal fade login-modal" id="ase-login" tabindex="-1" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-body">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<?php ase_login_form(); ?>
		        </div>
		      </div>
		    </div>
	  	</div>
	<?php
	do_action( 'ase_after_login_modal' );
	return ob_get_clean();
}