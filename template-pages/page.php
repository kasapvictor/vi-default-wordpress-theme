<?php
/**
 * Template Name: Page
 */
get_header();
?>

<!-- header START -->
<?php get_template_part( 'template-parts/header' ); ?>
<!-- header END -->

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
