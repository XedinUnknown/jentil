<?php

/**
 * Author Layout Setting
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Layout\Settings
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Setup\Customizer\Layout\Settings;

use GrottoPress\Jentil\Setup\Customizer\Layout\Layout;

/**
 * Author Layout Setting
 *
 * @since 0.1.0
 */
final class Author extends AbstractSetting
{
    /**
     * Constructor
     *
     * @param Layout $layout Layout section.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct(Layout $layout)
    {
        parent::__construct($layout);

        $this->mod = $this->mod(['context' => 'author']);

        $this->name = $this->mod->name;

        $this->args['default'] = $this->mod->default;

        $this->control['active_callback'] = function (): bool {
            return $this->section->customizer->theme->utilities
                ->page->is('author');
        };

        $this->control['label'] = \esc_html__('Author Archives', 'jentil');
    }
}
