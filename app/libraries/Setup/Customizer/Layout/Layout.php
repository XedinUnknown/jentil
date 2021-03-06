<?php

/**
 * Page Layout Section
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Layout
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Setup\Customizer\Layout;

use GrottoPress\Jentil\Setup\Customizer\AbstractSection;
use GrottoPress\Jentil\Setup\Customizer\Customizer;
use WP_Customize_Manager as WP_Customizer;

/**
 * Page Layout Section
 *
 * @since 0.1.0
 */
final class Layout extends AbstractSection
{
    /**
     * Constructor
     *
     * @param Customizer $customizer Customizer.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct(Customizer $customizer)
    {
        parent::__construct($customizer);

        $this->name = 'layout';
        
        $this->args['title'] = \esc_html__('Layout', 'jentil');
        // $this->args['description'] = \esc_html__('Description here', 'jentil');
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
     * @since 0.1.0
     * @access private
     *
     * @return Settings\AbstractSetting[] Settings.
     */
    private function settings(): array
    {
        $settings = [];

        $settings['author'] = new Settings\Author($this);
        $settings['date'] = new Settings\Date($this);
        $settings['error_404'] = new Settings\Error404($this);
        $settings['search'] = new Settings\Search($this);

        if (($taxonomies = $this->customizer->theme->utilities
            ->page->posts->taxonomies())
        ) {
            foreach ($taxonomies as $taxonomy) {
                $settings['taxonomy_'.$taxonomy->name] =
                    new Settings\Taxonomy($this, $taxonomy);
            }
        }

        if (($post_types = $this->customizer->theme->utilities
            ->page->posts->archive->postTypes())
        ) {
            foreach ($post_types as $post_type) {
                $settings['post_type_'.$post_type->name] =
                    new Settings\PostType($this, $post_type);
            }
        }

        if (($post_types = $this->customizer->theme->utilities
            ->page->posts->postTypes())
        ) {
            foreach ($post_types as $post_type) {
                if (!$this->customizer->theme->utilities->mods ->layout([
                    'context' => 'singular',
                    'specific' => $post_type->name,
                ])->isPagelike()) {
                    $settings['single_'.$post_type->name] =
                        new Settings\Singular($this, $post_type);
                }
            }
        }

        return $settings;
    }
}
