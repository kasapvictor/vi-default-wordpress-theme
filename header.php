<?php
	$title = get_bloginfo();
	$description = get_bloginfo('description');
	$headTitle = get_bloginfo() . ' - ' . get_bloginfo('description');
	$metaTitle =  get_bloginfo() . ' - ' . get_the_title();
	$metaDescription = get_bloginfo('description');
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
	<meta content="summary_large_image" name="twitter:card">

	<?php
		$imgURL = is_front_page() ? get_template_directory_uri() . "/assets/images/meta.png" :  get_the_post_thumbnail_url();
		$imgTYPE = is_front_page() ? "png" :  "jpeg";
	?>
	<meta property="og:image" content="<?php echo $imgURL; ?>" />
	<meta property="og:image:secure_url" content="<?php echo $imgURL; ?>" />
	<meta property="og:image:type" content="image/<?php echo $imgTYPE;?>" />
	<meta property="og:type" content="website">

	<?php  if (viDate()[3] < 18) : ?>
		<link href="<?php echo get_bloginfo('template_url'); ?>/assets/images/32x32d.png" rel="shortcut icon" type="image/x-icon">
		<link href="<?php echo get_bloginfo('template_url'); ?>/assets/images/256x256d.png" rel="apple-touch-icon">
	<?php else : ?>
		<link href="<?php echo get_bloginfo('template_url'); ?>/assets/images/32x32w.png" rel="shortcut icon" type="image/x-icon">
		<link href="<?php echo get_bloginfo('template_url'); ?>/assets/images/256x256w.png" rel="apple-touch-icon">
	<?php endif; ?>


    <title><?php echo $title . " – " . $description; ?></title>

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

	<?php wp_head(); ?>
</head>

<body>


