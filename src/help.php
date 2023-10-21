<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <style>
        h1 {
            font-size: 36px;
			
        }

        .image-container {
            border: 2px solid #ccc;
            border-radius: 15px;
            padding: 10px;
            max-width: 80%;
            margin: 0 auto;
            display: flex;
            align-items: center; /* Выравниваем изображение и текст по вертикали */
        }

        .image-container img {
            max-width: 60%;
            height: auto;
        }

        .image-description {
            flex: 1;
            padding: 10px;
            border-left: 2px solid #ccc;
            text-align: center;
        }

        .image-description p {
            font-weight: bold; /* Делаем текст жирным */
            font-size: 20px; /* Увеличиваем размер текста */
            margin: 10px 0; /* Добавляем отступы перед и после текста */
			align-items: left;
        }
    </style>
</head>
<body>
    <div id="header">
        <?php include './share/navbar.php'; ?>
    </div>
    <h1>Хочу помочь</h1>
    <div class="image-container">
        <img src="./share/qr.jpg" alt="Оплата" style="width: 400px; height: auto;">
        <div class="image-description">
            <p>Для оплаты отсканируйте QR-код в мобильном приложении банка или штатной камерой телефона</p>
        </div>
    </div>
</body>
</html>
