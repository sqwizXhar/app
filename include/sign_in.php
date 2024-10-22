<?php
global $pdo;
session_start();
require_once 'db_connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $found_user = "SELECT * FROM user_data WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($found_user);
    $stmt->execute([
        'username' => $username,
        'password' => $password
    ]);

    if($stmt->rowCount() > 0){

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "username" => $user['username'],
            "email" => $user['email'],
            "avatar" => $user['avatar'],
            "date_of_birth" => $user['date_of_birth']
        ];

        setcookie('date_of_birth', $user['date_of_birth'], time() + (10 * 365 * 24 * 60 * 60), "/");

        header('Location: ../profile.php');

    }
    else{
        $_SESSION['message'] = "Invalid username or password";
        header("location: ../index.php");
    }
}