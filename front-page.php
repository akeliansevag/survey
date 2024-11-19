<?php get_header(); ?>
<section>
    <img src="<?= get_template_directory_uri() ?>/assets/img/banner.webp" alt="Banner" />
</section>
<div class="container">
    <?php the_content(); ?>
</div>
<?php get_footer(); ?>