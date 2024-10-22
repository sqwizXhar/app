<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
require_once 'include/profile_logic.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/profile.css">
    <title>Profile</title>
</head>
<body>
<div class="profile-container">
    <div class="profile-info">
        <h1>Welcome, <?= $user['username'] ?>!</h1>
        <img src="<?= $user['avatar'] ?>" alt="Profile Picture" width="100">
        <p>Email: <?= $user['email'] ?></p>
        <p>Date of Birth: <?= $user['date_of_birth'] ?></p>
        <?php if ($isBirthdayToday): ?>
            <h2>Happy Birthday!!</h2>
        <?php else: ?>
            <h2>It's left until your birthday <?= $daysUntilBirthday ?> days</h2>
        <?php endif; ?>
        <a href="Levels/8.9.php" class="task">Level 8.9(1, 2)</a>
        <a href="Levels/9-9(2)/comments.php" class="task">Level 9.9(1)</a>
        <a href="Levels/9.9.php" class="task">Level 9.9(2)</a>
        <a href="Levels/random_photo.php" class="task">Level 9.4(1)</a>
        <a href="include/log_out.php" class="logout-btn">Log out</a>
    </div>
</div>
</body>
</html>
