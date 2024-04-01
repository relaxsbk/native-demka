<?php
    session_start();

    $db = require_once __DIR__ . '/../../database/connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` where `login`='$login'";
    $query = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($query);

    if (!$user) {
        echo 'Не верный логин';
//        $_SESSION['auth_error'] = true;
//        header("Location: /");
        die;
    }

    if (!password_verify($password, $user['password'])) {
//        $_SESSION['auth_error'] = true;
        echo 'Не верный пароль';
//        header("Location: /");
    }
//
        $_SESSION['user'] = [
            'id' => $user['id_user'],
            'login' => $user['login'],
            'email' => $user['email'],
            'FIO' => $user['FIO'],
            'role' => $user['role'],
        ];
        header('Location: /statements.php');
//

