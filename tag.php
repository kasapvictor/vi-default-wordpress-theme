<?php get_header(); ?>

<!-- header START -->
<?php get_template_part( 'template-parts/header' ); ?>
<!-- header END -->


<main>
	<div class="container">
		<section>

			<div class="posts-list">
				<?php get_template_part( 'template-parts/loop' ); ?>
			</div>

		</section>
	</div>
</main>

<?php get_footer(); ?>