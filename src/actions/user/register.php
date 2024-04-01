<?php
    session_start();

   $db = require_once __DIR__ . '/../../database/connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $FIO = $_POST['FIO'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_confirm'];

    $fields = [
        'login' => [
            'value' => $login,
            'error' => false
        ],
        'email' => [
            'value' => $email,
            'error' => false
        ],
        'FIO' => [
            'value' => $FIO,
            'error' => false
        ],
        'number' => [
            'value' => $number,
            'error' => false
        ],
        'password' => [
            'value' => $password,
            'error' => false
        ],
    ];
    $error = false;



     if (empty($login)) {
         $fields['login']['error'] = true;
         $error = true;
     }

    if (empty($email) || !filter_var($email . FILTER_VALIDATE_EMAIL)) {
        $fields['email']['error'] = true;
        $error = true;
    }

    if (empty($FIO)) {
        $fields['FIO']['error'] = true;
        $error = true;
    }

    if (empty($password)) {
        $fields['password']['error'] = true;
        $error = true;
    }

    if ($password !== $password_conf) {
        $fields['password']['error'] = true;
        $error = true;
    }

    if ($error) {
        $_SESSION['fields'] = $fields;
        header("Location: /register.php");
        die;
    }

    $password_1 = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users`( `FIO`, `login`, `email`, `password`) VALUES ('$FIO','$login','$email','$password_1')";

try {
    mysqli_query($db, $sql);
    header("Location: /index.php");
} catch (Exception $exception) {
    echo $exception->getMessage();

}