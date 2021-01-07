<?php
/**
 * Template Name: Page
 */
get_header();
?>

<header>
	<div class="container">
		<div class="wrap-title">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</header>

<main>
	<div class="container">
		<section>
			<div class="content">
				<?php the_content(); ?>
			</div>

		</section>
	</div>
</main>

<?php get_footer(); ?>
