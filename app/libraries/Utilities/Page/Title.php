<?php

/**
 * Title
 *
 * @package GrottoPress\Jentil\Utilities\Page
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Utilities\Page;

use GrottoPress\Jentil\Utilities\Mods\Title as TitleMod;

/**
 * Title
 *
 * @since 0.1.0
 */
final class Title
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
     * Title mod
     *
     * @since 0.1.0
     * @access public
     *
     * @return string Title mod.
     */
    public function mod(): TitleMod
    {
        $page = $this->page->type;

        $specific = '';
        $more_specific = '';

        foreach ($page as $type) {
            if ('post_type_archive' === $type) {
                $specific = \get_query_var('post_type');
            } elseif ('tax' === $type) {
                $specific = \get_query_var('taxonomy');
            } elseif ('category' === $type) {
                $specific = 'category';
            } elseif ('tag' === $type) {
                $specific = 'post_tag';
            }

            if (\is_array($specific)) {
                $specific = $specific[0];
            }

            if (\is_array($more_specific)) {
                $more_specific = $more_specific[0];
            }

            $mod = $this->page->utilities->mods->title([
                'context' => $type,
                'specific' => $specific,
                'more_specific' => $more_specific,
            ]);

            if ($mod->name) {
                return $mod;
            }
        }

        return $mod;
    }
}
