<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запись на консультацию к врачу</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/consultation.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
include './share/navbar.php';
include './libs/libconsultation.php';

if (isset($_POST['appointmentForm'])) {
    //addAnAppointment();
    header("Location: consultation.php");
    exit();


// имя доктора (через id)
// фио пользователя
// тел пользователя
// доступные даты
// 

    // $doctorName = $_POST["doctorName"];
    // $clientName = $_POST["clientName"];
    // $clientPhone = $_POST["clientPhone"];
    //$appointmentTime = $_POST["appointmentTime"];
    //echo $appointmentTime;
    //die("darova");

    //add in database
}

echo generateDoctorCards("./share/POPOV.jpg");
//echo generateDoctorCard("Доктор Press F", "худший", "./share/KOT1.jpg");
?>

<div class="modal-background">
    <?php echo generateAppointmentForm(); ?>
</div>

<script>$(document).ready(initAppointmentForm);</script>

</body>
</html>
