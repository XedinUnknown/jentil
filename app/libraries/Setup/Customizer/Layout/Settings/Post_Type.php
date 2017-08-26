<?php

/**
 * Post Type Layout Setting
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Layout\Settings
 * @since 0.1.0
 *
 * @author GrottoPress (https://www.grottopress.com)
 * @author N Atta Kus Adusei (https://twitter.com/akadusei)
 */

declare ( strict_types = 1 );

namespace GrottoPress\Jentil\Setup\Customizer\Layout\Settings;

if ( ! \defined( 'WPINC' ) ) {
    die;
}

use GrottoPress\Jentil\Setup\Customizer\Layout\Layout;
use \WP_Post_Type;

/**
 * Post Type Layout Setting
 *
 * @since 0.1.0
 */
final class Post_Type extends Setting {
    /**
     * Constructor
     *
     * @var GrottoPress\Jentil\Setup\Customizer\Layout\Layout $layout Layout section.
     * @var \WP_Post_Type $post_type Post type.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct( Layout $layout, WP_Post_Type $post_type ) {
        parent::__construct( $layout );

        $mod_context = ( 'post' == $post_type->name ? 'home' : 'post_type_archive' );

        $this->mod = $this->layout->customizer()->jentil()->utilities()->mods()
            ->layout( [
                'context' => $mod_context,
                'specific' => $post_type->name,
            ] );

        $this->name = $this->mod->name();

        $this->args[ 'default' ] = $this->mod->default();

        $this->control['label'] = \sprintf( \esc_html__( '%s Archive', 'jentil' ),
                $post_type->labels->name );

        $this->control['active_callback'] = function () use ( $post_type ): bool {
            $page = $this->layout->customizer()->jentil()->utilities()->page();

            if ( 'post' == $post_type->name ) {
                return $page->is( 'home' );
            }

            return $page->is( 'post_type_archive', $post_type->name );
        };
    }
}