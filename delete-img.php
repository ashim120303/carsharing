<?php
session_start();
include 'db.php';

// Функция для получения списка изображений из директории
function getImagesInDirectory($directory) {
    $images = [];
    $files = glob($directory . "*");
    foreach ($files as $file) {
        if (is_file($file)) {
            $images[] = basename($file);
        }
    }
    return $images;
}

// Получение списка изображений из директории
$upload_dir = 'uploads/';
$directory_images = getImagesInDirectory($upload_dir);

// Получение списка изображений из таблицы car_images
$sql_car_images = "SELECT image_path FROM car_images";
$result_car_images = $conn->query($sql_car_images);
$db_car_images = [];
if ($result_car_images->num_rows > 0) {
    while ($row = $result_car_images->fetch_assoc()) {
        $db_car_images[] = basename($row['image_path']);
    }
}

// Получение списка изображений из таблицы car
$sql_car = "SELECT preview_image FROM car";
$result_car = $conn->query($sql_car);
$db_car_preview_images = [];
if ($result_car->num_rows > 0) {
    while ($row = $result_car->fetch_assoc()) {
        $db_car_preview_images[] = basename($row['preview_image']);
    }
}

// Объединение списков изображений из обеих таблиц
$db_images = array_merge($db_car_images, $db_car_preview_images);

// Удаление изображений, которых нет в обеих таблицах
foreach ($directory_images as $image) {
    if (!in_array($image, $db_images)) {
        unlink($upload_dir . $image);
        echo "deleted " . $image . "<br>";
    }else{
        echo "<b>Есть совпадение в бд для изобрадения:</b> " . $image . "<br>";
    }
}

$conn->close();