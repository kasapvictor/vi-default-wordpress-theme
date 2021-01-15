<?php
/**
 * Template Name: Home
 */
get_header();
?>

<!-- header START -->
<?php get_template_part( 'template-parts/header' ); ?>
<!-- header END -->

<main>
	<div class="container">
		<div class="page-content">
		<section>

			<?php the_content(); ?>

		</section>
			<?php get_sidebar(); ?>
		</div>

	</div>


</main>


<?php get_footer(); ?>
