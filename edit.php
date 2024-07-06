<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: list.php");
    exit();
}

$carId = $_GET['id'];

$sql = "SELECT car.id, car.model, car.price, car.engine_volume, car.year_of_manufacture, car.number_of_seats, car.drive, 
               car.engine_power, car.fuel_type, car.steering_side, car.fuel_consumption, car.transmission, car.category, 
               car.preview_image, car_images.image_path
        FROM car
        LEFT JOIN car_images ON car.id = car_images.car_id
        WHERE car.id = $carId";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $model = $row['model'];
    $price = $row['price'];
    $engine_volume = $row['engine_volume'];
    $year_of_manufacture = $row['year_of_manufacture'];
    $number_of_seats = $row['number_of_seats'];
    $drive = $row['drive'];
    $engine_power = $row['engine_power'];
    $fuel_type = $row['fuel_type'];
    $steering_side = $row['steering_side'];
    $fuel_consumption = $row['fuel_consumption'];
    $transmission = $row['transmission'];
    $category = $row['category'];
    $preview_image = $row['preview_image'];
    $images = [];

    do {
        if ($row['image_path']) {
            $images[] = $row['image_path'];
        }
    } while ($row = $result->fetch_assoc());

} else {
    header("Location: list.php");
    exit();
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Car</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
<div class="wrapper">
    <form action="edit_process.php" method="post" class="form" enctype="multipart/form-data">
        <input type="hidden" name="car_id" value="<?php echo $carId; ?>">
        <p class="form__text">Модель авто</p>
        <input type="text" class="form__input" name="model" value="<?php echo $model; ?>" required>

        <p class="form__text">Цена</p>
        <input type="number" class="form__input" name="price" value="<?php echo $price; ?>" step="0.01" required>

        <p class="form__text">Объём</p>
        <input type="number" class="form__input" name="engine_volume" value="<?php echo $engine_volume; ?>" step="0.01" required>

        <p class="form__text">Год авто</p>
        <input type="number" class="form__input" name="year_of_manufacture" value="<?php echo $year_of_manufacture; ?>" required>

        <p class="form__text">Количество мест</p>
        <input type="number" class="form__input" name="number_of_seats" value="<?php echo $number_of_seats; ?>" required>

        <p class="form__text">Привод</p>
        <div class="form__radio-block">
            <input type="radio" id="Передний" class="form__input" name="drive" value="Передний" <?php if ($drive === "Передний") echo "checked"; ?> required>
            <label for="Передний">Передний</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Задний" class="form__input" name="drive" value="Задний" <?php if ($drive === "Задний") echo "checked"; ?> required>
            <label for="Задний">Задний</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Полный" class="form__input" name="drive" value="Полный" <?php if ($drive === "Полный") echo "checked"; ?> required>
            <label for="Полный">Полный</label>
        </div>

        <p class="form__text">Мощность двигателя</p>
        <input type="number" class="form__input" name="engine_power" value="<?php echo $engine_power; ?>" required>

        <p class="form__text">Топливо</p>
        <div class="form__radio-block">
            <input type="radio" id="Дизель" class="form__input" name="fuel_type" value="Дизель" <?php if ($fuel_type === "Дизель") echo "checked"; ?> required>
            <label for="Дизель">Дизель</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Бензин" class="form__input" name="fuel_type" value="Бензин" <?php if ($fuel_type === "Бензин") echo "checked"; ?> required>
            <label for="Бензин">Бензин</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Электро" class="form__input" name="fuel_type" value="Электро" <?php if ($fuel_type === "Электро") echo "checked"; ?> required>
            <label for="Электро">Электро</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Гибрид" class="form__input" name="fuel_type" value="Гибрид" <?php if ($fuel_type === "Гибрид") echo "checked"; ?> required>
            <label for="Гибрид">Гибрид</label>
        </div>

        <p class="form__text">Сторона руля</p>
        <div class="form__radio-block">
            <input type="radio" id="Лево" class="form__input" name="steering_side" value="Лево" <?php if ($steering_side === "Лево") echo "checked"; ?> required>
            <label for="Лево">Лево</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Право" class="form__input" name="steering_side" value="Право" <?php if ($steering_side === "Право") echo "checked"; ?> required>
            <label for="Право">Право</label>
        </div>

        <p class="form__text">Расход топлива</p>
        <input type="number" class="form__input" name="fuel_consumption" value="<?php echo $fuel_consumption; ?>" step="0.01" required>

        <p class="form__text">Коробка</p>
        <div class="form__radio-block">
            <input type="radio" id="Механика" class="form__input" name="transmission" value="Механика" <?php if ($transmission === "Механика") echo "checked"; ?> required>
            <label for="Механика">Механика</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Автомат" class="form__input" name="transmission" value="Автомат" <?php if ($transmission === "Автомат") echo "checked"; ?> required>
            <label for="Автомат">Автомат</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Робот" class="form__input" name="transmission" value="Робот" <?php if ($transmission === "Робот") echo "checked"; ?> required>
            <label for="Робот">Робот</label>
        </div>

        <p class="form__text">Категория авто</p>
        <div class="form__radio-block">
            <input type="radio" id="Компактные" class="form__input" name="category" value="Компактные" <?php if ($category === "Компактные") echo "checked"; ?> required>
            <label for="Компактные">Компактные</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Средний класс" class="form__input" name="category" value="Средний класс" <?php if ($category === "Средний класс") echo "checked"; ?> required>
            <label for="Средний класс">Средний класс</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Кроссоверы" class="form__input" name="category" value="Кроссоверы" <?php if ($category === "Кроссоверы") echo "checked"; ?> required>
            <label for="Кроссоверы">Кроссоверы</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Люкс" class="form__input" name="category" value="Люкс" <?php if ($category === "Люкс") echo "checked"; ?> required>
            <label for="Люкс">Люкс</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Кабриолеты" class="form__input" name="category" value="Кабриолеты" <?php if ($category === "Кабриолеты") echo "checked"; ?> required>
            <label for="Кабриолеты">Кабриолеты</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Минивэны" class="form__input" name="category" value="Минивэны" <?php if ($category === "Минивэны") echo "checked"; ?> required>
            <label for="Минивэны">Минивэны</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Мото" class="form__input" name="category" value="Мото" <?php if ($category === "Мото") echo "checked"; ?> required>
            <label for="Мото">Мото</label>
        </div>

        <p class="form__text">Превью записи</p>
        <div class="preview-container">
            <img id="preview" class="img-preview" src="<?php echo !empty($preview_image) ? $preview_image : ''; ?>" <?php if (empty($preview_image)) echo 'style="display:none;"'; ?>>
            <span id="removePreview" class="remove-preview" <?php if (empty($preview_image)) echo 'style="display:none;"'; ?>>&times;</span>
        </div>
        <input type="file" class="form__input" name="new_preview_image" id="photoInput">
        <input type="hidden" name="existing_preview_image" value="<?php echo $preview_image; ?>">



        <!-- Дополнительные изображения -->
        <p class="form__text">Изображения</p>
        <div id="images">
            <?php foreach ($images as $index => $image): ?>
                <div class="image-wrapper">
                    <img src="<?php echo $image; ?>" class="img-preview" id="image-<?php echo $index; ?>">
                    <span class="close-button" onclick="removeImage(<?php echo $index; ?>)">&times;</span>
                    <input type="hidden" name="existing_images[]" value="<?php echo $image; ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <input type="file" class="form__input" name="new_images[]" id="images-input" multiple>

        <button type="submit" class="form__button btn" name="edit">Сохранить изменения</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var previewImage = document.getElementById('preview');
        var removePreviewButton = document.getElementById('removePreview');

        if (previewImage.src && previewImage.src !== window.location.href) {
            console.log("Preview image source: " + previewImage.src);
            previewImage.style.display = 'block';
            removePreviewButton.style.display = 'block';
        } else {
            console.log("No preview image found.");
            previewImage.style.display = 'none';
            removePreviewButton.style.display = 'none';
        }
    });

    document.getElementById('photoInput').onchange = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
            document.getElementById('removePreview').style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    document.getElementById('removePreview').onclick = function() {
        var preview = document.getElementById('preview');
        preview.src = '';
        preview.style.display = 'none';
        this.style.display = 'none';
        document.getElementById('photoInput').value = ''; // Очистка input файла
        document.getElementsByName('existing_preview_image')[0].value = ''; // Очистка hidden input
    };

    function removeImage(index) {
        var imageWrapper = document.getElementsByClassName('image-wrapper')[index];
        imageWrapper.remove();
        document.getElementsByName('existing_images[]')[index].remove();
    }

    document.getElementById('images-input').onchange = function(event) {
        var files = event.target.files;
        var imagesContainer = document.getElementById('images');
        imagesContainer.innerHTML = ''; // Очистка существующих изображений

        Array.from(files).forEach(function(file, index) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var div = document.createElement('div');
                div.classList.add('image-wrapper');
                div.innerHTML = `
                <img src="${e.target.result}" class="img-preview">
                <span class="close-button" onclick="removeNewImage(${index})">&times;</span>
            `;
                imagesContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    };

    function removeNewImage(index) {
        var imagesInput = document.getElementById('images-input');
        var dt = new DataTransfer();
        var files = Array.from(imagesInput.files);

        files.splice(index, 1);

        files.forEach(function(file) {
            dt.items.add(file);
        });

        imagesInput.files = dt.files;

        var imageWrappers = document.getElementsByClassName('image-wrapper');
        imageWrappers[index].remove();
    }

</script>
</body>
</html>
