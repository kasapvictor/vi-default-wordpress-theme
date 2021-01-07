<?php
/**
 * Template Name: Home
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
		<div class="page-content">
		<section>

			<?php the_content(); ?>

		</section>
			<aside>
				<?php get_template_part( 'template-parts/mail-form' ); ?>
			</aside>
		</div>

	</div>


</main>


<?php get_footer(); ?>
