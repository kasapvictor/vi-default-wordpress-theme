<?php

//добавляем скрипты и стили
function vi_enqueue() {
	// стили
	wp_enqueue_style('vi-style', get_template_directory_uri() . '/assets/styles/vi.css', false, '1.0.0');

	// отключаем текущий jquery
	wp_deregister_script( 'jquery' );

	// подключаем свой jquery
	wp_register_script('jquery', get_template_directory_uri() . '/assets/scripts/jquery-3.5.1.min.js' , false, '3.5.1', true);
	wp_enqueue_script( 'jquery' );

	// скрипт темы
	wp_enqueue_script('vi-script', get_template_directory_uri() . '/assets/scripts/vi.js', ['jquery'], '1.0.0', true);

	// скрипт почты
	wp_enqueue_script('vi-mail-script', get_template_directory_uri() . '/mailer/mail.js', [], '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'vi_enqueue');

