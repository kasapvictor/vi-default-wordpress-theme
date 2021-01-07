<?php

function vi_widgets () {
	register_sidebar([
		'id' => 'footer-page-widgets',
		'name' => 'Footer page widgets',
		'description' => 'for widgets on posts pages',
		'before_widget' => '<div class="post-footer-widget-wrap">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-wrap"><h3>',
		'after_title' => '</h3></div>'
	]);

	/*
	 * отключение использования стандартых виджетов
	 */
	// отключаем виджет категорий
	unregister_widget('WP_Widget_Categories');

	// отключаем виджет поиска
	unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'vi_widgets');