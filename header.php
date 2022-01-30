<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width" >
<title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
</head>
<body>

<nav id="mainNav">
        <h1><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php wp_nav_menu(['theme_location' => 'main', 'container' => 'ul', 'depth' => 1]); ?>
    </nav>
