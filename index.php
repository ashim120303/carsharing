<?php
include 'output.php';

// Подсчитываем количество записей и среднее значение price
$count = count($data); // количество записей
$averagePrice = 0;
if ($count > 0) {
    $totalPrice = array_sum(array_column($data, 'price'));
    $averagePrice = $totalPrice / $count;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <div class="wrapper">
      <header class="header">
        <div class="header__container">
            <a href="#" class="heaser__logo">
              <img src="img/hero/logo.svg" alt="localrent.com" />
            </a>
          <div class="header__right-block">
            <a href="#" class="header__link">О компании</a>
            <div id="auth-modal-btn" class="header__link">Войти</div>
            <div class="dropdown">
              <button class="dropdown__button">
                <img src="img/header/ru.svg" alt="Russian, change language" />
              </button>
              <button class="dropdown__button">
                <img src="img/header/en.svg" alt="Russian, change language" />
              </button>
            </div>
          </div>
        </div>
      </header>

        <div id="auth-modal" class="login-modal">
            <div class="login-modal-content">
                <span class="login-close">&times;</span>
                <form class="login-form" action="auth.php" method="POST">
                    <input class="login-input" type="text" name="username" placeholder="Username" required>
                    <input class="login-input" type="password" name="password" placeholder="Password" required>
                    <button class="login-btn" type="submit">Войти</button>
                </form>
            </div>
        </div>
      <main class="main">
        <section class="hero">
          <div class="hero__content">
            <div class="hero__container">
              
              <h1 class="hero__main-title">Аренда авто в Турции</h1>
                <p class="hero__text">
                    Всего <?= $count ?> автомобиля со средним чеком <?= number_format($averagePrice, 2) ?>$ в сутки
                </p>
            </div>
            <a href="#auto" class="hero__anchor">
              <img src="img/hero/arrow-down.svg" alt="arrow down" />
            </a>
          </div>
          <div class="hero__banner">
            <div class="hero__container">
              <h2 class="hero__title">
                Мы работаем!
                <br />
                Свяжитесь с нами, что бы узнать подробнее.
              </h2>
              <div class="hero__link">
                <a href="https://wa.me/+905545935736" class="hero__link" target="_blank" title="Whatsapp">
                  <img src="img/icons/whatsapp.svg" alt="">
                </a>
                <a href="https://t.me/+905545935736" class="hero__link" target="_blank" title="Telegram">
                  <img src="img/icons/telegram.svg" alt="">
                </a>
                <a href="https://www.instagram.com/rent.a.car.kemer.07" class="hero__link" target="_blank" title="Instagram">
                  <img src="img/icons/instagram.svg" alt="">
                </a>
              </div>
            </div>
          </div>
        </section>
        <section id="auto" class="search-car">
          <div class="search-car__container">
            <div class="search-car__item">Все <?= $count ?></div>
            <div class="search-car__item">Компактные <?= isset($categoryCounts['Компактные']) ? $categoryCounts['Компактные'] : 0 ?></div>
            <div class="search-car__item">Средний класс <?= isset($categoryCounts['Средний класс']) ? $categoryCounts['Средний класс'] : 0 ?></div>
            <div class="search-car__item">Кроссоверы <?= isset($categoryCounts['Кроссоверы']) ? $categoryCounts['Кроссоверы'] : 0 ?></div>
            <div class="search-car__item">Люкс <?= isset($categoryCounts['Люкс']) ? $categoryCounts['Люкс'] : 0 ?></div>
            <div class="search-car__item">Кабриолеты <?= isset($categoryCounts['Кабриолеты']) ? $categoryCounts['Кабриолеты'] : 0 ?></div>
            <div class="search-car__item">Минивэны <?= isset($categoryCounts['Минивэны']) ? $categoryCounts['Минивэны'] : 0 ?></div>
            <div class="search-car__item">Мото <?= isset($categoryCounts['Мото']) ? $categoryCounts['Мото'] : 0 ?></div>
          </div>
        </section>
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
          <section class="show">
          <div class="show__container">
            <div class="show__text">
              Показано 24 из 362 автомобиля
            </div>
            <div class="show__scale"></div>
            <button class="show__button">Показать ещё</button>
            <a href="#" class="show__return">Вернуться наверх</a>
          </div>
        </section>
      </main>
      <footer class="footer">
        <div class="footer__top">
          <div class="footer__container">
            <div class="footer__column">
              <ul class="footer__list">
                <li>
                  <a href="#" class="footer__link">Предложение прокатчикам</a>
                </li>
                <li>
                  <a href="#" class="footer__link">Партнёрская программа</a>
                </li>
                <li>
                  <a href="#" class="footer__link">Подробнее о нас</a>
                </li>
                <li>
                  <a href="#" class="footer__link">Контакты</a>
                </li>
              </ul>
              <div class="footer__social social">
                <p class="social__title">Мы в социальных сетях —</p>
                <ul class="social__list">
                  <li class="social__item">
                    <a href="#" class="social__link" title="VK">
                      <svg
                        fill="currentColor"
                        viewBox="0 0 22 22"
                        width="22"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          clip-rule="evenodd"
                          d="M4.08203 0C1.83984 0 0 1.83984 0 4.08203V17.918C0 20.1602 1.83984 22 4.08203 22H17.918C20.1602 22 22 20.1602 22 17.918V4.08203C22 1.83984 20.1602 0 17.918 0H4.08203ZM4.08203 2H17.918C19.0781 2 20 2.92188 20 4.08203V17.918C20 19.0781 19.0781 20 17.918 20H4.08203C2.92188 20 2 19.0781 2 17.918V4.08203C2 2.92188 2.92188 2 4.08203 2ZM9.00781 7.40234C9.35938 7.23047 9.98438 7.22266 10.7188 7.23047C11.2891 7.23438 11.4531 7.26953 11.6758 7.32422C12.1954 7.45038 12.1792 7.84912 12.1439 8.71408C12.1334 8.97391 12.1211 9.27579 12.1211 9.625C12.1211 9.70212 12.1189 9.78436 12.1166 9.86905C12.1047 10.312 12.0909 10.8215 12.3828 11.0117C12.5312 11.1094 12.9023 11.0234 13.8164 9.46875C14.25 8.73047 14.5781 7.86328 14.5781 7.86328C14.5781 7.86328 14.6484 7.70703 14.7578 7.64062C14.8711 7.57422 15.0234 7.59375 15.0234 7.59375L17.082 7.58203C17.082 7.58203 17.6992 7.50781 17.8008 7.78516C17.9062 8.08203 17.5703 8.76562 16.7305 9.88672C15.931 10.9505 15.5428 11.3417 15.5795 11.6879C15.6063 11.9405 15.8593 12.169 16.3438 12.6172C17.3577 13.5587 17.6264 14.0538 17.6882 14.1677C17.6931 14.1766 17.6967 14.1832 17.6992 14.1875C18.1523 14.9414 17.1992 15 17.1992 15L15.3711 15.0273C15.3711 15.0273 14.9766 15.1055 14.457 14.75C14.1862 14.5642 13.922 14.2607 13.6704 13.9717C13.2872 13.5313 12.9331 13.1244 12.6289 13.2188C12.1211 13.3828 12.1367 14.4805 12.1367 14.4805C12.1367 14.4805 12.1406 14.7148 12.0234 14.8398C11.8984 14.9727 11.6523 15 11.6523 15H10.832C10.832 15 9.02734 15.1094 7.4375 13.4531C5.70312 11.6484 4.17188 8.06641 4.17188 8.06641C4.17188 8.06641 4.08203 7.83594 4.17969 7.71875C4.28516 7.59375 4.57812 7.58203 4.57812 7.58203L6.53516 7.57031C6.53516 7.57031 6.71875 7.60156 6.85156 7.69922C6.96094 7.77734 7.01953 7.92578 7.01953 7.92578C7.01953 7.92578 7.33594 8.72656 7.75391 9.45312C8.57422 10.8633 8.95312 11.1719 9.23047 11.0195C9.63281 10.7969 9.51562 9.02344 9.51562 9.02344C9.51562 9.02344 9.52344 8.37891 9.3125 8.09375C9.14844 7.87109 8.83984 7.80469 8.70312 7.78516C8.59375 7.77344 8.77344 7.51562 9.00781 7.40234Z"
                        ></path>
                      </svg>
                    </a>
                  </li>
                  <li class="social__item">
                    <a href="https://www.instagram.com/rent.a.car.kemer.07" class="social__link" title="Instagram" target="_blank">
                      <svg
                        fill="currentColor"
                        viewBox="0 0 22 22"
                        width="22"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          clip-rule="evenodd"
                          d="M6.46875 0C2.91797 0 0 2.91406 0 6.46875V15.5312C0 19.082 2.91406 22 6.46875 22H15.5312C19.082 22 22 19.0859 22 15.5312V6.46875C22 2.91797 19.0859 0 15.5312 0H6.46875ZM6.46875 2H15.5312C18.0039 2 20 3.99609 20 6.46875V15.5312C20 18.0039 18.0039 20 15.5312 20H6.46875C3.99609 20 2 18.0039 2 15.5312V6.46875C2 3.99609 3.99609 2 6.46875 2ZM16 5.09375C16 4.58984 16.4023 4.1875 16.9062 4.1875C17.4102 4.1875 17.8125 4.58984 17.8125 5.09375C17.8125 5.59766 17.4102 6 16.9062 6C16.4023 6 16 5.59766 16 5.09375ZM11 5C7.69922 5 5 7.69922 5 11C5 14.3008 7.69922 17 11 17C14.3008 17 17 14.3008 17 11C17 7.69922 14.3008 5 11 5ZM15 11C15 8.77734 13.2227 7 11 7C8.77734 7 7 8.77734 7 11C7 13.2227 8.77734 15 11 15C13.2227 15 15 13.2227 15 11Z"
                          fill-rule="evenodd"
                        ></path>
                      </svg>
                    </a>
                  </li>
                  <li class="social__item">
                    <a href="#" class="social__link" title="YouTube">
                      <svg
                        fill="currentColor"
                        viewBox="0 0 26 20"
                        width="26"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M13 0.625C9.46973 0.625 6.34961 0.991211 4.44531 1.26953C2.87061 1.50024 1.59985 2.68677 1.31055 4.25781C1.06519 5.59448 0.8125 7.55005 0.8125 10C0.8125 12.45 1.06519 14.4055 1.31055 15.7422C1.59985 17.3132 2.87061 18.5034 4.44531 18.7305C6.35693 19.0088 9.48804 19.375 13 19.375C16.512 19.375 19.6431 19.0088 21.5547 18.7305C23.1294 18.5034 24.4001 17.3132 24.6895 15.7422C24.9348 14.4019 25.1875 12.4426 25.1875 10C25.1875 7.55737 24.9385 5.59815 24.6895 4.25781C24.4001 2.68677 23.1294 1.50024 21.5547 1.26953C19.6504 0.991211 16.5303 0.625 13 0.625ZM13 2.5C16.4058 2.5 19.449 2.8479 21.291 3.11523C22.082 3.23242 22.7009 3.82935 22.8438 4.60938C23.0708 5.84717 23.3125 7.68188 23.3125 10C23.3125 12.3145 23.0708 14.1528 22.8438 15.3906C22.7009 16.1707 22.0857 16.7712 21.291 16.8848C19.4417 17.1521 16.3838 17.5 13 17.5C9.61621 17.5 6.55469 17.1521 4.70898 16.8848C3.91797 16.7712 3.29907 16.1707 3.15625 15.3906C2.9292 14.1528 2.6875 12.3218 2.6875 10C2.6875 7.67456 2.9292 5.84717 3.15625 4.60938C3.29907 3.82935 3.91431 3.23242 4.70898 3.11523C6.54736 2.8479 9.59424 2.5 13 2.5ZM10.1875 4.63867V15.3613L11.5938 14.5703L18.1562 10.8203L19.5625 10L18.1562 9.17969L11.5938 5.42969L10.1875 4.63867ZM12.0625 7.86133L15.7832 10L12.0625 12.1387V7.86133Z"
                        ></path>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="footer__column">
              <div class="social">
                <p class="social__title">Остались вопросы? Напишите нам</p>
                <a href="#" class="social__main-link">hello@localrent.com</a>
                <ul class="social__list">
                  <li class="social__item">
                    <a href="#" class="social__link" title="Viber">
                      <svg
                        fill="currentColor"
                        viewBox="0 0 22 24"
                        width="22"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M21.362 5.32C20.953 3.861 20.144 2.706 18.957 1.889C17.459 0.857002 15.736 0.491002 14.248 0.269002C12.189 -0.0379978 10.324 -0.0809979 8.548 0.136002C6.882 0.340002 5.628 0.666002 4.483 1.192C2.24 2.222 0.894001 3.89 0.483001 6.148C0.283001 7.244 0.149002 8.235 0.0710015 9.18C-0.108998 11.365 0.0540016 13.299 0.570002 15.091C1.072 16.838 1.95 18.087 3.254 18.907C3.587 19.116 4.011 19.267 4.423 19.413C4.629 19.486 4.827 19.558 5 19.634V23.164C5 23.626 5.374 24 5.836 24C6.054 24 6.263 23.915 6.419 23.763L9.676 20.595C9.818 20.433 9.818 20.433 9.964 20.43C11.077 20.408 12.214 20.365 13.344 20.304C14.713 20.229 16.299 20.097 17.793 19.474C19.16 18.903 20.158 17.997 20.757 16.782C21.382 15.514 21.754 14.14 21.893 12.583C22.137 9.845 21.963 7.469 21.362 5.32ZM15.691 15.74C15.364 16.275 14.874 16.645 14.298 16.885C13.877 17.061 13.447 17.024 13.032 16.848C9.548 15.374 6.817 13.05 5.011 9.711C4.639 9.023 4.38 8.274 4.083 7.547C4.022 7.397 4.027 7.222 4 7.059C4.026 5.884 4.927 5.223 5.837 5.023C6.185 4.946 6.493 5.069 6.751 5.316C7.465 5.998 8.03 6.788 8.455 7.674C8.641 8.063 8.557 8.407 8.24 8.696C8.175 8.756 8.106 8.812 8.035 8.865C7.312 9.409 7.206 9.82 7.591 10.639C8.247 12.032 9.336 12.967 10.745 13.547C11.116 13.7 11.466 13.624 11.75 13.323C11.788 13.283 11.831 13.244 11.859 13.198C12.415 12.271 13.22 12.363 13.964 12.892C14.453 13.239 14.927 13.605 15.411 13.959C16.145 14.5 16.139 15.008 15.691 15.74ZM11.511 6.143C11.324 6.143 11.136 6.158 10.952 6.189C10.64 6.242 10.346 6.031 10.294 5.719C10.242 5.408 10.452 5.113 10.764 5.061C11.009 5.021 11.261 5 11.511 5C13.986 5 16 7.014 16 9.489C16 9.74 15.979 9.992 15.938 10.237C15.891 10.516 15.649 10.714 15.375 10.714C15.344 10.714 15.312 10.712 15.28 10.706C14.969 10.653 14.759 10.359 14.811 10.048C14.842 9.866 14.857 9.678 14.857 9.49C14.857 7.644 13.356 6.143 11.511 6.143ZM14 9.857C14 10.172 13.744 10.428 13.429 10.428C13.114 10.428 12.858 10.172 12.858 9.857C12.858 8.912 12.089 8.143 11.144 8.143C10.829 8.143 10.573 7.887 10.573 7.572C10.573 7.257 10.829 7.001 11.144 7.001C12.718 7 14 8.282 14 9.857ZM17.846 10.554C17.786 10.82 17.551 10.999 17.289 10.999C17.247 10.999 17.204 10.994 17.162 10.985C16.854 10.915 16.661 10.609 16.731 10.302C16.814 9.937 16.856 9.56 16.856 9.182C16.856 6.404 14.596 4.143 11.817 4.143C11.438 4.143 11.062 4.185 10.697 4.268C10.391 4.339 10.083 4.145 10.014 3.837C9.944 3.529 10.137 3.223 10.445 3.154C10.893 3.051 11.355 3 11.819 3C15.227 3 18 5.773 18 9.181C18 9.645 17.948 10.107 17.846 10.554Z"
                        ></path>
                      </svg>
                    </a>
                  </li>
                  <li class="social__item">
                    <a href="#" class="social__link" title="VK">
                      <svg
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        width="24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          clip-rule="evenodd"
                          d="M12 24C18.6274 24 24 18.6274 24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 18.6274 5.37258 24 12 24ZM18.8862 15.1144C18.8214 14.9956 18.5452 14.4897 17.5054 13.5245C17.01 13.0649 16.7515 12.8306 16.7242 12.5718C16.6868 12.2168 17.0844 11.816 17.9026 10.7253C18.7639 9.57715 19.1091 8.87657 19.0011 8.57633C18.8986 8.29027 18.2651 8.36592 18.2651 8.36592L16.1562 8.37932C16.1562 8.37932 15.9994 8.35804 15.8828 8.42739C15.7701 8.49516 15.6968 8.65356 15.6968 8.65356C15.6968 8.65356 15.3635 9.54169 14.9182 10.2974C13.9804 11.8916 13.6045 11.976 13.4509 11.8767C13.1516 11.6831 13.1658 11.1628 13.1782 10.708C13.1806 10.6203 13.1829 10.535 13.1829 10.455C13.1829 10.0994 13.1954 9.79139 13.2061 9.52601C13.242 8.63894 13.2586 8.22755 12.7267 8.09956C12.4981 8.0444 12.3287 8.00736 11.7432 8.00184C10.9906 7.99396 10.3539 8.00421 9.99372 8.17915C9.75336 8.29736 9.56817 8.55899 9.68165 8.57396C9.82113 8.59209 10.1364 8.65907 10.3034 8.88682C10.5201 9.18076 10.5123 9.84114 10.5123 9.84114C10.5123 9.84114 10.6368 11.6592 10.2222 11.8853C9.93855 12.0406 9.54847 11.7238 8.71156 10.2777C8.28287 9.53696 7.95898 8.71739 7.95898 8.71739C7.95898 8.71739 7.89672 8.56293 7.78482 8.48176C7.64928 8.38247 7.46093 8.35016 7.46093 8.35016L5.45772 8.3604C5.45772 8.3604 5.15669 8.36356 5.04557 8.49437C4.94785 8.611 5.03769 8.84111 5.03769 8.84111C5.03769 8.84111 6.6059 12.4898 8.38216 14.3393C10.0111 16.0352 11.8606 15.8823 11.8606 15.8823H12.6991C12.6991 15.8823 12.952 15.8957 13.0821 15.7586C13.2003 15.6301 13.1963 15.4315 13.1963 15.4315C13.1963 15.4315 13.1806 14.307 13.7023 14.1415C14.0137 14.0429 14.3778 14.4604 14.7718 14.9121C15.0298 15.2078 15.3006 15.5183 15.5778 15.7081C16.1074 16.0722 16.5109 15.9926 16.5109 15.9926L18.3833 15.9666C18.3833 15.9666 19.3628 15.9059 18.8979 15.1352C18.8951 15.1307 18.8913 15.1237 18.8862 15.1144Z"
                          fill-rule="evenodd"
                        ></path>
                      </svg>
                    </a>
                  </li>
                  <li class="social__item">
                    <a href="https://t.me/+905545935736" class="social__link" title="Telegram" target="_blank">
                      <svg
                        fill="currentColor"
                        viewBox="0 0 26 25"
                        width="26"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          clip-rule="evenodd"
                          d="M23.1367 1.21875C23.418 1.10938 23.7344 1.01172 24.0703 0.996094C24.4062 0.980469 24.7695 1.04688 25.1367 1.26562C25.5 1.48047 25.8008 1.88281 25.918 2.3125C26.0352 2.74219 26.0078 3.18359 25.9023 3.65625L22.168 22.7852L22.1328 22.875C22.1328 22.875 21.9219 23.4336 21.3789 23.8711C20.8398 24.3047 19.8203 24.5508 18.8125 24.1094L18.7031 24.0625L13.8711 20.3555L10.9883 22.9805L10.9531 23.0078C10.9531 23.0078 10.332 23.4883 9.55859 23.2539C9.53162 23.2498 9.51123 23.2467 9.49231 23.243C9.47546 23.2397 9.45972 23.236 9.44141 23.2305C9.43628 23.2288 9.43115 23.2256 9.42578 23.2223C9.41882 23.2179 9.41125 23.2132 9.40234 23.2109L9.41223 23.2132C9.40491 23.2106 9.39771 23.2074 9.39062 23.2031C9.32812 23.1797 9.26562 23.1523 9.20703 23.1172C9.05859 23.0234 8.93359 22.9062 8.82812 22.7656C8.60938 22.4922 8.43359 22.1328 8.25391 21.5586C7.94922 20.5977 6.67969 16.4258 6.46094 15.7227L1.57812 14.0781H1.57031C1.57031 14.0781 1.24609 13.9648 0.90625 13.7227C0.570312 13.4844 0.101562 13.0508 0.0117188 12.3281C-0.0429688 11.9023 0.105469 11.4883 0.289062 11.2188C0.472656 10.9492 0.683594 10.7773 0.875 10.6523C1.1731 10.4474 1.46118 10.3313 1.56689 10.2923C1.7478 10.216 3.13965 9.62927 5.1366 8.78772C7.0603 7.97705 9.54553 6.92996 12.0508 5.875L15.7554 4.31479L19.4336 2.76562C21.4922 1.90234 22.8477 1.33203 23.1328 1.21875H23.1367ZM23.9492 3.22266C23.9766 3.10156 23.9648 3.10938 23.9688 3.04688C23.9102 3.04688 23.9492 3.04688 23.8672 3.07812C23.7812 3.11328 22.2617 3.74609 20.207 4.60938C18.9163 5.15414 17.382 5.80069 15.7618 6.48309L12.8281 7.71875C7.53125 9.94922 2.32031 12.1445 2.32031 12.1445L2.28906 12.1562L2.25781 12.1719C2.25781 12.1719 2.23047 12.1836 2.22656 12.1836C2.22852 12.1836 2.23145 12.1846 2.23438 12.1855C2.2373 12.1865 2.24023 12.1875 2.24219 12.1875V12.1914L8.07812 14.1562L8.08203 14.1758L20.2578 6.63281C20.2578 6.63281 20.8867 6.3125 20.8594 6.76562C20.8594 6.76562 20.9922 6.84375 20.5938 7.21484C20.1953 7.58594 10.9375 16.2148 10.9375 16.2148L10.1875 21.0039L13.7578 17.75L19.668 22.2812C19.9922 22.4102 20.0547 22.3711 20.1328 22.3086C20.1992 22.2561 20.2281 22.2037 20.2448 22.1736L20.25 22.1641L23.9492 3.23438V3.22266Z"
                        ></path>
                      </svg>
                    </a>
                  </li>
                </ul>
                <p class="footer__text">
                  Мы на связи с 9 до 18 часов <br />
                  (GMT +03:00)
                </p>
              </div>
            </div>
            <div class="footer__column">
              <p class="footer__title">Бесплатный звонок по России</p>
              <a href="tel:+" class="footer__tel-link">8 800 350-15-14</a>
            </div>
          </div>
        </div>
        <div class="footer__bottom">
          <div class="footer__container">
            <p class="footer__copyright">2012—2025 © Renot Software OU</p>
            <ul class="footer__list footer__list--flex">
              <li>
                <img src="img/footer/visa.png" alt="VISA" />
              </li>
              <li>
                <img src="img/footer/visa-secure.jpg" alt="VISA" />
              </li>
              <li>
                <img src="img/footer/mastercard.png" alt="MasterCard" />
              </li>
              <li>
                <img src="img/footer/mastercard_idcheck.png" alt="MasterCard" />
              </li>
            </ul>
            <ul class="footer__list footer__list--flex">
              <li>
                <a href="#" class="footer__link">Политика конфиденциальности</a>
              </li>
              <li>
                <a href="#" class="footer__link">Условия аренды</a>
              </li>
              <li>
                <a href="#" class="footer__link">Карта сайта</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    <script src="js/app.js"></script>
  </body>
</html>
