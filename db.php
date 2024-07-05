<?php
$servername = "localhost";
$username = "ashim";
$password = "123";
$dbname = "carsharing";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

