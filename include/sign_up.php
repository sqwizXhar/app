<?php
global $pdo;
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $date_of_birth = $_POST['date_of_birth'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $password_confirm = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'error loading file';
            header('location: ../registration.php');
            exit;
        }

        $password = md5($password);

        $query = "INSERT INTO user_data (username, email, date_of_birth, password, avatar) VALUES (:username, :email, :date_of_birth, :password, :avatar)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':date_of_birth' => $date_of_birth,
            ':password' => $password,
            'avatar' => $path
        ]);



        $_SESSION['message'] = 'registration was successful!';
        header('location: ../index.php');
        exit;

    } else {
        $_SESSION["message"] = "Passwords do not match!";
        header('Location: ../registration.php');
        exit;
    }
}
?>
