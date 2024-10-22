<?php
session_start();

if(isset($_SESSION['user'])) {
    header("location: profile.php");
}
$messageClass = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $messageClass = strpos($message, 'successful') !== false ? 'msg-success' : 'msg-error';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/registration.css">
</head>
<body>
<form action="include/sign_up.php" method="post" enctype="multipart/form-data">

    <h1>Sign up</h1>

    <label for="username">
        Username
        <input type="text"
               id="username"
               name="username"
               placeholder="Enter your username"
               required
        >
    </label>

    <label for="email">
        E-mail
        <input type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
                required
        >
    </label>

    <label for="date">
        Date of birth
        <input type="date"
               id = "date_of_birth"
               name = "date_of_birth"
               required
        >
    </label>

    <label>profile picture</label>
    <input type="file" name="avatar">

    <div class="input-group">
        <label for="password">
            Password
            <input type="password"
                   id="password"
                   name="password"
                   placeholder="******"
                   autocomplete="new-password"
                   required
            >
        </label>

        <label for="password_confirm">
            Password confirmation
            <input type="password"
                   id="password_confirm"
                   name="password_confirm"
                   placeholder="******"
                   autocomplete="new-password"
                   required
            >
        </label>
    </div>

    <button type="submit">Sign up</button>
    <p>
        already have an account - <a href="index.php">log in to your account</a>
    </p>

    <?php if (isset($_SESSION['message'])): ?>
        <p class="<?= $messageClass ?>"><?= $_SESSION['message'] ?></p>
    <?php endif; unset($_SESSION['message']); ?>

</form>
</body>
</html>


