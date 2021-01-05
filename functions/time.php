<?php
/*
 *   Получаем данные текущей даты
 */
function viDate () {
	$blogtime = current_time('mysql'); // вернет: 2005-08-05 10:41:13
	return list( $viYear, $viMonth, $viDay, $viHour, $viMinute, $viSecond ) = preg_split( '([^0-9])', $blogtime );
}


