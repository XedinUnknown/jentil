<?php

/**
 * Content 'before title' setting
 *
 * Add setting and control for our content 'before title'
 * setting in the customizer.
 *
 * @link            https://jentil.grotttopress.com
 * @package		    jentil
 * @subpackage 	    jentil/includes
 * @since		    Jentil 0.1.0
 */

namespace GrottoPress\Jentil\Setup\Customizer\Posts\Settings;

if ( ! defined( 'WPINC' ) ) {
    wp_die( esc_html__( 'Do not load this file directly!', 'jentil' ) );
}

use GrottoPress\Jentil\Setup;

/**
 * Content 'before title' setting
 *
 * Add setting and control for our content 'before title'
 * setting in the customizer.
 *
 * @link			https://jentil.grotttopress.com
 * @package			jentil
 * @subpackage 	    jentil/includes
 * @since			Jentil 0.1.0
 */
final class Before_Title extends Setting {
    /**
	 * Constructor
	 *
	 * @since       Jentil 0.1.0
	 * @access      public
	 */
	public function __construct( $content ) {
        parent::__construct( $content );
        
        $this->mod = $this->mod( 'before_title' );

        $this->name = $this->mod->get( 'name' );
        
        $this->args['default'] = $this->mod->get( 'default' );
        $this->args['sanitize_callback'] = 'sanitize_text_field';

        $this->control['label'] = esc_html__( 'Before title', 'jentil' );
        $this->control['description'] = esc_html__( 'Comma-separated', 'jentil' );
        $this->control['type'] = 'text';
	}
}