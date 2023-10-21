<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Награды</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/store.css">
</head>

<body>
    <?php
    include './share/navbar.php';

    ?>



    <div class="store-page">
        <h1 class="store-header">Магазин баллов</h1>

        <form method="post">
            <div class="product">
                <div class="product-image">
                    <img src="./share/sportmasterLogo.jpg" alt="Product 1">
                </div>
                <div class="product-description">
                    <div class="product-title">Скидка в Спортмастер</div>
                    <p>Скидка 5 % на что-то</p>
                    <div class="product-points">100 баллов</div>
                    <input type="hidden" name="product_name" value="Скидка в Спортмастер">
                    <input type="hidden" name="product_points" value="100">
                    <button type="submit" class="buy-button" name="buy_product">Купить</button>
                </div>
            </div>
        </form>

        <form method="post">
            <div class="product">
                <div class="product-image">
                    <img src="./share/coolKepka.jpg" alt="Product 2">
                </div>
                <div class="product-description">
                    <div class="product-title">Классная кепка</div>
                    <p>Просто классная кепка</p>
                    <div class="product-points">200 баллов</div>
                    <input type="hidden" name="product_name" value="Классная кепка">
                    <input type="hidden" name="product_points" value="200">
                    <button type="submit" class="buy-button" name="buy_product">Купить</button>
                </div>
            </div>
        </form>

        <form method="post">
            <div class="product">
                <div class="product-image">
                    <img src="./share/marathon.png" alt="Product 3">
                </div>
                <div class="product-description">
                    <div class="product-title">Билет на марафон</div>
                    <p>Классный марафон! Приходи!</p>
                    <div class="product-points">300 баллов</div>
                    <input type="hidden" name="product_name" value="Билет на марафон">
                    <input type="hidden" name="product_points" value="300">
                    <button type="submit" class="buy-button" name="buy_product">Купить</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Модальное окно -->
    <div class="modal" id="modalWindow">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal()">&times;</span>
            <p id="modalMessage"></p>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('modalWindow').style.display = 'none';
        }

        function openModal(message) {
            document.getElementById('modalMessage').innerText = message;
            document.getElementById('modalWindow').style.display = 'flex';
        }

        <?php
        if (isset($_POST['buy_product'])) {
            $product_name = $_POST['product_name'];
            $product_points = $_POST['product_points'];
            echo "openModal('Товар \"$product_name\" куплен за $product_points баллов!');";
            header("Location: consultation.php");
            exit();
        }
        ?>
    </script>
</body>