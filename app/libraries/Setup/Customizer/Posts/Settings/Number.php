<?php

/**
 * Number of Posts
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Posts\Settings
 * @since 0.1.0
 *
 * @author GrottoPress (https://www.grottopress.com)
 * @author N Atta Kus Adusei (https://twitter.com/akadusei)
 */

declare ( strict_types = 1 );

namespace GrottoPress\Jentil\Setup\Customizer\Posts\Settings;

if ( ! \defined( 'WPINC' ) ) {
    die;
}

use GrottoPress\Jentil\Setup\Customizer\Posts\Section;

/**
 * Number of Posts
 *
 * @since 0.1.0
 */
final class Number extends Setting {
    /**
     * Constructor
     *
     * @var GrottoPress\Jentil\Setup\Customizer\Posts\Section $section Section.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct( Section $section ) {
        parent::__construct( $section );

        $mod = $this->mod( 'number' );
        
        $this->name = $mod->name();
        
        $this->args['default'] = $mod->default();
        $this->args['sanitize_callback'] = function ( $value ): int {
            return \intval( $value );
        };

        $this->control['label'] = \esc_html__( 'Number of posts', 'jentil' );
        $this->control['type'] = 'number';
    }
}