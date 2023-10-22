<?php
include("db_functions.php");

function generateDoctorCards($photoPathTemplate)
{
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



function generateAppointmentForm()
{
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


function getTimeOptions()
{
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

/*
function addAnAppointment()
{
    $conn = db_connect();

    $doctorName = $_POST["doctorName"];
    $clientName = $_POST["clientName"];
    $clientPhone = $_POST["clientPhone"];
    $appointmentTime = $_POST["appointmentTime"];

    $stmt = $conn->prepare("SELECT MAX(recordid) as maxId FROM records");
    $stmt->execute();
    $result = $stmt->fetch();
    $recordId = $result['maxId'] + 1;

    // Получить doctorid по имени врача
    $stmt = $conn->prepare("SELECT doctorid FROM doctors WHERE fio = ?");
    $stmt->execute([$doctorName]);
    $result = $stmt->fetch();

    if ($result) {
        $doctorId = $result["doctorid"];

        echo $recordId . "\n";
        echo $doctorId . "\n";
        echo $clientName . "\n";
        echo $clientPhone . "\n";
        echo $appointmentTime . "\n";


        // Занести данные в таблицу records
        $insertStmt = $conn->prepare("INSERT INTO records (recordid, doctorid, fio_client,  clientphonenumber,  data) VALUES (?, ?, ?, ?, ?)");
        $insertStmt->execute([$recordId, $doctorId, $clientName, $clientPhone, $appointmentTime]);

        if ($insertStmt->rowCount() == 0) {
            echo $insertStmt->errorInfo()[2];
            print_r($stmt->errorInfo());
            echo "Ошибка при добавлении записи";
        }
    } else {
        echo "Доктор с таким именем не найден";
    }

    db_close_connection($conn);
}
*/


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
            if ($(this).attr("name") === "appointmentForm") {}
        });

        // Закрыть модальное окно при клике вне формы
        $('.modal-background').on('click', function(e) {
            if (e.target !== this) return;
            $(this).fadeOut();
            $('.appointment-form').hide();
        });
    }

    var modal = document.getElementById("resultModal");
    var span = document.getElementsByClassName("close-btn")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function showMessageModal(message) {
        document.getElementById("modalMessage").textContent = message;
        modal.style.display = "block";
    }
</script>