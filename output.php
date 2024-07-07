<?php
include 'db.php';

$category = isset($_GET['category']) ? $_GET['category'] : 'all';

// SQL-запрос для извлечения данных из таблицы
if ($category === 'all') {
    $sql = "SELECT car.id, car.model, car.price, car.engine_volume, car.year_of_manufacture, car.number_of_seats, car.drive, 
                   car.engine_power, car.fuel_type, car.steering_side, car.fuel_consumption, car.transmission, car.category, 
                   car.preview_image, car_images.image_path
            FROM car
            LEFT JOIN car_images ON car.id = car_images.car_id";
} else {
    $sql = "SELECT car.id, car.model, car.price, car.engine_volume, car.year_of_manufacture, car.number_of_seats, car.drive, 
                   car.engine_power, car.fuel_type, car.steering_side, car.fuel_consumption, car.transmission, car.category, 
                   car.preview_image, car_images.image_path
            FROM car
            LEFT JOIN car_images ON car.id = car_images.car_id
            WHERE car.category = '$category'";
}

$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $carId = $row['id'];
        if (!isset($data[$carId])) {
            $data[$carId] = [
                'id' => $row['id'],
                'model' => $row['model'],
                'price' => $row['price'],
                'engine_volume' => $row['engine_volume'],
                'year_of_manufacture' => $row['year_of_manufacture'],
                'number_of_seats' => $row['number_of_seats'],
                'drive' => $row['drive'],
                'engine_power' => $row['engine_power'],
                'fuel_type' => $row['fuel_type'],
                'steering_side' => $row['steering_side'],
                'fuel_consumption' => $row['fuel_consumption'],
                'transmission' => $row['transmission'],
                'category' => $row['category'],
                'preview_image' => $row['preview_image'],
                'images' => []
            ];
        }
        if ($row['image_path']) {
            $data[$carId]['images'][] = $row['image_path'];
        }
    }
}
$sql = "SELECT car.category, COUNT(car.id) AS category_count
        FROM car
        GROUP BY car.category";
$result = $conn->query($sql);

$categoryCounts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categoryCounts[$row['category']] = $row['category_count'];
    }
}
// Подсчитываем количество записей и среднее значение price
$sql = "SELECT AVG(price) AS average_price FROM car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $averagePrice = $row['average_price'];
} else {
    $averagePrice = 0;
}
$sql = "SELECT COUNT(*) AS total_cars FROM car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalCars = $row['total_cars'];
} else {
    $totalCars = 0;
}

$conn->close();
return $data;
