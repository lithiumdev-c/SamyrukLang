<?php include "path.php"; 
      include "app/database/controllers/users.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css?family=Rubik:regular,700&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<link
href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="stylesheet" href="style.css">
    <title>Создайте аккаунт в SamyrukLang</title>
</head>
<body class="reg-body">
    <form autocomplete="off" class="reg-form" method="post" action="register.php">
        
            <div class="reg-container">
                <div class="reg-content">
                    <h1 class="title">Создайте свой аккаунт</h1>
                    <p class="errormessagetitle"><?=$errMessage?></p>
                    <p class="subtitle">Создайте аккаунт что бы начать работу с сайтом</p>
                    <label>
                        <input type="text required" name = "login" value = "<?=$login?>" required>
                        <span>Логин</span>
                    <div class = "errormessage">
                        <p class="errormessage"><?=$errMessageLog?></p>
                    </div>
                    </label>
                    <label class="email-label">   
                        <input type="email" placeholder="Электронная почта" name ="email" value="<?=$email?>" required>
                    <div class = "errormessage">
                        <p class="errormessage"><?=$errMessageEmail?></p>
                    </div>
                    </label>
                    <div class="reg-content">
                    <label>
                        <input name ="userpass"  type="password" id="password" required>
                        <span>Пароль</span>
                        <span class="icon" id="togglePassword">
                        <i class="ri-eye-off-line"></i> 
                        </span>
                    </label>

                    <label>
                        <input name = "passrepeat"  type="password" id="passwordConfirm" required>
                        <span>Повторите пароль</span>
                        <span class="icon" id="togglePasswordConfirm"><i class="ri-eye-off-line"></i></span>
                        <div class = "errormessage">
                            <p class="errormessage"><?=$errMessagePass?></p>
                        </div>
                    </label>
                    <button class="reset-btn submit" type="submit" name="button-reg">Создать аккаунт</button>
                    <p class="signin">
                        У вас уже есть аккаунт?
                        <a href="login.php">Авторизуйтесь</a> 
                    </p>
                </div>
            </div>
        
      </form>


      <script src="js/script.js"></script>
      <script src="js/regandlog.js"></script>
</body>
</html>