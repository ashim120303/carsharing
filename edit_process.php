<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    // Получение данных из формы
    $carId = $_POST['car_id'];
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
    $existing_preview_image = $_POST['existing_preview_image'];

    // Обновление данных в базе данных
    $sql = "UPDATE car SET 
            model = '$model',
            price = '$price',
            engine_volume = '$engine_volume',
            year_of_manufacture = '$year_of_manufacture',
            number_of_seats = '$number_of_seats',
            drive = '$drive',
            engine_power = '$engine_power',
            fuel_type = '$fuel_type',
            steering_side = '$steering_side',
            fuel_consumption = '$fuel_consumption',
            transmission = '$transmission',
            category = '$category'
            WHERE id = $carId";

    if ($conn->query($sql) === TRUE) {
        // Обработка превью изображения
        if (!empty($_FILES['new_preview_image']['name'])) {
            $uploadDir = 'uploads/';
            $previewImageName = basename($_FILES['new_preview_image']['name']);
            $previewImagePath = $uploadDir . $previewImageName;
            if (move_uploaded_file($_FILES['new_preview_image']['tmp_name'], $previewImagePath)) {
                $sql = "UPDATE car SET preview_image = '$previewImagePath' WHERE id = $carId";
                $conn->query($sql);
            }
        } else if (empty($existing_preview_image)) {
            $sql = "UPDATE car SET preview_image = NULL WHERE id = $carId";
            $conn->query($sql);
        }

        // Обработка удаленных изображений
        if (isset($_POST['existing_images'])) {
            $existingImages = $_POST['existing_images'];
        } else {
            $existingImages = [];
        }

        $sql = "DELETE FROM car_images WHERE car_id = $carId";
        $conn->query($sql);

        foreach ($existingImages as $image) {
            $sql = "INSERT INTO car_images (car_id, image_path) VALUES ($carId, '$image')";
            $conn->query($sql);
        }

        // Обработка новых изображений
        if (!empty($_FILES['new_images']['name'][0])) {
            $uploadDir = 'uploads/';
            foreach ($_FILES['new_images']['tmp_name'] as $key => $tmpName) {
                $imageName = basename($_FILES['new_images']['name'][$key]);
                $imagePath = $uploadDir . $imageName;
                if (move_uploaded_file($tmpName, $imagePath)) {
                    $sql = "INSERT INTO car_images (car_id, image_path) VALUES ($carId, '$imagePath')";
                    $conn->query($sql);
                }
            }
        }

        // Успешное обновление, перенаправляем на страницу с подтверждением
        header("Location: admin.php");
        exit();
    } else {
        echo "Ошибка при обновлении записи: " . $conn->error;
    }
}

$conn->close();
