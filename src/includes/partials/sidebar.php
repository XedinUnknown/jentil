<?php

/**
 * Sidebar Template
 *
 * This contains code that would be included in
 * other templates via the `\get_sidebar()` call.
 *
 * @package GrottoPress\Jentil
 * @since 0.1.0
 *
 * @author GrottoPress (https://www.grottopress.com)
 * @author N Atta Kus Adusei (https://twitter.com/akadusei)
 */

declare ( strict_types = 1 );

if ( ! \defined( 'WPINC' ) ) {
    die;
}

/**
 * Do not show sidebars if page layout is one column
 * 
 * @since 0.1.0
 */
if ( 'one-column' == ( $column = \Jentil()->utilities()->page()->layout()->column() ) ) {
	return;
}

/**
 * Primary Sidebar
 * 
 * @since 0.1.0
 */
if ( \is_active_sidebar( 'primary-widget-area' ) ) { ?>
	<div id="primary-widget-area-wrap" class="sidebar-wrap p">
		<aside id="primary-widget-area" class="site-sidebar hobbit widget-area" itemscope itemtype="http://schema.org/WPSideBar">
			<?php \dynamic_sidebar( 'primary-widget-area' ); ?>
		</aside><!-- #primary -->
	</div>
<?php }

/**
 * Secondary sidebar
 * 
 * @since 0.1.0
 */
if ( 'three-columns' == $column ) {
	if ( \is_active_sidebar( 'secondary-widget-area' ) ) { ?>
		<div id="secondary-widget-area-wrap" class="sidebar-wrap p">
			<aside id="secondary-widget-area" class="site-sidebar hobbit widget-area" itemscope itemtype="http://schema.org/WPSideBar">
				<?php \dynamic_sidebar( 'secondary-widget-area' ); ?>
			</aside><!-- #secondary -->
		</div>
	<?php }
}