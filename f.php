<?php
require 'output.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .images {
            display: flex;
            flex-wrap: wrap;
        }
        .images img {
            margin: 5px;
            width: 100px;
        }
    </style>
</head>
<body>
<h1>Car Data</h1>
<?php if (count($data) > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Модель</th>
            <th>Цена</th>
            <th>Объем двигателя</th>
            <th>Год выпуска</th>
            <th>Количество мест</th>
            <th>Привод</th>
            <th>Мощность двигателя</th>
            <th>Тип топлива</th>
            <th>Сторона руля</th>
            <th>Расход топлива</th>
            <th>Трансмиссия</th>
            <th>Категория</th>
            <th>Изображение</th>
            <th>Дополнительные изображения</th>
        </tr>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= htmlspecialchars($row['price']) ?></td>
                <td><?= htmlspecialchars($row['engine_volume']) ?></td>
                <td><?= htmlspecialchars($row['year_of_manufacture']) ?></td>
                <td><?= htmlspecialchars($row['number_of_seats']) ?></td>
                <td><?= htmlspecialchars($row['drive']) ?></td>
                <td><?= htmlspecialchars($row['engine_power']) ?></td>
                <td><?= htmlspecialchars($row['fuel_type']) ?></td>
                <td><?= htmlspecialchars($row['steering_side']) ?></td>
                <td><?= htmlspecialchars($row['fuel_consumption']) ?></td>
                <td><?= htmlspecialchars($row['transmission']) ?></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <td><img src="<?= htmlspecialchars($row['preview_image']) ?>" alt="Preview Image" width="100"></td>
                <td>
                    <div class="images">
                        <?php foreach ($row['images'] as $image): ?>
                            <img src="<?= htmlspecialchars($image) ?>" alt="Additional Image">
                        <?php endforeach; ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Нет данных для отображения.</p>
<?php endif; ?>
</body>
</html>
