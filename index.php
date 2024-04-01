<?php
    session_start();

    if (isset($_SESSION['user'])) {
        header("Location: /statements.php");
    }


    $title = "Авторизация";

    require_once 'src/database/connect.php';
    include_once 'components/head.php';

    include_once 'components/header.php';
?>

<div class="container d-flex justify-content-center align-items-center " style="height: 90vh;">
    <form action="src/actions/user/auth.php" method="post">
        <div class="mb-3">
            <label for="login" class="form-label">Ваш логин</label>
            <input name="login" type="text" class="form-control" id="login">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
           <span>
               У вас нет аккаунта? -
               <a href="/register.php" class="link-offset-1-hover text-decoration-none">Зарегистрироваться!</a>
           </span>
        </div>
        <button type="submit" class="btn btn-primary w-25">Войти</button>
    </form>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<?php
    include_once 'components/footer.php';
?>


