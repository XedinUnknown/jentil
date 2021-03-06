<?php

/**
 * Layouts
 *
 * @package GrottoPress\Jentil\Utilities\Page
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Utilities\Page;

/**
 * Layouts
 *
 * @since 1.0.0
 */
final class Layouts
{
    /**
     * Page
     *
     * @since 0.1.0
     * @access private
     *
     * @var Page $page Page.
     */
    private $page;
    
    /**
     * Constructor
     *
     * @param Page $page Page.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }
    
    /**
     * Layouts
     *
     * @since 0.1.0
     * @access public
     *
     * @return array Layout column type
     */
    public function get(): array
    {
        $layouts = [
            'one-column' => [
                'content' => \esc_html__('content', 'jentil'),
            ],
            'two-columns' => [
                'content-sidebar' => \esc_html__('content / sidebar', 'jentil'),
                'sidebar-content' => \esc_html__('sidebar / content', 'jentil'),
            ],
            'three-columns' => [
                'sidebar-content-sidebar' => \esc_html__(
                    'sidebar / content / sidebar',
                    'jentil'
                ),
                'content-sidebar-sidebar' => \esc_html__(
                    'content / sidebar / sidebar',
                    'jentil'
                ),
                'sidebar-sidebar-content' => \esc_html__(
                    'sidebar / sidebar / content',
                    'jentil'
                ),
            ],
        ];

        /**
         * @filter jentil_page_layouts
         *
         * @var array $layouts Layouts.
         *
         * @since 0.1.0
         */
        return \apply_filters('jentil_page_layouts', $layouts);
    }
    
    /**
     * Layouts columns
     *
     * @since 0.1.0
     * @access public
     *
     * @return array Layout columns.
     */
    public function columns(): array
    {
        return \array_map('sanitize_title', \array_keys($this->get()));
    }

    /**
     * Layouts IDs
     *
     * @since 0.1.0
     * @access public
     *
     * @return string[] Layout ids mapping to names.
     */
    public function IDs(): array
    {
        return \array_keys($this->IDNames());
    }

    /**
     * Layouts [ IDs => Names ]
     *
     * Used to build a dropdown of layouts.
     *
     * @since 0.1.0
     * @access public
     *
     * @return array Layout ids mapping to names.
     */
    public function IDNames(): array
    {
        $return = [];
        
        foreach ($this->get() as $column_type => $layouts) {
            foreach ($layouts as $layout_id => $layout_name) {
                $return[\sanitize_title($layout_id)] = \sanitize_text_field(
                    $layout_name
                );
            }
        }
    
        return $return;
    }
}
