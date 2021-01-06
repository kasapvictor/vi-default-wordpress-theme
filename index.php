<?php get_header(); ?>

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
			<div class="wrap-title">
				<h2>The title</h2>

				<aside>
					<?php get_template_part( 'template-parts/mail-form' ); ?>
				</aside>


			</div>
		</section>
	</div>
</main>

<?php get_footer(); ?>
