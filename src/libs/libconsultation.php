<?php

function generateDoctorCard($doctorName, $description, $photoPath) {
    return '
    <div class="doctor-card">
        <img src="' . htmlspecialchars($photoPath) . '" alt="Фото доктора ' . htmlspecialchars($doctorName) . '" class="doctor-photo">
        <div class="doctor-info">
            <h2>' . htmlspecialchars($doctorName) . '</h2>
            <p>' . htmlspecialchars($description) . '</p>
            <button class="appointment-btn" data-doctor="' . htmlspecialchars($doctorName) . '">Записаться на консультацию</button>
        </div>
    </div>
    ';
}

function generateAppointmentForm() {
    $timeOptions = getTimeOptions();

    return '
    <form id="appointmentForm" class="appointment-form" method="POST">
        <h2>Форма записи</h2>
        <input type="hidden" id="doctorName" name="doctorName" value="">
        <input type="text" id="clientName" name="clientName" placeholder="Ваше имя" required>
        <input type="tel" id="clientPhone" name="clientPhone" placeholder="Ваш телефон" required>
        <select name="appointmentTime" required>
            ' . $timeOptions . '
        </select>
        <button type="submit" name="appointmentForm">Отправить</button>
    </form>
    ';
}

function getTimeOptions() {
    // статический массив временных интервалов для демонстрации
    $times = ["09:00 - 10:00", "10:00 - 11:00", "11:00 - 12:00", "12:00 - 13:00", "13:00 - 14:00"];

    $options = "";
    foreach ($times as $time) {
        $options .= "<option value='{$time}'>{$time}</option>";
    }

    return $options;
}


// function getTimeOptions() {
//     // Подключение к базе данных
//     $connection = new PDO("mysql:host=your_host;dbname=your_dbname", "username", "password");

//     $query = "SELECT time FROM available_times";  // Измените это на ваш запрос к БД
//     $statement = $connection->prepare($query);
//     $statement->execute();
    
//     $times = $statement->fetchAll(PDO::FETCH_COLUMN);

//     $options = "";
//     foreach ($times as $time) {
//         $options .= "<option value='{$time}'>{$time}</option>";
//     }

//     return $options;
// }


function addAnAppointment(){
    
}

?>



<script>

function initAppointmentForm() {
    $('.appointment-btn').on('click', function() {
        const doctorName = $(this).data('doctor');
        $('#appointmentForm h2').text('Форма записи к ' + doctorName);
        $('#doctorName').val(doctorName);
        $('.modal-background').fadeIn();
        $('.appointment-form').show();
    });

    // При отправке формы
    $("#appointmentForm").on("submit", function() {
        // Устанавливаем атрибут action в зависимости от имени формы
        if ($(this).attr("name") === "appointmentForm") {
        }
    });

    // Закрыть модальное окно при клике вне формы
    $('.modal-background').on('click', function(e) {
        if (e.target !== this) return;
        $(this).fadeOut();
        $('.appointment-form').hide();
    });
}


</script>



