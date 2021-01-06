<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		?>

		<p><?php the_title(); ?></p>

	<?php
	endwhile;
else:
	echo "Постов пока нет.";
endif;
?>

<!-- pagination -->
<div class="posts-pagination">

	<?php
	$args = [
		'prev_text' => '&laquo;',
		'next_text' => '&raquo;',
		'screen_reader_text' => ' ',
	];
	the_posts_pagination( $args );
	?>

</div>