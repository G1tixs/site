<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Expeption.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(True);
$mail->CharSet = 'UTF-8';
$mail->setLanhuage('ru', 'phpmailer/lunguage/');
$mail->IsHTML(true);

$mail->setFrom('info@fls.guru', 'ДГЗ');
$mail->addAddress('g1tixs@mail.ru', 'g1tixs@yandex.ru');
$mail->Subject = 'Обратная связь';

$body = '<h1>Пришла обратная связь.</h1>';

if(trim(!empty($_POST['name']))){
  $body.='<p><strong>Имя:</strong> '.$_POST['name'].'<p>';
}
if(trim(!empty($_POST['email']))){
  $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'<p>';
}
if(trim(!empty($_POST['message']))){
  $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'<p>';
}

$mail->Body = $body;

if (!$mail->send()) {
  $message = 'Ошибка'
} else {
  $message = 'Данные отправлены'
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
 ?>
