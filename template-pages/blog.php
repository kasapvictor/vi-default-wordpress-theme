<?php
/**
 * Template Name: Blog
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
				<div class="posts-list">
					<?php get_template_part( 'template-parts/loop-posts' ); ?>
				</div>
			</section>

			<aside>
				<?php get_template_part( 'template-parts/mail-form' ); ?>
			</aside>
		</div>
	</div>
</main>

<?php get_footer(); ?>
