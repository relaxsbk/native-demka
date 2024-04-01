<?php
    session_start();


    $db = require_once __DIR__ . '/../../../src/database/connect.php';

   if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $user_id = $_POST['id'];
       $car_number = $_POST['car_number'];
       $description = $_POST['description'];

        $fields = [
            "car_number" => [
                'value' => $car_number,
                'error' => false
            ],
            "description" => [
                'value' => $description,
                'error' => false
            ]
        ];
        $error = false;

        if(empty($car_number)) {
            $fields['car_number']['error'] = true;
            $error = true;
        }

        if (empty($description)) {
            $fields['description']['error'] = true;
            $error = true;
        }

        if($error) {
            $_SESSION['fields'] = $fields;
            header("location: /statement-form.php");
            die;
        }



       $sql = "INSERT INTO `statments`( `gos_number`, `desription`, `user_id` ) VALUES ('$car_number','$description','$user_id')";
       $query = mysqli_query($db, $sql);
       $_SESSION['success'] = 'Заявление отправлено на рассмотрение';
        header("Location: /");
        die;
   } else {
       echo "Не правильный запрос";
   }



