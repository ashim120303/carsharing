<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
<div class="wrapper">
    <form action="" method="post" class="form" enctype="multipart/form-data">
        <p class="form__text">Модель авто</p>
        <input type="text" class="form__input" name="model" required>

        <p class="form__text">Цена</p>
        <input type="number" class="form__input" name="price" step="0.01" required>

        <p class="form__text">Объём</p>
        <input type="number" class="form__input" name="engine_volume" step="0.01" required>

        <p class="form__text">Год авто</p>
        <input type="number" class="form__input" name="year_of_manufacture" required>

        <p class="form__text">Колличество мест</p>
        <input type="number" class="form__input" name="number_of_seats" required>

        <p class="form__text">Привод</p>
        <div class="form__radio-block">
            <input type="radio" id="Передний" class="form__input" name="drive" value="Передний" required>
            <label for="Передний">Передний</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Задний" class="form__input" name="drive" value="Задний" required>
            <label for="Задний">Задний</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Полный" class="form__input" name="drive" value="Полный" required>
            <label for="Полный">Полный</label>
        </div>

        <p class="form__text">Мощность двигателя</p>
        <input type="number" class="form__input" name="engine_power" required>

        <p class="form__text">Топливо</p>
        <div class="form__radio-block">
            <input type="radio" id="Дизель" class="form__input" name="fuel_type" value="Дизель" required>
            <label for="Дизель">Дизель</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Бензин" class="form__input" name="fuel_type" value="Бензин" required>
            <label for="Бензин">Бензин</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Электро" class="form__input" name="fuel_type" value="Электро" required>
            <label for="Электро">Электро</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Гибрид" class="form__input" name="fuel_type" value="Гибрид" required>
            <label for="Гибрид">Гибрид</label>
        </div>

        <p class="form__text">Сторона руля</p>
        <div class="form__radio-block">
            <input type="radio" id="Лево" class="form__input" name="steering_side" value="Лево" required>
            <label for="Лево">Лево</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Право" class="form__input" name="steering_side" value="Право" required>
            <label for="Право">Право</label>
        </div>

        <p class="form__text">Расход топлива</p>
        <input type="number" class="form__input" name="fuel_consumption" step="0.01" required>

        <p class="form__text">Коробка</p>
        <div class="form__radio-block">
            <input type="radio" id="Механика" class="form__input" name="transmission" value="Механика" required>
            <label for="Механика">Механика</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Автомат" class="form__input" name="transmission" value="Автомат" required>
            <label for="Автомат">Автомат</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Робот" class="form__input" name="transmission" value="Робот" required>
            <label for="Робот">Робот</label>
        </div>

        <p class="form__text">Категория авто</p>
        <div class="form__radio-block">
            <input type="radio" id="Компактные" class="form__input" name="category" value="Компактные" required>
            <label for="Компактные">Компактные</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Средний класс" class="form__input" name="category" value="Средний класс" required>
            <label for="Средний класс">Средний класс</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Кроссоверы" class="form__input" name="category" value="Кроссоверы" required>
            <label for="Кроссоверы">Кроссоверы</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Люкс" class="form__input" name="category" value="Люкс" required>
            <label for="Люкс">Люкс</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Кабриолеты" class="form__input" name="category" value="Кабриолеты" required>
            <label for="Кабриолеты">Кабриолеты</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Минивэны" class="form__input" name="category" value="Минивэны" required>
            <label for="Минивэны">Минивэны</label>
        </div>
        <div class="form__radio-block">
            <input type="radio" id="Мото" class="form__input" name="category" value="Мото" required>
            <label for="Мото">Мото</label>
        </div>

        <p class="form__text">Превью записи</p>
        <div class="preview-container">
            <img id="preview" class="img-preview" style="display:none;">
            <span id="removePreview" class="remove-preview" style="display:none;">&times;</span>
        </div>
        <input type="file" class="form__input" name="preview_image" id="photoInput" required>

        <!-- Дополнительные изображения -->
        <p class="form__text">Изображения</p>
        <div id="images"></div>
        <input type="file" class="form__input" name="image_path[]" id="images-input" onChange="myFunc(this)" multiple required>
        <div id="image-preview"></div>

        <button type="submit" class="form__button btn" name="edit">Добавить</button>
    </form>

</div>

<script>
    // Preview
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
        document.getElementById('photoInput').value = null; // Очистка input файла
    };

    // Multiple preview
    function myFunc(input) {
        var files = input.files || input.currentTarget.files;
        var reader = [];
        var imagesContainer = document.getElementById('images');
        imagesContainer.innerHTML = '';  // Clear previous images

        for (var i = 0; i < files.length; i++) {
            if (files.hasOwnProperty(i)) {
                reader[i] = new FileReader();
                reader[i].readAsDataURL(files[i]);

                var imageWrapper = document.createElement('div');
                imageWrapper.classList.add('image-wrapper');
                imageWrapper.id = 'file' + i + '-wrapper';

                var imageElement = document.createElement('img');
                imageElement.id = 'file' + i;
                imageWrapper.appendChild(imageElement);

                var closeButton = document.createElement('span');
                closeButton.innerHTML = '&times;';
                closeButton.classList.add('close-button');
                closeButton.onclick = (function(index) {
                    return function() {
                        removeImage(index);
                    };
                })(i);
                imageWrapper.appendChild(closeButton);

                imagesContainer.appendChild(imageWrapper);

                (function (imgElement) {
                    reader[i].onload = function (e) {
                        imgElement.src = e.target.result;
                    };
                })(imageElement);
            }
        }
    }

    function removeImage(index) {
        var imageWrapper = document.getElementById('file' + index + '-wrapper');
        imageWrapper.remove();

        var inputElement = document.getElementById('images-input');
        var dt = new DataTransfer();

        for (var i = 0; i < inputElement.files.length; i++) {
            if (i !== index) {
                dt.items.add(inputElement.files[i]);
            }
        }
        inputElement.files = dt.files;
    }

</script>
</body>
</html>
