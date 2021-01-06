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
		<section>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
		</section>
	</div>
	<?php get_template_part( 'template-parts/mail-form' ); ?>

</main>


<?php get_footer(); ?>
