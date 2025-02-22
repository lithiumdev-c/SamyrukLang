<?php
include "app/database/controllers/users.php";
if (!isset($_POST["token"]) || empty($_POST["token"])) {
    die("Ошибка: токен не передан В ПОСТ!");
}

$token = $_POST["token"];
$userpass = $_POST["userpass"];
$passrepeat = $_POST["passrepeat"];

$token_hash = hash("sha256", $token);

require __DIR__ . "/app/database/connect.php";

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $pdo->prepare($sql);

$stmt->execute([$token_hash]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    die("Токен не найден");
}

if (strtotime($user['reset_token_expires_at']) <= time()) {
    die("Токен просрочен!");
}

$pass = password_hash($userpass, PASSWORD_DEFAULT);

$sql = "UPDATE users SET password = ?,
        reset_token_hash = NULL,
        reset_token_expires_at= NULL
 WHERE id = ?";

 $stmt = $pdo->prepare($sql);

 $stmt->execute([$pass, $user['id']]);

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
<h1 class="title">Поздравляю! Ваш пароль был изменен!</h1>
<p class="subtitle">А теперь войдите в свой аккаунт</p>
</div>
    <form action="login.php">
    <button name="button-log" class="login-submit submit">Приступить</button>
    </form>
      <script src="js/script.js"></script>
      <script src="js/regandlog.js"></script>