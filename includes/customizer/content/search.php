<?php

/**
 * Search content customizer
 *
 * The sections, settings and controls for our search
 * options in the customizer
 *
 * @link            https://jentil.grotttopress.com
 * @package		    jentil
 * @subpackage 	    jentil/includes
 * @since		    Jentil 0.1.0
 */

namespace GrottoPress\Jentil\Customizer\Content;

/**
 * Search customizer
 *
 * The sections, settings and controls for our search
 * options in the customizer
 *
 * @link			https://jentil.grotttopress.com
 * @package			jentil
 * @subpackage 	    jentil/includes
 * @since			Jentil 0.1.0
 */
class Search {
    /**
     * Template
	 *
	 * @since       Jentil 0.1.0
	 * @access      private
	 * 
	 * @var         array         $template       Template
	 */
    private $template;
    
    /**
	 * Constructor
	 *
	 * @since       Jentil 0.1.0
	 * @access      public
	 */
	public function __construct() {
	    $this->template = new \GrottoPress\Jentil\Template\Template();
	}
    
    /**
     * Add search content section
     * 
     * @see         https://code.tutsplus.com/tutorials/wordpress-theme-customizer-methodology-for-sections-settings-and-controls-part-1--wp-33238
     * 
     * @since       Jentil 0.1.0
	 * @access      public
     */
    public function add_section( $wp_customize ) {
        $wp_customize->add_section(
            'search_content',
            array(
                'title'     => esc_html__( 'Search Content', 'jentil' ),
                //'priority'  => 99,
            )
        );
    }
    
    /**
     * Add search content settings
     * 
     * @since       Jentil 0.1.0
     * @access      public
     */
    public function add_settings( $wp_customize ) {
        $this->add_class_setting( $wp_customize );
        //$this->add_sticky_posts_setting( $wp_customize );
        $this->add_before_title_setting( $wp_customize );
        $this->add_title_setting( $wp_customize );
        $this->add_title_position_setting( $wp_customize );
        $this->add_after_title_setting( $wp_customize );
        $this->add_thumbnail_setting( $wp_customize );
        $this->add_thumbnail_alignment_setting( $wp_customize );
        $this->add_text_offset_setting( $wp_customize );
        $this->add_excerpt_setting( $wp_customize );
        $this->add_after_content_setting( $wp_customize );
        $this->add_pagination_setting( $wp_customize );
    }
    
    /**
     * Add wrapper class setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_class_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_class',
            array(
                'default'    =>  'archive-posts',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add sticky posts setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_sticky_posts_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_sticky_posts',
            array(
                'default'    =>  0,
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add before title setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_before_title_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_before_title',
            array(
                'default'    =>  '',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add title length setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_title_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_title',
            array(
                'default'    =>  -1,
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add title position setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_title_position_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_title_position',
            array(
                'default'    =>  'top',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add after title setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_after_title_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_after_title',
            array(
                'default'    =>  'post_type,published_date',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add image size setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_thumbnail_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_thumbnail',
            array(
                'default'    =>  'nano-thumb',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add image alignment setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_thumbnail_alignment_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_thumbnail_alignment',
            array(
                'default'    =>  'left',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add text offset setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_text_offset_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_text_offset',
            array(
                'default'    =>  0,
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add excerpt length setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_excerpt_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_excerpt',
            array(
                'default'    =>  '200',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add after content setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_after_content_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_after_content',
            array(
                'default'    =>  'category,post_tag',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add pagination setting
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_pagination_setting( $wp_customize ) {
        $wp_customize->add_setting(
            'search_pagination',
            array(
                'default'    =>  'bottom',
                //'transport'  =>  'postMessage',
            )
        );
    }
    
    /**
     * Add controls
     * 
     * @since       Jentil 0.1.0
     * @access      public
     */
    public function add_controls( $wp_customize ) {
        $this->add_class_control( $wp_customize );
        //$this->add_sticky_posts_control( $wp_customize );
        $this->add_before_title_control( $wp_customize );
        $this->add_title_control( $wp_customize );
        $this->add_title_position_control( $wp_customize );
        $this->add_after_title_control( $wp_customize );
        $this->add_thumbnail_control( $wp_customize );
        $this->add_thumbnail_alignment_control( $wp_customize );
        $this->add_text_offset_control( $wp_customize );
        $this->add_excerpt_control( $wp_customize );
        $this->add_after_content_control( $wp_customize );
        $this->add_pagination_control( $wp_customize );
    }
    
    /**
     * Add 'class' control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_class_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_class',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Wrapper class', 'jentil' ),
                'type'      => 'text',
            )
        );
    }
    
    /**
     * Add sticky posts control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_sticky_posts_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_sticky_posts',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Show sticky posts', 'jentil' ),
                'type'      => 'checkbox',
            )
        );
    }
    
    /**
     * Add 'before title' control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_before_title_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_before_title',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Before title', 'jentil' ),
                'type'      => 'text',
            )
        );
    }
    
    /**
     * Add title control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_title_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_title',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Title length', 'jentil' ),
                'type'      => 'number',
            )
        );
    }
    
    /**
     * Add title position control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_title_position_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_title_position',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Title position', 'jentil' ),
                'type'      => 'select',
                'choices'   => $this->template->content()->title_positions(),
            )
        );
    }
    
    /**
     * Add 'after title' control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_after_title_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_after_title',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'After title', 'jentil' ),
                'type'      => 'text',
            )
        );
    }
    
    /**
     * Add thumbnail control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_thumbnail_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_thumbnail',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Image size', 'jentil' ),
                'type'      => 'text',
            )
        );
    }
    
    /**
     * Add thumbnail alignment control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_thumbnail_alignment_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_thumbnail_alignment',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Align image', 'jentil' ),
                'type'      => 'select',
                'choices'   => $this->template->content()->image_alignments(),
            )
        );
    }
    
    /**
     * Add 'text offset' control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_text_offset_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_text_offset',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Text offset from image side', 'jentil' ),
                'type'      => 'number',
            )
        );
    }
    
    /**
     * Add excerpt control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_excerpt_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_excerpt',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Excerpt length', 'jentil' ),
                'type'      => 'text',
            )
        );
    }
    
    /**
     * Add 'after content' control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_after_content_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_after_content',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'After content', 'jentil' ),
                'type'      => 'text',
            )
        );
    }
    
    /**
     * Add pagination control
     * 
     * @since       Jentil 0.1.0
     * @access      private
     */
    private function add_pagination_control( $wp_customize ) {
        $wp_customize->add_control(
            'search_pagination',
            array(
                'section'   => 'search_content',
                'label'     => esc_html__( 'Show pagination', 'jentil' ),
                'type'      => 'select',
                'choices'   => $this->template->content()->pagination_positions(),
            )
        );
    }
}