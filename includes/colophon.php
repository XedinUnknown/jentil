<?php

/**
 * Colophon
 * 
 * Footer credits and related stuff
 *
 * @link            https://jentil.grotttopress.com
 * @package		    jentil
 * @subpackage 	    jentil/includes
 * @since		    Jentil 0.1.0
 */

namespace GrottoPress\Jentil;

/**
 * Colophon
 * 
 * Footer credits and related stuff
 *
 * @link			https://jentil.grotttopress.com
 * @package			jentil
 * @subpackage 	    jentil/includes
 * @since			Jentil 0.1.0
 */
class Colophon {
    /**
     * Get colophon
     * 
     * @since		Jentil 0.1.0
     * @access      public
     * 
     * @return      string          The colophon text
     */
    public function get() {
        global $allowedtags;
        
        $colophon = get_theme_mod( 'colophon' );
        
        $colophon = str_ireplace( '{{site_name}}', esc_attr( get_bloginfo( 'name' ) ), $colophon );
        $colophon = str_ireplace( '{{site_url}}', esc_attr( home_url( '/' ) ), $colophon );
        $colophon = str_ireplace( '{{this_year}}', esc_attr( date( 'Y' ) ), $colophon );
        $colophon = str_ireplace( '{{site_description}}', esc_attr( date( 'Y' ) ), $colophon );
        
        return wp_kses( $colophon, $allowedtags );
    }
}