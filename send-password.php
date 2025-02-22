<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ("app/database/connect.php");
require __DIR__ . '/vendor/autoload.php';


$error = '';
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST["email"])) {
    die('Почта не настроена');
}

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);



$sql = "UPDATE users
SET reset_token_hash = ?,
reset_token_expires_at = ?
WHERE email = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$token_hash, $expiry, $email]);

$reset_link = "http://localhost:3000/reset-password.php?token=" . urlencode($token);

if($stmt->rowCount() > 0) {
    try {
    $mail = require __DIR__ . "/mailer.php";
    $mail->charSet = 'UTF-8';
    $mail->setFrom("samyruklang@gmail.com", "SamurykLang");
    $mail->addAddress($email);
    $mail->Subject = "Сброс пароля || SamurykLang";
    $mail->Body = <<<END
    <div style = "padding: 30px 70px; border-radius: 5px; background: #da752d;">
    <h1 style="color: #000; font-size: 24px; text-align: center;">Здравствуйте вы запросили сброс пароля на сайте SamyrukLang</h1>
    <p style="text-align: center;">Нажмите <a href='$reset_link'>сюда</a> что бы сбросить ваш пароль.</p>
    </div>
    END;

        $mail->send();
    } catch (Exception $e) {
        echo "Произошла ошибка! Письмо не отправилось: {$mail->ErrorInfo}";
    } 
} else {
    $error = "Пользователь не найден!";
}

?>

<!DOCTYPE html>
<html lang="en">
    <html lang="ru"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css?family=Rubik:regular,700&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" href="style.css">
    <title>Ваш пароль изменен</title>
</head>
<body class="reg-body">
    <div class="reg-content">
<h1 class="title">Письмо было успешно отправлено!</h1>
<p class="subtitle">А теперь зайдите и проверьте свою почту, перейдите по ссылке и смените пароль</p>
</div>
      <script src="js/script.js"></script>
      <script src="js/regandlog.js"></script>