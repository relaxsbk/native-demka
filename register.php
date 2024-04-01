<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: /statement.php");
}

$title = "Регистрация";

    include_once 'components/head.php';

    include_once 'components/header.php';


    if (isset($_SESSION['fields'])) {
    ?>
        <div class="mt-5 container alert alert-danger">
            Проверьте правильность введённых данных
        </div>
   <?php
        $fields = $_SESSION['fields'];
        unset($_SESSION['fields']);
    }
   ?>
<!--login password(confirm) FIO number email-->
<div class="container d-flex justify-content-center align-items-center " style="height: 90vh;">
    <form action="src/actions/user/register.php" method="post" class="w-50 ">
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input name="login" value="<?= $fields['login']['value'] ?? ''?>" type="text" class="form-control <?= $fields['login']['error'] ? 'is-invalid' : '' ?>" id="login" placeholder="Ivan">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Адрес электронной почты</label>
            <input name="email" value="<?= $fields['email']['value'] ?? '' ?>" type="text" class="form-control <?= $fields['email']['error'] ? 'is-invalid' : '' ?> " id="email" placeholder="Ivan@example.ru">
        </div>
        <div class="mb-3">
            <label for="FIO" class="form-label">ФИО</label>
            <input name="FIO" value="<?= $fields['FIO']['value'] ?? ''?>" type="text" class="form-control <?= $fields['FIO']['error'] ? 'is-invalid' : '' ?> " id="FIO" placeholder="Иванов Иван Иванович">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Номер телефона</label>
            <input name="number" value="<?= $fields['number']['value'] ?? ''?>" type="text" class="form-control <?= $fields['number']['error'] ? 'is-invalid' : '' ?>" id="number" placeholder="+79516301481">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control <?= $fields['password']['error'] ? 'is-invalid' : '' ?> " id="password" placeholder="Введите пароль">
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Подтверждение Пароля</label>
            <input name="password_confirm" type="password" class="form-control <?= $fields['password']['error'] ? 'is-invalid' : '' ?> " id="password_confirm" placeholder="Подтвердите пароль">
        </div>
        <div class="mb-3 text-center">
           <span class="">
               У вас есть аккаунт? -
               <a href="/" class="link-offset-1-hover text-decoration-none">Войти!</a>
           </span>
        </div>
        <button type="submit" class="btn btn-success w-100">Зарегистрироваться</button>
    </form>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<?php
    include_once 'components/footer.php';
?>