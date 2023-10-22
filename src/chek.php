<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="./css/main.css">
    <style>
      .image-container {
        display: inline-block;
        text-align: center;
        vertical-align: top;
        margin-right: 45px; /* Отступ между изображениями (можно изменить) */
		margin-left: 45px;
      }
      .image {
        width: auto; /* Размер изображения */
        height: 700px;
        margin: 10px; /* Отступ внутри контейнера */
      }
      h2 {
        text-align: center; /* Выравниваем текст по центру */
      }
      .button-container {
        text-align: center; /* Выравниваем кнопки по центру */
        margin-top: 20px; /* Отступ между изображениями и кнопками */
      }
      .button1 {
        margin: 230px; /* Отступ между кнопками */
      }
    </style>
  </head>
  <body>
    <?php
    include './share/navbar.php';
    ?>

    <h2>Скачайте наши Чек-листы для здорвья совершенно бесплатно!</h2>

    <div class="image-container">
      <img class="image" src="./share/365_beauty.jpg" alt="Изображение 1">
    </div>

    <div class="image-container">
      <img class="image" src="./share/Health.jpg" alt="Изображение 2">   
    </div>
    
    <div class="image-container">
      <img class="image" src="./share/Mental.jpg" alt="Изображение 3">
    </div>

    <div class="button-container">
      <a class="button button1 blue-button" href="./share/beauty.pdf" download>Скачать</a>
      <a class="button button1 blue-button" href="./share/Health.pdf" download>Скачать</a>
      <a class="button button1 blue-button" href="./share/Mental.pdf" download>Скачать</a>
    </div>
  </body>
</html>
