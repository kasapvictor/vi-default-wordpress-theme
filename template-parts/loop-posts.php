<?php

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = [
			'post_type' => 'post',
			'posts_per_page' => 3,
			'paged' => $paged
		];
	$postsQuery = new WP_Query( $args );

	if ( $postsQuery->have_posts() ) :
		while ( $postsQuery->have_posts() ) : $postsQuery->the_post();
?>
	<p> <?php the_title(); ?> </p>

	<?php endwhile; ?>

		<!-- pagination START -->
		<div class="pagination">
			<?php
			echo paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $postsQuery->max_num_pages,
					'current'      => max( 1, get_query_var( 'paged' ) ),
					'format'       => '?paged=%#%',
					'show_all'     => false,
					'type'         => 'plain',
					'end_size'     => 2,
					'mid_size'     => 1,
					'prev_next'    => true,
					'prev_text'    => sprintf( '<i></i> %1$s', __( '&laquo;', 'text-domain' ) ),
					'next_text'    => sprintf( '%1$s <i></i>', __( '&raquo;', 'text-domain' ) ),
					'add_args'     => false,
					'add_fragment' => '',
			) );
			?>
		</div>
		<!-- pagination END -->

<?php else : ?>

	<p>Постов пока нет</p>

<?php
		/*
		* Сброс $post
		*/
		wp_reset_postdata();
		endif;
?>