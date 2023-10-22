<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./css/main.css">
    <?php
    include './share/navbar.php';
    ?>
    <style>
        /* Your existing styles */
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .rounded-input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 95%;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            text-align: left;
        }

        .margin {
            margin: 10px 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        // Подключение к базе данных
        try {
            $db = new PDO('pgsql:host=188.225.24.138;dbname=default_db', 'gen_user', 'nRoDXEp~*p!)N3');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
        } catch (PDOException $e) {
            echo "Ошибка соединения с базой данных: " . $e->getMessage();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['login'])) {
                // Вход
                $email = $_POST['username'];
                $password = $_POST['password'];

                // Поле email, которое вы ищете

                try {
                    // Подготовленный запрос для поиска строки
                    $stmt = $db->prepare("SELECT * FROM Users WHERE email = :email");
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();

                    // Запись результата в переменную
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (trim($password) === trim($row['password'])) {
                        // Вход выполнен успешно
                        $_SESSION['user'] = $row['email']; // Сохраняем email пользователя в сессии
                        $_SESSION['level'] = $row['level'];
                        $_SESSION['fio'] = $row['fio'];
                        $_SESSION['phone'] = $row['phonenumber'];
                        $_SESSION['balance'] = $row['balance'];
                        echo 'Вход выполнен успешно!';
                        header("Location: registration.php");
                        exit;
                    } else {
                        echo 'Неправильное имя пользователя или пароль';
                    }
                } catch (Exception $e) {
                    echo "Непредвиденная ошибка";
                } finally {
                    // Код, который будет выполнен в любом случае, независимо от того, произошло исключение или нет
                }
            } elseif (isset($_POST['new_email']) && isset($_POST['new_password']) && isset($_POST['register'])) {
                // Регистрация
                $newemail = $_POST['new_email'];
                $newPassword = $_POST['new_password'];
                $phone = $_POST['phone'];
                $fio = $_POST['fio'];

                // Выполнение запроса для вставки нового пользователя в таблицу
                $stmt = $db->prepare('INSERT INTO Users (email, password, phonenumber, fio, level, balance) VALUES (?, ?, ?, ?, 1, 0)');
                if ($stmt->execute([$newemail, $newPassword, $phone, $fio])) {
                    echo 'Регистрация успешно завершена. Теперь вы можете войти.';
                } else {
                    echo 'Произошла ошибка при регистрации.';
                }
            }
        }

        if (isset($_SESSION['user'])) {
            // User is already authenticated
            header('Location: profile.php');
            exit;
        } else {
            // User is not authenticated, display login and registration forms
            echo '<h1>Вход</h1>';
            echo '<form action="" method="post">
            <label for="username">Почта:</label>
            <input type="text" name="username" required class="rounded-input">
            <br>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required class="rounded-input">
            <br>
            <input type="submit" name="login" value="Войти" class="margin button blue-button">
        </form>';

            echo '<h1>Регистрация</h1>';
            echo '<form action="" method="post">
            <label for="new_email">Почта:</label>
            <input type="text" name="new_email" required class="rounded-input">
            <br>
            <label for="new_password">Новый пароль:</label>
            <input type="password" name="new_password" required class="rounded-input">
            <br>
            <label for="phone">Номер телефона:</label>
            <input type="text" name="phone" required class="rounded-input">
            <br>
            <label for="fio">ФИО:</label>
            <input type="text" name="fio" required class="rounded-input">
            <br>
            <input type="submit" name="register" value="Зарегистрироваться" class="margin button blue-button">
        </form>';
        }
        ?>
    </div>
</body>

</html>