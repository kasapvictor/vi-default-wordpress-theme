<?php

function vi_widgets_1 () {
	register_sidebar([
		'id' => 'vi-widgets-1',
		'name' => 'Блок виджетов №1',
		'description' => 'Виджеты №1',
		'before_widget' => '<div class="vi-widgets-wrap">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h3>',
		'after_title' => '</h3></div>'
	]);

	// отключение использования стандартых виджетов
	// отключаем виджет категорий
	unregister_widget('WP_Widget_Categories');
	// отключаем виджет поиска
	unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'vi_widgets_1');


function vi_widgets_2 () {
	register_sidebar([
		'id' => 'vi-widgets-2',
		'name' => 'Блок виджетов №2',
		'description' => 'Виджеты №2',
		'before_widget' => '<div class="vi-widgets-wrap">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h3>',
		'after_title' => '</h3></div>'
	]);

	// отключение использования стандартых виджетов
	// отключаем виджет категорий
	unregister_widget('WP_Widget_Categories');
	// отключаем виджет поиска
	unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'vi_widgets_2');

function vi_widgets_3 () {
	register_sidebar([
		'id' => 'vi-widgets-3',
		'name' => 'Блок виджетов №3',
		'description' => 'Виджеты №3',
		'before_widget' => '<div class="vi-widgets-wrap">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h3>',
		'after_title' => '</h3></div>'
	]);

	// отключение использования стандартых виджетов
	// отключаем виджет категорий
	unregister_widget('WP_Widget_Categories');
	// отключаем виджет поиска
	unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'vi_widgets_3');
