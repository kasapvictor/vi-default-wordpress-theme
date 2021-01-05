<?php
	$title = get_bloginfo();
	$description = get_bloginfo('description');
?>
<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title . " – " . $description; ?></title>
	<?php wp_head(); ?>
</head>

<body>




