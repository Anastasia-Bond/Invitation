<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-6.2.0/src/Exception.php';
require 'PHPMailer-6.2.0/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->setFrom(''); //От кого сообщение
$mail->addAddress(''); //куда будет приходить сообщение
$mail->Subject = 'Список гостей на день рождения';

$body = 'Ура! У тебя новый гость:';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
}

$mail->Body = $body;

$response = ['message' => $message];
if (!$mail->send()) {
    $response['error'] = 'Email sending error';
}

header('Content-type: application/json');
echo json_encode($response);
?>