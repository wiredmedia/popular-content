<?php

namespace WiredMedia\PopularPostsPlugin;

/**
 * Get post views for a particular post.
 *
 * @since    1.0.0
 */
function get_post_views ($post_ID) {

    $count = get_post_meta($post_ID, Plugin::get_instance()->count_key, true);

    $count = ($count) ? $count : 0;

    return $count;

}

/**
 * Get post views for a particular post.
 *
 * @since    1.0.0
 */
function get_popular_posts ($args) {

    // TODO: implement a range, so the user can provide dates for the most popular posts or a keyword like weekly, otherwise it will just always show the all time most popular posts

    // TODO: implement something which takes into account comments

    // TODO: implement min popularity, so post has to have a certain amount of comments or views

    $defaults = array(
        'posts_per_page' => 4,
        'post_type' => 'post',
        'meta_key' => Plugin::get_instance()->count_key,
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    );

    $args = wp_parse_args($args, $defaults);

    $the_query = new \WP_Query($args);

    if (!$the_query->have_posts()) {
        return array();
    } else {
        return $the_query->posts;
    }

}
