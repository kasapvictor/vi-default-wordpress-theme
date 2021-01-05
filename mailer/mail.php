<?php
header('Content-Type: text/html; charset=utf-8');

/*
 * подключение ядра WordPress из папки /wp-content/themes/vi/mailer/mail.php
 */
require_once (dirname(__FILE__) . '/../../../../wp-load.php');

/*
 * настройки получаем из админки (опции выведены через ACF )
 */
$settings = [
	'require'        => ['agreement', 'name', 'email'], // можно вывести в админке
	'secret'         => '',
	'maxFilesSize'   => 10500000, // маскимальный общий размер файлов 10500000 -> 10mb, 5400000 -> 5mb
	'typeFiles'      => 'jpeg|jpg|png|gif|pdf|svg|tiff|ico|bmp|zip', // допустимые форматы файлов например ['jpg', 'png', 'zip', 'pdf']

	/*
	* для кастомных полей ACF
	*/
	/*
	'secret'         => get_field('secret', 'option'),
	'maxFilesSize'   => get_field('maxFilesSize', 'option'), // маскимальный общий размер файлов 10500000 -> 10mb, 5400000 -> 5mb
	'typeFiles'      => get_field('typeFiles', 'option'), // допустимые форматы файлов например ['jpg', 'png', 'zip', 'pdf']
	*/
];
$errors = [];

if (isset($_POST) && !empty($_POST)) {
	/*
	 * проверка recaptcha
	 */
	if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		checkRecaptcha($settings['secret'], $_POST['g-recaptcha-response']);
	}


	/*
	 * проверка на обязательные поля
	 */
	checkRequired($settings['require']);

	/*
	 * проверка на корректность email
	 */
	checkEmail();

	/*
	 * проверка файлов
	 */
	checkFiles($settings);

	/*
	 * отправка
	 */
	sendMail($settings);

} else {
	wp_redirect( '/' );
	exit();
}

/*
 * проверка recaptcha
 */
function checkRecaptcha($secret, $response) {
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$recaptchaData = [
		'secret'    => $secret,
		'response'  => $response
	];
	$options = array(
		'http' => array (
			'header' => "Content-Type: application/x-www-form-urlencoded",
			'method' => 'POST',
			'content' => http_build_query($recaptchaData)
		)
	);

	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$result = json_decode($verify)->success;

	if (!$result) {
		$errors[] = 'Error: reCAPTCHA';
		echo json_encode([ 'errors' => $errors ]);
		exit();
	}
}

/*
 * проверка на корректность email
 */
function checkEmail () {
	$email = $_POST['email'];
	$check = preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email);

	if ( !$check ) {
		$errors[] = "Error: Email is not correctly";
		echo json_encode([ 'errors' => $errors ]);
		exit();
	}
}

/*
 * проверка на обязательные поля
 */
function checkRequired ($required) {
	foreach ($required as $require) {
		if ( empty($_POST[$require]) ) {
			$errors[] = "Error: " . ucfirst($require) . " must by fill";
			echo json_encode([ 'errors' => $errors ]);
			exit();
		}
	}
}

/*
 * проверка файлов
 */
function checkFiles($settings) {
	$maxFilesSize = $settings['maxFilesSize'];
	if (isset($_FILES['attachments'])) {
		$totalSize = 0;

		foreach ($_FILES['attachments']['size'] as $attachmentSize) {
			$totalSize += $attachmentSize;
		}

		if ($totalSize > $maxFilesSize) {
			$errors[] = 'Максимальный объем файлов = 10Мб';
			echo json_encode([ 'errors' => $errors ]);
			die();
		}

		/*
		 * проверка на типы файлов
		 */
		chekTypesFiles($settings['typeFiles']);
	}

}

/*
 * проверка на типы файлов
 */
function chekTypesFiles($types) {
	if (isset($_FILES['attachments']) && !empty($_FILES['attachments']['name'][0])) {
		$attachmentsNames = $_FILES['attachments']['name'];
		$pattern = "/.*\.($types)$/m";

		foreach ($attachmentsNames as $name) {
			preg_match($pattern, $name, $match);
			if (empty($match)) {
				$types = str_replace("|", ', ', $types);
				$errors[] = "Недопустимый формат. <br> Допустимые форматы: $types";
				echo json_encode([ 'errors' => $errors ]);
				die();
			}
		}
	}

}

/*
 * загрузка файлов
 */
function uploadFiles() {
	$attachments = [];
	$uploadDir = dirname(__FILE__) . '/attachments/';
	$myFile = $_FILES['attachments'];
	$fileCount = count($myFile["name"]);

	for ($i = 0; $i < $fileCount; $i++) {
		$uploadFile = $uploadDir . basename($_FILES['attachments']['name'][$i]);
		if (!move_uploaded_file($_FILES['attachments']['tmp_name'][$i], $uploadFile)) {
			//If there is a potential file attack, stop processing files.
			break;
		}
		$attachments[$i] = $uploadFile;
	}

	return $attachments;
}

/*
 * заполнение данных из полей
 */
function fields() {
	$fields = "";

	/*
	 * удаляем ответный ключ проверки recaptcha
	 */
	unset($_POST['g-recaptcha-response']);

	/*
	 * заполняем данными $fields
	 */
	foreach ($_POST as $key => $value) {

		if ($value === 'on') $value = 'Да';

		if (is_array($value)) {
			$fields .= str_replace(
				           '_',
				           ' ',
				           "<strong>" . ucfirst($key) . "</strong>") . ': <br>&nbsp;- ' . implode(', <br />&nbsp;- ', $value) . '<br><br>';
		} else {
			if ($value !== '') {
				$fields .= str_replace(
					           '_',
					           ' ',
					           "<strong>" . ucfirst($key) . "</strong>") . ': ' . $value . '<br><br>';
			}
		}
	}

	$fields .= "<br><hr><br>";

	return $fields;
}

/*
 * отправка письма
 */
function sendMail ($settings) {
	$to = 'kasap.victor@yandex.ru'; // get_option('admin_email'); - получаем почту указанную в настройках WordPress
	$subject = isset($_POST['subject']) && !empty($_POST['subject']) ? $_POST['subject'] : 'Default subject message';
	$message = fields();
	$headers = [
		"From: Vi feedback form <no-reply@kasapvictor.online>", // если мы просто получаем письма и не отвечаем на них
		// "From: " . $_POST['email'] . " <no-reply@kasapvictor.online>", // если нужно сразу ответить тому кто прислал сообщение
		"content-type: text/html",
		"Reply-To: <" . $_POST['email'] . ">"
	];
	$attachments = uploadFiles();

	if (wp_mail($to, $subject, $message, $headers, $attachments)) { // возвращает true или false
		echo json_encode([ 'success' => 1 ]);

		/*
		 * удаление всех файлов из папки attachments
		 */
		foreach($attachments as $attach) @unlink($attach);
		exit;
	} else {
		echo json_encode([ 'errors' => "Something wrong! Please, try later." ]);
		exit;
	}
}

