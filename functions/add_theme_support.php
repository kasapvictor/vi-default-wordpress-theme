<?php

/*
 * Поддержка изображений
 * Например - миниатюры только для постов блога
 * add_theme_support('post-thumbnails', ['post']);
 */
add_theme_support('post-thumbnails');

/*
 * Новый размер для изображений 1024 на 800
 */
add_image_size('1024x800', 1024, 800, true);

/*
 * Включает поддержку html5 разметки
 */
add_theme_support( 'html5', array(
	'comment-list',
	'comment-form',
	'search-form',
	'gallery',
	'caption',
	'script',
	'style',
) );

/*
 * Эта функция позволит плагинам и темам изменять метатег <title>
 */
add_theme_support( 'title-tag' );

/*
 * Добавляет ссылки на RSS фиды постов и комментариев
 * в head часть HTML документа.
 */
add_theme_support( 'automatic-feed-links' );

/*
 * Добавляет возможность загрузить картинку логотипа в настройках темы в админке.
 */
// add_theme_support( 'custom-logo' );

/*
 * Можно изменять изображения в шапке из админки
 */
// add_theme_support( 'custom-header' );

/*
 * Поддержка выборочного обновления виджетов
 */
add_theme_support( 'custom-selective-refresh-widgets' );
/*
 * Подключение кастомных стилей для гутенберга
 */
add_theme_support( 'editor-styles' );

/*
 * Включает поддержку широкого выравнивания для картинок у блоков Гутенберга
 */
add_theme_support( 'align-wide' );

/*
 * Определяет свою коллекцию цветов
 * которые можно будет использовать при редактировании блоков.
 */
add_theme_support( 'editor-color-palette', [
	[
		'name'  => __( 'main', 'domain' ),
		'slug'  => 'main',
		'color' => '#333',
	],
	[
		'name'  => __( 'success', 'domain' ),
		'slug'  => 'success',
		'color' => '#8bc34a',
	],
	[
		'name'  => __( 'error', 'domain' ),
		'slug'  => 'error',
		'color' => '#f44336',
	],
	[
		'name'  => __( 'warning', 'domain' ),
		'slug'  => 'warning',
		'color' => '#ff9800',
	],
	[
		'name'  => __( 'link', 'domain' ),
		'slug'  => 'link',
		'color' => '#0072ab',
	],
	[
		'name'  => __( 'mute', 'domain' ),
		'slug'  => 'mute',
		'color' => '#f2f2f2',
	],
	[
		'name'  => __( 'light', 'domain' ),
		'slug'  => 'light',
		'color' => '#e3e3e3',
	],
	[
		'name'  => __( 'disable', 'domain' ),
		'slug'  => 'disable',
		'color' => '#9e9e9e',
	],
] );

/*
 * Определяет свою коллекцию размеров
 * для текста которые можно будет использовать при редактировании блоков.
 */
add_theme_support( 'editor-font-sizes', [
	[
		'name'      => 'Small',
		'shortName' => 'S',
		'size'      => 12,
		'slug'      => 'small'
	],
	[
		'name'      => 'Regular',
		'shortName' => 'M',
		'size'      => 16,
		'slug'      => 'regular'
	],
	[
		'name'      => 'Large',
		'shortName' => 'L',
		'size'      => 32,
		'slug'      => 'large'
	],
	[
		'name'      => 'Larger',
		'shortName' => 'XL',
		'size'      => 48,
		'slug'      => 'larger'
	]
] );

/*
 * Чтобы изменить размер содержимого и сохранить его соотношение сторон
 */
add_theme_support( 'responsive-embeds' );

