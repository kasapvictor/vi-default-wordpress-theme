<div class="wrap-menu wrap-top-menu">

	<?php
	// для ссылки nav-link w-nav-link w--current
	// для выпадающего меню dropdown-link w-dropdown-link w--current

	$args = [
		'theme_location'    => 'topMenu',
		'container'         => false,
		'menu_class'        => 'nav-menu w-nav-menu',
		'items_wrap'        => '<nav class="%2$s" role="navigation">' . "\n\r" . '%3$s</nav>',
		'depth'             => 2,
		'walker'            => new viTopMenu(),
	];
	if (has_nav_menu('topMenu')) {
		wp_nav_menu($args);
	}
	?>

	<div class="menu-button w-nav-button">
		<div class="w-icon-nav-menu"></div>
	</div>
</div>

