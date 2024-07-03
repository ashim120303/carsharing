<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Получаем пользователя из базы данных
    $stmt = $conn->prepare("SELECT username, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Проверяем, существует ли пользователь и совпадает ли пароль
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: add.php");
        exit();
    } else {
        echo "Неверное имя пользователя или пароль.";
    }
}
?>
