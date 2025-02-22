<?php include "path.php";
    include "app/database/controllers/users.php";
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
    <title>Войдите в аккаунт SamyrukLang</title>
</head>
<body class="reg-body">
    <form autocomplete="off" class="reg-form" method="post" action="login.php">
        
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">


            <div class="reg-container">
                <div class="reg-content">
                    <h1 class="title">Вход</h1>
                    <p class="errormessagetitle"><?=$errMessage?></p>
                    <p class="subtitle">Войдите в аккаунт что бы начать работу с сайтом</p>
                    <label>
                        <input value="<?=$email?>" type="text required" name="email" required>
                        <span>Электронная почта (Аккаунта)</span>
                    </label>

                    <label>
                        <input name="password"  type="password" id="password" required>
                        <span>Пароль</span>
                        <span class="icon" id="togglePassword">
                        <i class="ri-eye-off-line"></i> 
                        </span>
                    </label>
                        <a class="forgot" href="forgot-password.php">Забыли пароль?</a>
                    <button name="button-log" class="login-submit submit">Войти</button>
                    <p class="signin">
                        Нету аккаунта?
                        <a href="register.php">Создайте его</a> 
                    </p>
                </div>
            </div>


      <script src="js/script.js"></script>
      <script src="js/regandlog.js"></script>