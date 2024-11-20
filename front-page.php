<?php get_header(); ?>
<section>
    <img src="<?= get_template_directory_uri() ?>/assets/img/banner.webp" alt="Banner" />
</section>
<section>
    <div class="container text-center pt-20 pb-10">
        <h1 class="text-4xl font-bold mb-2">Post event Survey</h1>
        <p class="text-xl">Please take a few moments to fill in this survey.</p>
    </div>
</section>
<div class="container">
    <?php the_content(); ?>
</div>
<?php get_footer(); ?>