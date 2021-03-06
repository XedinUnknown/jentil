<?php

/**
 * Abstract Post Setting
 *
 * @package GrottoPress\Jentil\Setup\Customizer\Posts\Settings
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Setup\Customizer\Posts\Settings;

use GrottoPress\Jentil\Setup\Customizer\AbstractSetting as Setting;
use GrottoPress\Jentil\Setup\Customizer\Posts\AbstractSection;
use GrottoPress\Jentil\Utilities\Mods\Posts as PostsMod;

/**
 * Abstract Post Setting
 *
 * @since 0.1.0
 */
abstract class AbstractSetting extends Setting
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

        $this->control['section'] = $this->section->name;
    }

    /**
     * Get mod
     *
     * @param string $setting Mod setting.
     *
     * @since 0.1.0
     * @access protected
     *
     * @return PostsMod Posts mod.
     */
    protected function mod(string $setting): PostsMod
    {
        return $this->section->panel->customizer->theme->utilities
            ->mods->posts($setting, $this->section->modArgs);
    }
}
