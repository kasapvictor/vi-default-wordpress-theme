<?php
	$obj = get_queried_object();
	$pageTitle = "";
	$description = "";

	switch (true) {
		case is_tag() :
			$pageTitle = "Тег: " . $obj->name;
			$description = $obj->description != "" ? "<div class='wrap-title-description'>" . $obj->description . "</div>" : "";
			break;

		case is_category() :
			$pageTitle = "Категория: " . $obj->name;
			$description = $obj->description != "" ? "<div class='wrap-title-description'>" . $obj->description . "</div>" : "";
			break;

		default:
			$pageTitle = get_the_title();
			$description = "";
	}
?>

<header>
	<div class="container">
		<!-- top menu START -->
		<?php get_template_part( 'template-parts/top-menu' ); ?>
		<!-- top menu END -->

		<div class="wrap-title">
			<h1><?php echo $pageTitle; ?></h1>

			<?php echo $description; ?>
		</div>
	</div>
</header>
