<?php
include "app/database/connect.php";
include "app/database/db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$errMessage = '';
$errMessageLog = '';
$errMessagePass = '';
$errMessageEmail = '';
$regStatus = '';
//Код для рега

setlocale(LC_TIME, 'ru_RU.UTF-8');


$month = [
    'Января', 'Февраля', 'Марта', 'Апреля',
    'Мая', 'Июня', 'Июля', 'Августа',
    'Сентября', 'Октября', 'Ноября', 'Декабря',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])) {
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['email']);
    $userpass = trim($_POST['userpass']);
    $passF = trim($_POST['userpass']);
    $passS = trim($_POST['passrepeat']);
    $created = strftime('%d %B %Y');

    if ($login === '' || $email === '' || $userpass === '' || $passF === '') {
        $errMessage = 'Заполните все поля!';
    } elseif (mb_strlen($login, 'UTF-8') < 3) {
        $errMessageLog = 'Логин должен состоять от 3 до 24 символов!';
    } elseif ($passF !== $passS) {
        $errMessagePass = 'Пароли не совпадают!';
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && isset($existence['email']) && $existence['email'] === $email) {
            $errMessageEmail = 'Пользователь с таким email уже существует!';
        } elseif ($existence && isset($existence['username']) && $existence['username'] === $login) { // Изменено на 'username'
            $errMessageLog = "Пользователь с таким именем уже есть!";
        } else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);

            $activation_token = bin2hex(random_bytes(16));

            $activation_token_hash = hash("sha256", $activation_token);

            $login = mb_substr($login, 0, 24, 'UTF-8');
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass,
                'account_activation_hash' => $activation_token_hash,
                'avatar' => '/images/account.svg',
                'scores' => 0,
                'status' => 0,
            ];

            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['username'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['created'] = $user['created'];
            $_SESSION['avatar'] = $user['avatar'];
            
            if($_SESSION['admin']) {
                header("Location: " . BASE_URL . "/admin/admin.php");
            } else {
                header("location: " . BASE_URL);
            }
        }
    }
}else {
    $login = '';
    $email = '';
}

//Код для лога
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    if ($email === '' || $pass === '') {
        $errMessage = 'Заполните все поля!';
    } else {
        $existence = selectOne('users', ['email' => $email]);
        if($existence && password_verify($pass, $existence['password'])) {
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username']; // Убедись, что в БД поле называется 'username'
            $_SESSION['admin'] = $existence['admin'];
            $_SESSION['registration_date'] = $existence['created'];
            $_SESSION['avatar'] = $existence['avatar'];
            if($_SESSION['admin']) {
            header("Location: " . BASE_URL . "/admin/admin.php");
            }else {
            header("Location: " . BASE_URL);
            }
        } else {
            //LogErr
            $errMessage = "Почта или же пароль неверна!";
        }
    } 
} else {
    $email = '';
}

