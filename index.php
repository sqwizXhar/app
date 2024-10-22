<?php
session_start();
if (isset($_SESSION['user'])) {
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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authorization</title>
    <link rel="stylesheet" href="assets/Authorization.css">
</head>
<body>
<form action="include/sign_in.php" method="post">
    <h1>Sign in</h1>

    <label for="username">
        Username
        <input type="text"
               id="username"
               name="username"
               placeholder="Enter your username"
               required
        >
    </label>

    <label for="password">
        Password
        <input type="password"
               id="password"
               name="password"
               placeholder="******"
               autocomplete="current-password"
               required
        >
    </label>

    <button type="submit">Login</button>
    <p>no account yet? - <a href="registration.php">register an account</a></p>

    <?php if (isset($_SESSION['message'])): ?>
        <p class="<?= $messageClass ?>"><?= $_SESSION['message'] ?></p>
    <?php endif; unset($_SESSION['message']); ?>

</form>
</body>
</html>
