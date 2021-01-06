<?php
/**
 * Template Name: Blog
 */
get_header();
?>

<header>
	<div class="container">
		<div class="wrap-title">
			<h1><?php the_title(); ?></h1>

			<div class="wrap-title-description">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</header>

<main>
	<div class="container">
		<section>
			<div class="posts-list">
				<?php get_template_part( 'template-parts/loop-posts' ); ?>
			</div>

		</section>
	</div>
</main>

<?php get_footer(); ?>
