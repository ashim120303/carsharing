<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<?php
    include 'output.php';
    include 'delete-img.php'
?>
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
<div class="wrapper">
    <header class="header">
        <div class="header__container">
            <a href="#" class="heaser__logo">
                <img src="img/hero/logo.svg" alt="localrent.com" />
            </a>
            <div class="header__right-block">
                <a href="/" class="header__link">На главную</a>
                <a href="add.php" class="header__link">Добавить запись</a>
                <form action="logout.php" method="POST">
                    <button class="logout header__link" type="submit">Выйти</button>
                </form>
            </div>
        </div>
    </header>
    <main class="main" style="margin-top: 65px">
        <section id="auto" class="search-car">
            <div class="search-car__container">
                <div class="search-car__item">
                    <?php ?>
                    <a href="?category=all">
                        Все <?= $totalCars ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Компактные">
                    Компактные <?= isset($categoryCounts['Компактные']) ? $categoryCounts['Компактные'] : 0 ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Средний класс">
                    Средний класс <?= isset($categoryCounts['Средний класс']) ? $categoryCounts['Средний класс'] : 0 ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Кроссоверы">
                    Кроссоверы <?= isset($categoryCounts['Кроссоверы']) ? $categoryCounts['Кроссоверы'] : 0 ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Люкс">
                    Люкс <?= isset($categoryCounts['Люкс']) ? $categoryCounts['Люкс'] : 0 ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Кабриолеты">
                    Кабриолеты <?= isset($categoryCounts['Кабриолеты']) ? $categoryCounts['Кабриолеты'] : 0 ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Минивэны">
                    Минивэны <?= isset($categoryCounts['Минивэны']) ? $categoryCounts['Минивэны'] : 0 ?>
                    </a>
                </div>
                <div class="search-car__item">
                    <a href="?category=Мото">
                    Мото <?= isset($categoryCounts['Мото']) ? $categoryCounts['Мото'] : 0 ?>
                    </a>
                </div>
            </div>
        </section>
        <section class="auto-grid">
            <div class="auto-grid__container">
                <?php foreach ($data as $car): ?>
                    <div id="modal-trigger-<?= htmlspecialchars($car['id']) ?>" class="auto-grid__item admin-preview-img">
                        <div class="auto-grid__buttons">
                            <button class="auto-grid__button deleteBtn" data-car-id="<?= htmlspecialchars($car['id']) ?>">
                                <img src="img/icons/trash-red.svg" alt="Delete">
                            </button>
                            <a href="edit.php?id=<?= htmlspecialchars($car['id']) ?>" class="auto-grid__button">
                                <img src="img/icons/edit.svg" alt="Edit">
                            </a>
                        </div>
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
    </main>
</div>
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
<div id="modalDelete" class="modal-delete">
    <div class="modal-content-delete">
        <span class="close-delete">&times;</span>
        <p>Вы действительно хотите безвозвратно удалить запись?</p>
        <form action="delete.php" method="post" id="deleteForm">
            <input type="hidden" name="car_id" id="deleteCarId">
            <button type="submit">Удалить запись</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.deleteBtn');
        var modalDelete = document.getElementById('modalDelete');
        var closeDelete = document.querySelector('.close-delete');
        var deleteCarIdInput = document.getElementById('deleteCarId');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var carId = button.getAttribute('data-car-id');
                deleteCarIdInput.value = carId;
                modalDelete.style.display = 'block';
            });
        });

        closeDelete.addEventListener('click', function() {
            modalDelete.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == modalDelete) {
                modalDelete.style.display = 'none';
            }
        });
    });
</script>
<script src="js/app.js"></script>
</body>
</html>