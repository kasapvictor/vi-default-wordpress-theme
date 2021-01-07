<?php

/*
 * Хук
 * Запуск функции во время подключения скриптов
 * подключает в head style.css из корня темы
 */
function vi_theme_style () {
	// wp_enqueue_style('styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'vi_theme_style');

/*
 * Фильтр
 * Запуск функции перед выводом отрывка поста
 * добавляет к отрывку ссылку "Читать далее"
 */
function vi_read_more_links ($excerpt) {
	$out = $excerpt;
	$out .= " <a href='";
	$out .= get_permalink() . "'";
	$out .= "class='read-more'>";
	$out .= "Читать далее</a>";
	return $out;
}

add_filter('get_the_excerpt', 'vi_read_more_links', 10);

/*
 * Фильтр
 * Запуск функции перед выводом отрывка поста
 * меняет в конце отрывка [...] на ...
 */
function vi_new_excerpt ($excerpt) {
	return str_replace(['[', ']'], ' ', $excerpt);
}
add_filter('get_the_excerpt', 'vi_new_excerpt', 10);