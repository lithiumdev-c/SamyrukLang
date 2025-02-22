<?php
include "app/database/controllers/users.php";


if (!isset($_GET["token"])) {
    die("Токен не найден!");
}


$token = $_GET["token"];

$token_hash = hash("sha256", $token);

require __DIR__ . "/app/database/connect.php";


$sql = "SELECT * FROM users WHERE account_activation_hash = ?";
$stmt = $pdo->prepare($sql);

$stmt->execute([$token_hash]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) {
    die("Токен не найден");
}
$sql = "UPDATE user SET account_activation_hash = NULL WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$token_hash]);

$_SESSION['id'] = $user['id'];
$_SESSION['login'] = $user['username'];
$_SESSION['admin'] = $user['admin'];


header("Location: " . BASE_URL);
exit();
?>

<?php include "path.php"; 
?>

