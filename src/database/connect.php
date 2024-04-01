<?php

try {
    return mysqli_connect(
        '127.0.0.1:3307',
        'root',
        '',
        'native_php',
    );
} catch (Exception $exception) {
    echo $exception->getMessage();
}