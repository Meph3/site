<?php
	

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
 
	require_once 'phpmailer/src/Exception.php';
	require_once 'phpmailer/src/PHPMailer.php';
	require_once 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->setLanguage('ru', 'phpmailer/language/');  
	$mail->CharSet = 'UTF-8';
	$mail->Host = 'ssl://smtp.mail.ru';
	$mail->SMTPSecure = 'TSL';
	$mail->Port = 587;

    	$mail->IsHTML(true);

    $mail->Username = 'kavkazdavid00@mail.ru'; // логин от вашей почты
    $mail->Password = 'fth33KwLjaP1tqNs4Xau'; // пароль от почтового ящика
    

    $mail->setFrom('kavkazdavid00@mail.ru');  // адрес почты, с которой идет отправка
    $mail->addAddress('kavkazdavid00@mail.ru' );

    $mail->Body = 'Hello, this is my message.';

	if(trim(!empty($_POST['name']))){
		$mail->Body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$mail->Body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['message']))){
		$mail->Body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
	}


	if(!$mail->send()){
		$message = 'Ошибка';
	}else{
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>