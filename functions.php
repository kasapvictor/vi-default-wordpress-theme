<?php
/*
 * текущее время
 */
require get_template_directory() . '/functions/time.php';

/*
 * стили и скрипты
 */
require get_template_directory() . '/functions/enqueue.php';

/*
 * опции ACF
 */
require get_template_directory() . '/functions/acf.php';

/*
 * меню
 */
require get_template_directory() . '/functions/menu.php';

/*
 * виджеты
 */
require get_template_directory() . '/functions/widgets.php';

/*
 * изображения
 */
require get_template_directory() . '/functions/add_theme_support.php';

/*
 * хуки
 */
require get_template_directory() . '/functions/actions.php';

/*
 * фильтры
 */
require get_template_directory() . '/functions/filters.php';

/*
 * дамп
 */
function d ($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	//die();
}


