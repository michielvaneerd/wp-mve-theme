<?php get_header(); ?>

<?php mve_page_breadcrumbs(); ?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?><article <?php post_class('my-post'); ?>>
            <?php
            if (is_singular()) {
                the_title('<h1>', '</h1>');
            } else {
                the_title('<h1><a href="' . esc_url(get_permalink()) . '">', '</a></h1>');
            }
            if (!is_page()) {
            ?>
            <div class="meta">
                <div><time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></div>
                <div><?php the_tags(); ?></div>
            </div>
            <?php
            }
            ?>
        <div class="my-post-content">
        <?php
        if (is_singular()) {
            the_content();
         } else {
             the_excerpt();
             if (($wp_query->current_post + 1) !== $wp_query->post_count) {
                echo '<div class="mve-post-divider">∽</div>';
             }
         }
        ?></div></article><?php
    }
} else {
    _e('Nothing here...');
}

if (!is_singular()) {
	$html = get_the_posts_pagination();
	if (!empty($html)) {
		echo '<hr class="wp-block-separator">' . $html;
	}
}

echo '<hr class="wp-block-separator">';

get_footer();
