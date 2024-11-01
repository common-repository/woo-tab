<?php

	include plugin_dir_path( __FILE__ ) . 'query.php';

	if ( $wp_query->have_posts() ) :
	$html .= '<div class="product-grid">';
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$html .= '<div class="item">';		
			include plugin_dir_path( __FILE__ ) . 'templates/thumbnail.php';
			include plugin_dir_path( __FILE__ ) . 'templates/title.php';
			include plugin_dir_path( __FILE__ ) . 'templates/star-rating.php';			
			include plugin_dir_path( __FILE__ ) . 'templates/price.php';		
			include plugin_dir_path( __FILE__ ) . 'templates/cart.php';
			$html .= '</div >';	// end of single
		
		endwhile;			
		$html .= '</div >';	// end of single
	wp_reset_query();
	endif;


?>