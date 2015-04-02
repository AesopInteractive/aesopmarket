<?php

function ase_custom_register($wp_customize){
	if ( ! class_exists( 'ASE_WP_Customize_Textarea_Control' ) ) {
	    class ASE_WP_Customize_Textarea_Control extends WP_Customize_Control {
	    	public $type = 'textarea';

	    	public function render_content() {
	    		?>
	    		<label>
	    			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	    			<textarea style="width: 100%;" rows="1" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
	    		</label>
	    		<?php
	    	}
	    }
	}
}
add_action( 'customize_register', 'ase_custom_register' );

class aseCustomizer {

	// add new options to new section
	public static function register($wp_customize){

		// APPEARENCE
		$wp_customize->add_section( 'aesop_appearence', array(
			'title' => __( 'ASE Options', 'aesop' ),
			'priority' => 100,
			'description'	=> __('Secondary Color affects the "Load More Stories" button, and fixed post nav on single stories. Home Page Text color affects only the text on the index, or posts page.', 'aesop')
		) );

		// library card ID
		$wp_customize->add_setting( 'ase_librarycard_id', array(
            'default'    =>  '',
            'type'       => 'theme_mod',
            'transport'  => 'postMessage'
        ) );
        $wp_customize->add_control( new ASE_WP_Customize_Textarea_Control( $wp_customize, 'ase_librarycard_id', array(
            'label'    	=> __( 'Library Card ID', 'ase' ),
            'section'  	=> 'aesop_appearence',
            'settings' 	=> 'ase_librarycard_id',
        ) ) );

		// library card ID
		$wp_customize->add_setting( 'ase_excluded_items', array(
            'default'    =>  '',
            'type'       => 'theme_mod',
            'transport'  => 'postMessage'
        ) );
        $wp_customize->add_control( new ASE_WP_Customize_Textarea_Control( $wp_customize, 'ase_excluded_items', array(
            'label'    	=> __( 'Comma Separated Excluded IDs', 'ase' ),
            'section'  	=> 'aesop_appearence',
            'settings' 	=> 'ase_excluded_items',
        ) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	}


    // Sanitize Footer Text
	private static function sanitize_footer_text( $input = '' ) {
	    return stripslashes_deep( $input );
	}

	private static function sanitize_text_field( $input = ''  ) {
		return sanitize_text_field( $input );
	}

	private static function sanitize_int( $input = ''  ) {
		return wp_filter_nohtml_kses( round( $input ) );

	}

}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'aseCustomizer' , 'register' ) );