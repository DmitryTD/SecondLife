<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/store.css">
</head>

<body>
    <?php
    include './share/navbar.php';
    if (isset($_POST['buy_product'])) {
        $product_name = $_POST['product_name'];
        $product_points = $_POST['product_points'];

        // Здесь обработайте покупку (например, списание баллов и т. д.)

        header("Location: store.php?purchase_success=1&product_name=" . urlencode($product_name) . "&product_points=" . $product_points);  // предполагается, что это текущий файл
        exit();
    }

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

        const urlParams = new URLSearchParams(window.location.search);
        const purchaseSuccess = urlParams.get('purchase_success');
        const productName = urlParams.get('product_name');
        const productPoints = urlParams.get('product_points');

        if (purchaseSuccess === '1') {
            openModal(`Товар "${productName}" куплен за ${productPoints} баллов!`);
            history.pushState(null, null, window.location.pathname);
        }
    </script>

</body>