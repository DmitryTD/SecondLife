<?php

// Подключение к базе данных
function db_connect()
{
    $USER = 'gen_user';
    $PASSWORD = 'nRoDXEp~*p!)N3';
    $HOST = '188.225.24.138';
    $DATABASE = 'default_db';

    try {
        $conn = new PDO("pgsql:host=" . $HOST . ";dbname=" . $DATABASE, $USER, $PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
    return $conn;
}

// Закрытие соединения с базой данных
function db_close_connection($conn)
{
    $conn = NULL;
}

?>