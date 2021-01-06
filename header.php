<?php

	$headTitle = '';
	$metaTitle = '';
	$metaDescription = '';
	$imgURL = "";
	$imgType = "";
	$classes = "";
	$templateUrl = get_bloginfo('template_url');

	/*
	* возвращает расширение изображения
	*/
	function getTypeImg($imgUrl) {
		$ext = pathinfo($imgUrl, PATHINFO_EXTENSION);
		return $ext;
	}

	switch (true) {
		case is_front_page() :
			$headTitle = get_bloginfo() . ' - ' . get_bloginfo('description');
			$metaTitle =  get_bloginfo() . ' - ' . get_the_title();
			$metaDescription = get_bloginfo('description');
			$imgURL = get_template_directory_uri() . "/assets/images/meta.png";
			$imgType = getTypeImg($imgURL);
			break;

		case is_category() || is_tag() :
			//get_queried_object()->term_id
			$headTitle = get_queried_object()->name . ' - ' . get_queried_object()->description;
			$metaTitle =  get_bloginfo() . ' - ' . get_queried_object()->name;
			$metaDescription = get_queried_object()->description;
			$imgURL = get_template_directory_uri() . "/assets/images/meta.png";
			$imgType = getTypeImg($imgURL);
			break;

		default:
			$headTitle = get_bloginfo() . ' - ' . get_bloginfo('description');
			$metaTitle = get_bloginfo() . ' - ' . get_bloginfo('description');
			$metaDescription = get_bloginfo('description');
			$imgURL = get_template_directory_uri() . "/assets/images/meta.png";
			$imgType = getTypeImg($imgURL);
	}
?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta content="<?php echo $metaDescription; ?>" name="description">
	<meta content="<?php echo $metaTitle;?>" property="og:title">
	<meta content="<?php echo $metaDescription; ?>" property="og:description">
	<meta content="<?php echo $metaTitle;?>" property="twitter:title">
	<meta content="<?php echo $metaDescription; ?>" property="twitter:description">
	<meta property="og:type" content="website">

	<!-- meta images -->
	<meta property="og:image" content="<?php echo $imgURL; ?>" />
	<meta property="og:image:secure_url" content="<?php echo $imgURL; ?>" />
	<meta property="og:image:type" content="image/<?php echo $imgType;?>" />


	<?php  if (viDate()[3] < 18) : ?>
		<link href="<?php echo $templateUrl; ?>/assets/images/32x32d.png" rel="shortcut icon" type="image/x-icon">
		<link href="<?php echo $templateUrl; ?>>/assets/images/256x256d.png" rel="apple-touch-icon">
	<?php else : ?>
		<link href="<?php echo $templateUrl; ?>/assets/images/32x32w.png" rel="shortcut icon" type="image/x-icon">
		<link href="<?php echo $templateUrl; ?>/assets/images/256x256w.png" rel="apple-touch-icon">
	<?php endif; ?>


	<title> <?php echo $headTitle; ?> </title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

	<?php wp_head(); ?>
</head>

<body>

