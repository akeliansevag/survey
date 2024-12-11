<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- <link href="<?= get_template_directory_uri() ?>/assets/img/faviconmonty.webp" rel="shortcut icon">
	<link href="<?= get_template_directory_uri() ?>/assets/img/faviconmonty.webp" rel="apple-touch-icon-precomposed"> -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section>
        <div class="container pt-20 pb-10">
            <img style="width:250px;" src="<?= get_template_directory_uri() ?>/assets/img/logo-comium.svg" alt="Logo Comium">
        </div>
    </section>

    <div class="container">
        <?php the_content(); ?>
    </div>
    <?php wp_footer(); ?>

</body>

</html>