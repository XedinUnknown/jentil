<?php

/**
 * Sticky Posts
 *
 * @package GrottoPress\Jentil\Utilities\Page\Posts
 * @since 0.1.0
 *
 * @author GrottoPress <info@grottopress.com>
 * @author N Atta Kus Adusei
 */

declare (strict_types = 1);

namespace GrottoPress\Jentil\Utilities\Page\Posts;

/**
 * Sticky Posts
 *
 * @since 0.1.0
 */
final class Sticky extends AbstractPosts
{
    /**
     * Sticky Posts Args
     *
     * @since 0.1.0
     * @access public
     *
     * @return array Sticky posts args.
     */
    public function args(): array
    {
        $args = [
            // 'tag' => $this->mod('wrap_tag')->get(),
            'class' => $this->mod('wrap_class')->get(),
            'id' => 'main-query-sticky-posts',
            'layout' => $this->mod('layout')->get(),
            'text_offset' => $this->mod('text_offset')->get(),
            'image' => [
                'size' => $this->mod('image')->get(),
                'align' => $this->mod('image_alignment')->get(),
            ],
            'excerpt' => [
                'length' => $this->mod('excerpt')->get(),
                'paginate' => false,
                'more_text' => $this->mod('more_text')->get(),
                'after' => [
                    'types' => \explode(
                        ',',
                        $this->mod('after_content')->get()
                    ),
                    'separator' => $this->mod('after_content_separator')->get(),
                ],
            ],
            'title' => [
                'length' => $this->mod('title_words')->get(),
                'position' => $this->mod('title_position')->get(),
                'tag' => 'h2',
                'link' => true,
                'before' => [
                    'types' => \explode(',', $this->mod('before_title')->get()),
                    'separator' => $this->mod('before_title_separator')->get(),
                ],
                'after' => [
                    'types' => \explode(',', $this->mod('after_title')->get()),
                    'separator' => $this->mod('after_title_separator')->get(),
                ],
            ],
            'wp_query' => [
                'posts_per_page' => -1,
                'post__in' => $this->get(),
                'post_status' => 'publish',
                'ignore_sticky_posts' => 1,
                'no_found_rows' => true,
            ],
        ];

        $args['wp_query']['post_type'] = \get_query_var('post_type');

        if (($taxonomy = \get_query_var('taxonomy'))) {
            $args['wp_query']['tax_query'] = [
                [
                    'taxonomy' => $taxonomy,
                    'terms' => \get_query_var('term_id'),
                    'field' => 'term_id',
                ],
            ];
        }

        if (\get_query_var('year') || \get_query_var('monthnum') || \get_query_var('day')) {
            $args['wp_query']['date_query'] = [
                [
                    'year' => \get_query_var('year'),
                    'month' => \get_query_var('monthnum'),
                    'day' => \get_query_var('day'),
                ],
            ];
        }

        if (($cat = \get_query_var('cat'))) {
            $args['wp_query']['cat'] = $cat;
        }

        if (($cat_in = \get_query_var('category__in'))) {
            $args['wp_query']['category__in'] = $cat_in;
        }

        if (($cat_not_in = \get_query_var('category__not_in'))) {
            $args['wp_query']['category__not_in'] = $cat_not_in;
        }

        if (($cat_and = \get_query_var('category__and'))) {
            $args['wp_query']['category__and'] = $cat_and;
        }

        if (($tag_id = \get_query_var('tag_id'))) {
            $args['wp_query']['tag_id'] = $tag_id;
        }

        if (($tag_in = \get_query_var('tag__in'))) {
            $args['wp_query']['tag__in'] = $tag_in;
        }

        if (($tag_not_in = \get_query_var('tag__not_in'))) {
            $args['wp_query']['tag__not_in'] = $tag_not_in;
        }

        if (($tag_and = \get_query_var('tag__and'))) {
            $args['wp_query']['tag__and'] = $tag_and;
        }

        if (($author_id = \get_query_var('author'))) {
            $args['wp_query']['author'] = $author_id;
        }

        if (($author_in = \get_query_var('author__in'))) {
            $args['wp_query']['author__in'] = $author_in;
        }

        if (($author_not_in = \get_query_var('author__not_in'))) {
            $args['wp_query']['author__not_in'] = $author_not_in;
        }

        return $args;
    }

    /**
     * Get sticky posts for post type
     *
     * @param string Post type name.
     *
     * @since 0.1.0
     * @access public
     *
     * @return int[] Sticky posts for post type.
     */
    public function get(string $post_type = ''): array
    {
        $sticky_posts = \get_option('sticky_posts');

        if (!$sticky_posts) {
            return $sticky_posts;
        }
        
        if (!$post_type) {
            return $sticky_posts;
        }

        $type_sticky_posts = [];

        foreach ($sticky_posts as $post) {
            if (\get_post_type($post) === $post_type) {
                $type_sticky_posts[] = $post;
            }
        }

        return $type_sticky_posts;
    }

    /**
     * Sticky posts enabled?
     *
     * @since 0.1.0
     * @access public
     *
     * @return bool Do we have sticky posts enabled?
     */
    public function isSet(): bool
    {
        return (bool)$this->posts->mod('sticky_posts')->get();
    }

    /**
     * Sticky posts mod
     *
     * @param string $setting
     *
     * @since 0.1.0
     * @access public
     *
     * @return mixed Sticky posts mod.
     */
    public function mod(string $setting)
    {
        $args = [
            'context' => 'sticky',
        ];

        if ($this->posts->page->is('home')) {
            $args['specific'] = 'post';
        } elseif ($this->posts->page->is('post_type_archive')) {
            $args['specific'] = \get_query_var('post_type');
        }

        if (\is_array($args['specific'])) {
            $args['specific'] = $args['specific'][0];
        }

        return $this->posts->mod($setting, $args);
    }
}
