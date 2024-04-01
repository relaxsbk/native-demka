<?php
session_start();

if ($_SESSION['fields']) {
    print_r($_SESSION);
}
unset($_SESSION['fields']);
print_r($_SESSION);

if ($_SESSION['user']) {
    print_r($_SESSION);
}
unset($_SESSION['user']);
print_r($_SESSION);

