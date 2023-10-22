<?php
$botToken = '6812190083:AAFq2FhsiZDbwcGbOrw_F2YONAK2dZM7Q34';

// Проверяем, предоставлен ли параметр "chat_id" в URL
if (isset($_GET['chat_id'])) {
    $chatId = $_GET['chat_id'];
} else {
    echo 'Chat ID не указан.';
    exit;
}

$messageData = [
    "chat_id" => $chatId,
    "text" => "Привет, сегодня твоя кровь спасла человека! Гордись собой, ты молодец ;)"
];

$telegramApiUrl = "https://api.telegram.org/bot$botToken/sendMessage";

$options = [
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n",
        'content' => json_encode($messageData)
    ]
];

// Добавляем заголовок "Authorization" с токеном бота
$options['http']['header'] .= "Authorization: Bearer $botToken\r\n";

$context = stream_context_create($options);

$response = file_get_contents($telegramApiUrl, false, $context);

if ($response === false) {
    echo 'Ошибка при отправке сообщения';
} else {
    echo 'Сообщение успешно отправлено';
}
?>
