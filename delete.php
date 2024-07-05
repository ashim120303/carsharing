<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['car_id'])) {
        $car_id = intval($_POST['car_id']);
        require 'db.php';

        // Удаление записей из таблицы car_images
        $stmt = $conn->prepare('DELETE FROM car_images WHERE car_id = ?');
        $stmt->bind_param('i', $car_id);
        $stmt->execute();

        // Удаление записи из таблицы car
        $stmt = $conn->prepare('DELETE FROM car WHERE id = ?');
        $stmt->bind_param('i', $car_id);
        $stmt->execute();

        // Проверка успешного выполнения запросов
        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = 'Запись успешно удалена';
        } else {
            $_SESSION['message'] = 'Ошибка при удалении записи';
        }

        $stmt->close();
        $conn->close();
    }
}

header("Location: admin.php"); // Перенаправление на страницу со списком автомобилей
exit();

