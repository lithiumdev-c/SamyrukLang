<?php require "app/database/controllers/users.php";
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
    <title>Забыли пароль? SamyrukLang</title>
</head>
<body class="reg-body">
    <form class="reg-form" method="post" action="send-password.php">
            <div class="reg-container">
                <div class="reg-content">
                    <h1 class="title">Забыли пароль?</h1>
                    <p class="subtitle">Введите свою почту что-бы поменять пароль</p>
                    <label>
                        <input type="email" name="email" value="<?=$email?>" required>
                        <span>Электорнная почта</span>

                    </label>

                    <button class="submit">Отправить</button>
                </div>
            </div>
        
      </form>


      <script src="js/script.js"></script>
      <script src="js/regandlog.js"></script>