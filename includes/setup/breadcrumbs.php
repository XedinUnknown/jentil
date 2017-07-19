<?php

/**
 * Breadcrumbs
 *
 * @link            https://jentil.grotttopress.com
 * @package		    jentil
 * @subpackage 	    jentil/includes
 * @since		    Jentil 0.1.0
 */

namespace GrottoPress\Jentil\Setup;

if ( ! defined( 'WPINC' ) ) {
    die;
}

use GrottoPress\MagPack;
use GrottoPress\Jentil\Utilities;

/**
 * Breadcrumbs
 *
 * @link			https://jentil.grotttopress.com
 * @package			jentil
 * @subpackage 	    jentil/includes
 * @since			jentil 0.1.0
 */
final class Breadcrumbs {
    /**
     * Import traits
     *
     * @since       Jentil 0.1.0
     */
    use MagPack\Utilities\Wizard;

    /**
     * Jentil
     *
     * @since       Jentil 0.1.0
     * @access      protected
     * 
     * @var         \GrottoPress\Jentil\Setup\Jentil         $jentil       Jentil
     */
    protected $jentil;

    /**
	 * Constructor
	 *
	 * @since       Jentil 0.1.0
	 * @access      public
	 */
	public function __construct( Jentil $jentil ) {
        $this->jentil = $jentil;
    }

    /**
     * Render
     *
     * @since       Jentil 0.1.0
     * @access      public
     *
     * @action      jentil_before_before_title
     */
    public function render() {
        $template = Utilities\Template\Template::instance();

        if (
            $template->is( 'front_page' )
            && ! ( new MagPack\Utilities\Pagination() )->is_paged()
        ) {
            return;
        }

        $args = [
            'before' => esc_html__( 'Path: ', 'jentil' ),
        ];

        echo $template->breadcrumbs( $args )->trail();
    }
}