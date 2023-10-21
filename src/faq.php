<?php
include './share/navbar.php';
include 'libs/libfaq.php';
?>
<link rel="stylesheet" href="./css/main.css">

<!DOCTYPE html>
<link rel="stylesheet" href="./css/faq.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>$(document).ready(initFAQInteraction);</script>

<?php
echo generateFAQItem("Вопрос 1", "Ответ 1");
echo generateFAQItem("Вопрос 2", "Ответ 2");
echo generateFAQItem("Вопрос 3", "Ответ 3");
echo generateFAQItem("Вопрос 4", "Ответ 4");
echo generateFAQItem("Вопрос 5", "Ответ 5");
echo generateFAQItem("Вопрос 6", "Ответ 6");
echo generateFAQItem("Вопрос 7", "Ответ 7");
echo generateFAQItem("Вопрос 8", "Ответ 8");
echo generateFAQItem("Вопрос 9", "Ответ 9");
echo generateFAQItem("Вопрос 10", "Ответ 10");
?>

