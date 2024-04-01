<?php

    $db = require_once __DIR__ . '/../../../../src/database/connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statement_id = $_POST['statement_id'];
    $new_status = $_POST['new_status'];

    // Выполните SQL-запрос для обновления статуса заявления
    $sql_update_status = "UPDATE `statments` SET `status_id` = '$new_status' WHERE `id` = '$statement_id'";
    $result = mysqli_query($db, $sql_update_status);

    // После обновления статуса перенаправьте пользователя обратно на страницу, откуда он отправил форму
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}