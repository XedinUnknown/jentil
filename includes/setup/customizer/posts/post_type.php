<?php

/**
 * Post type archive content customizer section
 *
 * The sections, settings and controls for our
 * Post type archive content section in the customizer.
 *
 * @link            https://jentil.grotttopress.com
 * @package         jentil
 * @subpackage      jentil/includes/setup
 * @since           Jentil 0.1.0
 */

namespace GrottoPress\Jentil\Setup\Customizer\Posts;

if ( ! defined( 'WPINC' ) ) {
    wp_die( esc_html__( 'Do not load this file directly!', 'jentil' ) );
}

use GrottoPress\Jentil\Setup;

/**
 * Post type archive content customizer section
 *
 * The sections, settings and controls for our
 * Post type archive content section in the customizer.
 *
 * @link            https://jentil.grotttopress.com
 * @package         jentil
 * @subpackage      jentil/includes/setup
 * @since           Jentil 0.1.0
 */
final class Post_Type extends Section {
    /**
     * Post type
     *
     * @since       Jentil 0.1.0
     * @access      protected
     * 
     * @var     \WP_Post_Type      $post_type       Post type object
     */
    protected $post_type;

    /**
     * Constructor
     *
     * @var         \WP_Post_Type      $post_type       Post type object
     *
     * @since       Jentil 0.1.0
     * @access      public
     */
    public function __construct( Posts $posts, $post_type ) {
        parent::__construct( $posts );

        $this->post_type = $post_type;

        $this->name = sanitize_key( $this->post_type->name . '_post_type_posts' );

        $this->mod_args['context'] = ( 'post' == $this->post_type->name
            ? 'home' : 'post_type_archive' );
        
        $this->mod_args['specific'] = $this->post_type->name;

        $this->args['title'] = sprintf( esc_html__( 'Post type: %s', 'jentil' ), $this->post_type->labels->singular_name );
        $this->args['active_callback'] = function () {
            $template = $this->posts->get( 'customizer' )->get( 'template' );

            if ( 'post' == $this->post_type->name ) {
                return $template->is( 'home' );
            }

            return $template->is( 'post_type_archive', $this->post_type->name );
        };
    }

    /**
     * Get settings
     *
     * @since       Jentil 0.1.0
     * @access      protected
     */
    protected function settings() {
        $settings = array();

        if ( $this->has_sticky() ) {
            $settings[] = new Settings\Sticky_Posts( $this );
        }

        $settings[] = new Settings\Number( $this );

        $settings = array_merge( $settings, parent::settings() );

        $settings[] = new Settings\Pagination( $this );
        $settings[] = new Settings\Pagination_Maximum( $this );
        $settings[] = new Settings\Pagination_Position( $this );
        $settings[] = new Settings\Pagination_Previous_Label( $this );
        $settings[] = new Settings\Pagination_Next_Label( $this );

        return $settings;
    }

    /**
     * Does post type have sticky posts?
     *
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function has_sticky() {
        $sticky_posts = get_option( 'sticky_posts' );

        $has_sticky = array_map( function ( $value ) {
            return ( get_post_type( $value ) == $this->post_type->name );
        }, $sticky_posts );

        return in_array( true, $has_sticky );
    }
}