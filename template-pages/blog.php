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
		</div>
	</div>
</header>

<div class="wrap-content-page">
	<main>
		<div class="container">
			<section>
				<div class="page-content">
					<?php the_content(); ?>
				</div>

				<div class="posts-list">
					<?php get_template_part( 'template-parts/loop-posts' ); ?>
				</div>

			</section>
		</div>
	</main>

	<aside>
		<?php get_template_part( 'template-parts/mail-form' ); ?>
	</aside>
</div>

<?php get_footer(); ?>
