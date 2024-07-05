<?php
session_start();
include 'db.php';

if (isset($_POST['add'])) {
    // Проверка существования данных формы
    if (
        isset($_POST['model']) && isset($_POST['price']) && isset($_POST['engine_volume']) &&
        isset($_POST['year_of_manufacture']) && isset($_POST['number_of_seats']) && isset($_POST['drive']) &&
        isset($_POST['engine_power']) && isset($_POST['fuel_type']) && isset($_POST['steering_side']) &&
        isset($_POST['fuel_consumption']) && isset($_POST['transmission']) && isset($_POST['category'])
    ) {
        // Подготовка данных для вставки в таблицу `car`
        $model = $_POST['model'];
        $price = $_POST['price'];
        $engine_volume = $_POST['engine_volume'];
        $year_of_manufacture = $_POST['year_of_manufacture'];
        $number_of_seats = $_POST['number_of_seats'];
        $drive = $_POST['drive'];
        $engine_power = $_POST['engine_power'];
        $fuel_type = $_POST['fuel_type'];
        $steering_side = $_POST['steering_side'];
        $fuel_consumption = $_POST['fuel_consumption'];
        $transmission = $_POST['transmission'];
        $category = $_POST['category'];

        // Подготовка пути и имени файла превью
        $preview_image = '';
        if (isset($_FILES['preview_image']) && $_FILES['preview_image']['size'] > 0) {
            $upload_dir = 'uploads/';
            $preview_name = uniqid('preview_') . '_' . $_FILES['preview_image']['name'];
            $preview_path = $upload_dir . $preview_name;
            if (move_uploaded_file($_FILES['preview_image']['tmp_name'], $preview_path)) {
                $preview_image = $preview_path;
            } else {
                die("Ошибка при загрузке файла превью");
            }
        }

        // Вставка данных в таблицу `car`
        $insert_car_sql = "INSERT INTO car (model, price, engine_volume, year_of_manufacture, number_of_seats, 
                            drive, engine_power, fuel_type, steering_side, fuel_consumption, 
                            transmission, category, preview_image)
                            VALUES ('$model', $price, $engine_volume, $year_of_manufacture, $number_of_seats, 
                            '$drive', $engine_power, '$fuel_type', '$steering_side', $fuel_consumption, 
                            '$transmission', '$category', '$preview_image')";

        if ($conn->query($insert_car_sql) === TRUE) {
            $car_id = $conn->insert_id;

            // Обработка дополнительных изображений
            if (isset($_FILES['image_path']) && count($_FILES['image_path']['name']) > 0) {
                $upload_dir = 'uploads/';
                foreach ($_FILES['image_path']['tmp_name'] as $key => $tmp_name) {
                    if ($_FILES['image_path']['size'][$key] > 0) {
                        $image_name = uniqid('image_') . '_' . $_FILES['image_path']['name'][$key];
                        $image_path = $upload_dir . $image_name;
                        if (move_uploaded_file($_FILES['image_path']['tmp_name'][$key], $image_path)) {
                            // Вставка пути изображения в таблицу `car_images`
                            $insert_image_sql = "INSERT INTO car_images (car_id, image_path)
                                                VALUES ($car_id, '$image_path')";
                            $conn->query($insert_image_sql);
                        } else {
                            die("Ошибка при загрузке дополнительного изображения");
                        }
                    }
                }
            }

            echo "Данные успешно сохранены.";
            header("Location: admin.php");
        } else {
            echo "Ошибка: " . $insert_car_sql . "<br>" . $conn->error;
        }
    } else {
        echo "Не все данные заполнены.";
    }
} else {
    header("Location: add.php");
}

$conn->close();

