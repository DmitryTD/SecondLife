<?php
include 'db_functions.php';
?>


<?php

function getUserBalance()
{
    $userBalance = 0;
    $conn = db_connect();
    if (isset($_SESSION['user'])) {
        $email = $_SESSION['user'];

        $stmt = $conn->prepare("SELECT balance FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $userBalance = $result['balance'];
        }
    }
    db_close_connection($conn);
    return $userBalance;
}
?>
