<?php
include "app/database/controllers/users.php";


if (!isset($_GET["token"])) {
    die("Токен не найден!");
}


$token = $_GET["token"];

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


?>

<?php include "path.php"; 
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
    <title>Сброс пароля SamyrukLang</title>
</head>
<body class="reg-body">
    <form autocomplete="off" class="reg-form" method="post" action="process-reset-password.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
            <div class="reg-container">
                <div class="reg-content">
                    <h1 class="title">Отлично осталось немного. Сброс пароля</h1>
                    <p class="subtitle">Придумайте новый пароль для вашего аккаунта.</p>
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
                    <button type="submit" name = "regbutton" class="login-submit submit">Сброс</button>
                </div>
            </div>
        
      </form>


      <script src="js/script.js"></script>
      <script src="js/regandlog.js"></script>