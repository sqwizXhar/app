<?php
$user = $_SESSION['user'];
$date_of_birth = $user['date_of_birth'];

if (isset($_COOKIE['date_of_birth'])) {
    $cookie_date_of_birth = $_COOKIE['date_of_birth'];
    $today = date('Y-m-d');

    $currentYear = date('Y');
    $nextBirthday = date('Y-m-d', strtotime("$currentYear-" . date('m-d', strtotime($cookie_date_of_birth))));

    if ($today > $nextBirthday) {
        $nextBirthday = date('Y-m-d', strtotime("$currentYear +1 year-" . date('m-d', strtotime($cookie_date_of_birth))));
    }

    $daysUntilBirthday = (strtotime($nextBirthday) - strtotime($today)) / (60 * 60 * 24);
    $isBirthdayToday = (date('m-d', strtotime($cookie_date_of_birth)) === date('m-d', strtotime($today)));
} else {
    $isBirthdayToday = false;
    $daysUntilBirthday = null;
}
?>
