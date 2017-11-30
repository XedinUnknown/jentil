<?php

/**
 * Header Template
 *
 * This contains code that would be included in
 * other templates via the `\get_header()` call.
 *
 * @package GrottoPress\Jentil
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

?><!DOCTYPE html>
<html <?php \language_attributes(); ?>>
    <head>
        <meta charset="<?php \bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <![endif]-->

        <link rel="profile" href="http://gmpg.org/xfn/11" />

        <?php if (\Jentil()->utilities->page->is('singular')
            && \pings_open(\get_queried_object())
        ) { ?>
            <link rel="pingback" href="<?php \bloginfo('pingback_url'); ?>" />
        <?php } ?>

        <!--[if lt IE 9]>
            <script src="<?php
                echo \Jentil()->utilities->fileSystem->dir(
                    'url',
                    '/dist/vendor/html5shiv/dist/html5shiv.min.js'
                );
            ?>"></script>
            <script src="<?php
                echo \Jentil()->utilities->fileSystem->dir(
                    'url',
                    '/dist/vendor/respond.js/dest/respond.min.js'
                );
            ?>"></script>
        <![endif]-->

        <?php
        /**
         * @action wp_head
         *
         * @since 0.1.0
         */
        \wp_head(); ?>
    </head>

    <body <?php \body_class(); ?>>
        <div id="wrap" class="site hfeed">
            <?php
            /**
             * @action jentil_before_header
             *
             * @since 0.1.0
             */
            \do_action('jentil_before_header'); ?>
        
            <header id="header" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
                <?php
                /**
                 * @action jentil_inside_header
                 *
                 * @since 0.1.0
                 */
                \do_action('jentil_inside_header'); ?>
            </header><!-- #header -->
            
            <?php
            /**
             * @action jentil_after_header
             *
             * @since 0.1.0
             */
            \do_action('jentil_after_header'); ?>
            
            <div id="main">
                <div id="content-wrap">
                    <main id="content" class="site-content">
                        <?php
                        /**
                         * @action jentil_before_before_title
                         *
                         * @since 0.1.0
                         */
                        \do_action('jentil_before_before_title');
