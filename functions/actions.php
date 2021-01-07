<?php

/*
 * Запуск функции во время подключения скриптов
 * подключает в head style.css из корня темы
 */
function vi_theme_style () {
	wp_enqueue_style('theme-styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'vi_theme_style');

/*
 * Меняем ширину контента гутенбрега
 * по умолчанию add_editor_style( 'editor-style.css' );
 */
function gutenberg_setup_theme(){
	add_editor_style( get_template_directory_uri() . '/assets/styles/gutenberg.css' );
}
add_action( 'after_setup_theme', 'gutenberg_setup_theme' );

/*
 * Подключение шрифтоф
 */
function vi_add_editor_styles() {
	$font_url = 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap';
	$font_url = str_replace( ',', '%2C', $font_url );
	add_editor_style( $font_url );
}
add_action( 'current_screen', 'vi_add_editor_styles' );