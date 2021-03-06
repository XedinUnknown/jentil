<?php

/**
 * Comments Template
 *
 * The template for displaying comments; the area of the page
 * that contains both current comments and the comment form.
 *
 * @package GrottoPress\Jentil
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

if (\post_password_required()) {
    return;
}

if (!\comments_open() && !\have_comments()) {
    return;
}

if (!\post_type_supports(\get_post_type(), 'comments')) {
    return;
} ?>

<div id="comments" class="site-comments">
    <?php
    /**
     * @action jentil_before_comments
     *
     * @since 0.1.0
     */
    \do_action('jentil_before_comments');

    if (\have_comments()) {
        $total_pages = \absint(\get_comment_pages_count());
        $comment_count = \absint(\get_comments_number()); ?>

        <section id="comments-list">
            <h3 class="comments-title"><?php \printf(\_n(
                '1 Comment',
                '%1$s Comments',
                $comment_count,
                'jentil'
            ), \number_format_i18n($comment_count)); ?></h3>

            <?php
            /**
             * Top navigation
             *
             * @since 0.1.0
             */
            if ($total_pages > 1
                && ($is_paged = \get_option('page_comments'))
            ) {
                /**
                 * @filter jentil_pagination_prev_label
                 *
                 * @var string $prev_label Previous label.
                 *
                 * @since 0.1.0
                 */
                $prev_label = \sanitize_text_field(
                    \apply_filters(
                        'jentil_pagination_prev_label',
                        \__('&larr; Previous', 'jentil'),
                        'comments'
                    )
                );

                /**
                 * @filter jentil_pagination_next_label
                 *
                 * @var string $next_label Next label.
                 *
                 * @since 0.1.0
                 */
                $next_label = \sanitize_text_field(
                    \apply_filters(
                        'jentil_pagination_next_label',
                        \__('Next &rarr;', 'jentil'),
                        'comments'
                    )
                ); ?>

                <nav class="pagination top comments-pagination">
                    <?php \paginate_comments_links([
                        'prev_text' => $prev_label,
                        'next_text' => $next_label,
                    ]); ?>
                </nav>
            <?php }

            /**
             * @filter jentil_comments_avatar_size
             *
             * @var integer $comment_avatar_size Comments avatar size.
             *
             * @since 0.1.0
             */
            $comment_avatar_size = \absint(
                \apply_filters('jentil_comments_avatar_size', 40)
            );

            /**
             * List our comments
             */
            $comment_list_args = [
                'style' => 'ol',
                'avatar_size' => $comment_avatar_size,
            ]; ?>

            <ol class="commentlist">
                <?php \wp_list_comments($comment_list_args); ?>
            </ol>
    
            <?php
            /**
             * Bottom navigation
             *
             * @since 0.1.0
             */
            if ($total_pages > 1 && $is_paged) { ?>
                <nav class="pagination bottom comments-pagination">
                    <?php \paginate_comments_links([
                        'prev_text' => $prev_label,
                        'next_text' => $next_label,
                    ]); ?>
                </nav>
            <?php } ?>
        </section><!-- #comments-list -->
        
        <?php
        /**
         *If comments are closed and there are comments,
         * let's leave a little note, shall we?
         */
        if (!\comments_open()) { ?>
            <div class="comments-closed-text">
                <?php echo \sanitize_text_field(
                    \apply_filters(
                        'jentil_comments_closed_text',
                        \esc_html__('Comments closed', 'jentil'),
                        \get_comments_number()
                    )
                ); ?>
            </div>
        <?php }
    }

    \comment_form(); ?>
</div><!-- #comments -->
