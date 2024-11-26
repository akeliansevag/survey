<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="<?= get_template_directory_uri() ?>/assets/img/faviconmonty.webp" rel="shortcut icon">
	<link href="<?= get_template_directory_uri() ?>/assets/img/faviconmonty.webp" rel="apple-touch-icon-precomposed">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<section>
		<img src="<?= get_template_directory_uri() ?>/assets/img/banner.webp" alt="Banner" />
	</section>
	<section>
		<div class="container text-center pt-20 pb-10">
			<h1 class="text-4xl font-bold mb-2">Post Event Survey</h1>
			<p class="text-xl">Please take a few moments to fill in this survey.</p>
		</div>
	</section>