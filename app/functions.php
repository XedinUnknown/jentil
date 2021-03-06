<?php

/**
 * Functions API
 *
 * @package GrottoPress\Jentil
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

use GrottoPress\Jentil\Jentil;

/**
 * Jentil
 *
 * @since 0.1.0
 *
 * @return Jentil Jentil.
 */
function Jentil(): Jentil
{
    return Jentil::getInstance();
}
