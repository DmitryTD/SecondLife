<?php
include("db_functions.php");

function generateDoctorCards($photoPathTemplate) {
    $conn = db_connect();

    $stmt = $conn->prepare("SELECT fio, info FROM doctors");
    $stmt->execute();

    $doctorData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $cards = '';
    foreach ($doctorData as $doctor) {
        $doctorName = $doctor['fio'];
        $description = $doctor['info'];
        $photoPath = sprintf($photoPathTemplate, $doctorName);

        $cards .= '
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
    db_close_connection($conn);
    return $cards;
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
    // Подключение к базе данных
    $conn = db_connect();

    $query = "SELECT graphic FROM doctors";
    $statement = $conn->prepare($query);
    $statement->execute();
    
    $times = $statement->fetchAll(PDO::FETCH_COLUMN);

    $options = "";
    foreach ($times as $time) {
        $options .= "<option value='{$time}'>{$time}</option>";
    }

    return $options;
}


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



