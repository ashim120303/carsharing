<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<?php include 'output.php';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php foreach ($data as $car): ?>
    <div id="car-modal-<?= htmlspecialchars($car['id']) ?>" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-car">
                <img src="<?= htmlspecialchars($car['preview_image']) ?>" alt="" class="modal-img">
                <h2 class="modal-title"><?= htmlspecialchars($car['model']) ?></h2>
                <div class="modal-description">
                    <div class="modal-description-item">
                        <b>Цена:</b> <?= htmlspecialchars($car['price']) ?>$
                    </div>
                    <div class="modal-description-item">
                        <b>Объём:</b> <?= htmlspecialchars($car['engine_volume']) ?>л
                    </div>
                    <div class="modal-description-item">
                        <b>Год выпуска:</b> <?= htmlspecialchars($car['year_of_manufacture']) ?>
                    </div>
                    <div class="modal-description-item">
                        <b>Колличество мест:</b> <?= htmlspecialchars($car['number_of_seats']) ?>
                    </div>
                    <div class="modal-description-item">
                        <b>Привод:</b> <?= htmlspecialchars($car['drive']) ?>
                    </div>
                    <div class="modal-description-item">
                        <b>Мощность двигателя:</b> <?= htmlspecialchars($car['engine_power']) ?> лс
                    </div>
                    <div class="modal-description-item">
                        <b>Топливо:</b> <?= htmlspecialchars($car['fuel_type']) ?>
                    </div>
                    <div class="modal-description-item">
                        <b>Коробка передач:</b> <?= htmlspecialchars($car['transmission']) ?>
                    </div>
                    <div class="modal-description-item">
                        <b>Категория авто:</b> <?= htmlspecialchars($car['category']) ?>
                    </div>
                </div>
                <div class="modal-img-block">
                    <?php foreach ($car['images'] as $image): ?>
                        <img src="<?= htmlspecialchars($image) ?>" alt="" class="modal-imgs">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<section class="auto-grid">
    <div class="auto-grid__container">
        <?php foreach ($data as $car): ?>
            <div id="modal-trigger-<?= htmlspecialchars($car['id']) ?>" class="auto-grid__item">
                <img src="<?= htmlspecialchars($car['preview_image']) ?>" alt="">
                <h1 class="auto-grid__title"><?= htmlspecialchars($car['model']) ?></h1>
                <p class="auto-grid__info"><?= htmlspecialchars($car['transmission']) ?> <?= htmlspecialchars($car['engine_volume']) ?></p>
                <div class="auto-grid__price-wrapper">
                    <div class="auto-grid__price"><?= htmlspecialchars($car['price']) ?>$</div>
                    <div class="auto-grid__price"><?= htmlspecialchars($car['price']) ?>$ в день</div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script src="js/app.js"></script>
</body>
</html>