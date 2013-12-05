<?php

namespace WiredMedia\PopularContentPlugin;

/**
 * Increment post views.
 *
 * @since    1.0.0
 */
add_action('wp_head', function(){
    global $post;

    // 404 pages will not have the $post object setup
    if (!isset($post)) {
        return;
    }

    // check if this post type is to have it's views tracked
    $post_types = apply_filters('wired_popular_posts_posttypes', array('post'));

    if (!in_array($post->post_type, $post_types)) {
        return;
    }

    // TODO: check if user is logged in, if so use flag to track logged in people or not
    // TODO: if we are tracking logged in peoples views then give some control over which user types to track

    $count = get_post_meta($post->ID, Plugin::get_instance()->count_key, true);

    if (!$count) {
        $count = 1;
    } else {
        $count ++;
    }

    update_post_meta($post->ID, Plugin::get_instance()->count_key, $count);

});

// To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);