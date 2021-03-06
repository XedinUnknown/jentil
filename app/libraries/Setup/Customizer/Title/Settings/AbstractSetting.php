<?php

/**
 * Abstract Title Setting
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Title\Settings
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Setup\Customizer\Title\Settings;

use GrottoPress\Jentil\Setup\Customizer\Title\Title;
use GrottoPress\Jentil\Setup\Customizer\AbstractSetting as Setting;
use GrottoPress\Jentil\Utilities\Mods\Title as TitleMod;

/**
 * Abstract Title Setting
 *
 * @since 0.1.0
 */
abstract class AbstractSetting extends Setting
{
    /**
     * Mod
     *
     * @since 0.1.0
     * @access protected
     *
     * @var \GrottoPress\Jentil\Utilities\Mods\Title $mod Mod.
     */
    protected $mod;

    /**
     * Constructor
     *
     * @param Title $title Title section.
     *
     * @since 0.1.0
     * @access protected
     */
    protected function __construct(Title $title)
    {
        parent::__construct($title);

        $this->args['transport'] = 'postMessage';
        $this->args['sanitize_callback'] = 'wp_kses_data';

        $this->control['section'] = $this->section->name;
        $this->control['label'] = \esc_html__('Enter title', 'jentil');
        $this->control['type'] = 'text';
    }

    /**
     * Get mod
     *
     * @param array
     *
     * @since 0.5.0
     * @access protected
     *
     * @return TitleMod
     */
    protected function mod(array $args): TitleMod
    {
        return $this->section->customizer->theme->utilities->mods->title($args);
    }
}
