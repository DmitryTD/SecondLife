<?php session_start(); ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/profile.css">
<?php
include './share/navbar.php';
?>

<div class="user-profile">
    <h1>Привет, <?php echo $_SESSION['fio']; ?>!</h1>
    <ul>
        <li>Твой уровень в программе: <?php echo $_SESSION['level']; ?></li>
        <li>Твои бонусы: <?php echo $_SESSION['balance']; ?></li>
        <li>Номер телефона: <?php echo $_SESSION['phone']; ?></li>
        <li>Email: <?php echo $_SESSION['user']; ?></li>
        <li>Дата последней сдачи КМ: 14.09.2023</li>
        <li>Дата последующей возможной сдачи: 14.01.2024</li>
    </ul>
    <br>
    <p><a href="./logout.php" class="button blue-button">Выйти</a></p>
</div>

