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
            ?>
            <div class="meta">
                <div><time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></div>
                <div><?php the_tags(); ?></div>
            </div>
        <div class="my-post-content">
        <?php
        is_singular() ? the_content() : the_excerpt();
        ?></div></article><?php
    }
} else {
    _e('Nothing here...');
}

echo get_the_posts_pagination();

?>

<?php get_footer(); ?>
