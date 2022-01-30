<?php

function mve_page_breadcrumbs() {
    global $post;
    if (is_page() && !empty($post->post_parent)) {
        $bc = ['<ul id="breadcrumbs">'];
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        foreach ($ancestors as $id) {
            $bc[] = '<li><a href="' . get_permalink($id) . '">' .  get_the_title($id) . '</a></li>';
        }
        $bc[] = '<li><a>' .  get_the_title() . '</a></li></ul>';
        echo implode("\n", $bc);
    }
}

function mve_tags() {
    $tags = get_tags([
        'hide_empty' => true
    ]);
    $ar = [];
    foreach ($tags as $tag) {
        $ar[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
    }
    echo '<p class="meta">' . implode(', ', $ar) . '</p>';
}

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('style', get_stylesheet_uri());
});

add_action('widgets_init', function() {
    register_taxonomy_for_object_type('post_tag', 'page');
});

add_action('pre_get_posts', function($wp_query) {
    if ($wp_query->get('tag')) {
        $wp_query->set('post_type', 'any');
    }
});


add_action('init', function() {
    register_nav_menus([
        'main' => 'Main menu',
    ]);
});
