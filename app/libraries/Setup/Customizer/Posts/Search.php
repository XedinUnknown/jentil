<?php

/**
 * Search Section
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Posts
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Setup\Customizer\Posts;

use WP_Customize_Manager as WP_Customizer;

/**
 * Search Section
 *
 * @since 0.1.0
 */
final class Search extends AbstractSection
{
    /**
     * Constructor
     *
     * @param Posts $posts Posts.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct(Posts $posts)
    {
        parent::__construct($posts);
        
        $this->name = 'search_posts';

        $this->modArgs['context'] = 'search';

        $this->args['title'] = \esc_html__('Search Results', 'jentil');
        $this->args['active_callback'] = function (): bool {
            return $this->customizer->theme->utilities
                ->page->is('search');
        };
    }

    /**
     * Add section
     *
     * @param WP_Customizer $wp_customizer
     *
     * @since 0.1.0
     * @access public
     */
    public function add(WP_Customizer $wp_customize)
    {
        $this->settings = $this->settings();

        parent::add($wp_customize);
    }

    /**
     * Settings
     *
     * @since  0.1.0
     * @access protected
     */
    protected function settings(): array
    {
        $settings = parent::settings();

        unset($settings['sticky_posts']);

        return $settings;
    }
}
