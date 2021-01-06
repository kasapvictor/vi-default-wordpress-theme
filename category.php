<?php get_header(); ?>

	<header>
		<div class="container">
			<div class="wrap-title">
				<h1 class="archive-title">Категория: <?php single_cat_title(); ?></h1>
			</div>

			<div class="wrap-title-description">
				<?php
				if ( category_description() ) : ?>
					<div class="description-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<div class="wrap-content-page">
		<main>
			<div class="container">
				<section>

					<div class="posts-list">
						<?php get_template_part( 'template-parts/loop' ); ?>
					</div>

				</section>
			</div>
		</main>

		<aside>
			<?php get_template_part( 'template-parts/mail-form' ); ?>
		</aside>
	</div>

<?php get_footer(); ?>