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
            font-family: Arial, sans-serif;
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
			margin-top: 20px
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
    $db = new PDO('mysql:host=localhost;dbname=vtorayazhizn', 'root', '');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['login'])) {
            // Вход
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Выполнение запроса для поиска пользователя по логину
            $stmt = $db->prepare('SELECT * FROM people WHERE login = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['pass'])) {
                // Вход выполнен успешно
                $_SESSION['user'] = $username;
                header('Location: dashboard.php'); // Перенаправление на защищенную страницу
                exit();
            } else {
                echo 'Неправильное имя пользователя или пароль';
            }
        } elseif (isset($_POST['register'])) {
            // Регистрация
            $newUsername = $_POST['new_username'];
            $newPassword = $_POST['new_password'];

            // Хэширование пароля
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Выполнение запроса для вставки нового пользователя в таблицу
            $stmt = $db->prepare('INSERT INTO people (login, pass) VALUES (?, ?)');
            if ($stmt->execute([$newUsername, $hashedPassword])) {
                echo 'Регистрация успешно завершена. Теперь вы можете войти.';
            } else {
                echo 'Произошла ошибка при регистрации.';
            }
        }
    }
	
	
    if (isset($_SESSION['user'])) {
        // User is already authenticated
        echo '<h1>Привет, ' . $_SESSION['user'] . '!</h1>';
        echo '<p><a href="logout.php" class="button blue-button">Выйти</a></p>';
    } else {
        // User is not authenticated, display login and registration forms
        echo '<h1>Вход</h1>';
        echo '<form action="" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" name="username" required class="rounded-input">
            <br>
            <label for="password">Пароль:</label>
            <input type="password" name="password" required class="rounded-input">
            <br>
            <input type="submit" name="login" value="Войти" class="margin button blue-button">
        </form>';

        echo '<h1>Регистрация</h1>';
        echo '<form action="" method="post">
            <label for="new_username">Новое имя пользователя:</label>
            <input type="text" name="new_username" required class="rounded-input">
            <br>
            <label for="new_password">Новый пароль:</label>
            <input type="password" name="new_password" required class="rounded-input">
            <br>
            <input type="submit" name="register" value="Зарегистрироваться" class="margin button blue-button">
        </form>';
    }
    ?>
</div>
</body>
</html>
