<?php

/*
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
 * Запуск функции перед выводом отрывка поста
 * меняет в конце отрывка [...] на ...
 */
function vi_new_excerpt ($excerpt) {
	return str_replace(['[', ']'], ' ', $excerpt);
}
add_filter('get_the_excerpt', 'vi_new_excerpt', 10);

/*
 * Запуск функции перед выводом отрывка поста
 * сокращает длину отрывка до указанного значения
 */
function vi_excerpt_length($length){
	return 60;
}

add_filter( 'excerpt_length', 'vi_excerpt_length', 999 );