<?php
	$current = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'paged' => $current
		];
	$query = new WP_Query($args);

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
?>

			<?php get_template_part( 'template-parts/content-post-preview' ); ?>

	<?php
		endwhile;
		/*
		* Сброс $post
		*/
		wp_reset_postdata();
		else:
	?>

	<p>Постов пока нет</p>

<?php endif; ?>

<!-- pagination START -->
<div class="pagination">
	<?php
	$args = [
			'base'       => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'total'   	   => $query->max_num_pages,
			'current' 	   => $current,
			'end_size'     => 2,
			'mid_size'     => 2,
			'prev_next'    => true,
			'prev_text'    => '👈&nbsp;',
			'next_text'    => '&nbsp;👉',
	];

	echo wp_kses_post( paginate_links($args) );
	?>
</div>
<!-- pagination END -->
