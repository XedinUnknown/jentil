<?php

/**
 * Date archive content customizer section
 *
 * The sections, settings and controls for our Date archive content
 * section in the customizer.
 *
 * @link            https://jentil.grotttopress.com
 * @package         jentil
 * @subpackage      jentil/includes
 * @since           Jentil 0.1.0
 */

namespace GrottoPress\Jentil\Setup\Customizer\Content\Sections;

if ( ! defined( 'WPINC' ) ) {
    wp_die( esc_html__( 'Do not load this file directly!', 'jentil' ) );
}

use GrottoPress\Jentil\Setup;

/**
 * Date archive content customizer section
 *
 * The sections, settings and controls for our Date archive content
 * section in the customizer.
 *
 * @link            https://jentil.grotttopress.com
 * @package         jentil
 * @subpackage      jentil/includes
 * @since           Jentil 0.1.0
 */
final class Date extends Section {
    /**
     * Constructor
     *
     * @since       Jentil 0.1.0
     * @access      public
     */
    public function __construct( Setup\Customizer\Content\Content $content ) {
        parent::__construct( $content );

        $this->name = 'date_' . $this->content->get( 'name' );
        $this->args = array(
            'title' => esc_html__( 'Date Content', 'jentil' ),
            'panel' => $this->content->get( 'name' ),
        );
    }

    /**
     * Get settings
     *
     * @since       Jentil 0.1.0
     * @access      protected
     */
    protected function settings() {
        $settings = array();

        $settings[] = new Setup\Customizer\Content\Settings\Sticky_Posts( $this );

        return array_merge( $settings, parent::settings() );
    }
}