<?php

/**
 * Post Image
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Posts\Settings
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Setup\Customizer\Posts\Settings;

use GrottoPress\Jentil\Setup\Customizer\Posts\AbstractSection;

/**
 * Post Image
 *
 * @since 0.1.0
 */
final class Image extends AbstractSetting
{
    /**
     * Constructor
     *
     * @param Section $section Section.
     *
     * @since 0.1.0
     * @access public
     */
    public function __construct(AbstractSection $section)
    {
        parent::__construct($section);

        $mod = $this->mod('image');

        $this->name = $mod->name;
        
        $this->args['default'] = $mod->default;
        $this->args['sanitize_callback'] = 'sanitize_text_field';

        $this->control['label'] = \esc_html__('Image size', 'jentil');
        $this->control['type'] = 'text';
    }
}
